<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resale extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('received_model','received_model',TRUE);
		$this->load->model('registration_model','reg_model',TRUE);
		$this->load->model('issued_model','issued_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('delivery_yard_model','yard_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		$this->load->model('bank_model','bank_model',TRUE);
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('seize_model','seize_model',TRUE);
		$this->load->model('resale_model','resale_model',TRUE);
		
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
		$resale_data 					=	array();
		

		$resale_data['model_list']	=	$this->model_model->get_all_models();
		$resale_data['yard_list']		=	$this->yard_model->get_all_delivery_yards();
		$resale_data['resale_list']	=	$this->resale_model->get_all_resales();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/resale/request',$resale_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_request()
	{
		$resale_data 										=	array();

		$resale_data['user_id']								=	$this->session->userdata('employee_id');
		$resale_data['seize_id']							=	$this->input->post('seize_id', '0', TRUE);
		$resale_data['previous_customer_id']				=	$this->input->post('customer_id', '0', TRUE);
		$resale_data['stock_id']							=	$this->input->post('stock_id', '0', TRUE);
		$resale_data['city_id']							=	$this->input->post('city_id', '0', TRUE);
		$resale_data['ro_id']							=	$this->session->userdata('employee_id');
		$resale_data['rm_id']							=	$this->input->post('rm_id', '0', TRUE);
		$resale_data['zhead_id']							=	$this->input->post('zhead_id', '0', TRUE);

		$result 											=	$this->resale_model->add_resale($resale_data);

		$count 													=	0;

		$resale_detail_data 									=	array();


		$resale_detail_data['resale_id']			=	$result;

		$customer_name						=	$this->input->post('customer_name','',TRUE);
		$phone_no						=	$this->input->post('phone_no','',TRUE);
		$proposed_value						=	$this->input->post('proposed_value','0',TRUE);
		$sales_mode						=	$this->input->post('sales_mode','0',TRUE);
		$downpayment						=	$this->input->post('downpayment','0',TRUE);
		$period						=	$this->input->post('period','0',TRUE);
		$interest_rate						=	$this->input->post('interest_rate','0',TRUE);
		$reference						=	$this->input->post('reference','',TRUE);

		// print_r($customer_name); echo count($customer_name);exit();


		for ($i=0; $i < count($customer_name) ; $i++) {
			$resale_detail_data['resale_customer_name'] 					=	$customer_name[$i];
			$resale_detail_data['resale_phone_no'] 				=	$phone_no[$i];
			$resale_detail_data['proposed_value'] 				=	$proposed_value[$i];
			$resale_detail_data['sales_mode'] 					=	$sales_mode[$i];
			$resale_detail_data['period'] 					=	$period[$i];
			$resale_detail_data['downpayment'] 					=	$downpayment[$i];
			$resale_detail_data['interest_rate'] 					=	$interest_rate[$i];
			$resale_detail_data['reference'] 					=	$reference[$i];

			if($customer_name[$i] != ""){
				$detail_result									=	$this->resale_model->add_resale_customer($resale_detail_data);
			}
			

		}
		$stock_detail_data['stock_position']			=	30;

		$stock_update_result							=	$this->stock_model->update_stock($stock_detail_data, $resale_data['stock_id']);


		$session_data										=	array();

		redirect('resale','refresh');
	}


	public function generate_seize_detail(){
		$search_key 										=	$this->input->post('search_key');

		$user_id 											=	$this->session->userdata('employee_id');

		// if($this->session->userdata('role')==15){
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id = "")
		// }else {
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id)
		// }

		$customer_detail 									=	$this->seize_model->get_seize_by_search_key($search_key);

		echo json_encode($customer_detail);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
		die();
	}

}
