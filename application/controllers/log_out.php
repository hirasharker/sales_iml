<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_Out extends CI_Controller {
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

    $this->session->unset_userdata('employee_id');
    $this->session->unset_userdata('email_id');
    $this->session->unset_userdata('user_type');
    $this->session->unset_userdata('zone_id');
    session_destroy();
    
    redirect('login','refresh');
  }
}
