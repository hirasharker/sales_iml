<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Resale_Model extends CI_Model {

    public function get_all_resales(){
       $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp,  tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_resale.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    

    public function get_resale_by_id($resale_id){
       $this->db->select('tbl_resale.*, tbl_employee.employee_name as ro_name, tbl_seize.vehicle_condition, tbl_seize.tyre_quantity, tbl_seize.battery_condition, tbl_seize.gas_cylinder, tbl_seize.key_status, tbl_seize.softtop, tbl_seize.engine_no, tbl_seize.chassis_no, tbl_seize.time_stamp as seize_date, tbl_customer.customer_name as previous_customer_name, tbl_customer.phone');
       $this->db->from('tbl_resale');
       $this->db->join('tbl_employee','tbl_employee.employee_id = tbl_resale.ro_id','left');
       $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
       $this->db->join('tbl_customer','tbl_customer.customer_id = tbl_resale.previous_customer_id','left');
       $this->db->where('tbl_resale.resale_id', $resale_id);
       $result_query        =   $this->db->get();
       $result              =   $result_query->row();
       return $result;
    }

    public function get_resale_customer_by_resale_id($resale_id){
       $this->db->select('*');
       $this->db->from('tbl_resale_customer');
       $this->db->where('tbl_resale_customer.resale_id',$resale_id);
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
    

    public function add_resale($data){
        $this->db->insert('tbl_resale',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_resale($data,$resale_id){
        
        $this->db->where('resale_id',$resale_id);
        $this->db->update('tbl_resale',$data);
    }
   
    public function delete_resale($resale_id){
        $this->db->where('resale_id',$resale_id);
        $this->db->delete('tbl_resale');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_resale_like_name_and_id($keyword){
        $this->db->select('resale_id, resale_name, CONCAT(resale_id,("/"),resale_name) as resale_data');
        $this->db->like('resale_id', $keyword);
        $this->db->or_like('resale_name', $keyword);
        $query = $this->db->get('tbl_resale');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['resale_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }

    public function add_resale_customer($data){
        $this->db->insert('tbl_resale_customer',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    
    public function get_all_resales_by_status($status=array()){
        $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp,  tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_resale.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
        $this->db->where('tbl_resale.status',$status[0]);
        $this->db->or_where('tbl_resale.status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_resales_by_status_for_dh($status=array()){
        $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp,  tbl_stock.engine_no, tbl_stock.chassis_no, tbl_resale_customer.*');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_resale.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
        $this->db->join('tbl_resale_customer','tbl_resale_customer.resale_customer_id = tbl_resale.resale_customer_id','left');
        $this->db->where('tbl_resale.status',$status[0]);
        $this->db->or_where('tbl_resale.status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_resales_by_rm_id_and_status($rm_id, $status=array()){
        $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp, tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_resale.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
        // $this->db->where('tbl_resale.user_id')
        $this->db->where('tbl_resale.status',$status[0]);
        $this->db->or_where('tbl_resale.status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }



    //SERVICE inspection starts here...............

    public function add_service_inspection($data){
        $this->db->insert('tbl_service_inspection',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    public function get_service_inspection_by_resale_id($resale_id){
      $this->db->select('*');
      $this->db->from('tbl_service_inspection');
      $this->db->where('tbl_service_inspection.resale_id',$resale_id);
      $result_query        =   $this->db->get();
      $result              =   $result_query->row();
      return $result;
    }



    public function get_all_resale_data_by_search_criteria($zone_id='',$rm_id='',$zm_id='',$depot_id='', $status, $start_date, $end_date){
        $this->db->select("tbl_resale.*,tbl_zone.zone_name, tbl_zone.zhead_id, tbl_city.rm_id, tbl_stock.chassis_no, tbl_stock.engine_no, tbl_stock.registration_zone_id, tbl_stock.model_name, (tbl_customer.total_price - tbl_customer.discount) as resale_price, tbl_customer.payment_mode, tbl_customer.interest_rate, tbl_customer.period, tbl_customer.downpayment, tbl_customer.customer_id as resale_customer_id, tbl_customer.dc_update_time, tbl_seize_depot.depot_name, tbl_service_inspection.overall_vehicle_condition, tbl_service_inspection.time_stamp as service_inspection_time");
        $this->db->from('tbl_resale');
        $this->db->join('tbl_service_inspection', 'tbl_service_inspection.resale_id = tbl_resale.resale_id', 'left');
        $this->db->join('tbl_customer', 'tbl_customer.resale_id = tbl_resale.resale_id', 'left');
        $this->db->join('tbl_stock', 'tbl_stock.stock_id = tbl_resale.stock_id');
        $this->db->join('tbl_seize', 'tbl_seize.seize_id = tbl_resale.seize_id', 'left');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_resale.city_id', 'left');
        $this->db->join('tbl_zone', 'tbl_zone.zone_id = tbl_city.zone_id', 'left');
        $this->db->join('tbl_seize_depot', 'tbl_seize_depot.depot_id = tbl_seize.depot_id', 'left');

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
}
?>
