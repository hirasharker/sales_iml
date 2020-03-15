<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Order extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=7 && $this->session->userdata('role')!=15 && $this->session->userdata('role')!=3){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('delivery_yard_model', 'yard_model', TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('email_model','mail_model',TRUE);
		$this->load->model('checklist_model','ck_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);

		$this->load->model('stock_model','stock_model',TRUE);
		
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data               =   array();
		$customer_data		=	array();
		
		$customer_data['customer_list']		=	$this->customer_model->get_customers_by_status(7);
		$customer_data['customer_list_for_printing_do']		=	$this->customer_model->get_customers_by_status(8);
		$customer_data['yard_list']			=	$this->yard_model->get_all_delivery_yards();
		$customer_data['model_list']		=	$this->model_model->get_all_models();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/delivery_order/delivery_order',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function update_delivery_yard(){
		$customer_data									=	array();
		$customer_status								=	array();
		$customer_data['do_update_time']				=	date('Y-m-d H:i:s');
		
		$customer_id									=	$this->input->post('customer_id','',TRUE);

		$max_do_no										=	$this->customer_model->get_max_delivery_order_no();

		$customer_data['delivery_order_no']				=	$max_do_no->delivery_order_no + 1;

		$customer_data['status']						=	8;

		// print_r($customer_data);exit();

		$this->customer_model->update_customer($customer_data, $customer_id);

		$customer_data['customer_detail']					=	$this->customer_model->get_customer_by_id($customer_id);

		$current_stock_position 							=	$this->stock_model->get_stock_by_chassis_no($customer_data['customer_detail']->chassis_no)->stock_position;
		$stock_data['stock_position']						=	$current_stock_position + 3;

		$update_stock										=	$this->stock_model->update_stock_by_chassis_no($stock_data, $customer_data['customer_detail']->chassis_no);

		// $correspondent_detail							=	$this->employee_model->get_employee_by_id($delivery_yard_detail->correspondent_id);

		// $yard_head_detail								=	$this->employee_model->get_employee_by_id($delivery_yard_detail->yard_head_id);

		// $mail_body				=	$this->load->view('template/mail_delivery_yard',$customer_data,TRUE);
		
		// $this->mail_model->send_email($correspondent_detail->email_id,$customer_data['customer_detail']->customer_code. ' Waiting for Delivery',$mail_body);

		// $this->mail_model->send_email($yard_head_detail->email_id,$customer_data['customer_detail']->customer_code. ' Waiting for Delivery',$mail_body);

		redirect('delivery_order/index',"refresh");
	}

	public function print_do(){
		$customer_data							=	array();

		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$customer_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['sales_person']			=	$this->employee_model->get_employee_by_id($customer_data['customer_detail']->mkt_id);

		if($customer_data['sales_person'] == NULL){
			$customer_data['sales_person']			=	$this->dealer_model->get_dealer_by_id($customer_data['customer_detail']->dealer_id);
		}

		$customer_data['yard_list']				=	$this->yard_model->get_all_delivery_yards();
		
		$customer_data['model_list']			=	$this->model_model->get_all_models();

		$customer_data['checklist_detail']		=	$this->ck_model->get_checklist_by_customer_id($customer_id);

		$this->load->view('pages/delivery_order/print_delivery_order',$customer_data);
	}
}
