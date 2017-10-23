<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Customer_Model extends CI_Model {

    public function get_all_customers_from_ms_db(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->limit(100);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    
    public function get_all_customers_id_from_ms_db(){
        
        $date = strtotime(date('Y-m-d'));
		$new_date = date("Y-m-d", strtotime("-3 month", $date));
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('CustCode, CustName');
        // $ms_db->select('CustCode, CustName, PermanentAddress, PresentAddress');
        $ms_db->from('Table00060');
        $ms_db->where('TDate >=',$new_date);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_customer_by_id_from_ms_db($customer_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->where('CustCode',$customer_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_customer($data){
        $this->db->insert('tbl_customer',$data);
        $result     =   $this->db->insert_id();
        return $result;
    }
    public function update_customer($data,$customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }

    // public function get_company_by_id($company_id){
    //     $this->db->select('*');
    //     $this->db->from('tbl_company');
    //     $this->db->where('company_id',$company_id);
    //     $result_query=$this->db->get();
    //     $result=$result_query->row();
    //     return $result;
    // }
    
    // public function update_company($data,$company_id){
        
    //     $this->db->where('company_id',$company_id);
    //     $this->db->update('tbl_company',$data);
    // }

}
?>
