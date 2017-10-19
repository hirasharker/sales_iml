<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function __construct()
  {
          parent::__construct();
          $this->load->model('login_model','l_model',TRUE);
          if($this->session->userdata('employee_id')!=NULL){
            redirect('dashboard','refresh');
          }
  }

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $login_data       =   array();
    
    $this->load->view('login',$login_data);
  }

  public function check_user(){
    $email_id=$this->input->post('email_id','',TRUE);
    // $password=md5($this->input->post('password','',TRUE));
    $password=md5($this->input->post('password','',TRUE));

    $result=$this->l_model->check_user($email_id,$password);
    
    $sdata=array();

    if(!$result){
      $sdata['error']= 'Please type correct user name and password';
      $this->session->set_userdata($sdata);
      redirect('login','refresh');
    } else {
      $sdata['employee_id']     = $result->employee_id;
      $sdata['email_id']        = $result->email_id;
      $sdata['user_type']       = $result->role;
      $this->session->set_userdata($sdata);
      redirect('dashboard','refresh');
    }
  }
}
