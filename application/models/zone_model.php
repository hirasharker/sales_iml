<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Zone_Model extends CI_Model {

    public function get_all_zones(){
        $this->db->select('tbl_zone.*,tbl_zonal_head.employee_name as zonal_head,
                          tbl_recovery_manager.employee_name as recovery_manager,
                          tbl_coordinator.employee_name as coordinator');
        $this->db->from('tbl_zone');
        $this->db->join('tbl_employee as tbl_zonal_head','tbl_zone.zhead_id = tbl_zonal_head.employee_id','left');
        $this->db->join('tbl_employee as tbl_recovery_manager','tbl_zone.rm_id = tbl_recovery_manager.employee_id','left');
        $this->db->join('tbl_employee as tbl_coordinator','tbl_zone.coordinator_id = tbl_coordinator.employee_id','left');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_zone_by_id($zone_id){
        $this->db->select('*');
        $this->db->from('tbl_zone');
        $this->db->where('zone_id',$zone_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_zone($data){
        $this->db->insert('tbl_zone',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_zone($data,$zone_id){
        
        $this->db->where('zone_id',$zone_id);
        $this->db->update('tbl_zone',$data);
    }
   
    public function delete_zone($zone_id){
        $this->db->where('zone_id',$zone_id);
        $this->db->delete('tbl_zone');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_zone_like_name_and_id($keyword){
        $this->db->select('zone_id, zone_name, CONCAT(zone_id,("/"),zone_name) as zone_data');
        $this->db->like('zone_id', $keyword);
        $this->db->or_like('zone_name', $keyword);
        $query = $this->db->get('tbl_zone');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['zone_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
