<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Checklist_Model extends CI_Model {

    public function add_checklist($data){
        $this->db->insert('tbl_checklist',$data);
        $result         =   $this->db->insert_id();
        return $result;
    }
    public function get_checklist_by_customer_id($customer_id){
    	$this->db->select('*');
    	$this->db->from('tbl_checklist');
    	$this->db->where('customer_id',$customer_id);
    	$result_query =	$this->db->get();
    	$result = $result_query->row();
    	return $result;
    }
}
?>
