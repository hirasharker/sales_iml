<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_Center extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=10 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('feedback_type_model','ft_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('application_model','application_model',TRUE);
		$this->load->model('checklist_model','checklist_model',TRUE);
		$this->load->model('delivery_yard_model', 'yard_model', TRUE);
		$this->load->model('bank_model', 'bank_model', TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('district_model','district_model',TRUE);
		
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
		$session_data										=	array();
		$session_data['token']								=	1;
		$this->session->set_userdata($session_data);

		$data               =   array();
		$customer_data		=	array();
		if($this->session->userdata('role')!=3){
			$customer_data['city_list']			=	$this->city_model->get_all_cities();
		}else{
			$customer_data['city_list']			=	$this->city_model->get_all_cities_by_coordinator_id($this->session->userdata('employee_id'));
		}
		$cc_data										=	array();
		
		$cc_data['customer_list']						=	$this->customer_model->get_all_customers();
		$cc_data['employee_list']						=	$this->employee_model->get_all_employees();
		$cc_data['zone_list']							=	$this->zone_model->get_all_zones();
		$cc_data['city_list']							=	$this->city_model->get_all_cities();
		$cc_data['model_list']							=	$this->model_model->get_all_models();
		
		$data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $data['content']								=	$this->load->view('pages/call_center/customer_list',$cc_data,TRUE);
        $data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$data);
	}

	public function view_customer_list(){
		$data 												=	array();
		$report_data										=	array();
		$sales_data											=	array();

		$yard_id											=	$this->input->post('yard_id');
		if($yard_id == NULL){
			$yard_id										=	0;
		}

		$payment_mode										=	$this->input->post('payment_mode');

		if($payment_mode == NULL){
			$payment_mode									=	0;
		}
		$date 												=	explode('-',$this->input->post('date'));

		if($date[0] == NULL){
			redirect('call_center','refresh');
		}
		$start_date											=	$date[0];
		$end_date											=	$date[1];
		// echo json_encode($sub_district_id);die();
		
		$sales_data['customer_list']						=	$this->customer_model->get_all_customers_sales_data_for_call_center_by_search_criteria($yard_id , $payment_mode,$start_date,$end_date);
		// echo '<pre>';print_r($sales_data['customer_list']);echo '</pre>';exit();
		$sales_data['model_list']							=	$this->model_model->get_all_models();
		$sales_data['feedback_type_list']					=	$this->ft_model->get_all_feedback_types();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		
		$data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $data['content']								=	$this->load->view('pages/call_center/customer_list_table',$sales_data,TRUE);
        $data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$data);
	}

	public function ajax_update_customer_feedback(){
		$customer_data 										=	array();

		$customer_id										=	$this->input->post('customer_id');
		$customer_data['feedback_type_id']					=	$this->input->post('feedback_type_id','',TRUE);
		$customer_data['customer_feedback']					=	$this->input->post('customer_feedback','',TRUE);

		$customer_data['callback_time_stamp']	 			=	date('Y-m-d G:i:s');
		$customer_data['caller_id']	 						=	$this->session->userdata('employee_id');
		// echo json_encode($sub_district_id);die();
		$result 											=	0;

		if($customer_data['feedback_type_id'] !='' &&  $customer_data['customer_feedback'] != ''){
			$result												=	$this->customer_model->update_customer($customer_data, $customer_id);
		}
		
		echo json_encode($result);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}

	public function generate_delivered_customer_list(){
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
		$sales_data['feedback_type_list']					=	$this->ft_model->get_all_feedback_types();
		$sales_data['application_list']						=	$this->application_model->get_all_applications();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();		
		
        $report_data['content']								=	$this->load->view('pages/call_center/sales_report_table',$sales_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}

	public function ajax_add_feedback_detail(){
		$feedback_data										=	array();

		$feedback_data['user_id']							=	$this->session->userdata('employee_id');

		$feedback_data['feedback_type_detail']				=	$this->input->post('feedback_type_detail');

		$feedback_data['feedback_category']					=	$this->input->post('feedback_category');

		$result												=	$this->ft_model->add_feedback_type($feedback_data);

		$feedback_list 										=	$this->ft_model->get_all_feedback_types();
		
		echo json_encode($feedback_list);
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
}
