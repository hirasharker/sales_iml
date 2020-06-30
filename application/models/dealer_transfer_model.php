<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dealer_Transfer_Model extends CI_Model {

    public function get_all_dealer_transfers(){
       $this->db->select("tbl_dealer_transfer.*, string_agg(tbl_dealer_transfer_detail.chassis_no,', ') as chassis_no, string_agg(tbl_dealer_transfer_detail.engine_no, ', ') as engine_no  ");
       $this->db->from('tbl_dealer_transfer');
       $this->db->join('tbl_dealer_transfer_detail','tbl_dealer_transfer_detail.dealer_transfer_id = tbl_dealer_transfer.dealer_transfer_id','left');
       $this->db->order_by('tbl_dealer_transfer.transfer_date','desc');
       $this->db->group_by('tbl_dealer_transfer.dealer_transfer_id');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_dealer_transfer_by_id($dealer_transfer_id){
        $this->db->select('*,dealer_transfer_name as employee_name');
        $this->db->from('tbl_dealer_transfer');
        $this->db->where('dealer_transfer_id',$dealer_transfer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_dealer_transfers_by_status($dealer_transfer_status = 1){
        $this->db->select('tbl_dealer_transfer.*, tbl_zone.zone_name');
        $this->db->from('tbl_dealer_transfer');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_dealer_transfer.zone_id','left');
        $this->db->where('dealer_transfer_status',$dealer_transfer_status);
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }
    
    public function add_dealer_transfer($data){
        $this->db->insert('tbl_dealer_transfer',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_dealer_transfer($data,$dealer_transfer_id){
        
        $this->db->where('dealer_transfer_id',$dealer_transfer_id);
        $this->db->update('tbl_dealer_transfer',$data);
    }
   
    public function delete_dealer_transfer($dealer_transfer_id){
        $this->db->where('dealer_transfer_id',$dealer_transfer_id);
        $this->db->delete('tbl_dealer_transfer');
    }




    public function add_dealer_transfer_detail($data){
        $this->db->insert('tbl_dealer_transfer_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }


}
?>
