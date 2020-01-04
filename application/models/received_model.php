<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Received_Model extends CI_Model {

    public function get_all_receives(){
       $this->db->select("tbl_received.*, tbl_delivery_yards.yard_name, string_agg(tbl_received_detail.engine_no, ', ') as engine_no, string_agg(tbl_received_detail.chassis_no, ', ') as chassis_no");
       $this->db->from('tbl_received');
       $this->db->join('tbl_delivery_yards','tbl_delivery_yards.delivery_yard_id = tbl_received.yard_id','inner');
       $this->db->join('tbl_received_detail','tbl_received_detail.received_id = tbl_received.received_id','inner');
       $this->db->group_by('tbl_received.received_id, tbl_delivery_yards.yard_name');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_receive_by_id($receive_id){
        $this->db->select('*,receive_name as employee_name');
        $this->db->from('tbl_received');
        $this->db->where('receive_id',$receive_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_received_by_container_no($container_no){
      $this->db->select('*');
        $this->db->from('tbl_received');
        $this->db->where('container_no',$container_no);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_received_data($data){
        $this->db->insert('tbl_received',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    public function add_received_detail($data){
        $this->db->insert('tbl_received_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_receive($data,$receive_id){
        
        $this->db->where('receive_id',$receive_id);
        $this->db->update('tbl_received',$data);
    }
   
    public function delete_receive($received_id){
        $this->db->where('received_id',$received_id);
        $this->db->delete('tbl_received');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_receive_like_name_and_id($keyword){
        $this->db->select('receive_id, receive_name, CONCAT(receive_id,("/"),receive_name) as receive_data');
        $this->db->like('receive_id', $keyword);
        $this->db->or_like('receive_name', $keyword);
        $query = $this->db->get('tbl_received');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['receive_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
