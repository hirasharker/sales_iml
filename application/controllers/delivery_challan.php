<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_Challan extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=1 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('delivery_yard_model', 'yard_model', TRUE);
		$this->load->model('bank_model', 'bank_model', TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('checklist_model','ck_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		
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

		// $customer_data['chassis_engine_no']	=	$this->stock_model->get_chassis_and_engine_no_from_msdb();
		// echo '<pre>';print_r($customer_data['chassis_engine_no']);echo '</pre>';exit();

		
		$customer_data['customer_list']		=	$this->customer_model->get_customers_by_status(8);
		$customer_data['yard_detail']		=	$this->yard_model->get_delivery_yard_by_employee_id($this->session->userdata('employee_id'));

		$customer_data['customer_list_for_printing_challan']	=	$this->customer_model->get_customers_by_status(9);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/delivery_challan/delivery_challan',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function update_engine_and_chassis_no(){
		
		$customer_data									=	array();
		$customer_status								=	array();
		$customer_status['dc_update_time']				=	date('Y-m-d H:i:s');
		
		$customer_id									=	$this->input->post('customer_id','',TRUE);

		$max_challan_no									=	$this->customer_model->get_max_delivery_challan_no();

		$customer_data['delivery_challan_no']			=	$max_challan_no->delivery_challan_no + 1;

		$customer_status['status']						=	9;

		// print_r($customer_data);exit();

		$this->customer_model->update_customer_engine_and_chassis_no($customer_data, $customer_id);
		$this->customer_model->update_customer_status($customer_status, $customer_id);
		redirect('delivery_challan/index',"refresh");
	}

	public function print_dc(){
		$customer_data							=	array();
		
		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$customer_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['sales_person']			=	$this->employee_model->get_employee_by_id($customer_data['customer_detail']->mkt_id);

		if($customer_data['sales_person'] == NULL){
			$customer_data['sales_person']			=	$this->dealer_model->get_dealer_by_id($customer_data['customer_detail']->dealer_id);
		}

		$customer_data['yard_list']				=	$this->yard_model->get_all_delivery_yards();

		$customer_data['bank_list']				=	$this->bank_model->get_all_banks();
		
		$customer_data['model_list']			=	$this->model_model->get_all_models();

		$customer_data['checklist_detail']		=	$this->ck_model->get_checklist_by_customer_id($customer_id);

		$this->load->view('pages/delivery_challan/print_delivery_challan',$customer_data);
	}

}
