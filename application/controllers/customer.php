<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=7 && $this->session->userdata('role')!=1 && $this->session->userdata('role')!=3 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('city_model','city_model',TRUE);
		$this->load->model('district_model','district_model',TRUE);
		$this->load->model('sub_district_model','sub_district_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('delivery_yard_model','yard_model',TRUE);
		$this->load->model('application_model','application_model',TRUE);
		$this->load->model('body_builder_model','body_builder_model',TRUE);
		
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('bank_model','bank_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('checklist_model','ck_model',TRUE);
		$this->load->model('email_model','mail_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);

		$this->load->model('stock_model','stock_model',TRUE);
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
		$session_data										=	array();
		$session_data['token']								=	1;
		$this->session->set_userdata($session_data);

		$data               =   array();
		$customer_data		=	array();
		if($this->session->userdata('role')!=3){
			$customer_data['city_list']			=	$this->city_model->get_all_cities();
		}else{
			$customer_data['city_list']			=	$this->city_model->get_all_cities_by_coordinator_id($this->session->userdata('employee_id'));
		}
		$customer_data['district_list']			=	$this->district_model->get_all_districts();
		$customer_data['dealer_list']			=	$this->dealer_model->get_all_dealers_by_status($dealer_status = 2);
		
		$customer_data['customer_id']			=	$this->input->post('customer_id','',TRUE);
		$zone_id 								=	'';

		if($customer_data['customer_id']!=NULL){
			$customer_data['customer_detail']	=	$this->customer_model->get_customer_by_id($customer_data['customer_id']);
			$customer_data['sub_district_list']	=	$this->sub_district_model->get_sub_district_by_district_id($customer_data['customer_detail']->district_id);
			$zone_id 							=	$customer_data['customer_detail']->zone_id;
		}

		$customer_data['zone_list']			=	$this->zone_model->get_all_zones();
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		
		$customer_data['application_list']	=	$this->application_model->get_all_applications();
		$customer_data['body_builder_list']	=	$this->body_builder_model->get_all_body_builders();

		$customer_data['employee_list']		=	$this->employee_model->get_all_employees();
		
		$customer_data['customer_list']		=	$this->customer_model->get_all_customers();
		// $customer_data['reference_list']	=	$this->customer_model->get_all_customers_id_from_ms_db();
		$customer_data['reference_list']	= 	$customer_data['customer_list'];

		// $customer_data['marketing_person_list']	=	$this->employee_model->get_employee_by_zone_id_and_role($zone_id,1);

		$customer_data['marketing_person_list']	=	$this->employee_model->get_employee_by_role(1);
		$customer_data['zonal_head_list']		=	$this->employee_model->get_employee_by_role(4);
		$customer_data['head_of_sales_list']	=	$this->employee_model->get_employee_by_role(5);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/customer/customer',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_customer()
	{
		echo '<h4>Adding new record .... </h4>';

		$customer_data										=	array();
		$customer_data['user_id']							=	$this->session->userdata('employee_id');
		$customer_data['user_name']							=	$this->session->userdata('email_id');
		$customer_data['user_comment']						=	$this->input->post('user_comment','',TRUE);
		$customer_data['reference']							=	$this->input->post('reference','0',TRUE);
		if($customer_data['reference']!="0"){
			$reference_info										=	$this->customer_model->get_customer_by_id($customer_data['reference']);
			// print_r($reference_info);exit();
			$customer_data['customer_name']						=	$reference_info->customer_name;
			$customer_data['father_name']						=	$reference_info->father_name;
			$customer_data['mother_name']						=	$reference_info->mother_name;
			$customer_data['present_address']					=	$reference_info->present_address;
			$customer_data['permanent_address']					=	$reference_info->permanent_address;
			$customer_data['phone']								=	$reference_info->phone;
			$customer_data['post_code']							=	$reference_info->post_code;
			// print_r($customer_data);exit();
		}else{
			$customer_data['customer_name']						=	$this->input->post('customer_name','',TRUE);
			$customer_data['present_address']					=	$this->input->post('present_address','',TRUE);
			$customer_data['permanent_address']					=	$this->input->post('permanent_address','',TRUE);
			$customer_data['father_name']						=	$this->input->post('father_name','',TRUE);
			$customer_data['mother_name']						=	$this->input->post('mother_name','',TRUE);
			$customer_data['phone']								=	$this->input->post('phone','',TRUE);
			$customer_data['post_code']							=	$this->input->post('post_code','0',TRUE);
		}
		$customer_data['finance_name']						=	$this->input->post('finance_name','',TRUE);
		$customer_data['national_id']						=	$this->input->post('national_id','',TRUE);
		$customer_data['occupation']						=	$this->input->post('occupation','',TRUE);
		$customer_data['business_address']					=	$this->input->post('business_address','',TRUE);
		$customer_data['spouse_address']					=	$this->input->post('spouse_address','',TRUE);
		$customer_data['city_id']							=	$this->input->post('city_id','0',TRUE);
		$customer_data['district_id']							=	$this->input->post('district_id','0',TRUE);
		$customer_data['sub_district_id']							=	$this->input->post('sub_district_id','0',TRUE);
		$customer_data['dealer_id']							=	$this->input->post('dealer_id','0',TRUE);
		$customer_data['city_code']							=	$this->input->post('city_code','',TRUE);
		$customer_data['zone_id']							=	$this->input->post('zone_id','0',TRUE);
		$zone_info 											=	$this->zone_model->get_zone_by_id($customer_data['zone_id']);
		
		$customer_data['zhead_id']							=	$this->input->post('zhead_id','0',TRUE);




		$customer_data['coordinator_id']					=	$zone_info->coordinator_id;
		$head_of_sales_id									=	$zone_info->head_of_sales_id;
		
		$rm_id												=	$this->employee_model->get_employee_by_zone_id_and_role($customer_data['zone_id'],2);
		if($rm_id != NULL){
			$customer_data['rm_id']							=	$rm_id[0]->employee_id;
		}

		if($this->session->userdata('user_type')==1){
		$customer_data['mkt_id']							=	$this->session->userdata('employee_id');
		} else {
			$customer_data['mkt_id']						=	$this->input->post('mkt_id','0',TRUE);
		}
		$customer_data['sales_generated_by']				=	$this->input->post('sales_generated_by','0',TRUE);
		// print_r($customer_data); exit();
		$customer_data['email_id']							=	$this->input->post('email_id','',TRUE);
		$customer_data['model_id']							=	$this->input->post('model_id','0',TRUE);
		$customer_data['model_code']						=	$this->input->post('model_code','0',TRUE);
		$customer_data['delivery_yard_id']					=	$this->input->post('delivery_yard_id','0',TRUE);
		$customer_data['stock_id']							=	$this->input->post('stock_id','0',TRUE);
		$customer_data['engine_no']							=	$this->input->post('engine_no','',TRUE);
		$customer_data['chassis_no']						=	$this->input->post('chassis_no','',TRUE);
		$customer_data['application_id']					=	$this->input->post('application_id','0',TRUE);
		$customer_data['body_type']							=	$this->input->post('body_type','0',TRUE);
		$customer_data['body_builder_id']					=	$this->input->post('body_builder_id','0',TRUE);
		$customer_data['registration_no']					=	$this->input->post('registration_no','0',TRUE);
		$customer_data['payment_mode']						=	$this->input->post('payment_mode','0',TRUE);
		
		$model_detail										=	$this->model_model->get_model_by_id($customer_data['model_id']);

		$control_account									=	$model_detail->control_account;

		if($customer_data['payment_mode'] == 1){
			$customer_data['total_price']						=	$model_detail->credit_price;
			// $customer_data['downpayment']						=	$model_detail->min_dp_credit;
			$customer_data['downpayment']						=	$this->input->post('downpayment','0',TRUE);
			$customer_data['period']							=	$this->input->post('period','0',TRUE);
		
		} elseif ($customer_data['payment_mode'] == 2){
			
			$customer_data['period']							=	$this->input->post('period','0',TRUE);
			switch ($customer_data['period']) {
				case 3 || 1 || 2:
					$customer_data['total_price']				=	$model_detail->credit_price + 5000;
					break;
				case 6:
					$customer_data['total_price']				=	$model_detail->credit_price + 10000;
					break;
				case 9:
					$customer_data['total_price']				=	$model_detail->credit_price + 15000;
					break;
				case 12:
					$customer_data['total_price']				=	$model_detail->credit_price + 20000;
					break;
				case 15:
					$customer_data['total_price']				=	$model_detail->credit_price + 30000;
					break;
				
				default:
					$customer_data['total_price']				=	$model_detail->credit_price + 30000;
			}

			$customer_data['downpayment']						=	$this->input->post('downpayment','',TRUE);
			
		} elseif ($customer_data['payment_mode'] == 3){
			// $customer_data['total_price']						=	$model_detail->retail_cash_price;
			$customer_data['total_price']						=	$model_detail->credit_price;
			$customer_data['downpayment']						=	0;
			$customer_data['period']							=	0;
		} elseif ($customer_data['payment_mode'] == 4) {
			// $customer_data['total_price']						=	$model_detail->corporate_price;
			$customer_data['total_price']						=	$model_detail->credit_price;
			$customer_data['downpayment']						=	0;
			$customer_data['period']							=	0;
		}

		
		$customer_data['discount']								=	$this->input->post('discount','0',TRUE);
		$customer_data['interest_rate']							=	$this->input->post('interest_rate','0',TRUE);
		$customer_data['installment_start_date']				=	$this->input->post('installment_start_date','0',TRUE);
		$customer_data['broker_name']							=	$this->input->post('broker_name','',TRUE);
		$customer_data['broker_nid']							=	$this->input->post('broker_nid','0',TRUE);
		$customer_data['broker_commission']						=	$this->input->post('broker_commission','0',TRUE);
		$customer_data['dealer_commission']						=	$this->input->post('dealer_commission','0',TRUE);
		$customer_data['registration_cost']						=	$this->input->post('registration_cost','0',TRUE);

		$image_upload										=	$this->upload_model->upload_file('customer_image','files'); //after upload
		if(isset($image_upload['file_name'])){
			$customer_data['image_path'] 					=	$image_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['image_error'] = $image_upload['error'];
			$this->session->set_userdata($sdata);
		}
		$nid_upload											=	$this->upload_model->upload_file('nid_file','nid'); //after upload
		if(isset($nid_upload['file_name'])){
			$customer_data['nid_path'] 						=	$nid_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['nid_error'] = $nid_upload['error'];
			$this->session->set_userdata($sdata);
		}

		$purchase_order_upload								=	$this->upload_model->upload_file('purchase_order','purchase_order'); //after upload
		if(isset($purchase_order_upload['file_name'])){
			$customer_data['purchase_order'] 				=	$purchase_order_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['purchase_order_error'] = $purchase_order_upload['error'];
			$this->session->set_userdata($sdata);
		}

		
		if($this->session->userdata('token')==1){

			$this->session->unset_userdata('token');
			// echo '<pre>'; print_r($customer_data); echo '</pre>';exit();

			$result												=	$this->customer_model->add_customer($customer_data);

			$stock_data 										=	array();

			$stock_data['customer_id']							=	$result;

			$current_stock_position 							=	$this->stock_model->get_stock_by_chassis_no($customer_data['chassis_no'])->stock_position;
			$stock_data['stock_position']						=	$current_stock_position + 1;

			$update_stock										=	$this->stock_model->update_stock_by_chassis_no($stock_data, $customer_data['chassis_no']);

			$update_code_data									=	array();
			
			$update_code_data['customer_code']					=	date('y').'-'.'00'.'-'.$customer_data['city_code'].'-'.$customer_data['model_code'].'-'.$result;

			$this->customer_model->update_customer($update_code_data,$result);

			$zonal_head_info									=	$this->employee_model->get_employee_by_id($customer_data['zhead_id']);
			$coordinator_info									=	$this->employee_model->get_employee_by_id($customer_data['coordinator_id']);
			$head_of_sales_info									=	$this->employee_model->get_employee_by_id($head_of_sales_id);


			$customer_data['contact_person']					=	$this->input->post('contact_person','',TRUE);

			$customer_data['customer_code']						=	$update_code_data['customer_code'];
			
			$result_msdb										=	$this->add_customer_to_msdb($customer_data, $control_account, $result);

			$mail_body											=	$this->load->view('template/mail',$customer_data,TRUE);

			echo '<h4>Sending Email ....</h4>';

			$this->mail_model->send_email($zonal_head_info->email_id,$update_code_data['customer_code']. ' Waiting for Approval',$mail_body);
		}
		

		redirect('customer/confirm_entry/'.$result,'refresh');
	}

	public function confirm_entry($customer_id){
		$data 							=	array();
		$data['customer_id']			=	$customer_id;
		$this->load->view('pages/customer/customer_entry_confirmation',$data);
	}

	public function update_customer()
	{
		echo '<h4>Udating record .... </h4>';
		$customer_id 										=	$this->input->post('customer_id','',TRUE);
		$customer_detail									=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data										=	array();
		$customer_data['modified_by']						=	$this->session->userdata('employee_id');
		$customer_data['user_comment']						=	$this->input->post('user_comment','',TRUE);
		$customer_data['status']							=	$this->input->post('status','',TRUE);
		$customer_data['customer_name']						=	$this->input->post('customer_name','',TRUE);
		$customer_data['present_address']					=	$this->input->post('present_address','',TRUE);
		$customer_data['permanent_address']					=	$this->input->post('permanent_address','',TRUE);
		$customer_data['father_name']						=	$this->input->post('father_name','',TRUE);
		$customer_data['mother_name']						=	$this->input->post('mother_name','',TRUE);
		$customer_data['phone']								=	$this->input->post('phone','',TRUE);
		$customer_data['post_code']							=	$this->input->post('post_code','',TRUE);
		$customer_data['finance_name']						=	$this->input->post('finance_name','',TRUE);
		$customer_data['national_id']						=	$this->input->post('national_id','',TRUE);
		$customer_data['occupation']						=	$this->input->post('occupation','',TRUE);
		$customer_data['business_address']					=	$this->input->post('business_address','',TRUE);
		$customer_data['spouse_address']					=	$this->input->post('spouse_address','',TRUE);
		$customer_data['city_id']							=	$this->input->post('city_id','',TRUE);
		$customer_data['district_id']						=	$this->input->post('district_id','',TRUE);
		$customer_data['sub_district_id']					=	$this->input->post('sub_district_id','',TRUE);
		$customer_data['dealer_id']							=	$this->input->post('dealer_id','',TRUE);
		$customer_data['city_code']							=	$this->input->post('city_code','',TRUE);
		$customer_data['zone_id']							=	$this->input->post('zone_id','',TRUE);
		$zone_info 											=	$this->zone_model->get_zone_by_id($customer_data['zone_id']);
		
		$customer_data['zhead_id']							=	$this->input->post('zhead_id','',TRUE);

		$customer_data['coordinator_id']					=	$zone_info->coordinator_id;
		$head_of_sales_id									=	$zone_info->head_of_sales_id;
		
		$rm_id												=	$this->employee_model->get_employee_by_zone_id_and_role($customer_data['zone_id'],2);
		if($rm_id != NULL){
			$customer_data['rm_id']							=	$rm_id[0]->employee_id;
		}

		if($this->session->userdata('user_type')==1){
		$customer_data['mkt_id']							=	$this->session->userdata('employee_id');
		} else {
			$customer_data['mkt_id']						=	$this->input->post('mkt_id','',TRUE);
		}
		$customer_data['sales_generated_by']				=	$this->input->post('sales_generated_by','',TRUE);
		// print_r($customer_data); exit();
		$customer_data['email_id']							=	$this->input->post('email_id','',TRUE);
		$customer_data['model_id']							=	$this->input->post('model_id','',TRUE);
		$customer_data['model_code']						=	$this->input->post('model_code','',TRUE);
		$customer_data['engine_no']							=	$this->input->post('engine_no','',TRUE);
		$customer_data['chassis_no']						=	$this->input->post('chassis_no','',TRUE);
		$customer_data['application_id']					=	$this->input->post('application_id','',TRUE);
		$customer_data['body_type']							=	$this->input->post('body_type','',TRUE);
		$customer_data['body_builder_id']					=	$this->input->post('body_builder_id','',TRUE);
		$customer_data['registration_no']					=	$this->input->post('registration_no','',TRUE);
		$customer_data['payment_mode']						=	$this->input->post('payment_mode','',TRUE);
		
		$model_detail										=	$this->model_model->get_model_by_id($customer_data['model_id']);

		if($customer_data['payment_mode'] == 1){
			$customer_data['total_price']						=	$model_detail->credit_price;
			// $customer_data['downpayment']						=	$model_detail->min_dp_credit;
			$customer_data['downpayment']						=	$this->input->post('downpayment','',TRUE);
			$customer_data['period']							=	$this->input->post('period','',TRUE);
		} elseif ($customer_data['payment_mode'] == 2){
			$customer_data['total_price']						=	$model_detail->credit_price;
			// $customer_data['downpayment']						=	$model_detail->min_dp_semicash;
			$customer_data['downpayment']						=	$this->input->post('downpayment','',TRUE);
			$customer_data['period']							=	$this->input->post('period','',TRUE);
		} elseif ($customer_data['payment_mode'] == 3){
			// $customer_data['total_price']						=	$model_detail->retail_cash_price;
			$customer_data['total_price']						=	$model_detail->credit_price;
			$customer_data['downpayment']						=	0;
			$customer_data['period']							=	0;
		} elseif ($customer_data['payment_mode'] == 4) {
			// $customer_data['total_price']						=	$model_detail->corporate_price;
			$customer_data['total_price']						=	$model_detail->credit_price;
			$customer_data['downpayment']						=	0;
			$customer_data['period']							=	0;
		}

		
		$customer_data['discount']								=	$this->input->post('discount','',TRUE);
		$customer_data['interest_rate']							=	$this->input->post('interest_rate','',TRUE);
		$customer_data['installment_start_date']				=	$this->input->post('installment_start_date','',TRUE);
		$customer_data['broker_name']							=	$this->input->post('broker_name','',TRUE);
		$customer_data['broker_nid']							=	$this->input->post('broker_nid','',TRUE);
		$customer_data['broker_commission']						=	$this->input->post('broker_commission','',TRUE);
		$customer_data['dealer_commission']						=	$this->input->post('dealer_commission','',TRUE);

		$image_upload											=	$this->upload_model->upload_file('customer_image','files'); //after upload
		if(isset($image_upload['file_name'])){
			if($customer_detail->image_path != NULL){
				unlink('files/'.$customer_detail->imge_path);
			}
			$customer_data['image_path'] 					=	$image_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['image_error'] = $image_upload['error'];
			$this->session->set_userdata($sdata);
		}
		$nid_upload											=	$this->upload_model->upload_file('nid_file','nid'); //after upload
		if(isset($nid_upload['file_name'])){
			if($customer_detail->nid_path != NULL){
				unlink('nid/'.$customer_detail->nid_path);
			}
			$customer_data['nid_path'] 						=	$nid_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['nid_error'] = $nid_upload['error'];
			$this->session->set_userdata($sdata);
		}

		$purchase_order_upload								=	$this->upload_model->upload_file('purchase_order','purchase_order'); //after upload
		if(isset($purchase_order_upload['file_name'])){
			if($customer_detail->purchase_order != NULL){
				unlink('purchase_order/'.$customer_detail->purchase_order);
			}
			$customer_data['purchase_order'] 				=	$purchase_order_upload['file_name'];
		}else{
			$sdata=array();
			$sdata['purchase_order_error'] = $purchase_order_upload['error'];
			$this->session->set_userdata($sdata);
		}

		
		if($this->session->userdata('token')==1){

			$this->session->unset_userdata('token');

			$result												=	$this->customer_model->update_customer($customer_data, $customer_id);

			$update_code_data									=	array();

			$year_code 											=	substr($customer_detail->customer_code, 0,2);
			
			$update_code_data['customer_code']					=	$year_code.'-'.'00'.'-'.$customer_data['city_code'].'-'.$customer_data['model_code'].'-'.$customer_id;

			$this->customer_model->update_customer($update_code_data,$customer_id);

			$customer_data['contact_person']					=	$this->input->post('contact_person','',TRUE);

			$customer_data['customer_code']						=	$update_code_data['customer_code'];
			
			$mail_body											=	$this->load->view('template/mail',$customer_data,TRUE);

			echo '<h4>Sending Email ....</h4>';

			// $this->mail_model->send_email('sales@ifadgroup.com',$update_code_data['customer_code']. ' is updated!',$mail_body);
		}
		

		redirect('customer/index','refresh');
	}


	private function add_customer_to_msdb($customer_data, $control_account, $customer_id){
		$customer_data_for_ms_db									=	array();
		$customer_data_for_ms_db['ComID']							=	1;
		$customer_data_for_ms_db['CustCode']						=	$customer_data['customer_code'];
		$customer_data_for_ms_db['CustName']						=	$customer_data['customer_name'];
		$customer_data_for_ms_db['FathersName']						=	$customer_data['father_name'];
		$customer_data_for_ms_db['MothersName']						=	$customer_data['mother_name'];
		$customer_data_for_ms_db['PresentAddress']					=	$customer_data['present_address'];

		$customer_data_for_ms_db['City']							=	$this->city_model->get_city_by_id($customer_data['city_id'])->city_name;
		$customer_data_for_ms_db['Postal']							=	$customer_data['post_code'];
		$customer_data_for_ms_db['Country']							=	'Bangladesh';
		$customer_data_for_ms_db['PermanentAddress']				=	$customer_data['permanent_address'];
		$customer_data_for_ms_db['ContactPerson']					=	$customer_data['contact_person'];
		$customer_data_for_ms_db['Phone']							=	$customer_data['phone'];
		$customer_data_for_ms_db['Fax']								=	'NULL';
		$customer_data_for_ms_db['Email']							=	$customer_data['email_id'];
		$customer_data_for_ms_db['NationalID']						=	$customer_data['national_id'];
		$customer_data_for_ms_db['BillWise']						=	'No';
		$customer_data_for_ms_db['CreditLimit']						=	0;
		$customer_data_for_ms_db['RecoveryPerson']					=	'NULL';
		$customer_data_for_ms_db['TDate']							=	date ("Y-m-d");
		$customer_data_for_ms_db['Remarks']							=	$this->employee_model->get_employee_by_id($customer_data['mkt_id'])->employee_name;
		$customer_data_for_ms_db['ControlAC']						=	$control_account;
		$customer_data_for_ms_db['RowNo']							=	$customer_id;



		// $customer_data_for_ms_db['CustCode']						=	'17-00-333-333-99999';
		// $customer_data_for_ms_db['CustName']						=	$customer_data['customer_name'];
		// $customer_data_for_ms_db['FathersName']						=	'Fathers Name';
		// $customer_data_for_ms_db['MothersName']						=	'Mothers Name';
		// $customer_data_for_ms_db['PresentAddress']					=	'Tongi Gazipur';
		// $customer_data_for_ms_db['City']							=	'Gazipur';
		// $customer_data_for_ms_db['Postal']							=	'1710';
		// $customer_data_for_ms_db['Country']							=	'Bangladesh';
		// $customer_data_for_ms_db['PermanentAddress']				=	'Gaibandha';
		// $customer_data_for_ms_db['ContactPerson']					=	$customer_data['customer_name'];;
		// $customer_data_for_ms_db['Phone']							=	'01713388741';
		// $customer_data_for_ms_db['Fax']								=	'NULL';
		// $customer_data_for_ms_db['Email']							=	'NULL';
		// $customer_data_for_ms_db['NationalID']						=	'1986455111111111';
		// $customer_data_for_ms_db['BillWise']						=	'No';
		// $customer_data_for_ms_db['CreditLimit']						=	0;
		// $customer_data_for_ms_db['RecoveryPerson']					=	'NULL';
		// $customer_data_for_ms_db['TDate']							=	date('Y-m-d');
		// $customer_data_for_ms_db['Remarks']							=	'Sales Person';
		// $customer_data_for_ms_db['ControlAC']						=	'Customer Account';
		// $customer_data_for_ms_db['RowNo']							=	25411;


		$result_msdb	=	$this->customer_model->add_customer_to_msdb($customer_data_for_ms_db);

		// print_r($customer_data_for_ms_db);
	}

	public function set_status_based_on_price(){
		
	}

	public function get_sales_person(){
		$city_id = $this->input->post('cityId');

		$zone_id								=	$this->city_model->get_city_by_id($city_id)->zone_id;
		$marketing_list							=	$this->employee_model->get_employee_by_zone_id_and_role($zone_id,1);
		// $marketing_list							=	$this->employee_model->get_employee_by_role(1);
			
			// Add below to output the json for your javascript to pick up.
			echo json_encode($marketing_list);
			// a die here helps ensure a clean ajax call
			die();
	}







	function generate_customer(){  
      	$this->load->model("customer_model");

      	$user_id 				=	$this->session->userdata('employee_id');

      	$employee_list			=	$this->employee_model->get_all_employees();
       	$marketing_person_list	=	$this->employee_model->get_employee_by_role(1);
		$zonal_head_list		=	$this->employee_model->get_employee_by_role(4);
		$head_of_sales_list		=	$this->employee_model->get_employee_by_role(5);
		$model_list				=	$this->model_model->get_all_models();
		$city_list 				=	$this->city_model->get_all_cities();
		$dealer_list			=	$this->dealer_model->get_all_dealers();

       	$fetch_data 			= 	$this->customer_model->make_datatables($user_id);  
       	$data = array();  
      	foreach($fetch_data as $row)  
       {  
            $sub_array = array();  
            $sub_array[] = $row->customer_code;  
            $sub_array[] = $row->customer_name;  
            $sub_array[] = $row->phone;
            if($row->image_path == NULL){
            	$sub_array[]	=	"not found!";
            }else{
            	$sub_array[] = '<a href="'.base_url().'files/'.$row->image_path.'" target="_blank"><img width="30px" height="40px" src="'. base_url().'files/'.$row->image_path. '" alt="image"></a>';
            }
            if($row->nid_path == NULL){
            	$sub_array[]	=	"not found!";
            }else{
            	$sub_array[] = '<a href="'.base_url().'nid/'.$row->nid_path.'" target="_blank"><img width="30px" height="40px" src="'. base_url().'nid/'.$row->nid_path. '" alt="image"></a>';
            }
            if($row->purchase_order == NULL){
            	$sub_array[]	=	"not found!";
            }else{
            	$sub_array[] = '<a href="'.base_url().'purchase_order/'.$row->purchase_order.'" target="_blank"><img width="30px" height="40px" src="'. base_url().'purchase_order/'.$row->purchase_order.'" alt="image"></a>';
            }
            if($row->inspection_form == NULL){
            	$sub_array[]	=	"not found!";
            }else{
            	$sub_array[] = '<a href="'.base_url().'inspection_form/'.$row->inspection_form.'" target="_blank"><img width="30px" height="40px" src="'. base_url().'inspection_form/'.$row->inspection_form.'" alt="image"></a>';
            }
            
            
            
            
            foreach($model_list as $value){
            	if($value->model_id == $row->model_id){
            		$sub_array[] = $value->model_name;
            	}
            }

            foreach($marketing_person_list as $value){
            	if($value->employee_id == $row->mkt_id){
            		$sub_array[] = $value->employee_name;
            	}
            }
           	
           	if(!isset($sub_array[8])){
           		$sub_array[] =	"-";
           	}

            $sub_array[] = $row->total_price;
            $sub_array[] = $row->discount;
            $sub_array[] = $row->downpayment;
            
            foreach($zonal_head_list as $value){
            	if($value->employee_id == $row->zhead_id){
            		$sub_array[] = $value->employee_name;
            	}
            }

            foreach ($city_list as $c_value) {
              if($row->city_id==$c_value->city_id){
                // echo 
                foreach ($employee_list as $emp_value) {
                  if($emp_value->employee_id==$c_value->rm_id){
                    $sub_array[] = $emp_value->employee_name;
                  }
                }
              }
            }

            foreach($dealer_list as $value){
            	if($value->dealer_id == $row->dealer_id){
            		$sub_array[] = $value->dealer_name;
            	}
            }
           	
           	if(!isset($sub_array[14])){
           		$sub_array[] =	"-";
           	}

           	$sub_array[] = $row->time_stamp;

           	switch ($row->status){
                case 0:
                $sub_array[] = "Waiting for approval of Zonal Head";
                break;
                case 1:
                $sub_array[] = "Waiting for approval of Head of Sales";
                break;
                case 2:
                $sub_array[] = "Waiting for address and history verification";
                break;
                case 3:
                $sub_array[] = "Waiting for history verification";
                break;
                case 4:
                $sub_array[] = "Waiting for address verification";
                break;
                case 19:
                $sub_array[] = "Address verification temporary heldup";
                break;
                case 5:
                $sub_array[] = "Waiting for accounts clearence";
                break;
                case 6:
                $sub_array[] = "Waiting for Documents";
                break;
                case 7:
                $sub_array[] = "Waiting for Printing DO";
                break;
                case 8:
                $sub_array[] = "Waiting for Delivery Challan";
                break;
                case 9:
                $sub_array[] = "Delivered";
                break;
                case 11:
                $sub_array[] = "Denied by Zonal Head!";
                break;
                case 12:
                $sub_array[] = "Denied by Head of Sales!";
                break;
                case 13:
               	$sub_array[] =  "Address Verification Failed!";
                break;
                case 14:
                $sub_array[] = "History Verification Failed!";
                break;
                case 15:
                $sub_array[] = "Payment Verification Failed!";
                break;
                case 16:
                $sub_array[] = "Document Verification Failed!";
                break;
                default:
                break;
              }

              $sub_array[] 	=	  '<form action="'.base_url().'customer" method="post">
				                      <input type="hidden" value="'.$row->customer_id.'" name="customer_id">
				                      <a onclick= "this.parentNode.submit(); return false;" href="#" style="color:#005102"><i class="fa fa-edit" aria-hidden="true" ></i>edit</a>
				                  </form>
				                  
				                  <form action="'.base_url().'delete_customer" method="post">
				                      <input type="hidden" value="'.$row->customer_id.'" name="customer_id">
				                      <a onclick="this.parentNode.submit(); return false;" href="#" style="color:#005102"><i class="fa fa-delete" aria-hidden="true" ></i>delete</a>
				                  </form>';

            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->customer_model->get_all_data($user_id),  
            "recordsFiltered"     =>     $this->customer_model->get_filtered_data($user_id),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  	}

  	
  	public function ajax_generate_sub_districts(){
		$district_id 				=	$this->input->post('district_id');

		$result						=	$this->sub_district_model->get_sub_district_by_district_id($district_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}

	public function ajax_generate_stock(){
		$dealer_id 					=	$this->input->post('dealer_id');

		$result						=	$this->stock_model->get_stock_by_dealer_id_for_booking($dealer_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}
	
	public function ajax_generate_engine_no(){
		$chassis_no 				=	$this->input->post('chassis_no');

		$result						=	$this->stock_model->get_stock_by_chassis_no($chassis_no);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}
	

	public function generate_individual_customer(){
		$report_data										=	array();
		$sales_data											=	array();

		$customer_id 										=	$this->input->post('customer_id');

		$user_id 											=	$this->session->userdata('employee_id');
		
		$sales_data['customer_detail']						=	$this->customer_model->get_customer_by_customer_id_and_user_id($customer_id,$user_id);

		if($sales_data['customer_detail'] == NULL){
			echo json_encode('Not Found!');
			die();
		}

		$sales_data['employee_list']						=	$this->employee_model->get_all_employees();

		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();

		$sales_data['city_list']							=	$this->city_model->get_all_cities();
		$sales_data['model_list']							=	$this->model_model->get_all_models();

		$sales_data['application_list']						=	$this->application_model->get_all_applications();
		
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();

		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();

		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();	
		// echo json_encode($sales_data['customer_detail']->customer_name); die();	
		
        $report_data['content']								=	$this->load->view('pages/customer/individual_customer_table',$sales_data,TRUE);
		
		echo json_encode($report_data['content']);
		// echo json_encode();
			// a die here helps ensure a clean ajax call
			die();
	}
	
	public function customer_detail(){
		$data               					=   array();

		$customer_data							=	array();

		$customer_id							=	$this->input->post('customer_id','',TRUE);

		$customer_data['customer_detail']		=	$this->customer_model->get_customer_by_id($customer_id);

		$customer_data['city_detail']			=	$this->city_model->get_city_by_id($customer_data['customer_detail']->city_id);

		$customer_data['sales_person']			=	$this->employee_model->get_employee_by_id($customer_data['customer_detail']->mkt_id);

		if($customer_data['sales_person'] == NULL){
			$customer_data['sales_person']			=	$this->dealer_model->get_dealer_by_id($customer_data['customer_detail']->dealer_id);
		}

		$customer_data['yard_list']				=	$this->yard_model->get_all_delivery_yards();
		
		$customer_data['checklist_detail']		=	$this->ck_model->get_checklist_by_customer_id($customer_id);

		// echo '<pre>';print_r($customer_data);echo '</pre>';exit();

		$data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/customer/customer_detail',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);

        $this->load->view('template/main_template',$data);



	}
}
