<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('source_model','source_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('district_model','district_model',TRUE);
		$this->load->model('sub_district_model','sub_district_model',TRUE);
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('lead_model','lead_model',TRUE);
		
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
		$lead_data 							=	array();
		
		$lead_data['zone_list']				=	$this->zone_model->get_all_zones();
		$lead_data['sales_person_list']		=	$this->employee_model->get_employee_by_role(1);
		$lead_data['source_list']			=	$this->source_model->get_all_sources();
		$lead_data['model_list']			=	$this->model_model->get_all_models();
		$lead_data['district_list']			=	$this->district_model->get_all_districts();
		$lead_data['sub_district_list']		=	$this->sub_district_model->get_all_sub_districts();

		$lead_data['lead_list']				=	$this->lead_model->get_all_leads();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/crm/lead',$lead_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_lead()
	{
		$lead_data						=	array();

		$lead_data['user_id']			=	$this->session->userdata('employee_id');
		$lead_data['user_name']			=	$this->session->userdata('email_id');

		$lead_data['customer_name']		=	$this->input->post('customer_name','',TRUE);
		$lead_data['mkt_id']			=	$this->input->post('mkt_id','',TRUE);
		$lead_data['zone_id']			=	$this->input->post('zone_id','',TRUE);
		$lead_data['district_id']		=	$this->input->post('district_id','',TRUE);
		$lead_data['sub_district_id']	=	$this->input->post('sub_district_id','',TRUE);
		$lead_data['phone1']			=	$this->input->post('phone1','',TRUE);
		$lead_data['address_line_1']	=	$this->input->post('address_line_1','',TRUE);
		$lead_data['source_id']			=	$this->input->post('source_id','',TRUE);
		$lead_data['model_id']			=	$this->input->post('model_id','',TRUE);

		$result							=	$this->lead_model->add_lead($lead_data);

		redirect('lead/index','refresh');
	}
}
