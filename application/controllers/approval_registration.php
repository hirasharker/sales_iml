<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Registration extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('received_model','received_model',TRUE);
		$this->load->model('registration_model','reg_model',TRUE);
		$this->load->model('issued_model','issued_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('delivery_yard_model','yard_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		$this->load->model('bank_model','bank_model',TRUE);
		
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
		$data               				=   array();
		$registration_data 					=	array();
		
		$registration_data['pending_registration_list']		=	$this->reg_model->get_all_registrations_by_status($status =NULL);
		$registration_data['model_list']					=	$this->model_model->get_all_models();
		$registration_data['yard_list']						=	$this->yard_model->get_all_delivery_yards();
		$registration_data['employee_list']					=	$this->employee_model->get_all_employees();
		$registration_data['reg_area_list']					=	$this->reg_model->get_all_registration_areas();
		$registration_data['bank_list']						=	$this->bank_model->get_all_banks();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/registration',$registration_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function decision(){

		$key 											=	$this->input->post('decision_key','',TRUE);
		$registration_id 								=	$this->input->post('registration_id','',TRUE);

		$registration_data 								=	array();
		$registration_data['registration_cost']			=	$this->input->post('registration_cost','',TRUE);

		$stock_data										=	array();
		$stock_data['registration_approval_time']		=	date('Y-m-d H:i:s');

		
		switch ($key) {
			case 'approve' :
			$registration_data['status']	=	1;
			$stock_data['stock_position']	=	3;
			// $this->log_model->add_log();
			break;
			case 'deny'	:
			$registration_data['status']	=	2;
			default :
			break;
		}
		$registration_detail 				=	$this->reg_model->get_registration_detail_by_registration_id($registration_id);
		// echo '<pre>'; print_r($registration_detail); echo '</pre>';exit();
		$this->reg_model->update_registration($registration_data, $registration_id);

		foreach ($registration_detail as $value) {
			$this->stock_model->update_stock_by_chassis_no($stock_data, $value->chassis_no);
		}
		
		redirect('approval_registration', 'refresh');
	}
	
}
