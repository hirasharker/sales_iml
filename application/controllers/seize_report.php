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

	
	public function service_inspection_report(){
		if($this->session->userdata('role')!=11 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$report_data										=	array();
		$service_data											=	array();
		

		$service_data['customer_list']						=	$this->customer_model->get_all_customers();
		$service_data['seize_list']							=	$this->seize_model->get_all_seizes();

		$service_data['seize_depot_list']						=	$this->seize_model->get_all_seize_depots();
		
		$service_data['employee_list']						=	$this->employee_model->get_all_employees();

		$service_data['zone_list']							=	$this->zone_model->get_all_zones();

		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/report/service_report',$service_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$report_data);
	}

	public function generate_service_report(){
		$report_data										=	array();
		$seize_data											=	array();

		$zone_id											=	$this->input->post('zone_id');
		$rm_id 												=	$this->input->post('rm_id');
		$zm_id												=	$this->input->post('zm_id');
		$depot_id											=	$this->input->post('depot_id');
		// $date 												=	explode('-',$this->input->post('date'));
		$start_date											=	$this->input->post('start_date');
		$end_date											=	$this->input->post('end_date');


		
		$seize_data['seize_list']					=	$this->seize_model->get_all_service_data_by_search_criteria($zone_id, $rm_id, $zm_id, $depot_id, $status=0, $start_date, $end_date);

		// echo json_encode($zone_id); exit();
		$seize_data['end_date']								=	$end_date;

		$seize_data['employee_list']						=	$this->employee_model->get_all_employees();
		$seize_data['zone_list']							=	$this->zone_model->get_all_zones();

        $report_data['content']								=	$this->load->view('pages/report/service_report_table',$seize_data,TRUE);
		
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

	


}
