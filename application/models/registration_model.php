<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Registration_Model extends CI_Model {

    public function get_all_registrations(){
       $this->db->select("tbl_registration.*, tbl_delivery_yards.yard_name, tbl_registration_area.registration_area_name, string_agg(tbl_registration_detail.engine_no, ', ') as engine_no, string_agg(tbl_registration_detail.chassis_no, ', ') as chassis_no");
       $this->db->from('tbl_registration');
       $this->db->join('tbl_delivery_yards','tbl_delivery_yards.delivery_yard_id = tbl_registration.delivery_yard_id','inner');
       $this->db->join('tbl_registration_area','tbl_registration_area.registration_area_id = tbl_registration.registration_area_id','inner');
       $this->db->join('tbl_registration_detail','tbl_registration_detail.registration_id = tbl_registration.registration_id','inner');
       $this->db->group_by('tbl_registration.registration_id, tbl_delivery_yards.yard_name, tbl_registration_area.registration_area_name');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    public function get_all_registrations_by_status($status = NULL){
       $this->db->select("tbl_registration.*, tbl_delivery_yards.yard_name, tbl_registration_area.registration_area_name, string_agg(tbl_registration_detail.engine_no, ', ') as engine_no, string_agg(tbl_registration_detail.chassis_no, ', ') as chassis_no");
       $this->db->from('tbl_registration');
       $this->db->join('tbl_delivery_yards','tbl_delivery_yards.delivery_yard_id = tbl_registration.delivery_yard_id','inner');
       $this->db->join('tbl_registration_area','tbl_registration_area.registration_area_id = tbl_registration.registration_area_id','inner');
       $this->db->join('tbl_registration_detail','tbl_registration_detail.registration_id = tbl_registration.registration_id','inner');
       $this->db->group_by('tbl_registration.registration_id, tbl_delivery_yards.yard_name, tbl_registration_area.registration_area_name');
       $this->db->where('tbl_registration.status',$status);
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    

    
    public function add_registration_data($data){
        $this->db->insert('tbl_registration',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_registration($data,$registration_id){
        
        $this->db->where('registration_id',$registration_id);
        $this->db->update('tbl_registration',$data);
    }
   
    public function delete_registration($registration_id){
        $this->db->where('registration_id',$registration_id);
        $this->db->delete('tbl_registration');
    }


    //-----------------REGISTRATION DETAIL-----------------
    
    public function get_all_registration_detail(){
       $this->db->select('*');
       $this->db->from('tbl_registration_detail');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    public function get_registration_detail_by_registration_id($registration_id){
       $this->db->select('*');
       $this->db->from('tbl_registration_detail');
       $this->db->where('registration_id',$registration_id);
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_registration_detail($data){
        $this->db->insert('tbl_registration_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
       
    public function delete_registration_detail($registration_id){
        $this->db->where('registration_id',$registration_id);
        $this->db->delete('tbl_registration_detail');
    }


    //-----------------REGISTRATION AREA-------------------

    public function get_all_registration_areas(){
       $this->db->select('*');
       $this->db->from('tbl_registration_area');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_registration_area($data){
        $this->db->insert('tbl_registration_area',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_registration_area($data,$registration_area_id){
        
        $this->db->where('registration_area_id',$registration_area_id);
        $this->db->update('tbl_registration_area',$data);
    }
   
    public function delete_registration_area($registration_area_id){
        $this->db->where('registration_area_id',$registration_area_id);
        $this->db->delete('tbl_registration_area');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_registration_area_like_name_and_id($keyword){
        $this->db->select('registration_area_id, registration_area_name, CONCAT(registration_area_id,("/"),registration_area_name) as registration_area_data');
        $this->db->like('registration_area_id', $keyword);
        $this->db->or_like('registration_area_name', $keyword);
        $query = $this->db->get('tbl_registration_area');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['registration_area_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
