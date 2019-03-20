<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Payment_Model extends CI_Model {


    public function get_payment_by_customer_code_and_voucher_type($customer_code, $vr_type){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('SubCode, sum(Amount)*(-1) as amount');
        // $ms_db->select('CustCode, CustName, PermanentAddress, PresentAddress');
        $ms_db->from('TBLACC110050510');
        $ms_db->where('VrType',$vr_type);
        $ms_db->where('SubCode',$customer_code);
        $ms_db->group_by('SubCode');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
}
?>
