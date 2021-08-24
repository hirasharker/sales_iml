<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Release extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=6 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('resale_model', 'resale_model', TRUE);
		$this->load->model('release_model', 'release_model', TRUE);
		$this->load->library('pagination');

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
		

		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$status 									=	array(0,2);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);
			
			
			$status 									=	array(12,14);
			$release_data['denied_customer_list']		=	$this->customer_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);


		} else {
			$status 									=	array(0,0);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status($status);
			
			$status 									=	array(12,14);
			$release_data['denied_release_list']		=	$this->release_model->get_all_releases_by_status($status);
		}
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/approval_release/rm_release',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	//RM Approval Section starts here-------------------------

	//RM = Unit Head

	public function unit_head()
	{
		

		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$status 									=	array(0,0);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);
			
			
			$status 									=	array(12,14);
			$release_data['denied_customer_list']		=	$this->customer_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);


		} else {
			$status 									=	array(0,0);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status($status);
			
			$status 									=	array(12,14);
			$release_data['denied_release_list']		=	$this->release_model->get_all_releases_by_status($status);
		}
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/approval_release/rm_release',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	

	public function approve_unit_head(){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$customer_status		=	array();

		$release_id							=	$this->input->post('release_id','0',TRUE);

		// print($release_id);exit();


		$current_status						=	$this->release_model->get_release_by_id($release_id);

		$updated_status						=	$current_status->release_status +1;

		$release_data['release_status']									=	$updated_status;
		$release_data['proposed_collection_amount_by_uh']				=	$this->input->post('proposed_collection_amount_by_uh','',TRUE);
		$release_data['rm_note']										=	$this->input->post('rm_note','',TRUE);

		$release_data['rm_approval_time']	=	date('Y-m-d H:i:s');

		$this->release_model->update_release($release_data, $release_id);
		redirect('approval_release/unit_head', 'refresh');
	}
	

	public function ajax_generate_release_detail_rm_to_approve(){
		$report_data										=	array();
		$release_data										=	array();

		$release_id										=	$this->input->post('release_id');
		
		$release_data['release_detail']					=	$this->release_model->get_release_by_id($release_id);

        $report_data['content']								=	$this->load->view('pages/approvals/approval_release/approve_release_detail_rm',$release_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}


	public function ajax_generate_release_detail_to_deny(){
		$report_data										=	array();
		$release_data										=	array();

		$customer_id										=	$this->input->post('customer_id');
		
		$release_data['customer_detail']					=	$this->customer_model->get_customer_by_id($customer_id);
		
        $report_data['content']								=	$this->load->view('pages/inspection/deny_customer_detail',$release_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}

	// RM = UNIT Head approval section ends here



//ZM Approval Section starts here-------------------------

	//ZM = Divisional Head

	public function divisional_head()
	{
		

		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$status 									=	array(1,1);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($this->session->userdata('employee_id'), $status);
			
			
			$status 									=	array(12,14);
			$release_data['denied_customer_list']		=	$this->customer_model->get_all_releases_by_status_for_dh($this->session->userdata('employee_id'), $status);


		} else {
			$status 									=	array(1,1);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($status);
			
			$status 									=	array(12,14);
			$release_data['denied_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($status);
		}
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/approval_release/dh_release',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	
	public function approve_divisional_head(){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$customer_status		=	array();

		$release_id							=	$this->input->post('release_id','0',TRUE);

		// print($release_id);exit();


		$current_status						=	$this->release_model->get_release_by_id($release_id);

		$updated_status						=	$current_status->release_status +1;

		$release_data['release_status']				=	$updated_status;

		$release_data['dh_approval_time']	=	date('Y-m-d H:i:s');
		$release_data['proposed_collection_amount_by_dh']				=	$this->input->post('proposed_collection_amount_by_dh','',TRUE);
		$release_data['dh_note']										=	$this->input->post('dh_note','',TRUE);

		$this->release_model->update_release($release_data, $release_id);
		redirect('approval_release/divisional_head/', 'refresh');
	}

	public function print_service_inspection_form () {
		$release_data							=	array();
		
		$release_id								=	$this->input->post('release_id','',TRUE);

		

		$release_data['service_detail']			=	$this->release_model->get_service_inspection_by_release_id($release_id);

		// print_r($release_data['service_detail']);exit();


		$release_data['service_person']			=	$this->employee_model->get_employee_by_id($release_data['service_detail']->service_person_id);


		$this->load->view('pages/approvals/approval_release/service_inspection_form',$release_data);
	}


	

	public function ajax_generate_release_detail_dh_to_approve(){
		$report_data										=	array();
		$release_data										=	array();

		$release_id										=	$this->input->post('release_id');
		
		$release_data['release_detail']					=	$this->release_model->get_release_by_id($release_id);

        $report_data['content']								=	$this->load->view('pages/approvals/approval_release/approve_release_detail_dh',$release_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}
	
	

	// ZHEAD = Divisional Head approval section ends here

	//Service Approval Section starts here-------------------------

	public function service()
	{
		

		if($this->session->userdata('role')!=10 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$status 									=	array(0,1);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);
			
			
			$status 									=	array(12,14);
			$release_data['denied_customer_list']		=	$this->customer_model->get_all_releases_by_rm_id_and_status($this->session->userdata('employee_id'), $status);


		} else {
			$status 									=	array(0,1);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status($status);
			
			$status 									=	array(12,14);
			$release_data['denied_release_list']		=	$this->release_model->get_all_releases_by_status($status);
		}
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/approval_release/service',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function service_detail($release_id){
		if($this->session->userdata('role')!=10 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}

		$data 												=	array();
		$release_data										=	array();

		$release_data['release_detail']					=	$this->release_model->get_release_by_id($release_id);

		$release_data['release_customers']				=	$this->release_model->get_release_customer_by_release_id($release_id);
		
        
		
		$data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']								=	$this->load->view('pages/approvals/approval_release/approve_release_detail_service',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$data);
	}
	

	public function add_service_inspection(){
		if($this->session->userdata('role')!=10 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}

		if($this->session->userdata('role')!=10){
			$inspection_data['service_person_id']		=	$this->session->userdata('employee_id');
		}

		$release_data			=	array();
		$inspection_data 		=	array();

		$inspection_data['release_id']		=	$this->input->post('release_id','0',TRUE);
		$inspection_data['seize_id']		=	$this->input->post('seize_id','0',TRUE);
		$inspection_data['engine_no']		=	$this->input->post('engine_no','0',TRUE);
		$inspection_data['chassis_no']		=	$this->input->post('chassis_no','0',TRUE);
		$inspection_data['tyre_quantity']		=	$this->input->post('tyre_quantity','0',TRUE);
		$inspection_data['tyre_condition']		=	$this->input->post('tyre_condition','0',TRUE);
		$inspection_data['engine_condition']		=	$this->input->post('engine_condition','0',TRUE);
		$inspection_data['battery_condition']		=	$this->input->post('battery_condition','0',TRUE);
		$inspection_data['wind_shield_glass']		=	$this->input->post('wind_shield_glass','0',TRUE);
		$inspection_data['self_starter']		=	$this->input->post('self_starter','0',TRUE);
		$inspection_data['ignition_switch']		=	$this->input->post('ignition_switch','0',TRUE);
		$inspection_data['key_status']		=	$this->input->post('key_status','0',TRUE);
		$inspection_data['body_condition']		=	$this->input->post('body_condition','0',TRUE);
		$inspection_data['denting_painting']		=	$this->input->post('denting_painting','0',TRUE);
		$inspection_data['overall_vehicle_condition']		=	$this->input->post('overall_vehicle_condition','0',TRUE);
		$inspection_data['user_id']		=	$this->session->userdata('employee_id');


		// print($release_id);exit();



		$current_status						=	$this->release_model->get_release_by_id($inspection_data['release_id']);

		$updated_status						=	$current_status->status +2;

		$release_data['status']				=	$updated_status;

		$release_data['zonal_head_approval_time']	=	date('Y-m-d H:i:s');

		$this->release_model->add_service_inspection($inspection_data);

		$this->release_model->update_release($release_data, $inspection_data['release_id']);

		
		redirect('approval_release/service/', 'refresh');
	}

	// Service approval section ends here


	//Management approval starts here

	

	public function management()
	{
		

		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$status 									=	array(4,4);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($this->session->userdata('employee_id'), $status);
			
			
			$status 									=	array(12,14);
			$release_data['denied_customer_list']		=	$this->customer_model->get_all_releases_by_status_for_dh($this->session->userdata('employee_id'), $status);


		} else {
			$status 									=	array(4,4);
			$release_data['pending_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($status);
			
			$status 									=	array(12,14);
			$release_data['denied_release_list']		=	$this->release_model->get_all_releases_by_status_for_dh($status);
		}
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/approval_release/mgt_release',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	
	public function approve_mgt($release_id){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$customer_status		=	array();

		// $release_id							=	$this->input->post('release_id','0',TRUE);

		// print($release_id);exit();


		$current_status						=	$this->release_model->get_release_by_id($release_id);

		$updated_status						=	$current_status->status +1;

		$release_data['status']				=	$updated_status;

		$release_data['mgt_approval_time']	=	date('Y-m-d H:i:s');

		$this->release_model->update_release($release_data, $release_id);
		redirect('approval_release/management/', 'refresh');
	}

	//Management approval ends here




	public function inspection_test()
	{
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$release_data['customer_list']		=	$this->customer_model->get_all_customers_by_rm_id($this->session->userdata('employee_id'));	
		} else {
			// $release_data['customer_list']		=	$this->customer_model->get_all_customers();
			// echo '<pre>';print_r($release_data['customer_list']); echo '</pre>';exit()
			// $this->load_release_data();

		}
		// exit();

		// echo '<pre>';print_r($release_data['customer_list']); echo '</pre>';exit();
		$config = array();
 
       	$config["base_url"] = base_url() . "inspection/inspection_test";
 
      	$config["total_rows"] = $this->customer_model->count_customers();

      	// print_r($config["total_rows"]);exit();
 
       	$config["per_page"] = 50;
 
       	$config["uri_segment"] = 3;
 
       	$this->pagination->initialize($config);
 
       	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       	// echo $page; exit();
 
       	$data["customer_list"] = $this->customer_model->get_all_customers_with_offset($config["per_page"], $page);
 		print_r($data);
       	$data["links"] = $this->pagination->create_links();
 
       	$this->load->view("pages/inspection/test", $data);
      
	}

	private function load_release_data(){
		$config = array();
 
       	$config["base_url"] = base_url() . "inspection/inspection_test";
 
      	$config["total_rows"] = $this->customer_model->count_customers();

      	// print_r($config["total_rows"]);exit();
 
       	$config["per_page"] = 50;
 
       	$config["uri_segment"] = 3;
 
       	$this->pagination->initialize($config);
 
       	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       	// echo $page; exit();
 
       	$data["customer_list"] = $this->customer_model->get_all_customers_with_offset($config["per_page"], $page);
 		print_r($data);
       	$data["links"] = $this->pagination->create_links();
 
       	$this->load->view("pages/inspection/test", $data);
       	exit();
	}

	
	public function address_verification_deny(){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		
		$customer_status		=	array();
		
		$customer_id			=	$this->input->post('customer_id','',TRUE);

		$customer_status['status']	=	13;
		$customer_status['address_verification_note']	=	$this->input->post('address_verification_note','',TRUE);
		$customer_status['inspection_time']				=	date('Y-m-d H:i:s');

		$this->customer_model->update_customer_status($customer_status, $customer_id);
		
		redirect('inspection', 'refresh');

	}

	public function customer_history()
	{
		if($this->session->userdata('role')!=6 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$release_data		=	array();

		
		$status 									=	array(2,3);
		$release_data['pending_customer_list']		=	$this->customer_model->get_all_customers_for_history_verification_by_status($status);
		
		$status 									=	array(5,6);
		$release_data['approved_customer_list']	=	$this->customer_model->get_all_customers_for_history_verification_by_status($status);
		
		$status 									=	array(14,NULL);
		$release_data['denied_customer_list']		=	$this->customer_model->get_all_customers_for_history_verification_by_status($status);

		$status 									=	array(19,17);
		$release_data['temp_customer_list']		=	$this->customer_model->get_all_customers_for_history_verification_by_status($status);
			// echo '<pre>';print_r($release_data['pending_customer_list']); echo '</pre>';exit();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inspection/history_verification',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function history_verification(){
		if($this->session->userdata('role')!=6 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$customer_status		=	array();

		$customer_id			=	$this->input->post('customer_id','',TRUE);

		$current_status			=	$this->customer_model->get_customers_status_by_id($customer_id);

		$updated_status			=	$current_status->status +2;

		$customer_status['status']	=	$updated_status;
		$customer_status['history_verification_note']	=	$this->input->post('history_verification_note','',TRUE);
		$customer_status['history_verification_time']	=	date('Y-m-d H:i:s');

		$this->customer_model->update_customer_status($customer_status, $customer_id);
		redirect('inspection/customer_history/', 'refresh');
	}
	public function history_verification_deny(){
		if($this->session->userdata('role')!=6 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		
		$customer_status		=	array();
		
		$customer_id			=	$this->input->post('customer_id','',TRUE);

		$customer_status['status']	=	14;
		$customer_status['history_verification_note']	=	$this->input->post('history_verification_note','',TRUE);
		$customer_status['history_verification_time']	=	date('Y-m-d H:i:s');

		$this->customer_model->update_customer_status($customer_status, $customer_id);

		redirect('inspection/customer_history', 'refresh');
		
	}

	public function print_inspection_form () {
		$release_data							=	array();
		
		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$release_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$release_data['sales_person']			=	$this->employee_model->get_employee_by_id($release_data['customer_detail']->mkt_id);
		if($release_data['sales_person'] == NULL){
			$release_data['sales_person']			=	$this->dealer_model->get_dealer_by_id($release_data['customer_detail']->dealer_id);
		}

		$release_data['model_list']			=	$this->model_model->get_all_models();

		$this->load->view('pages/inspection/inspection_form',$release_data);
	}
	
	public function inspection_form_pdf(){
		
		$this->load->library('pdf');

		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$release_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$release_data['sales_person']			=	$this->employee_model->get_employee_by_id($release_data['customer_detail']->mkt_id);

		$release_data['model_list']			=	$this->model_model->get_all_models();

        $pdf = $this->pdf->load_view('pages/inspection/inspection_form_pdf',$release_data);
        print_r($pdf);exit();

	}

	

	public function ajax_generate_customer_detail_to_heldup(){
		$report_data										=	array();
		$release_data										=	array();

		$customer_id										=	$this->input->post('customer_id');
		
		$release_data['customer_detail']					=	$this->customer_model->get_customer_by_id($customer_id);
		
        $report_data['content']								=	$this->load->view('pages/inspection/heldup_customer_detail',$release_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}

	

}
