<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Zonalhead extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		date_default_timezone_set('Asia/Dhaka');
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=4 && $this->session->userdata('role')!=5 && $this->session->userdata('role')!=15){
			redirect('dashboard','refresh');
		}
		$this->load->model('customer_model','customer_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('dealer_model','dealer_model',TRUE);
		$this->load->model('zone_model','zone_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
		$this->load->model('email_model','mail_model',TRUE);
		
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

		$customer_data['customer_list']		=	$this->customer_model->get_all_customers();
		$customer_data['employee_list']		=	$this->employee_model->get_all_employees();
		$customer_data['model_list']		=	$this->model_model->get_all_models();
		$customer_data['dealer_list']		=	$this->dealer_model->get_all_dealers();
		
        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/approvals/zonalhead',$customer_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function decision($key,$customer_id){

		$customer_status		=	array();

		$customer_detail		=	$this->customer_model->get_customer_by_id($customer_id);

		$zone_detail			=	$this->zone_model->get_zone_by_id($customer_detail->zone_id);

		$model_detail			=	$this->model_model->get_model_by_id($customer_detail->model_id);

		$total_price			=	$customer_detail->total_price;

		$net_price				=	$total_price-$customer_detail->discount;

		$downpayment			=	$customer_detail->downpayment;

		$required_approval_of_head_of_sales			=	1;

		$customer_status['status']	=	1;

		$customer_status['inspection_required']	=	0;
		
		switch ($key) {
			case 'approve' :
			$customer_status['inspection_required']	=	1;
			break;
			case 'approve_without_inspection' :
			$customer_status['inspection_required']	=	0;
			break;
			case 'deny'	:
			$customer_status['status']	=	11;
			default :
			break;
		}


		switch ($customer_detail->payment_mode) {
			case 1:
				if($net_price >= $model_detail->credit_price && $downpayment >= $model_detail->min_dp_credit){
					$required_approval_of_head_of_sales = 0;
				}
				
				break;
			case 2:
				if($net_price >= $model_detail->credit_price && $downpayment>=$model_detail->min_dp_semicash){
					$required_approval_of_head_of_sales = 0;
				}

				break;
			case 3:
				if($net_price >= $model_detail->retail_cash_price){
					$required_approval_of_head_of_sales = 0;
				}

				break;
			case 4:
				if($net_price >= $model_detail->corporate_price){
					$required_approval_of_head_of_sales = 0;
				}

				break;
			default:
				break;
		}

		

		if($customer_status['status']==1){
			if($required_approval_of_head_of_sales==0){
				if($customer_status['inspection_required']==1){
					$customer_status['status']	=	2;
					// $this->mail_model->send_email($recovery_manager_info->email_id,$customer_data->customer_code. ' Waiting for Inspection',$mail_body);
					// $this->mail_model->send_email($controller_info->email_id,$customer_data->customer_code. ' Waiting for Inspection',$mail_body);
				}else{
					$customer_status['status']	=	5;
				}
			}else {
				$head_of_sales_info		=	$this->employee_model->get_employee_by_id($zone_detail->head_of_sales_id);

				$mail_body				=	$this->load->view('template/mail',$customer_detail,TRUE);
				
				// $this->mail_model->send_email($head_of_sales_info->email_id,$customer_detail->customer_code. ' Waiting for Approval',$mail_body);

			}
		}

		
		$customer_status['zonal_head_approval_time']	=	date('Y-m-d H:i:s');

		$this->customer_model->update_customer_status($customer_status, $customer_id);
		
		redirect('approval_zonalhead', 'refresh');
	}
}
