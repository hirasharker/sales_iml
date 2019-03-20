<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Head_Of_Sales extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=5 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('email_model','mail_model',TRUE);
		
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

		if($this->session->userdata('role')==5){
			$customer_data['customer_list']		=	$this->customer_model->get_all_customers_by_head_of_sales_id($this->session->userdata('employee_id'));	
		} else {
			$customer_data['customer_list']		=	$this->customer_model->get_all_customers();	
		}
		
		// echo '<pre>';print_r($customer_data['customer_list']); echo '</pre>';exit();
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		$customer_data['employee_list']		=	$this->employee_model->get_all_employees();
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/head_of_sales',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function decision($key,$customer_id){
		$customer_status		=	array();

		$customer_status['head_of_sales_note']	=	$this->input->post('head_of_sales_note','',TRUE);

		$customer_detail 		=	$this->customer_model->get_customer_by_id($customer_id);

		if($key=='approve'){
			$customer_status['discount']	=	$this->input->post('discount','',TRUE);

			if($customer_detail->inspection_required==1){
				$customer_status['status']	=	2;
			}else{
				$customer_status['status']	=	5;
			}
		}else{
			$customer_status['status']		=	12;
		}


		if($customer_detail->inspection_required==1){

			$customer_data			=	$this->customer_model->get_customer_by_id($customer_id);

			$city_info				=	$this->city_model->get_city_by_id($customer_data->city_id);

			$recovery_manager_info	=	$this->employee_model->get_employee_by_id($city_info->rm_id);

			$controller_info		=	$this->employee_model->get_employee_by_id(205);

			$mail_body				=	$this->load->view('template/inspection_mail',$customer_data,TRUE);
			
			$this->mail_model->send_email($recovery_manager_info->email_id,$customer_data->customer_code. ' Waiting for Inspection',$mail_body);
			$this->mail_model->send_email($controller_info->email_id,$customer_data->customer_code. ' Waiting for Inspection',$mail_body);
		}
		
		$customer_status['head_of_sales_approval_time']	=	date('Y-m-d H:i:s');
		
		$this->customer_model->update_customer_status($customer_status, $customer_id);
		redirect('approval_head_of_sales', 'refresh');
	}
}
