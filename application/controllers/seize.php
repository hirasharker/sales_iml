<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seize extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		
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
		$data               =   array();
		$seize_data 			=	array();
		
		$seize_data['zone_list']		=	$this->zone_model->get_all_zones();
		$seize_data['city_list']		=	$this->city_model->get_all_cities();
		$seize_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/city/city',$seize_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function seize_depot()
	{
		echo "hello"; exit();
		$data               =   array();
		$seize_data 			=	array();
		
		$seize_data['zone_list']		=	$this->zone_model->get_all_zones();
		$seize_data['city_list']		=	$this->city_model->get_all_cities();
		$seize_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/seize/seize_depot',$seize_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_seize_depot()
	{
		$seize_data						=	array();

		$seize_data['user_id']			=	$this->session->userdata('employee_id');
		$seize_data['user_name']			=	$this->session->userdata('email_id');
		$seize_data['rm_id']				=	$this->input->post('rm_id','',TRUE);
		$seize_data['city_name']			=	$this->input->post('city_name','',TRUE);
		$seize_data['city_code']			=	$this->input->post('city_code','',TRUE);
		$seize_data['zone_id']			=	$this->input->post('zone_id','',TRUE);

		$result							=	$this->city_model->add_city($seize_data);

		redirect('city/index','refresh');
	}


	public function add_city()
	{
		$seize_data						=	array();

		$seize_data['user_id']			=	$this->session->userdata('employee_id');
		$seize_data['user_name']			=	$this->session->userdata('email_id');
		$seize_data['rm_id']				=	$this->input->post('rm_id','',TRUE);
		$seize_data['city_name']			=	$this->input->post('city_name','',TRUE);
		$seize_data['city_code']			=	$this->input->post('city_code','',TRUE);
		$seize_data['zone_id']			=	$this->input->post('zone_id','',TRUE);

		$result							=	$this->city_model->add_city($seize_data);

		redirect('city/index','refresh');
	}
}