<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Yard_Transfer_Model extends CI_Model {

    public function get_all_yard_transfers(){
       $this->db->select("tbl_yard_transfer.*, string_agg(tbl_yard_transfer_detail.chassis_no,', ') as chassis_no, string_agg(tbl_yard_transfer_detail.engine_no, ', ') as engine_no  ");
       $this->db->from('tbl_yard_transfer');
       $this->db->join('tbl_yard_transfer_detail','tbl_yard_transfer_detail.yard_transfer_id = tbl_yard_transfer.yard_transfer_id','left');
       $this->db->order_by('tbl_yard_transfer.yard_transfer_date','desc');
       $this->db->group_by('tbl_yard_transfer.yard_transfer_id');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_yard_transfer_by_id($yard_transfer_id){
        $this->db->select('*,yard_transfer_name as employee_name');
        $this->db->from('tbl_yard_transfer');
        $this->db->where('yard_transfer_id',$yard_transfer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_yard_transfers_by_status($yard_transfer_status = 1){
        $this->db->select('tbl_yard_transfer.*, tbl_zone.zone_name');
        $this->db->from('tbl_yard_transfer');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_yard_transfer.zone_id','left');
        $this->db->where('yard_transfer_status',$yard_transfer_status);
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }
    
    public function add_yard_transfer($data){
        $this->db->insert('tbl_yard_transfer',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_yard_transfer($data,$yard_transfer_id){
        
        $this->db->where('yard_transfer_id',$yard_transfer_id);
        $this->db->update('tbl_yard_transfer',$data);
    }
   
    public function delete_yard_transfer($yard_transfer_id){
        $this->db->where('yard_transfer_id',$yard_transfer_id);
        $this->db->delete('tbl_yard_transfer');
    }




    public function add_yard_transfer_detail($data){
        $this->db->insert('tbl_yard_transfer_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }


}
?>
