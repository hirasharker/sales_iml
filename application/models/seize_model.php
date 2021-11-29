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


    public function get_seize_by_search_key($search_key){
        $this->db->select('tbl_seize.*, tbl_customer.customer_name, tbl_customer.city_id, tbl_customer.zhead_id, tbl_customer.dealer_id, tbl_customer.seize_status,tbl_customer.stock_id, tbl_city.rm_id, tbl_seize_depot.depot_name');
        $this->db->from('tbl_seize');
        $this->db->join('tbl_city', 'tbl_city.city_id = tbl_seize.city_id', 'left');
        $this->db->join('tbl_customer','tbl_customer.customer_id = tbl_seize.customer_id','left');
        $this->db->join('tbl_seize_depot','tbl_seize_depot.depot_id = tbl_seize.depot_id','left');
        
        if(is_numeric($search_key)){
            $this->db->where('tbl_seize.customer_id', $search_key);
            $this->db->or_where('tbl_seize.engine_no', $search_key);
            $this->db->or_where('tbl_seize.chassis_no', $search_key);
        }else {
            $this->db->where('tbl_seize.engine_no', $search_key);
            $this->db->or_where('tbl_seize.chassis_no', $search_key);
        }
        // $this->db->where('customer_id', $search_key);
        

        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_seize_data_by_search_criteria($zone_id='',$rm_id='',$zm_id='',$depot_id='', $status, $start_date, $end_date){
        $this->db->select("tbl_seize.*,tbl_zone.zone_name, tbl_zone.zhead_id, tbl_city.rm_id, tbl_release.dh_approval_time, tbl_seize_depot.depot_name, abs(tbl_seize.time_stamp :: date - CURRENT_TIMESTAMP :: date) as seize_period, date_part('day','".$end_date."' :: timestamp -tbl_seize.time_stamp ) as seize_period_till_report_date, tbl_seize_depot.daily_rent, tbl_resale.mgt_approval_time as resale_date ");
        $this->db->from('tbl_seize');
        $this->db->join('tbl_resale', 'tbl_resale.seize_id = tbl_seize.seize_id', 'left');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_seize.city_id', 'left');
        $this->db->join('tbl_zone', 'tbl_zone.zone_id = tbl_city.zone_id', 'left');
        $this->db->join('tbl_release', 'tbl_seize.seize_id = tbl_release.seize_id', 'left');
        $this->db->join('tbl_seize_depot', 'tbl_seize_depot.depot_id = tbl_seize.depot_id','left');

        // $this->db->where('tbl_city.zone_id',29);
        
        if($zone_id!=''){
            $this->db->where('tbl_city.zone_id',$zone_id);    
        }
        if($rm_id!=''){
            $this->db->where('tbl_city.rm_id',$rm_id);    
        }
        if($zm_id!=''){
            $this->db->where('tbl_zone.zhead_id',$zm_id);    
        }
        if($depot_id!=''){
            $this->db->where('depot_id',$depot_id);    
        }

        
        
        if($start_date!=''){
            $this->db->where('date(tbl_seize.time_stamp) >=',$start_date);
            $this->db->where('date(tbl_seize.time_stamp) <=',$end_date);  
        }

        

        if($status!=''){
            $this->db->where('tbl_seize.status',$status);
        }

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }


    public function get_all_service_data_by_search_criteria($zone_id='',$rm_id='',$zm_id='',$depot_id='', $start_date, $end_date){
        $this->db->select("tbl_service_inspection.*,tbl_zone.zone_name, tbl_zone.zhead_id, tbl_city.rm_id, tbl_release.dh_approval_time, tbl_seize_depot.depot_name, tbl_seize.tyre_quantity as s_tyre_quantity, tbl_seize.battery_condition as s_battery_condition, tbl_seize.gas_cylinder as s_gas_cylinder, tbl_seize.vehicle_condition as s_vehicle_condition, tbl_seize.softtop as s_softtop, tbl_seize.key_status as s_key_status, tbl_seize.status as s_status, tbl_seize_depot.daily_rent, tbl_resale.time_stamp as resale_time_stamp");
        $this->db->from('tbl_service_inspection');
        $this->db->join('tbl_resale', 'tbl_resale.resale_id = tbl_service_inspection.resale_id', 'left');
        $this->db->join('tbl_seize', 'tbl_seize.seize_id = tbl_service_inspection.seize_id', 'left');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_seize.city_id', 'left');
        $this->db->join('tbl_zone', 'tbl_zone.zone_id = tbl_city.zone_id', 'left');
        $this->db->join('tbl_release', 'tbl_seize.seize_id = tbl_release.seize_id', 'left');
        $this->db->join('tbl_seize_depot', 'tbl_seize_depot.depot_id = tbl_seize.depot_id','left');

        // $this->db->where('tbl_city.zone_id',29);
        
        if($zone_id!=''){
            $this->db->where('tbl_city.zone_id',$zone_id);    
        }
        if($rm_id!=''){
            $this->db->where('tbl_city.rm_id',$rm_id);    
        }
        if($zm_id!=''){
            $this->db->where('tbl_zone.zhead_id',$zm_id);    
        }
        if($depot_id!=''){
            $this->db->where('depot_id',$depot_id);    
        }

        
        
        if($start_date!=''){
            $this->db->where('date(tbl_seize.time_stamp) >=',$start_date);
            $this->db->where('date(tbl_seize.time_stamp) <=',$end_date);  
        }

        

        // if($status==9){
        //     $this->db->where('status',$status);
        // }elseif($status==30){
        //     $this->db->where('status !=',9);
        //     $this->db->where('status !=',8);
        // }
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }


}
?>
