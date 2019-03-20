<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Feedback_Type_Model extends CI_Model {

    public function get_all_feedback_types(){
        $this->db->select('*');
        $this->db->from('tbl_feedback_type');
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }

    public function get_feedback_type_by_id($feedback_type_id){
        $this->db->select('*');
        $this->db->from('tbl_feedback_type');
        $this->db->where('feedback_type_id',$feedback_type_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function add_feedback_type($data){
        $this->db->insert('tbl_feedback_type',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_feedback_type($data,$feedback_type_id){
        
        $this->db->where('feedback_type_id',$feedback_type_id);
        $this->db->update('tbl_feedback_type',$data);
    }
   
    public function delete_feedback_type($feedback_type_id){
        $this->db->where('feedback_type_id',$feedback_type_id);
        $this->db->delete('tbl_feedback_type');
    }
}
?>
