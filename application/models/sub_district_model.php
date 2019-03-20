<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Sub_District_Model extends CI_Model {

    public function get_all_sub_districts(){
       $this->db->select('*');
       $this->db->from('tbl_sub_district');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    public function get_sub_district_by_district_id($district_id){
       $this->db->select('*');
       $this->db->from('tbl_sub_district');
       $this->db->where('district_id',$district_id);
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_sub_district($data){
        $this->db->insert('tbl_sub_district',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_sub_district($data,$sub_district_id){
        
        $this->db->where('sub_district_id',$sub_district_id);
        $this->db->update('tbl_sub_district',$data);
    }
   
    public function delete_sub_district($sub_district_id){
        $this->db->where('sub_district_id',$sub_district_id);
        $this->db->delete('tbl_sub_district');
    }
    
}
?>
