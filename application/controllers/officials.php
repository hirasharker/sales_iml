<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officials extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
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
		
		$employee_data						=	array();

		$employee_data['employee_list']		=	$this->employee_model->get_all_employees();
		$employee_data['zone_list']			=	$this->zone_model->get_all_zones();

        $data['navigation'] 				=   $this->load->view('template/navigation','',TRUE);
        $data['content']   					=   $this->load->view('pages/officials/officials',$employee_data,TRUE);
        $data['footer']     				=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	

	public function add_employee(){
		$employee_data					=	array();
		$employee_data['user_id']		=	$this->session->userdata('employee_id');
		$employee_data['user_name']		=	$this->session->userdata('email_id');
		$employee_data['role']			=	$this->input->post('role','',TRUE);
		if($employee_data['role']==1){
			$employee_data['zone_id']		=	$this->input->post('zone_id','',TRUE);
		}
		$employee_data['employee_name']	=	$this->input->post('employee_name','',TRUE);
		$employee_data['designation']	=	$this->input->post('designation','',TRUE);
		$employee_data['email_id']		=	$this->input->post('email_id','',TRUE);
		$employee_data['phone']			=	$this->input->post('phone','',TRUE);
		$result							=	$this->employee_model->add_employee($employee_data);

		redirect('officials/index','refresh');
	}
}
