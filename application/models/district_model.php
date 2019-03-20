<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class District_Model extends CI_Model {

    public function get_all_districts(){
       $this->db->select('*');
       $this->db->from('tbl_district');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_district($data){
        $this->db->insert('tbl_district',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_district($data,$district_id){
        
        $this->db->where('district_id',$district_id);
        $this->db->update('tbl_district',$data);
    }
   
    public function delete_district($district_id){
        $this->db->where('district_id',$district_id);
        $this->db->delete('tbl_district');
    }
    
}
?>
