<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_Gateway extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=7 && $this->session->userdata('role')!=1 && $this->session->userdata('role')!=3 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->library('utfconverter');
		$this->load->library('datelib');
		$this->load->library('banglaconverter');
		$this->load->model('customer_model','customer_model',TRUE);
		
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
		
	}

	public function send_sms_to_customer_bengali($customer_id)
	{
		$sms_body 							=	'';
		
		$customer_data 						=	array();

		$customer_detail 					=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['customer_detail'] 	=	$customer_detail;

		if($customer_detail->payment_mode == 1){

			$sms_body_for_customer 							=	$this->get_sms_body_for_credit_sale ($customer_detail);

		}elseif ($customer_detail->payment_mode == 3) {
			// $sms_body 							=	$this->get_sms_for_cash_sale ($customer_detail);
		}

		$customer_id 						=	$this->utfconverter->convert_to_utf16($customer_id);

		$customer_data['user_name']			=	'IfadMotors';

		$customer_data['password']			=	'VcDPM53r4VQcWfb';

		$customer_data['sid']				=	'IfadMotorsNonBng';

		$customer_data['sms_body_for_customer']		=	$sms_body_for_customer;

		$this->load->view('pages/sms_gateway/sms_gateway_ssl',$customer_data);
	}

	


	public function get_sms_body_for_credit_sale ($customer_detail) {
		$customer_id 						=	$this->banglaconverter->english_to_bengali($customer_detail->customer_id);

		$customer_id 						=	$this->utfconverter->convert_to_utf16($customer_id);

		$installment_date 					=	$this->datelib->add_days_to_date(date("Y-m-d"), $customer_detail->installment_start_date);

		$installment_day 					=	$this->datelib->get_day_from_date($installment_date);

		$downpayment 						=	$this->banglaconverter->english_to_bengali($customer_detail->downpayment);

		$downpayment 						=	$this->utfconverter->convert_to_utf16($downpayment);

		$principle_amount					=	($customer_detail->total_price + $customer_detail->registration_cost) - $customer_detail->downpayment;


		$installment 						=	$this->get_installment_amount ($principle_amount, $customer_detail->period, $customer_detail->interest_rate );

		$installment 						=	$this->banglaconverter->english_to_bengali($installment);

		$installment 						=	$this->utfconverter->convert_to_utf16($installment);

		$installment_day 					=	$this->banglaconverter->english_to_bengali($installment_day);

		$installment_day 					=	$this->utfconverter->convert_to_utf16($installment_day);



		$sms_body							=	'09B809AE09CD09AE09BE09A809BF09A40020099709CD09B009BE09B90995002C0020000A098609AA09A809BE09B000200986098709A109BF0020003A0020'.$customer_id.'000A09A109BE098909A8002009AA09C709AE09C709A809CD099F0020003A0020'.$downpayment.'002F002D000A099509BF09B809CD09A409BF0020003A0020'.$installment.'002F002D000A099509BF09B809CD09A409BF09B0002009A409BE09B009BF09960020003A002009AA09CD09B009A409BF002009AE09BE09B809C709B00020'.$installment_day.'002009A409BE09B009BF09960964000A098709AB09BE09A6002009AE099F09B009B8002009B209BF0983';
		
		return $sms_body;
	}

	public function get_sms_for_cash_sale () {
		
	}

	public function get_sms_for_semicash_sale () {
		
	}

	public function get_installment_amount ( $principle, $period, $interest_rate ) {

		$interest_amount 				=	($principle * ($period / 12) * ($interest_rate / 100) );

		$installment 					=	($principle + $interest_amount) / $period ; 

		return round($installment,0);

	}


	public function send_sms_to_zonal_head_english()
	{
		
		$sms_body 							=	'';
		
		$customer_data 						=	array();

		$customer_detail 					=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['customer_detail'] 	=	$customer_detail;

		if($customer_detail->payment_mode == 1){

			$sms_body_for_zhead 							=	$this->get_sms_body_for_credit_sale_zonal_head ($customer_detail);

		}elseif ($customer_detail->payment_mode == 3) {
			// $sms_body 							=	$this->get_sms_for_cash_sale ($customer_detail);
		}

		$customer_data['user_name']			=	'IfadMotors';

		$customer_data['password']			=	'VcDPM53r4VQcWfb';

		$customer_data['sid']				=	'IfadMotorsNonEng';

		$customer_data['sms_body_for_zhead']		=	$sms_body_for_zhead;

		// print_r($customer_data['sms_body_for_zhead']);exit();

		$this->load->view('pages/sms_gateway/sms_gateway_english',$customer_data);
	}
	

	public function get_sms_body_for_credit_sale_zonal_head ($customer_detail) {

		$sms_body 							=	'For Apporval\nCustomer ID: 20025\nModel Code : 600\nPrice : 420000 (R)\nDownpayment : 100000\nPeriod: 24\nInterest Rate : 15\n202.191.122.105:3003/sales_iml';
		return $sms_body;

	}


}
