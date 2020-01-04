<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
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
		
		$registration_data['registration_list']	=	$this->reg_model->get_all_registrations();
		$registration_data['model_list']	=	$this->model_model->get_all_models();
		$registration_data['yard_list']		=	$this->yard_model->get_all_delivery_yards();
		$registration_data['employee_list']	=	$this->employee_model->get_all_employees();
		$registration_data['reg_area_list']	=	$this->reg_model->get_all_registration_areas();
		$registration_data['bank_list']		=	$this->bank_model->get_all_banks();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/registration/registration',$registration_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_registration()
	{
		$registration_data 										=	array();

		$registration_data['user_id']							=	$this->session->userdata('employee_id');

		$registration_location									=	$this->input->post('registration_location', '', TRUE);

		$location_array											=	preg_split('/-/', $registration_location);

		$registration_data['registration_area_id']				=	$location_array[0];

		$registration_data['registration_zone_id']				=	$location_array[1];


		$registration_data['delivery_yard_id']					=	$this->input->post('delivery_yard_id', '', TRUE);

		$registration_data['registration_issue_date']			=	$this->input->post('registration_issue_date', '', TRUE);

		$result 												=	$this->reg_model->add_registration_data($registration_data);

		$count 													=	0;

		$registration_detail_data 								=	array();

		$stock_detail_data										=	array();

		$registration_detail_data['registration_id']			=	$result;

		$model_id						=	$this->input->post('model_id','',TRUE);
		$model_name						=	$this->input->post('model_name','',TRUE);
		$chassis_no						=	$this->input->post('chassis_no','',TRUE);
		$engine_no						=	$this->input->post('engine_no','',TRUE);
		$stock_id						=	$this->input->post('stock_id','',TRUE);

		// print_r($chassis_no); echo count($chassis_no);exit();

		$duplicate_registration 								=	$this->check_duplicate_registration($chassis_no);

		if($duplicate_registration) {
			$session_data['error']								=	'insertion failed! following duplicate chassis found --- '. implode(', ', $duplicate_registration);
			$this->session->set_userdata($session_data);
			$this->delete_registration($registration_detail_data['registration_id']);
			redirect('registration','refresh');
			// echo '<pre>';print_r($duplicate_chassis); echo '</pre>';exit();
		} else {

			for ($i=0; $i < count($model_id) ; $i++) {
				$registration_detail_data['model_id'] 					=	$model_id[$i];
				$registration_detail_data['model_name'] 				=	$model_name[$i];
				$registration_detail_data['chassis_no'] 				=	$chassis_no[$i];
				$registration_detail_data['engine_no'] 					=	$engine_no[$i];
				$registration_detail_data['stock_id'] 					=	$stock_id[$i];

				$detail_result									=	$this->reg_model->add_registration_detail($registration_detail_data);

				$stock_detail_data['registration_id']			=	$result;

				$stock_detail_data['registration_zone_id']		=	$registration_data['registration_zone_id'];

				$stock_detail_data['stock_position']			=	2;

				$stock_update_result							=	$this->stock_model->update_stock($stock_detail_data, $registration_detail_data['stock_id']);
			}

		}

		$session_data										=	array();

		redirect('registration','refresh');
	}

	public function check_duplicate_registration($chassis_list){
		$duplicate_registration 							=	array();

		for ($i=0; $i < count($chassis_list); $i++) {
			$registration_found 							=	$this->stock_model->check_stock_for_duplicate_registration($chassis_list[$i]);
			if($registration_found){
				$duplicate_registration[] 					=	$registration_found->chassis_no;
			}
		}
		return $duplicate_registration;
	}


	public function ajax_generate_items(){
		$yard_id 					=	$this->input->post('yard_id');

		$result						=	$this->stock_model->get_stock_by_yard_id_for_registration($yard_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}


	public function delete_registration($registration_id){
		$result 				=	$this->reg_model->delete_registration($registration_id);
	}
}
