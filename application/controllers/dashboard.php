<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}

		if($this->session->userdata('role')==2){
			redirect('inspection','refresh');
		}

		if($this->session->userdata('role')==3 || $this->session->userdata('role')==1){
			redirect('customer','refresh');
		}

		if($this->session->userdata('role')==4){
			redirect('approval_zonalhead','refresh');
		}
		
		if($this->session->userdata('role')==5){
			redirect('approval_head_of_sales','refresh');
		}
		if($this->session->userdata('role')==6){
			redirect('inspection/customer_history','refresh');
		}
		
		if($this->session->userdata('role')==7){
			redirect('checklist','refresh');
		}
		if($this->session->userdata('role')==8){
			redirect('approval_accounts','refresh');
		}
		
		if($this->session->userdata('role')==9){
			redirect('inventory/issue','refresh');
		}
		
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		// $this->load->model('module_model','module_model',TRUE);
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
		// $result				=	$this->customer_model->get_all_customers_from_ms_db();
		// $result1			=	$this->customer_model->get_all_customers();

		// print_r($result1);
		
		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';

		$data               =   array();
		
		$dashboard_content	=	array();

		$dashboard_content['model_list']						=	$this->model_model->get_all_models();
		$dashboard_content['zone_list']							=	$this->zone_model->get_all_zones();

		$dashboard_content['total_customers']					=	$this->customer_model->count_all_customers_from_ms_db()->count;

		$dashboard_content['booking_within_last_seven_days']	=	$this->customer_model->count_customers_booking_by_days(7)->count;

		$dashboard_content['booking_within_current_month']		=	$this->customer_model->count_customers_booking_by_months(0)->count;

		$dashboard_content['sales_within_last_seven_days']		=	$this->customer_model->count_sales_by_days(7)->count;
		
		$dashboard_content['sales_within_current_month']		=	$this->customer_model->count_sales_by_months(0)->count;

		$dashboard_content['sold_models_within_current_month']	=	$this->customer_model->sold_models_by_month(0);
		
		$dashboard_content['total_sold_quantity_by_month']		=	$this->customer_model->total_sold_quantity_by_current_month(0)->qty;

		$dashboard_content['sold_within_current_month_by_zone']	=	$this->customer_model->sold_within_current_month_by_zone(0);

		$dashboard_content['sales_quantity_of_january']			=	$this->customer_model->total_sold_quantity_by_month(1)->qty;
		$dashboard_content['sales_quantity_of_february']		=	$this->customer_model->total_sold_quantity_by_month(2)->qty;
		$dashboard_content['sales_quantity_of_march']			=	$this->customer_model->total_sold_quantity_by_month(3)->qty;
		$dashboard_content['sales_quantity_of_april']			=	$this->customer_model->total_sold_quantity_by_month(4)->qty;
		$dashboard_content['sales_quantity_of_may']				=	$this->customer_model->total_sold_quantity_by_month(5)->qty;
		$dashboard_content['sales_quantity_of_june']			=	$this->customer_model->total_sold_quantity_by_month(6)->qty;
		$dashboard_content['sales_quantity_of_july']			=	$this->customer_model->total_sold_quantity_by_month(7)->qty;
		$dashboard_content['sales_quantity_of_august']			=	$this->customer_model->total_sold_quantity_by_month(8)->qty;
		$dashboard_content['sales_quantity_of_september']		=	$this->customer_model->total_sold_quantity_by_month(9)->qty;
		$dashboard_content['sales_quantity_of_october']			=	$this->customer_model->total_sold_quantity_by_month(10)->qty;
		$dashboard_content['sales_quantity_of_november']		=	$this->customer_model->total_sold_quantity_by_month(11)->qty;
		$dashboard_content['sales_quantity_of_december']		=	$this->customer_model->total_sold_quantity_by_month(12)->qty;
		// echo '<pre>';print_r($dashboard_content);echo '</pre>'; exit();

		// echo $dashboard_content['sales_quantity_of_january'];exit();
		// echo '<pre>';print_r($dashboard_content['sold_models_within_current_month']);echo '</pre>';exit();


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/dashboard/dashboard',$dashboard_content,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
}
