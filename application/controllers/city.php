<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
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
		$city_data 			=	array();
		
		$city_data['zone_list']		=	$this->zone_model->get_all_zones();
		$city_data['city_list']		=	$this->city_model->get_all_cities();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/city/city',$city_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_city()
	{
		$city_data						=	array();
		$city_data['user_id']			=	$this->session->userdata('employee_id');
		$city_data['user_name']			=	$this->session->userdata('email_id');
		$city_data['city_name']			=	$this->input->post('city_name','',TRUE);
		$city_data['city_code']			=	$this->input->post('city_code','',TRUE);
		$city_data['zone_id']			=	$this->input->post('zone_id','',TRUE);

		$result							=	$this->city_model->add_city($city_data);

		redirect('city/index','refresh');
	}
}
