<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=7 && $this->session->userdata('role')!=15 && $this->session->userdata('role')!=3){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('checklist_model','checklist_model',TRUE);
		
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
		$customer_data		=	array();
		
		$customer_data['customer_list']		=	$this->customer_model->get_customers_by_status(6);
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		$customer_data['dealer_list']		=	$this->dealer_model->get_all_dealers();
		$customer_data['employee_list']		=	$this->employee_model->get_all_employees();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/checklist/checklist',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function update_checklist(){
		$checklist_data								=	array();
		$customer_status							=	array();
		$customer_status['checklist_approval_time']	=	date('Y-m-d H:i:s');

		$checklist_data['customer_id']				=	$this->input->post('customer_id','',TRUE);
		$checklist_data['image']					=	$this->input->post('image','',TRUE);
		$checklist_data['nid_birth_passport']		=	$this->input->post('nid_birth_passport','',TRUE);
		$checklist_data['inspection']				=	$this->input->post('inspection','',TRUE);
		$checklist_data['installment_cheque']		=	$this->input->post('installment_cheque','',TRUE);
		$checklist_data['installment_micr_cheque']	=	$this->input->post('installment_micr_cheque','',TRUE);
		$checklist_data['money_receipt']			=	$this->input->post('money_receipt','',TRUE);
		$checklist_data['trade_license']			=	$this->input->post('trade_license','',TRUE);
		$checklist_data['due_dp_cheque']			=	$this->input->post('due_dp_cheque','',TRUE);
		$checklist_data['purchase_order']			=	$this->input->post('purchase_order','',TRUE);
		$checklist_data['aggreement']				=	$this->input->post('aggreement','',TRUE);
		$checklist_data['promissary']				=	$this->input->post('promissary','',TRUE);
		$checklist_data['vts']						=	$this->input->post('vts','',TRUE);
		$checklist_data['auth_letter']				=	$this->input->post('auth_letter','',TRUE);
		$checklist_data['bank_application_form']	=	$this->input->post('ba_form','',TRUE);
		$checklist_data['user_id']					=	$this->session->userdata('employee_id');
		$checklist_data['user_name']				=	$this->session->userdata('email_id');

		$result										=	$this->checklist_model->add_checklist($checklist_data);

		if($result!=NULL){
			$customer_status['status']				=	7;
			$this->customer_model->update_customer_status($customer_status, $checklist_data['customer_id']);
		}
		redirect('checklist', 'refresh');
	}
}
