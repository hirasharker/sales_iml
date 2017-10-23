<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_Model extends CI_Model {

    public function get_all_models(){
        $this->db->select('*');
        $this->db->from('tbl_model');
        $this->db->order_by('tbl_model.time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_model_by_id($model_id){
        $this->db->select('*');
        $this->db->from('tbl_model');
        $this->db->where('model_id',$model_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_model($data){
        $this->db->insert('tbl_model',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_model($data,$model_id){
        
        $this->db->where('model_id',$model_id);
        $this->db->update('tbl_model',$data);
    }
   
    public function delete_model($model_id){
        $this->db->where('model_id',$model_id);
        $this->db->delete('tbl_model');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_model_like_name_and_id($keyword){
        $this->db->select('model_id, model_name, CONCAT(model_id,("/"),model_name) as model_data');
        $this->db->like('model_id', $keyword);
        $this->db->or_like('model_name', $keyword);
        $query = $this->db->get('tbl_model');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['model_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
