<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class inventory_Model extends CI_Model {

    public function get_all_cities(){
        $this->db->select('tbl_inventory.*,tbl_zone.zone_id, tbl_zone.zone_name');
        $this->db->from('tbl_inventory');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_inventory.zone_id','left');
        $this->db->order_by('tbl_inventory.time_stamp','desc');
        $result_query   =   $this->db->get();
        $result         =   $result_query->result();
        return $result;
    }

    public function get_inventory_by_zone_id($zone_id){
        $this->db->select('*');
        $this->db->from('tbl_inventory');
        $this->db->where('zone_id',$zone_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_inventory_by_id($inventory_id){
        $this->db->select('tbl_inventory.*,tbl_employee.employee_name as recovery_manager');
        $this->db->from('tbl_inventory');
        $this->db->join('tbl_employee','tbl_employee.employee_id = tbl_inventory.rm_id', 'left');
        $this->db->where('inventory_id',$inventory_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_all_cities_by_coordinator_id($coordinator_id){
        $this->db->select('tbl_inventory.*,tbl_zone.coordinator_id');
        $this->db->from('tbl_inventory');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_inventory.zone_id','inner');
        $this->db->where('tbl_zone.coordinator_id',$coordinator_id);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_inventory($data){
        $this->db->insert('tbl_inventory',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_inventory($data,$inventory_id){
        
        $this->db->where('inventory_id',$inventory_id);
        $this->db->update('tbl_inventory',$data);
    }
   
    public function delete_inventory($inventory_id){
        $this->db->where('inventory_id',$inventory_id);
        $this->db->delete('tbl_inventory');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_inventory_like_name_and_id($keyword){
        $this->db->select('inventory_id, inventory_name, CONCAT(inventory_id,("/"),inventory_name) as inventory_data');
        $this->db->like('inventory_id', $keyword);
        $this->db->or_like('inventory_name', $keyword);
        $query = $this->db->get('tbl_inventory');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['inventory_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
