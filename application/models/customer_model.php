<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Customer_Model extends CI_Model {

    public function get_all_customers_from_ms_db(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->limit(100);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }



    public function count_customers(){
        $this->db->select('customer_id');
        $this->db->from('tbl_customer');
        $result_query=$this->db->get();
        $result=$result_query->num_rows();
        return $result;
    }

    public function get_all_customers_with_offset($limit, $start){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->limit($limit, $start);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    

    public function get_all_customers_booking_data_by_search_criteria($zone_id='',$city_id='',$mkt_id='',$model_id='',$payment_mode='',$start_date='',$end_date='',$status){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if($zone_id!=''){
            $this->db->where('zone_id',$zone_id);    
        }
        if($city_id!=''){
            $this->db->where('city_id',$city_id);    
        }
        if($mkt_id!=''){
            $this->db->where('mkt_id',$mkt_id);    
        }
        if($model_id!=''){
            $this->db->where('model_id',$model_id);    
        }
        if($payment_mode!=''){
            $this->db->where('payment_mode',$payment_mode);    
        }
        
        if($start_date!=''){
            $this->db->where('STR_TO_DATE(time_stamp, "%Y-%m-%d") >=',$start_date);
            $this->db->where('STR_TO_DATE(time_stamp, "%Y-%m-%d") <=',$end_date);
        }
        if($status==9){
            $this->db->where('status',$status);
        }elseif($status==30){
            $this->db->where('status !=',9);
            $this->db->where('status !=',8);
        }
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_customers_sales_data_by_search_criteria($zone_id='',$city_id='',$district_id = '', $sub_district_id = '', $mkt_id='',$model_id='',$yard_id='',$payment_mode='',$start_date='',$end_date='',$status){
        $this->db->select('tbl_customer.*,tbl_district.district_name, tbl_sub_district.sub_district_name');
        $this->db->from('tbl_customer');
        if($zone_id!=''){
            $this->db->where('zone_id',$zone_id);    
        }
        if($city_id!=''){
            $this->db->where('city_id',$city_id);    
        }
       if($district_id!=''){
            $this->db->where('tbl_customer.district_id',$district_id);    
        }
        if($sub_district_id!=''){
            $this->db->where('tbl_customer.sub_district_id',$sub_district_id);    
        }
        if($mkt_id!=''){
            $this->db->where('mkt_id',$mkt_id);    
        }
        if($model_id!=''){
            $this->db->where('model_id',$model_id);    
        }
        if($yard_id!=''){
            $this->db->where('delivery_yard_id',$yard_id);    
        }
        if($payment_mode!=''){
            $this->db->where('payment_mode',$payment_mode);    
        }
        if($start_date!=''){
            $this->db->where('date(do_update_time) >=',$start_date);
            $this->db->where('date(do_update_time) <=',$end_date);
        }
        if($status!=''){
            $this->db->where('status',$status);
            if($status==8){
                $this->db->where('date(do_update_time) >=',$start_date);
                $this->db->where('date(do_update_time) <=',$end_date);  
            }else{
                $this->db->where('date(do_update_time) >=',$start_date);
                $this->db->where('date(do_update_time) <=',$end_date);  
            }  
        }else{
            $this->db->where('status >=',8);
            $this->db->where('status <=',9);
            $this->db->where('date(do_update_time) >=',$start_date);
            $this->db->where('date(do_update_time) <=',$end_date);  
        }
        $this->db->join('tbl_district','tbl_district.district_id = tbl_customer.district_id','left');
        $this->db->join('tbl_sub_district','tbl_sub_district.sub_district_id = tbl_customer.sub_district_id','left');


        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_customers_sales_data_for_call_center_by_search_criteria($yard_id='',$payment_mode='',$start_date='',$end_date=''){
        $this->db->select('tbl_customer.*,tbl_district.district_name, tbl_sub_district.sub_district_name');
        $this->db->from('tbl_customer');
        if($yard_id!=''){
            $this->db->where('delivery_yard_id',$yard_id);    
        }
        if($payment_mode!=''){
            $this->db->where('payment_mode',$payment_mode);    
        }
        if($start_date!=''){
            $this->db->where("date(do_update_time) >=", $start_date);
            $this->db->where("date(do_update_time) <=", $end_date);
        }
        // $this->db->where('tbl_customer.caller_id >',0);
        $this->db->join('tbl_district','tbl_district.district_id = tbl_customer.district_id','left');
        $this->db->join('tbl_sub_district','tbl_sub_district.sub_district_id = tbl_customer.sub_district_id','left');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    // public function get_all_customers_sales_data_for_call_center_by_search_criteria($zone_id='',$city_id='',$district_id = '', $sub_district_id = '', $mkt_id='',$model_id='',$yard_id='',$payment_mode='',$start_date='',$end_date='',$status){
    //     $this->db->select('tbl_customer.*,tbl_district.district_name, tbl_sub_district.sub_district_name');
    //     $this->db->from('tbl_customer');
    //     if($zone_id!=''){
    //         $this->db->where('zone_id',$zone_id);    
    //     }
    //     if($city_id!=''){
    //         $this->db->where('city_id',$city_id);    
    //     }
    //    if($district_id!=''){
    //         $this->db->where('tbl_customer.district_id',$district_id);    
    //     }
    //     if($sub_district_id!=''){
    //         $this->db->where('tbl_customer.sub_district_id',$sub_district_id);    
    //     }
    //     if($mkt_id!=''){
    //         $this->db->where('mkt_id',$mkt_id);    
    //     }
    //     if($model_id!=''){
    //         $this->db->where('model_id',$model_id);    
    //     }
    //     if($yard_id!=''){
    //         $this->db->where('delivery_yard_id',$yard_id);    
    //     }
    //     if($payment_mode!=''){
    //         $this->db->where('payment_mode',$payment_mode);    
    //     }
    //     if($start_date!=''){
    //         $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
    //         $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);
    //     }
    //     if($status!=''){
    //         $this->db->where('status',$status);
    //         if($status==8){
    //             $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
    //             $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);  
    //         }else{
    //             $this->db->where('STR_TO_DATE(dc_update_time, "%Y-%m-%d") >=',$start_date);
    //             $this->db->where('STR_TO_DATE(dc_update_time, "%Y-%m-%d") <=',$end_date);  
    //         }  
    //     }else{
    //         $this->db->where('status >=',8);
    //         $this->db->where('status <=',9);
    //         $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
    //         $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);  
    //     }
    //     $this->db->where('tbl_customer.caller_id >',0);
    //     $this->db->join('tbl_district','tbl_district.district_id = tbl_customer.district_id','left');
    //     $this->db->join('tbl_sub_district','tbl_sub_district.sub_district_id = tbl_customer.sub_district_id','left');


    //     $result_query=$this->db->get();
    //     $result=$result_query->result();
    //     return $result;
    // }

    
    public function count_all_customers_from_ms_db(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('COUNT(ComID) as count');
        $ms_db->from('Table00060');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_customers_booking_by_days($days){
        $formatted_days = 'P'.$days.'D';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $start_date = $date->format('Y-m-d');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('time_stamp >=',$start_date);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_customers_booking_by_months($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function count_sales_by_days($days){
        $formatted_days = 'P'.$days.'D';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $start_date = $date->format('Y-m-d');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('time_stamp >=',$start_date);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_sales_by_months($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function sold_models_by_month($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('COUNT(customer_id) as count, model_id, sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $this->db->group_by('model_id');
        $this->db->order_by('qty','desc');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function total_sold_quantity_by_current_month($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function total_sold_quantity_by_month($month){
        $year = date("Y");
        $this->db->select('sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(do_update_time) =',$month);
        $this->db->where('YEAR(do_update_time) =',$year);
        // $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function sold_within_current_month_by_zone($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('COUNT(customer_id) as count, zone_id, sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $this->db->group_by('zone_id');
        $this->db->order_by('qty','desc');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }



    public function get_customer_by_id($customer_id){
        $this->db->select('tbl_customer.*,tbl_model.*,tbl_dealer.dealer_name, tbl_employee.employee_name as zonal_head, tbl_city.city_name,tbl_district.district_name,tbl_sub_district.sub_district_name, tbl_application.application_detail, tbl_body_builder.body_builder_name');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_customer.city_id');
        $this->db->join('tbl_district','tbl_district.district_id = tbl_customer.district_id','left');
        $this->db->join('tbl_sub_district','tbl_sub_district.sub_district_id = tbl_customer.sub_district_id','left');
        $this->db->join('tbl_model','tbl_model.model_id = tbl_customer.model_id');
        $this->db->join('tbl_dealer','tbl_dealer.dealer_id = tbl_customer.dealer_id', 'left');
        $this->db->join('tbl_application','tbl_application.application_id = tbl_customer.application_id','left');
        $this->db->join('tbl_body_builder','tbl_body_builder.body_builder_id = tbl_customer.body_builder_id','left');
        $this->db->join('tbl_employee','tbl_employee.employee_id = tbl_customer.zhead_id','left');
        $this->db->where('customer_id',$customer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    

    public function get_customer_by_customer_id_and_user_id($customer_id,$user_id){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $this->db->where('user_id',$user_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }


    public function get_customers_status_by_id($customer_id){
        $this->db->select('customer_id, status');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function get_all_customers_id_from_ms_db(){
        
        $date = strtotime(date('Y-m-d'));
		$new_date = date("Y-m-d", strtotime("-3 month", $date));
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('CustCode, CustName, FathersName, MothersName, Phone');
        // $ms_db->select('CustCode, CustName, PermanentAddress, PresentAddress');
        $ms_db->from('Table00060');
        $ms_db->where('TDate >=',$new_date);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_customer_by_id_from_ms_db($customer_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->where('CustCode',$customer_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->limit(1000);
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_customers_by_status($status){
        $this->db->select('tbl_customer.*,tbl_registration.registration_cost, tbl_model.model_name, tbl_delivery_yards.yard_name');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_model','tbl_model.model_id = tbl_customer.model_id' , 'left');
        $this->db->join('tbl_delivery_yards','tbl_delivery_yards.delivery_yard_id = tbl_customer.delivery_yard_id' , 'left');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_customer.stock_id','left');
        $this->db->join('tbl_registration','tbl_registration.registration_id = tbl_stock.registration_id','left');
        $this->db->where('tbl_customer.status',$status);
        $this->db->limit(1000);
        $this->db->order_by('tbl_customer.time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    

    public function get_all_customers_by_head_of_sales_id($head_of_sales_id){
        $this->db->select('tbl_customer.*,tbl_zone.head_of_sales_id');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_customer.zone_id','inner');
        $this->db->where('tbl_zone.head_of_sales_id',$head_of_sales_id);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_customers_by_rm_id($rm_id){
        $this->db->select('tbl_customer.*,tbl_city.rm_id');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_customer.city_id','inner');
        $this->db->where('tbl_city.rm_id',$rm_id);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_customer_to_msdb($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('Table00060',$data);
        $result     =   $ms_db->insert_id();
        return $result;
    }

    public function add_customer($data){
        $this->db->insert('tbl_customer',$data);
        $result     =   $this->db->insert_id();
        return $result;
    }
    public function update_customer($data,$customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
        $result= $this->db->affected_rows();
        return $result;
    }
    public function update_customer_engine_and_chassis_no($customer_data, $customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$customer_data);
    }
    public function update_customer_status($customer_status, $customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$customer_status);
    }
    public function get_max_delivery_order_no(){
        $this->db->select_max('delivery_order_no');
        $this->db->from('tbl_customer');
        $result_query = $this->db->get();
        $result       = $result_query->row();
        return $result;
    }

    public function get_max_delivery_challan_no(){
        $this->db->select_max('delivery_challan_no');
        $this->db->from('tbl_customer');
        $result_query = $this->db->get();
        $result       = $result_query->row();
        return $result;
    }

    

    
    

    
    // public function get_company_by_id($company_id){
    //     $this->db->select('*');
    //     $this->db->from('tbl_company');
    //     $this->db->where('company_id',$company_id);
    //     $result_query=$this->db->get();
    //     $result=$result_query->row();
    //     return $result;
    // }
    
    // public function update_company($data,$company_id){
        
    //     $this->db->where('company_id',$company_id);
    //     $this->db->update('tbl_company',$data);
    // }

    // ------------------DATATABLES CODE-------------

      var $order_column = array("customer_id", "customer_name", "phone", null, null, null, null,null, null, null, null);  
      function make_query($user_id)  
      {  
           $this->db->select('*');  
           $this->db->from('tbl_customer');
           $this->db->where('user_id',$user_id);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("customer_name", $_POST["search"]["value"]);  
                $this->db->or_like("customer_id", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('customer_id', 'DESC');  
           }  
      }  
      function make_datatables($user_id){  
           $this->make_query($user_id);  
           if($this->input->post('length')!= -1)  
           {  
                $this->db->limit($this->input->post('length'), $this->input->post('start'));  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data($user_id){  
           $this->make_query($user_id);  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data($user_id)  
      {  
           $this->db->select("*");  
           $this->db->from('tbl_customer');
           $this->db->where('user_id',$user_id);  
           return $this->db->count_all_results();  
      } 


}
?>
