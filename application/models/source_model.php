<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Source_Model extends CI_Model {

    public function get_all_sources(){
       $this->db->select('*');
       $this->db->from('tbl_source');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_source($data){
        $this->db->insert('tbl_source',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_source($data,$source_id){
        
        $this->db->where('source_id',$source_id);
        $this->db->update('tbl_source',$data);
    }
   
    public function delete_source($source_id){
        $this->db->where('source_id',$source_id);
        $this->db->delete('tbl_source');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_source_like_name_and_id($keyword){
        $this->db->select('source_id, source_name, CONCAT(source_id,("/"),source_name) as source_data');
        $this->db->like('source_id', $keyword);
        $this->db->or_like('source_name', $keyword);
        $query = $this->db->get('tbl_source');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['source_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
