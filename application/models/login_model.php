<?php
class Login_Model extends CI_Model{
    public function check_user($email_id,$password){
        
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('email_id',$email_id);
        $this->db->where('password',$password);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }    
    public function find_user_by_id($employee_id){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function find_all_users(){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    
}




?>
