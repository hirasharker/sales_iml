<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Stock_Model extends CI_Model {


    public function get_chassis_and_engine_no_from_msdb(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        // $ms_db->select('ChassisNo');
        // // $ms_db->select('CustCode, CustName, PermanentAddress, PresentAddress');
        // $ms_db->from('TBLSTCUNI1007210');
        // $ms_db->where('TDate >','2017-07-01');
        // $ms_db->where('TranType','SIU');
        // $result_query = $ms_db->get();
        // $result=$result_query->result();

        // $result_array       =   array();
        // $i=0;
        // foreach($result as $value){
        //     $result_array[$i]= $value->ChassisNo;
        //     $i++;
        // }
        $ms_db->select('ChassisNo, max(EngineNo) as EngineNo, sum(Qty) as Quantity');
        $ms_db->from('TBLSTCUNI1007210');
        $ms_db->where('TDate >=','2010-01-01');
       
        $ms_db->where('TranType','PIU');
        $ms_db->or_where('TranType','SIU');
        $ms_db->group_by('ChassisNo');
        $ms_db->having('sum(Qty)=',1);
        $result_query=$ms_db->get();
        $result=$result_query->result();

        return $result;
    }

    

    public function get_stock_summary(){
        $this->db->select('tbl_stock.yard_id, count(tbl_stock.chassis_no) as total_vehicle');
        $this->db->from('tbl_stock');
        $this->db->where('stock_position <', 4);
        $this->db->group_by('tbl_stock.yard_id');

        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function get_stock_by_id($stock_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('stock_id',$stock_id);
        $result_query        =   $this->db->get();
        $result              =   $result_query->row();
        return $result;
    }

    public function get_current_dealer_stock_by_dealer_id($dealer_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('dealer_id',$dealer_id);
        $this->db->where('stock_position <', 8);
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }


    public function get_stock_by_yard_id($yard_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('yard_id',$yard_id);
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function get_current_stock_by_yard_id($yard_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('yard_id',$yard_id);
        $this->db->where('stock_position <=',3);
        $this->db->where('stock_position >',0);
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }
    
    public function get_stock_by_dealer_id($dealer_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('dealer_id',$dealer_id);
        $this->db->where('customer_id',NULL);
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function get_stock_by_yard_id_for_issue($yard_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('yard_id',$yard_id);
        $this->db->where('issued_id IS NULL');
        $this->db->where('registration_id IS NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function get_stock_by_yard_id_and_zone_id_for_issue($yard_id, $zone_id){
        $this->db->select('tbl_stock.*');
        $this->db->from('tbl_stock');
        $this->db->where('tbl_stock.yard_id',$yard_id);
        $this->db->where('tbl_stock.issued_id IS NULL');
        $this->db->where('tbl_stock.registration_approval_time IS NOT NULL');
        $this->db->where('tbl_stock.registration_zone_id',$zone_id);
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    
    public function get_stock_by_yard_id_for_registration($yard_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('yard_id',$yard_id);
        $this->db->where('registration_id IS NULL');
        $this->db->where('issued_id IS NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function check_stock_for_duplicate_registration($chassis_no){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('chassis_no',$chassis_no);
        $this->db->where('registration_id IS NOT NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->row();
        return $result;
    }

    public function check_stock_for_duplicate_issue($chassis_no){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('chassis_no',$chassis_no);
        $this->db->where('issued_id IS NOT NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->row();
        return $result;
    }

    public function get_stock_by_dealer_id_for_booking($dealer_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('dealer_id',$dealer_id);
        $this->db->where('customer_id IS NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }
    
    public function get_stock_by_chassis_no($chassis_no){
        $this->db->select('tbl_stock.*,tbl_model.model_code, tbl_model.credit_price, tbl_registration.registration_cost');
        $this->db->from('tbl_stock');
        $this->db->join('tbl_model','tbl_model.model_id = tbl_stock.model_id');
        $this->db->join('tbl_registration','tbl_registration.registration_id = tbl_stock.registration_id','left');
        $this->db->where('chassis_no',$chassis_no);
        $result_query        =   $this->db->get();
        $result              =   $result_query->row();
        return $result;
    }

    public function get_all_stocks(){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    public function get_all_stocks_for_isssue(){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('issued_id IS NULL');
        $result_query        =   $this->db->get();
        $result              =   $result_query->result();
        return $result;
    }

    
    public function add_stock($data){
        $this->db->insert('tbl_stock',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_stock($data,$stock_id){
        $this->db->where('stock_id',$stock_id);
        $this->db->update('tbl_stock',$data);
        $result= $this->db->affected_rows();
        return $result;
    }

    public function update_stock_by_chassis_no($data,$chassis_no){
        $this->db->where('chassis_no',$chassis_no);
        $this->db->update('tbl_stock',$data);
        $result= $this->db->affected_rows();
        return $result;
    }
   
    public function delete_stock($stock_id){
        $this->db->where('stock_id',$stock_id);
        $this->db->delete('tbl_stock');
    }
    


    public function get_all_stock_data_by_search_criteria($zone_id = '', $model_id = '', $yard_id = '' , $bank_id = '', $dealer_id = '', $status){
        $this->db->select('tbl_stock.*,tbl_received.lc_no, tbl_received.container_no, tbl_received.received_date,tbl_received.bank_id, tbl_model.model_name, tbl_zone.zone_name, tbl_delivery_yards.yard_name, tbl_customer.time_stamp as booking_date');
        $this->db->from('tbl_stock');
        if($zone_id!=''){
            $this->db->where('tbl_stock.registration_zone_id',$zone_id);    
        }
        if($model_id!=''){
            $this->db->where('tbl_model.model_id',$model_id);    
        }
        if($yard_id!=''){
            $this->db->where('tbl_delivery_yards.delivery_yard_id',$yard_id);    
        }
        if($bank_id!=''){
            $this->db->where('bank_id',$bank_id);    
        }

        if($dealer_id!=''){
            $this->db->where('tbl_stock.dealer_id',$dealer_id);    
        }

        if($status!=''){
            if($status == 100){
                $this->db->where('tbl_stock.stock_position <=', 3);
            }else {
                $this->db->where('tbl_stock.stock_position',$status);  
            }
        }

        // if($status!=''){
        //     $this->db->where('status',$status);
        //     if($status==8){
        //         $this->db->where('date(do_update_time) >=',$start_date);
        //         $this->db->where('date(do_update_time) <=',$end_date);  
        //     }else{
        //         $this->db->where('date(do_update_time) >=',$start_date);
        //         $this->db->where('date(do_update_time) <=',$end_date);  
        //     }  
        // }else{
        //     $this->db->where('status >=',8);
        //     $this->db->where('status <=',9);
        //     $this->db->where('date(do_update_time) >=',$start_date);
        //     $this->db->where('date(do_update_time) <=',$end_date);  
        // }
        $this->db->join('tbl_received','tbl_received.received_id = tbl_stock.received_id','left');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_stock.registration_zone_id','left');
        $this->db->join('tbl_model','tbl_model.model_id = tbl_stock.model_id','left');
        $this->db->join('tbl_customer','tbl_customer.chassis_no = tbl_stock.chassis_no','left');
        $this->db->join('tbl_delivery_yards','tbl_delivery_yards.delivery_yard_id = tbl_stock.yard_id');

        // $this->db->join('tbl_dealer','tbl_model.model_id = tbl_stock.model_id','left');


        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
}
?>
