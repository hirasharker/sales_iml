<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=7 && $this->session->userdata('role')!=15 && $this->session->userdata('role') != 8 && $this->session->userdata('role')!=4 && $this->session->userdata('role')!=5){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('application_model','application_model',TRUE);
		$this->load->model('checklist_model','checklist_model',TRUE);
		$this->load->model('delivery_yard_model', 'yard_model', TRUE);
		$this->load->model('bank_model', 'bank_model', TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('district_model','district_model',TRUE);
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
		redirect('report/booking_report','refresh');
	}

	public function booking_report(){
		$report_data										=	array();
		$booking_data										=	array();
		
		$booking_data['customer_list']						=	$this->customer_model->get_all_customers();
		$booking_data['employee_list']						=	$this->employee_model->get_all_employees();
		$booking_data['zone_list']							=	$this->zone_model->get_all_zones();
		$booking_data['city_list']							=	$this->city_model->get_all_cities();
		$booking_data['model_list']							=	$this->model_model->get_all_models();
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/booking_report',$booking_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_booking_report(){
		$report_data										=	array();
		$booking_data										=	array();

		$zone_id											=	$this->input->post('zone_id');
		$city_id 											=	$this->input->post('city_id');
		$mkt_id												=	$this->input->post('mkt_id');
		$model_id											=	$this->input->post('model_id');
		$payment_mode										=	$this->input->post('payment_mode');
		$status												=	$this->input->post('status');
		$date 												=	explode('-',$this->input->post('date'));
		$start_date											=	$date[0];
		$end_date											=	$date[1];



		
		$booking_data['customer_list']						=	$this->customer_model->get_all_customers_booking_data_by_search_criteria($zone_id,$city_id,$mkt_id,$model_id,$payment_mode, $start_date,$end_date, $status);
		$booking_data['employee_list']						=	$this->employee_model->get_all_employees();
		$booking_data['zone_list']							=	$this->zone_model->get_all_zones();
		$booking_data['city_list']							=	$this->city_model->get_all_cities();
		$booking_data['model_list']							=	$this->model_model->get_all_models();
		$booking_data['dealer_list']						=	$this->dealer_model->get_all_dealers();
		
        $report_data['content']								=	$this->load->view('pages/report/booking_report_table',$booking_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode($start_date);
			// a die here helps ensure a clean ajax call
			die();
	}

	public function sales_report(){
		$report_data										=	array();
		$sales_data										=	array();
		
		$sales_data['customer_list']						=	$this->customer_model->get_all_customers();
		$sales_data['employee_list']						=	$this->employee_model->get_all_employees();
		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();
		$sales_data['city_list']							=	$this->city_model->get_all_cities();
		$sales_data['district_list']						=	$this->district_model->get_all_districts();
		$sales_data['model_list']							=	$this->model_model->get_all_models();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/sales_report',$sales_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_sales_report(){
		$report_data										=	array();
		$sales_data											=	array();

		$zone_id											=	$this->input->post('zone_id');
		$city_id 											=	$this->input->post('city_id');
		$district_id 										=	$this->input->post('district_id');
		$sub_district_id 									=	$this->input->post('sub_district_id');
		$mkt_id												=	$this->input->post('mkt_id');
		$model_id											=	$this->input->post('model_id');
		$yard_id											=	$this->input->post('yard_id');
		$payment_mode										=	$this->input->post('payment_mode');
		$date 												=	explode('-',$this->input->post('date'));
		$start_date											=	$date[0];
		$end_date											=	$date[1];
		$status 											=	$this->input->post('status');
		// echo json_encode($sub_district_id);die();
		
		$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_by_search_criteria($zone_id,$city_id,$district_id,$sub_district_id,$mkt_id,$model_id, $yard_id , $payment_mode,$start_date,$end_date,$status);
		$sales_data['employee_list']						=	$this->employee_model->get_all_employees();
		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();
		$sales_data['city_list']							=	$this->city_model->get_all_cities();
		$sales_data['model_list']							=	$this->model_model->get_all_models();
		$sales_data['application_list']						=	$this->application_model->get_all_applications();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();		
		
        $report_data['content']								=	$this->load->view('pages/report/sales_report_table',$sales_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}

	public function individual_customer(){
		$report_data										=	array();
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/individual_report','',TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_individual_customer(){
		$report_data										=	array();
		$sales_data											=	array();

		$customer_id										=	$this->input->post('customer_id');
		
		$sales_data['customer_detail']						=	$this->customer_model->get_customer_by_id($customer_id);

		if($sales_data['customer_detail'] == NULL){
			echo json_encode('Not Found!');
			die();
		}
		$sales_data['employee_list']						=	$this->employee_model->get_all_employees();
		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();
		$sales_data['city_list']							=	$this->city_model->get_all_cities();
		$sales_data['model_list']							=	$this->model_model->get_all_models();
		$sales_data['application_list']						=	$this->application_model->get_all_applications();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();		
		
        $report_data['content']								=	$this->load->view('pages/report/individual_customer_table',$sales_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}


	public function get_city_list_ajax(){
		$zone_id 							=	$this->input->post('zoneId');

		$city_list							=	$this->city_model->get_city_by_zone_id($zone_id);
			
			// Add below to output the json for your javascript to pick up.
			echo json_encode($city_list);
			// a die here helps ensure a clean ajax call
			die();
	}








	public function stock_report(){
		$report_data										=	array();
		$sales_data										=	array();
		
		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();
		$sales_data['model_list']							=	$this->model_model->get_all_models();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();	
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/stock_report',$sales_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_stock_report(){
		$report_data										=	array();
		$stock_data											=	array();

		$zone_id											=	$this->input->post('zone_id');
		$model_id											=	$this->input->post('model_id');
		$yard_id											=	$this->input->post('yard_id');
		$bank_id											=	$this->input->post('bank_id');
		$dealer_id											=	$this->input->post('dealer_id');
		$status 											=	$this->input->post('status');
		// echo json_encode($sub_district_id);die();
		
		$stock_data['stock_list']						=	$this->stock_model->get_all_stock_data_by_search_criteria($zone_id, $model_id, $yard_id , $bank_id, $dealer_id, $status);

		$stock_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$stock_data['bank_list']							=	$this->bank_model->get_all_banks();
		
        $report_data['content']								=	$this->load->view('pages/report/stock_report_table',$stock_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}


}
