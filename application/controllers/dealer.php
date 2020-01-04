<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('dealer_model','dealer_model',TRUE);
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
		$dealer_data			=	array();

		$dealer_data['dealer_list']		=	$this->dealer_model->get_all_dealers();
		$dealer_data['zone_list']		=	$this->zone_model->get_all_zones();
		$dealer_data['employee_list']	=	$this->employee_model->get_all_employees();


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/dealer/dealer',$dealer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function add_dealer()
	{
		$dealer_data						=	array();
		$dealer_data['user_id']				=	$this->session->userdata('employee_id');
		$dealer_data['dealer_name']			=	$this->input->post('dealer_name','',TRUE);
		$dealer_data['dealer_location']		=	$this->input->post('dealer_location','',TRUE);
		$dealer_data['dealer_status']		=	1;
		$dealer_data['zone_id']				=	$this->input->post('zone_id','',TRUE);

		$result								=	$this->dealer_model->add_dealer($dealer_data);

		redirect('dealer','refresh');
	}
}
