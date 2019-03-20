<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Log_Model extends CI_Model {

    public function get_all_logs(){
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->order_by('tbl_log.time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_log_by_id($log_id){
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->where('log_id',$log_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_log_by_user_id_and_log_key_and_customer_id($user_id,$log_key=NULL, $customer_id=NULL){
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->where('user_id',$user_id);
        if($log_key!=NULL){
            $this->db->where('log_key',$log_key);
        }
        if($customer_id!=NULL){
            $this->db->where('customer_id',$customer_id);
        }
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function add_log($data){
        $this->db->insert('tbl_log',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_log($data,$log_id){
        
        $this->db->where('log_id',$log_id);
        $this->db->update('tbl_log',$data);
    }
   
    public function delete_log($log_id){
        $this->db->where('log_id',$log_id);
        $this->db->delete('tbl_log');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_log_like_name_and_id($keyword){
        $this->db->select('log_id, log_name, CONCAT(log_id,("/"),log_name) as log_data');
        $this->db->like('log_id', $keyword);
        $this->db->or_like('log_name', $keyword);
        $query = $this->db->get('tbl_log');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['log_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
