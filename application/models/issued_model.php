<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Issued_Model extends CI_Model {

    public function get_all_issues(){
       $this->db->select("tbl_issued.*, string_agg(tbl_issued_detail.engine_no, ', ') as engine_no, string_agg(tbl_issued_detail.chassis_no, ', ') as chassis_no, string_agg(tbl_dealer.dealer_name, ', ') as dealer_name, tbl_dealer.dealer_name");
       $this->db->from('tbl_issued');
       $this->db->join('tbl_dealer','tbl_dealer.dealer_id = tbl_issued.dealer_id','inner');
       $this->db->join('tbl_issued_detail','tbl_issued_detail.issued_id = tbl_issued.issued_id','inner');
       $this->db->group_by('tbl_issued.issued_id, tbl_dealer.dealer_name');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_issue_by_id($issue_id){
        $this->db->select('*');
        $this->db->from('tbl_issued');
        $this->db->where('issued_id',$issued_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_issued_data($data){
        $this->db->insert('tbl_issued',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    public function add_issued_detail($data){
        $this->db->insert('tbl_issued_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_issue($data,$issue_id){
        
        $this->db->where('issued_id',$issued_id);
        $this->db->update('tbl_issued',$data);
    }
   
    public function delete_issue($issued_id){
        $this->db->where('issued_id',$issued_id);
        $this->db->delete('tbl_issued');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_issue_like_name_and_id($keyword){
        $this->db->select('issue_id, issue_name, CONCAT(issue_id,("/"),issue_name) as issue_data');
        $this->db->like('issue_id', $keyword);
        $this->db->or_like('issue_name', $keyword);
        $query = $this->db->get('tbl_issued');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['issue_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
