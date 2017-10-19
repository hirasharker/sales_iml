<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Employee_Model extends CI_Model {

    public function get_all_employees(){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_employee_by_id($employee_id){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_employee($data){
        $this->db->insert('tbl_employee',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_employee($data,$employee_id){
        
        $this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_employee',$data);
    }
   
    public function delete_employee($employee_id){
        $this->db->where('employee_id',$employee_id);
        $this->db->delete('tbl_employee');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_employee_like_name_and_id($keyword){
        $this->db->select('employee_id, employee_name, CONCAT(employee_id,("/"),employee_name) as employee_data');
        $this->db->like('employee_id', $keyword);
        $this->db->or_like('employee_name', $keyword);
        $query = $this->db->get('tbl_employee');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['employee_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
