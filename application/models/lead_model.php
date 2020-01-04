<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Lead_Model extends CI_Model {

    public function get_all_leads(){
        $this->db->select('*');
        $this->db->from('tbl_lead');
        $this->db->limit('100');
        $this->db->order_by('time_stamp','desc');
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }

    public function get_lead_by_zone_id($zone_id){
        $this->db->select('*');
        $this->db->from('tbl_lead');
        $this->db->where('zone_id',$zone_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_lead_by_id($lead_id){
        $this->db->select('*');
        $this->db->from('tbl_lead');
        $this->db->where('lead_id',$lead_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function add_lead($data){
        $this->db->insert('tbl_lead',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_lead($data,$lead_id){
        
        $this->db->where('lead_id',$lead_id);
        $this->db->update('tbl_lead',$data);
    }
   
    public function delete_lead($lead_id){
        $this->db->where('lead_id',$lead_id);
        $this->db->delete('tbl_lead');
    }
}
?>
