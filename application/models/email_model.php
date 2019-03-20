<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Email_Model extends CI_Model {

    public function send_email($to,$subject,$message){
        $this->load->library('email');
        $this->email->set_mailtype("html");
		$this->email->from('sales@ifadgroup.com');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
        $result = 'mail sent successfull';
        }else{
        $result = show_error($this->email->print_debugger());
        }
        return $result;
    }
}
?>
