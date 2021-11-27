<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seize extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=11){
			redirect('dashboard','refresh');
		}
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('seize_model','seize_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('upload_model', 'upload_model', TRUE);

		
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
		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=11){
			redirect('dashboard','refresh');
		}

		$data               =   array();
		$seize_data 			=	array();
		
		$seize_data['zone_list']		=	$this->zone_model->get_all_zones();
		$seize_data['city_list']		=	$this->city_model->get_all_cities();
		$seize_data['employee_list']	=	$this->employee_model->get_all_employees();
		$seize_data['depot_list']		=	$this->seize_model->get_all_seize_depots();


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/seize/seize',$seize_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_seize()
	{
		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=11){
			redirect('dashboard','refresh');
		}

		$seize_data								=	array();

		$seize_data['user_id']					=	$this->session->userdata('employee_id');
		$seize_data['user_name']				=	$this->session->userdata('email_id');

		$seize_data['customer_id']				=	$this->input->post('customer_id','0',TRUE);
		$seize_data['engine_no']				=	$this->input->post('engine_no','',TRUE);
		$seize_data['chassis_no']				=	$this->input->post('chassis_no','',TRUE);
		$seize_data['customer_name']			=	$this->input->post('customer_name','',TRUE);
		$seize_data['different_customer']		=	$this->input->post('different_customer','',TRUE);
		$seize_data['different_phone']			=	$this->input->post('different_phone','',TRUE);
		$seize_data['seize_location']			=	$this->input->post('seize_location','',TRUE);
		$seize_data['vehicle_condition']		=	$this->input->post('vehicle_condition','',TRUE);
		$seize_data['tyre_quantity']			=	$this->input->post('tyre_quantity','0',TRUE);
		$seize_data['battery_condition']		=	$this->input->post('battery_condition','',TRUE);
		$seize_data['gas_cylinder']				=	$this->input->post('gas_cylinder','',TRUE);
		$seize_data['key_status']				=	$this->input->post('key_status','',TRUE);
		$seize_data['softtop']					=	$this->input->post('softtop','',TRUE);
		$seize_data['depot_id']					=	$this->input->post('depot_id','0',TRUE);
		$seize_data['city_id']					=	$this->input->post('city_id','0',TRUE);
		$seize_data['seize_cost']				=	$this->input->post('seize_cost','0',TRUE);

		$result									=	$this->seize_model->add_seize($seize_data);

		if($result){
			$stock_id 							=	$this->input->post('stock_id','',TRUE);
			$data['seize_status'] 				=	true;
			$this->stock_model->update_stock($data, $stock_id);
			$data['seize_id']					=	$result;
			$this->customer_model->update_customer($data, $seize_data['customer_id']);
		}

		redirect('seize/','refresh');
	}

	public function seize_depot()
	{
		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=8){
			redirect('dashboard','refresh');
		}

		$data               =   array();
		$seize_data 			=	array();
		
		$seize_data['zone_list']		=	$this->zone_model->get_all_zones();
		$seize_data['city_list']		=	$this->city_model->get_all_cities();
		$seize_data['depot_list']		=	$this->seize_model->get_all_seize_depots();
		$seize_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/seize/seize_depot',$seize_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_seize_depot()
	{
		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=8){
			redirect('dashboard','refresh');
		}

		$seize_data							=	array();

		$seize_data['user_id']				=	$this->session->userdata('employee_id');
		$seize_data['user_name']			=	$this->session->userdata('email_id');
		$seize_data['depot_type']				=	$this->input->post('depot_type','',TRUE);
		$seize_data['depot_name']				=	$this->input->post('depot_name','',TRUE);
		$seize_data['ownership_type']				=	$this->input->post('ownership_type','',TRUE);
		$seize_data['address']				=	$this->input->post('address','',TRUE);
		$seize_data['depot_owner']				=	$this->input->post('depot_owner','',TRUE);
		$seize_data['phone']				=	$this->input->post('phone','',TRUE);
		$seize_data['space']				=	$this->input->post('space','0',TRUE);
		$seize_data['vehicle_capacity']				=	$this->input->post('vehicle_capacity','0',TRUE);
		$seize_data['shade_space']				=	$this->input->post('shade_space','',TRUE);
		$seize_data['advance']				=	$this->input->post('advance','0',TRUE);
		$seize_data['rent_type']				=	$this->input->post('rent_type','0',TRUE);
		$seize_data['daily_rent']				=	$this->input->post('daily_rent','0',TRUE);
		$seize_data['rent']				=	$this->input->post('rent','0',TRUE);
		$seize_data['adjust_from_advance']				=	$this->input->post('adjust_from_advance','0',TRUE);
		$seize_data['payment_mode']				=	$this->input->post('payment_mode','',TRUE);
		$seize_data['city_id']				=	$this->input->post('city_id','0',TRUE);
		$seize_data['zone_id']				=	$this->input->post('zone_id','0',TRUE);
		$seize_data['rm_id']				=	$this->input->post('rm_id','0',TRUE);
		// $seize_data['zhead_id']			=	$this->input->post('zhead_id','0',TRUE);

		$result							=	$this->seize_model->add_seize_depot($seize_data);

		redirect('seize/seize_depot','refresh');
	}

	public function upload_receivable(){

		if($this->session->userdata('role')!=15 && $this->session->userdata('role')!=8){
			redirect('dashboard','refresh');
		}

		$data               =   array();
		$seize_data 			=	array();
		


        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/seize/upload_seize',$seize_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}


	public function update_receivables() {

		$received_data 										=	array();

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
		redirect('seize/upload_receivable','refresh');
	}


	public function upload_received_list($received_data, $file_name){

		$this->load->library('csvreader');

		$result												=	$this->csvreader->parse_file($file_name);

		$count 												=	0;

		$receivable_data 									=	array();


		for ($i=1; $i <= count($result) ; $i++) {
			$customer_id 									=	$result[$i]['customer_id'];
			$receivable_data['number_of_overdue'] 			=	$result[$i]['number_of_overdue'];
			$receivable_data['overdue_amount'] 				=	$result[$i]['overdue_amount'];
			$receivable_data['outstanding_amount'] 			=	$result[$i]['outstanding_amount'];
			$receivable_data['installment_start_from'] 		=	$result[$i]['installment_start_from'];
			$receivable_data['last_installment_date'] 		=	$result[$i]['last_installment_date'];

			$detail_result									=	$this->customer_model->update_customer($receivable_data, $customer_id);
			
		}
		$session_data['message']							=	'successfully updated!';
		$this->session->set_userdata($session_data);
		redirect('seize/upload_receivable','refresh');
		// redirect('inventory/receive','refresh');
	}



	
	public function generate_customer_detail(){
		$search_key 										=	$this->input->post('search_key');

		$user_id 											=	$this->session->userdata('employee_id');

		// if($this->session->userdata('role')==15){
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id = "")
		// }else {
		// 	$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key, $user_id)
		// }

		$customer_detail 									=	$this->customer_model->get_customer_by_search_key($search_key);

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
