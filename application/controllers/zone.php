<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zone extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		$this->load->model('zone_model','zone_model',TRUE);
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
		$zone_data			=	array();

		$zone_data['zone_list']		=	$this->zone_model->get_all_zones();
		$zone_data['employee_list']	=	$this->employee_model->get_all_employees();


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/zone/zone',$zone_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function add_zone()
	{
		$zone_data						=	array();
		$zone_data['user_id']			=	$this->session->userdata('employee_id');
		$zone_data['user_name']			=	$this->session->userdata('email_id');
		$zone_data['zone_name']			=	$this->input->post('zone_name','',TRUE);
		$zone_data['zhead_id']			=	$this->input->post('zhead_id','',TRUE);
		$zone_data['coordinator_id']	=	$this->input->post('coordinator_id','',TRUE);
		$zone_data['rm_id']				=	$this->input->post('rm_id','',TRUE);

		$result							=	$this->zone_model->add_zone($zone_data);

		redirect('zone/index','refresh');
	}
}
