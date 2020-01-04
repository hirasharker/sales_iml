<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('received_model','received_model',TRUE);
		$this->load->model('issued_model','issued_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('delivery_yard_model','yard_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		$this->load->model('bank_model','bank_model',TRUE);
		
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
		$inventory_data 					=	array();
		
		$inventory_data['zone_list']		=	$this->zone_model->get_all_zones();
		$inventory_data['inventory_list']	=	$this->inventory_model->get_all_cities();
		$inventory_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inventory/inventory',$inventory_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function receive()
	{
		$data               				=   array();
		$inventory_data 					=	array();
		
		$inventory_data['received_list']	=	$this->received_model->get_all_receives();
		$inventory_data['model_list']		=	$this->model_model->get_all_models();
		$inventory_data['yard_list']		=	$this->yard_model->get_all_delivery_yards();
		$inventory_data['employee_list']	=	$this->employee_model->get_all_employees();
		$inventory_data['bank_list']		=	$this->bank_model->get_all_banks();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inventory/receive',$inventory_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_received_product() {

		$recieved_data 										=	array();

		$received_data['container_no']						=	$this->input->post('container_no', '', TRUE);

		$duplicate_container_no								=	$this->check_duplicate_container($received_data['container_no']);
		if($duplicate_container_no){
			$session_data['error']							=	'container no exists!';
			$this->session->set_userdata($session_data);
			redirect('inventory/receive','refresh');
		}

		$received_data['user_id']							=	$this->session->userdata('employee_id');

		$received_data['yard_id']							=	$this->input->post('yard_id', '', TRUE);

		$received_data['invoice_no']						=	$this->input->post('invoice_no', '', TRUE);

		$received_data['invoice_date']						=	$this->input->post('invoice_date', '', TRUE);

		$received_data['bank_id']							=	$this->input->post('bank_id',0, TRUE);

		$received_data['lc_no']								=	$this->input->post('lc_no', '', TRUE);

		$received_data['bill_of_entry']						=	$this->input->post('bill_of_entry', '', TRUE);

		$received_data['bill_of_entry_date']				=	$this->input->post('bill_of_entry_date', '', TRUE);

		$received_data['bill_of_lading']					=	$this->input->post('bill_of_lading', '', TRUE);

		$received_data['received_date']						=	$this->input->post('received_date', '', TRUE);

		$result 											=	$this->received_model->add_received_data($received_data);

		$received_data['received_id']						=	$result;

		$session_data										=	array();

		$file_name 											=	NULL;

		$received_upload									=	$this->upload_model->upload_file('received_list',''); //after upload
		if(isset($received_upload['file_name'])){
			$file_name 			 							=	$received_upload['file_name'];
		}else{
			$session_data['error'] 							=	$received_upload['error'];
			$this->session->set_userdata($session_data);
			print_r($session_data['error']);
			redirect('receive','refresh');
		}
		
		$upload_result 										=	$this->upload_received_list($received_data, $file_name);
		redirect('inventory/receive','refresh');
	}


	public function upload_received_list($received_data, $file_name){

		$this->load->library('csvreader');

		$result												=	$this->csvreader->parse_file($file_name);

		$count 												=	0;

		$receive_detail_data 								=	array();

		$stock_detail_data									=	array();

		$receive_detail_data['received_id']					=	$received_data['received_id'];

		$duplicate_chassis 									=	$this->check_duplicate_chassis($result);

		if($duplicate_chassis) {
			$session_data['error']							=	'insertion failed! following duplicate chassis found --- '. implode(', ', $duplicate_chassis);
			$this->session->set_userdata($session_data);
			$this->delete_received($receive_detail_data['received_id']);
			redirect('inventory/receive','refresh');
			// echo '<pre>';print_r($duplicate_chassis); echo '</pre>';exit();
		} else {
			for ($i=1; $i <= count($result) ; $i++) {
				$receive_detail_data['model_id'] 				=	$result[$i]['id'];
				$receive_detail_data['model_name'] 				=	$result[$i]['name'];
				$receive_detail_data['chassis_no'] 				=	$result[$i]['chassis_no'];
				$receive_detail_data['engine_no'] 				=	$result[$i]['engine_no'];

				$detail_result									=	$this->received_model->add_received_detail($receive_detail_data);

				$stock_detail_data 								=	$receive_detail_data;

				$stock_detail_data['yard_id']					=	$received_data['yard_id'];

				$stock_detail_data['stock_position']			=	1;

				$stock_result									=	$this->stock_model->add_stock($stock_detail_data);
			}
			$session_data['message']							=	'successfully added!';
			$this->session->set_userdata($session_data);
			redirect('inventory/receive','refresh');
		}
		// redirect('inventory/receive','refresh');
		return $duplicate_chassis;
	}

	public function check_duplicate_chassis($chassis_list){
		$duplicate_chassis 							=	array();
		for ($i=1; $i <= count($chassis_list) ; $i++) {
			$chassis_found 							=	$this->stock_model->get_stock_by_chassis_no($chassis_list[$i]['chassis_no']);
			if($chassis_found){
				$duplicate_chassis[] 				=	$chassis_found->chassis_no;
			}
		}
		return $duplicate_chassis;
	}

	public function check_duplicate_container($container_no){
		$result 							=	$this->received_model->get_received_by_container_no($container_no);
		return $result;
	}

	public function issue()
	{
		$data               				=   array();
		$inventory_data 					=	array();
		
		$inventory_data['issued_list']		=	$this->issued_model->get_all_issues();
		$inventory_data['model_list']		=	$this->model_model->get_all_models();
		$inventory_data['yard_list']		=	$this->yard_model->get_all_delivery_yards();
		$inventory_data['dealer_list']		=	$this->dealer_model->get_all_dealers_by_status($dealer_status = 2);
		$inventory_data['stock_list']		=	$this->stock_model->get_all_stocks_for_isssue();
		$inventory_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/inventory/issue',$inventory_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}



	public function add_issued_product()
	{
		$issued_data 										=	array();

		$issued_data['user_id']								=	$this->session->userdata('employee_id');

		$issued_data['yard_id']								=	$this->input->post('yard_id', '', TRUE);

		$issued_data['issued_date']							=	$this->input->post('issued_date', '', TRUE);

		$issued_data['dealer_id']							=	$this->input->post('dealer_id', '', TRUE);

		$result 											=	$this->issued_model->add_issued_data($issued_data);

		$count 												=	0;

		$issue_detail_data 									=	array();

		$stock_detail_data									=	array();

		$issue_detail_data['issued_id']						=	$result;

		$model_id						=	$this->input->post('model_id','',TRUE);
		$model_name						=	$this->input->post('model_name','',TRUE);
		$chassis_no						=	$this->input->post('chassis_no','',TRUE);
		$engine_no						=	$this->input->post('engine_no','',TRUE);
		$stock_id						=	$this->input->post('stock_id','',TRUE);

		$is_dealer_limit_exceeds		=	$this->check_dealer_stock($issued_data['dealer_id'],$chassis_no);
		
		if($is_dealer_limit_exceeds == 1){
			$session_data['error']								=	'insertion failed! dealer stock limit exceeded!';
			$this->session->set_userdata($session_data);
			$this->delete_issue($issue_detail_data['issued_id']);
			redirect('inventory/issue','refresh');
		}
		$duplicate_issue 				=	$this->check_duplicate_issue($chassis_no);

		if($duplicate_issue) {
			$session_data['error']								=	'insertion failed! following duplicate chassis found --- '. implode(', ', $duplicate_issue);
			$this->session->set_userdata($session_data);
			$this->delete_issue($issue_detail_data['issued_id']);
			redirect('inventory/issue','refresh');
			// echo '<pre>';print_r($duplicate_chassis); echo '</pre>';exit();
		} else {

			for ($i=0; $i < count($model_id) ; $i++) {
				$issue_detail_data['model_id'] 					=	$model_id[$i];
				$issue_detail_data['model_name'] 				=	$model_name[$i];
				$issue_detail_data['chassis_no'] 				=	$chassis_no[$i];
				$issue_detail_data['engine_no'] 				=	$engine_no[$i];
				$issue_detail_data['stock_id'] 					=	$stock_id[$i];

				$detail_result									=	$this->issued_model->add_issued_detail($issue_detail_data);

				$stock_detail_data['issued_id']					=	$result;
				$stock_detail_data['dealer_id']					=	$issued_data['dealer_id'];
				$stock_detail_data['issue_date'] 				=	$issued_data['issued_date'];
				
				$current_stock_position 						=	$this->stock_model->get_stock_by_id($issue_detail_data['stock_id'])->stock_position;
				$stock_detail_data['stock_position']			=	$current_stock_position + 3;

				$stock_update_result							=	$this->stock_model->update_stock($stock_detail_data, $issue_detail_data['stock_id']);
			}
		}

		$session_data										=	array();

		redirect('inventory/issue','refresh');
	}


	public function check_duplicate_issue($chassis_list){
		$duplicate_issue 							=	array();

		for ($i=0; $i < count($chassis_list); $i++) {
			$issue_found 							=	$this->stock_model->check_stock_for_duplicate_issue($chassis_list[$i]);
			if($issue_found){
				$duplicate_issue[] 					=	$issue_found->chassis_no;
			}
		}
		return $duplicate_issue;
	}

	public function check_dealer_stock($dealer_id, $chassis_list){
		$dealer_detail 								=	$this->dealer_model->get_dealer_by_id($dealer_id);
		
		$current_dealer_stock 						=	$this->stock_model->get_current_dealer_stock_by_dealer_id($dealer_id);

		$is_limit_exceeded 							=	$dealer_detail->dealer_limit < (count($current_dealer_stock) + count($chassis_list)) ? 1 : 0;

		return $is_limit_exceeded;
	}



	public function status()
	{
		$inventory_data						=	array();

		$inventory_data['user_id']			=	$this->session->userdata('employee_id');
		$inventory_data['user_name']		=	$this->session->userdata('email_id');
		$inventory_data['rm_id']			=	$this->input->post('rm_id','',TRUE);
		$inventory_data['inventory_name']	=	$this->input->post('inventory_name','',TRUE);
		$inventory_data['inventory_code']	=	$this->input->post('inventory_code','',TRUE);
		$inventory_data['zone_id']			=	$this->input->post('zone_id','',TRUE);

		$result								=	$this->inventory_model->add_inventory($inventory_data);

		redirect('inventory/index','refresh');
	}

	

	public function ajax_generate_items(){
		$yard_id 				=	$this->input->post('yard_id');

		$result						=	$this->stock_model->get_stock_by_yard_id_for_issue($yard_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}

	public function ajax_generate_items_by_dealer_id(){
		$yard_id 					=	$this->input->post('yard_id');
		$dealer_id 					=	$this->input->post('dealer_id');

		$zone_id					=	$this->dealer_model->get_dealer_by_id($dealer_id)->zone_id;

		$result						=	$this->stock_model->get_stock_by_yard_id_and_zone_id_for_issue($yard_id,$zone_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}
	



	public function delete_received($received_id){
		$result 				=	$this->received_model->delete_receive($received_id);
	}

	public function delete_issue($issued_id){
		$result 				=	$this->issued_model->delete_issue($issued_id);
	}
}
