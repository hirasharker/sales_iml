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

    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
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
