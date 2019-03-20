<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Accounts extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=8 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('payment_model','payment_model',TRUE);
		$this->load->model('log_model','log_model',TRUE);
		
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

		// $info 	=	$this->payment_model->get_downpayment_by_customer_code('17-16-310-124-32100');
		// print_r($info);exit();
		
		$customer_data['customer_list']		=	$this->customer_model->get_all_customers();
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		$customer_data['dp_info']			=	array();
		$customer_data['reg_info']			=	array();

		// $i = 0;
		// foreach($customer_data['customer_list'] as $value) {
		// 	$customer_data['dp_info'][$i]			=	$this->payment_model->get_payment_by_customer_code_and_voucher_type($value->customer_code,'Downpayment');
		// 	$i++;
		// }

		// $i = 0;
		// foreach($customer_data['customer_list'] as $value) {
		// 	$customer_data['reg_info'][$i]			=	$this->payment_model->get_payment_by_customer_code_and_voucher_type($value->customer_code,'Registration');
		// 	$i++;
		// }

		// echo '<pre>';print_r($customer_data['dp_info']);echo '</pre>';exit();
		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/accounts',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function decision($key,$customer_id){
		$customer_status								=	array();
		$customer_status['accounts_clearence_time']		=	date('Y-m-d H:i:s');
		switch ($key) {
			case 'approve' :
			$customer_status['status']	=	6;
			// $this->log_model->add_log();
			break;
			case 'deny'	:
			$customer_status['status']	=	15;
			default :
			break;
		}
		$this->customer_model->update_customer_status($customer_status, $customer_id);
		redirect('approval_accounts', 'refresh');
	}

}
