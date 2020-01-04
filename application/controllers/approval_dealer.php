<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Dealer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('dealer_model','dealer_model',TRUE);
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
		$data               							=   array();
		$dealer_data 									=	array();
		
		$dealer_data['pending_dealer_list']				=	$this->dealer_model->get_all_dealers_by_status($dealer_status = 1);
		
		$dealer_data['approved_dealer_list']			=	$this->dealer_model->get_all_dealers_by_status($dealer_status = 2);

		$dealer_data['blacklisted_dealer_list']			=	$this->dealer_model->get_all_dealers_by_status($dealer_status = 3);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/dealer',$dealer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function decision(){

		$key 											=	$this->input->post('decision_key','',TRUE);
		$dealer_id 										=	$this->input->post('dealer_id','',TRUE);

		$dealer_data 									=	array();
		$dealer_data['dealer_limit']					=	$this->input->post('dealer_limit','',TRUE);

		// $stock_data['dealer_approval_time']				=	date('Y-m-d H:i:s');
		switch ($key) {
			case 'approve' :
			$dealer_data['dealer_status']				=	2;
			// $this->log_model->add_log();
			break;
			case 'update'	:
			$dealer_data['dealer_status']				=	2;
			default :
			break;

			case 'deny'	:
			$dealer_data['dealer_status']				=	3;
			default :
			break;
		}
		// echo '<pre>'; print_r($dealer_detail); echo '</pre>';exit();
		$update_result 									=	$this->dealer_model->update_dealer($dealer_data, $dealer_id);

		redirect('approval_dealer', 'refresh');
	}
	
}
