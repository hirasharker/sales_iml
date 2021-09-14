<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Release extends CI_Controller {
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
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('seize_model','seize_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('release_model','release_model',TRUE);

		
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
		$release_data 			=	array();
		
		// $release_data['zone_list']		=	$this->zone_model->get_all_zones();
		// $release_data['city_list']		=	$this->city_model->get_all_cities();
		// $release_data['employee_list']	=	$this->employee_model->get_all_employees();
		$release_data['release_list']		=	$this->release_model->get_all_releases();


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/release/release',$release_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_release()
	{
		$release_data								=	array();

		$release_data['user_id']					=	$this->session->userdata('employee_id');

		$release_data['customer_id']				=	$this->input->post('customer_id','0',TRUE);
		$release_data['engine_no']				=	$this->input->post('engine_no','',TRUE);
		$release_data['chassis_no']				=	$this->input->post('chassis_no','',TRUE);
		$release_data['dealer_id']			=	$this->input->post('dealer_id','',TRUE);
		$release_data['customer_name']			=	$this->input->post('customer_name','',TRUE);
		$release_data['proposed_collection_amount']			=	$this->input->post('proposed_collection_amount','',TRUE);
		$release_data['committed_next_payment_amount']			=	$this->input->post('committed_next_payment_amount','',TRUE);
		$release_data['committed_next_payment_date']			=	$this->input->post('committed_next_payment_date','',TRUE);
		$release_data['rest_amount_of_od']			=	$this->input->post('rest_amount_of_od','',TRUE);
		$release_data['seize_id']			=	$this->input->post('seize_id','',TRUE);
		$release_data['city_id']					=	$this->input->post('city_id','0',TRUE);
		$release_data['stock_id']					=	$this->input->post('stock_id','0',TRUE);

		$result									=	$this->release_model->add_release($release_data);

		// if($result){
		// 	$stock_id 							=	$this->input->post('stock_id','',TRUE);
		// 	$this->stock_model->update_stock($data, $stock_id);
		// 	$this->customer_model->update_customer($data, $release_data['customer_id']);
		// }

		redirect('release','refresh');
	}


	
	public function generate_customer_detail_for_release(){
		$search_key 										=	$this->input->post('search_key');

		$user_id 											=	$this->session->userdata('employee_id');

		// if($this->session->userdata('role')==15){
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id = "")
		// }else {
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id)
		// }

		$customer_detail 									=	$this->customer_model->get_customer_for_release_by_search_key($search_key);

		$customer_detail->seize_date					=	date('d-m-Y', strtotime($customer_detail->seize_date));

		echo json_encode($customer_detail);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
		die();
	}

	public function ajax_generate_city_detail(){
		$city_id 										=	$this->input->post('city_id');
		$zone_id 										=	$this->input->post('zone_id');

		$user_id 											=	$this->session->userdata('employee_id');

		// if($this->session->userdata('role')==15){
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id = "")
		// }else {
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id)
		// }
		$data 								=	array();

		$data 								=	$this->city_model->get_city_by_id($city_id);

		// $data['zonal_head'] 				=	$this->zone_model->get_zone_by_id($zone_id)->zonal_head;

		echo json_encode($data);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
		die();
	}

	


}
