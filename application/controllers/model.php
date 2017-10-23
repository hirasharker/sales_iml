<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		$this->load->model('model_model','model_model',TRUE);
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
		$model_data			=	array();
		
		$model_data['model_list']	=	$this->model_model->get_all_models();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/model/model',$model_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function add_model()
	{
		$model_data							=	array();
		$model_data['user_id']				=	$this->session->userdata('employee_id');
		$model_data['user_name']				=	$this->session->userdata('email_id');
		$model_data['model_name']			=	$this->input->post('model_name','',TRUE);
		$model_data['model_code']			=	$this->input->post('model_code','',TRUE);
		$model_data['total_price']			=	$this->input->post('total_price','',TRUE);
		$model_data['downpayment']			=	$this->input->post('downpayment','',TRUE);
		$model_data['interest_rate']		=	$this->input->post('interest_rate','',TRUE);

		$result								=	$this->model_model->add_model($model_data);

		redirect('model/index','refresh');
	}
}
