<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspection extends CI_Controller {
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
		$customer_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$customer_data['customer_list']		=	$this->customer_model->get_all_customers_by_rm_id($this->session->userdata('employee_id'));	
		} else {
			$customer_data['customer_list']		=	$this->customer_model->get_all_customers();
			// echo '<pre>';print_r($customer_data['customer_list']); echo '</pre>';exit();
		}
		
		// echo '<pre>';print_r($customer_data['customer_list']); echo '</pre>';exit();
		$customer_data['model_list']		=	$this->model_model->get_all_models();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inspection/inspection',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function inspection_test()
	{
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$data               =   array();
		$customer_data		=	array();
		
		if($this->session->userdata('role')!=15){
			$customer_data['customer_list']		=	$this->customer_model->get_all_customers_by_rm_id($this->session->userdata('employee_id'));	
		} else {
			// $customer_data['customer_list']		=	$this->customer_model->get_all_customers();
			// echo '<pre>';print_r($customer_data['customer_list']); echo '</pre>';exit()
			// $this->load_customer_data();

		}
		// exit();

		// echo '<pre>';print_r($customer_data['customer_list']); echo '</pre>';exit();
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
       	
		// $customer_data['model_list']		=	$this->model_model->get_all_models();

  //       $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
  //       $data['content']    =   $this->load->view('pages/inspection/inspection',$customer_data,TRUE);
  //       $data['footer']     =   $this->load->view('template/footer','',TRUE);
		// $this->load->view('template/main_template',$data);
	}

	private function load_customer_data(){
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

	public function address_verification(){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		
		$customer_status		=	array();
		
		$customer_id			=	$this->input->post('customer_id','',TRUE);
		

		$current_status			=	$this->customer_model->get_customers_status_by_id($customer_id);

		if($current_status->status>15){
			$updated_status			=	$current_status->status - 14;
		}else{
			$updated_status			=	$current_status->status +1;	
		}

		$customer_status['status']	=	$updated_status;
		$customer_status['address_verification_note']	=	$this->input->post('address_verification_note','',TRUE);
		$customer_status['inspection_time']				=	date('Y-m-d H:i:s');

		$inspection_form									=	$this->upload_model->upload_file('inspection_form','inspection_form'); //after upload
		$sdata=array();

		if(isset($inspection_form['file_name'])){
			$customer_status['inspection_form'] 			=	$inspection_form['file_name'];
			$this->customer_model->update_customer_status($customer_status, $customer_id);
			$sdata['message'] = 'Verification Successfull';
			$this->session->set_userdata($sdata);
		}else{
			$sdata['inspection_error'] = $inspection_form['error'];
			$this->session->set_userdata($sdata);
		}
		redirect('inspection', 'refresh');
	}
	public function address_verification_temporary_heldup(){
		if($this->session->userdata('role')!=2 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		
		$customer_status		=	array();
		
		$customer_id			=	$this->input->post('customer_id','',TRUE);
		

		$current_status			=	$this->customer_model->get_customers_status_by_id($customer_id);

		$updated_status			=	$current_status->status +15;

		$customer_status['status']	=	$updated_status;
		$customer_status['address_verification_note']	=	$this->input->post('address_verification_note','',TRUE);
		$customer_status['inspection_time']				=	date('Y-m-d H:i:s');

		$this->customer_model->update_customer_status($customer_status, $customer_id);

		redirect('inspection', 'refresh');
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
		$customer_data		=	array();
		
		$customer_data['customer_list']		=	$this->customer_model->get_all_customers_for_history_verification();
		$customer_data['model_list']		=	$this->model_model->get_all_models();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inspection/history_verification',$customer_data,TRUE);
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

		redirect('inspection', 'refresh');
		
	}

	public function print_inspection_form () {
		$customer_data							=	array();
		
		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$customer_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['sales_person']			=	$this->employee_model->get_employee_by_id($customer_data['customer_detail']->mkt_id);
		if($customer_data['sales_person'] == NULL){
			$customer_data['sales_person']			=	$this->dealer_model->get_dealer_by_id($customer_data['customer_detail']->dealer_id);
		}

		$customer_data['model_list']			=	$this->model_model->get_all_models();

		$this->load->view('pages/inspection/inspection_form',$customer_data);
	}
	
	public function inspection_form_pdf(){
		
		$this->load->library('pdf');

		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$customer_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['sales_person']			=	$this->employee_model->get_employee_by_id($customer_data['customer_detail']->mkt_id);

		$customer_data['model_list']			=	$this->model_model->get_all_models();

        $pdf = $this->pdf->load_view('pages/inspection/inspection_form_pdf',$customer_data);
        print_r($pdf);exit();

	}

}
