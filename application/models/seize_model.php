<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class seize_Model extends CI_Model {

    public function get_all_seizes(){
       $this->db->select('*');
       $this->db->from('tbl_seize');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_seize($data){
        $this->db->insert('tbl_seize',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_seize($data,$seize_id){
        
        $this->db->where('seize_id',$seize_id);
        $this->db->update('tbl_seize',$data);
    }
   
    public function delete_seize($seize_id){
        $this->db->where('seize_id',$seize_id);
        $this->db->delete('tbl_seize');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_seize_like_name_and_id($keyword){
        $this->db->select('seize_id, seize_name, CONCAT(seize_id,("/"),seize_name) as seize_data');
        $this->db->like('seize_id', $keyword);
        $this->db->or_like('seize_name', $keyword);
        $query = $this->db->get('tbl_seize');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['seize_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }




    public function get_all_seize_depots(){
       $this->db->select('*');
       $this->db->from('tbl_seize_depot');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_seize_depot($data){
        $this->db->insert('tbl_seize_depot',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_seize_depot($data,$seize_id){
        
        $this->db->where('depot_id',$depot_id);
        $this->db->update('tbl_seize_depot',$data);
    }
   
    public function delete_seize_depot($depot_id){
        $this->db->where('depot_id',$depot_id);
        $this->db->delete('tbl_seize_depot');
    }


}
?>
