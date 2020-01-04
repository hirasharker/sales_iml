<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dealer_Model extends CI_Model {

    public function get_all_dealers(){
       $this->db->select('*');
       $this->db->from('tbl_dealer');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_dealer_by_id($dealer_id){
        $this->db->select('*,dealer_name as employee_name');
        $this->db->from('tbl_dealer');
        $this->db->where('dealer_id',$dealer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_dealers_by_status($dealer_status = 1){
        $this->db->select('tbl_dealer.*, tbl_zone.zone_name');
        $this->db->from('tbl_dealer');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_dealer.zone_id','left');
        $this->db->where('dealer_status',$dealer_status);
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }
    
    public function add_dealer($data){
        $this->db->insert('tbl_dealer',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_dealer($data,$dealer_id){
        
        $this->db->where('dealer_id',$dealer_id);
        $this->db->update('tbl_dealer',$data);
    }
   
    public function delete_dealer($dealer_id){
        $this->db->where('dealer_id',$dealer_id);
        $this->db->delete('tbl_dealer');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_dealer_like_name_and_id($keyword){
        $this->db->select('dealer_id, dealer_name, CONCAT(dealer_id,("/"),dealer_name) as dealer_data');
        $this->db->like('dealer_id', $keyword);
        $this->db->or_like('dealer_name', $keyword);
        $query = $this->db->get('tbl_dealer');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['dealer_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
