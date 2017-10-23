<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
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

		$customer_data['city_list']			=	$this->city_model->get_all_cities();
		$customer_data['zone_list']			=	$this->zone_model->get_all_zones();
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		$customer_data['reference_list']	=	$this->customer_model->get_all_customers_id_from_ms_db();
		$customer_data['customer_list']		=	$this->customer_model->get_all_customers();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/customer/customer',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function add_customer()
	{
		$customer_data										=	array();
		$customer_data['user_id']							=	$this->session->userdata('employee_id');
		$customer_data['user_name']							=	$this->session->userdata('email_id');
		$customer_data['reference']							=	$this->input->post('reference','',TRUE);
		if($customer_data['reference']!=""){
			$reference_info										=	$this->customer_model->get_customer_by_id_from_ms_db($customer_data['reference']);
			// print_r($reference_info);exit();
			$customer_data['customer_name']						=	$reference_info->CustName;
			$customer_data['father_name']						=	$reference_info->FathersName;
			$customer_data['mother_name']						=	$reference_info->MothersName;
			$customer_data['present_address']					=	$reference_info->PresentAddress;
			$customer_data['permanent_address']					=	$reference_info->PermanentAddress;
			$customer_data['phone']								=	$reference_info->Phone;
			// print_r($customer_data);exit();
		}else{
			$customer_data['customer_name']						=	$this->input->post('customer_name','',TRUE);
			$customer_data['present_address']					=	$this->input->post('present_address','',TRUE);
			$customer_data['permanent_address']					=	$this->input->post('permanent_address','',TRUE);
			$customer_data['father_name']						=	$this->input->post('father_name','',TRUE);
			$customer_data['mother_name']						=	$this->input->post('mother_name','',TRUE);
			$customer_data['phone']								=	$this->input->post('phone','',TRUE);
		}
		$customer_data['national_id']						=	$this->input->post('national_id','',TRUE);
		$customer_data['occupation']						=	$this->input->post('occupation','',TRUE);
		$customer_data['business_address']					=	$this->input->post('business_address','',TRUE);
		$customer_data['spouse_address']					=	$this->input->post('spouse_address','',TRUE);
		$customer_data['city_id']							=	$this->input->post('city_id','',TRUE);
		$customer_data['city_code']							=	$this->input->post('city_code','',TRUE);
		$customer_data['zone_id']							=	$this->input->post('zone_id','',TRUE);
		$zone_info 											=	$this->zone_model->get_zone_by_id($customer_data['zone_id']);
		$customer_data['zhead_id']							=	$zone_info->zhead_id;
		$customer_data['coordinator_id']					=	$zone_info->coordinator_id;
		$customer_data['rm_id']								=	$zone_info->rm_id;
		$customer_data['email_id']							=	$this->input->post('email_id','',TRUE);
		$customer_data['model_id']							=	$this->input->post('model_id','',TRUE);
		$customer_data['model_code']						=	$this->input->post('model_code','',TRUE);
		$customer_data['engine_no']							=	$this->input->post('engine_no','',TRUE);
		$customer_data['chassis_no']						=	$this->input->post('chassis_no','',TRUE);
		$customer_data['registration_no']					=	$this->input->post('registration_no','',TRUE);
		$customer_data['total_price']						=	$this->input->post('total_price','',TRUE);
		$customer_data['discount']							=	$this->input->post('discount','',TRUE);
		$customer_data['payment_mode']						=	$this->input->post('payment_mode','',TRUE);
		$customer_data['downpayment']						=	$this->input->post('downpayment','',TRUE);
		$customer_data['period']							=	$this->input->post('period','',TRUE);
		$customer_data['interest_rate']						=	$this->input->post('interest_rate','',TRUE);
		$customer_data['installment_start_date']			=	$this->input->post('installment_start_date','',TRUE);

		
		// print_r($customer_data); exit();
		$result												=	$this->customer_model->add_customer($customer_data);

		$update_code_data									=	array();
		
		$update_code_data['customer_code']					=	date('y').'-'.'00'.'-'.$customer_data['city_code'].'-'.$customer_data['model_code'].'-'.$result;

		$this->customer_model->update_customer($update_code_data,$result);

		$zonal_head_info									=	$this->employee_model->get_employee_by_id($customer_data['zhead_id']);
		$coordinator_info									=	$this->employee_model->get_employee_by_id($customer_data['coordinator_id']);


		$this->mail_model->send_email($zonal_head_info->email_id,$update_code_data['customer_code']. ' Waiting for Approval',$customer_data['customer_name']);

		$this->mail_model->send_email($coordinator_info->email_id,$update_code_data['customer_code']. ' Waiting for Approval',$customer_data['customer_name']);

		redirect('customer/index','refresh');
	}
}
