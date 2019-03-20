<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bank_Model extends CI_Model {

    public function get_all_banks(){
       $this->db->select('*');
       $this->db->from('tbl_bank');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_city($data){
        $this->db->insert('tbl_city',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_city($data,$city_id){
        
        $this->db->where('city_id',$city_id);
        $this->db->update('tbl_city',$data);
    }
   
    public function delete_city($city_id){
        $this->db->where('city_id',$city_id);
        $this->db->delete('tbl_city');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_city_like_name_and_id($keyword){
        $this->db->select('city_id, city_name, CONCAT(city_id,("/"),city_name) as city_data');
        $this->db->like('city_id', $keyword);
        $this->db->or_like('city_name', $keyword);
        $query = $this->db->get('tbl_city');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['city_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
