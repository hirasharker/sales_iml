<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seize_Report extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=11 && $this->session->userdata('role')!=7 && $this->session->userdata('role')!=15 && $this->session->userdata('role') != 8 && $this->session->userdata('role')!=4 && $this->session->userdata('role')!=5){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('seize_model','seize_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->library('datelib');
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

	public function general_seize_report(){
		if($this->session->userdata('role')!=11 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$report_data										=	array();
		$seize_data											=	array();
		

		$seize_data['customer_list']						=	$this->customer_model->get_all_customers();
		$seize_data['seize_list']							=	$this->seize_model->get_all_seizes();

		$seize_data['seize_depot_list']						=	$this->seize_model->get_all_seize_depots();
		
		$seize_data['employee_list']						=	$this->employee_model->get_all_employees();

		$seize_data['zone_list']							=	$this->zone_model->get_all_zones();

		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/seize_report',$seize_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_seize_report(){
		$report_data										=	array();
		$seize_data											=	array();

		$zone_id											=	$this->input->post('zone_id');
		$rm_id 												=	$this->input->post('rm_id');
		$zm_id												=	$this->input->post('zm_id');
		$depot_id											=	$this->input->post('depot_id');
		$status												=	$this->input->post('status');
		// $date 												=	explode('-',$this->input->post('date'));
		$start_date											=	$this->input->post('start_date');
		$end_date											=	$this->input->post('end_date');


		
		$seize_data['seize_list']					=	$this->seize_model->get_all_seize_data_by_search_criteria($zone_id, $rm_id, $zm_id, $depot_id, $status, $start_date, $end_date);

		// echo json_encode($zone_id); exit();
		$seize_data['end_date']								=	$end_date;

		$seize_data['employee_list']						=	$this->employee_model->get_all_employees();
		$seize_data['zone_list']							=	$this->zone_model->get_all_zones();

        $report_data['content']								=	$this->load->view('pages/report/seize_report_table',$seize_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode($start_date);
			// a die here helps ensure a clean ajax call
			die();
	}

	public function test(){
		$report_data										=	array();
		$seize_data											=	array();

		$zone_id											=	$this->input->post('zone_id');
		$rm_id 												=	$this->input->post('rm_id');
		$zm_id												=	$this->input->post('zm_id');
		$depot_id											=	$this->input->post('depot_id');
		$status												=	$this->input->post('status');
		// $date 												=	explode('-',$this->input->post('date'));
		$start_date											=	$this->input->post('start_date');
		$end_date											=	$this->input->post('end_date');


		
		$seize_data['seize_list']					=	$this->seize_model->get_all_seize_data_by_search_criteria($zone_id, $rm_id, $zm_id, $depot_id, $status, $start_date, $end_date);
		echo '<pre>';
		print_r($seize_data['seize_list']);
		echo '</pre>';
		exit();
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

		if($this->session->userdata('role')==4){
			$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_by_search_criteria($zone_id,$city_id,$district_id,$sub_district_id,$mkt_id,$model_id, $yard_id , $payment_mode,$start_date,$end_date,$status, $this->session->userdata('employee_id') );
		} else {
			$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_by_search_criteria($zone_id,$city_id,$district_id,$sub_district_id,$mkt_id,$model_id, $yard_id , $payment_mode,$start_date,$end_date,$status);
		}
		
		
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


	// stock_summary report starts here

	public function stock_summary(){
		$report_data										=	array();
		$stock_data											=	array();
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/stock_summary',$stock_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}


	public function generate_model_wise_stock_summary(){
		$report_data										=	array();
		$stock_data											=	array();

		$date 												=	explode('-',$this->input->post('date'));
		// $start_date											=	$date[0];
		// $end_date											=	$date[1];
		// echo json_encode($sub_district_id);die();
		
		$stock_data['stock_summary']						=	$this->stock_model->get_stock_summary();

		echo '<pre>'; print_r($stock_data['stock_summary']); echo '</pre>';
		exit();

		$stock_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$stock_data['bank_list']							=	$this->bank_model->get_all_banks();
		
        $report_data['content']								=	$this->load->view('pages/report/stock_report_table',$stock_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}







	public function registration_report(){
		$report_data										=	array();
		$registration_data 					=	array();
		
		$registration_data['registration_list']	=	$this->reg_model->get_all_registrations();
		$registration_data['model_list']	=	$this->model_model->get_all_models();
		$registration_data['yard_list']		=	$this->yard_model->get_all_delivery_yards();
		$registration_data['employee_list']	=	$this->employee_model->get_all_employees();
		$registration_data['reg_area_list']	=	$this->reg_model->get_all_registration_areas();
		$registration_data['bank_list']		=	$this->bank_model->get_all_banks();
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/registration_report',$registration_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_registration_report(){
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

		if($this->session->userdata('role')==4){
			$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_by_search_criteria($zone_id,$city_id,$district_id,$sub_district_id,$mkt_id,$model_id, $yard_id , $payment_mode,$start_date,$end_date,$status, $this->session->userdata('employee_id') );
		} else {
			$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_by_search_criteria($zone_id,$city_id,$district_id,$sub_district_id,$mkt_id,$model_id, $yard_id , $payment_mode,$start_date,$end_date,$status);
		}
		
		
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


}
