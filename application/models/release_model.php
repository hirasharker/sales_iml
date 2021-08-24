<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Release_Model extends CI_Model {

    public function get_all_releases(){
       $this->db->select('*');
       $this->db->from('tbl_release');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    public function get_release_by_id($release_id){
       $this->db->select('tbl_release.*, tbl_employee.employee_name as ro_name, tbl_seize.time_stamp as seize_date, tbl_customer.phone');
       $this->db->from('tbl_release');
       $this->db->join('tbl_employee','tbl_employee.employee_id = tbl_release.ro_id','left');
       $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_release.seize_id','left');
       $this->db->join('tbl_customer','tbl_customer.customer_id = tbl_release.customer_id','left');
       $this->db->where('tbl_release.release_id', $release_id);
       $result_query        =   $this->db->get();
       $result              =   $result_query->row();
       return $result;
    }


    
    public function add_release($data){
        $this->db->insert('tbl_release',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_release($data,$release_id){
        
        $this->db->where('release_id',$release_id);
        $this->db->update('tbl_release',$data);
    }
   
    public function delete_release($release_id){
        $this->db->where('release_id',$release_id);
        $this->db->delete('tbl_release');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_release_like_name_and_id($keyword){
        $this->db->select('release_id, release_name, CONCAT(release_id,("/"),release_name) as release_data');
        $this->db->like('release_id', $keyword);
        $this->db->or_like('release_name', $keyword);
        $query = $this->db->get('tbl_release');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['release_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }




    public function get_release_by_search_key($search_key){
        $this->db->select('tbl_release.*, tbl_customer.customer_name, tbl_customer.city_id, tbl_customer.zhead_id, tbl_customer.dealer_id, tbl_customer.release_status,tbl_customer.stock_id, tbl_city.rm_id, tbl_release_depot.depot_name');
        $this->db->from('tbl_release');
        $this->db->join('tbl_city', 'tbl_city.city_id = tbl_release.city_id', 'left');
        $this->db->join('tbl_customer','tbl_customer.customer_id = tbl_release.customer_id','left');
        $this->db->join('tbl_release_depot','tbl_release_depot.depot_id = tbl_release.depot_id','left');
        
        if(is_numeric($search_key)){
            $this->db->where('tbl_release.customer_id', $search_key);
            $this->db->or_where('tbl_release.engine_no', $search_key);
            $this->db->or_where('tbl_release.chassis_no', $search_key);
        }else {
            $this->db->where('tbl_release.engine_no', $search_key);
            $this->db->or_where('tbl_release.chassis_no', $search_key);
        }
        // $this->db->where('customer_id', $search_key);
        

        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }




    public function get_all_releases_by_status($status=array()){
        $this->db->select('tbl_release.*,tbl_seize.customer_id, tbl_seize.time_stamp,  tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_release');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_release.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_release.seize_id','left');
        $this->db->where('tbl_release.release_status',$status[0]);
        $this->db->or_where('tbl_release.release_status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_releases_by_status_for_dh($status=array()){
        $this->db->select('tbl_release.*,tbl_seize.customer_id, tbl_seize.time_stamp,  tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_release');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_release.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_release.seize_id','left');
        $this->db->where('tbl_release.release_status',$status[0]);
        $this->db->or_where('tbl_release.release_status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_releases_by_rm_id_and_status($rm_id, $status=array()){
        $this->db->select('tbl_release.*,tbl_seize.customer_id, tbl_seize.time_stamp, tbl_stock.engine_no, tbl_stock.chassis_no');
        $this->db->from('tbl_release');
        $this->db->join('tbl_stock','tbl_stock.stock_id = tbl_release.stock_id','left');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_release.seize_id','left');
        // $this->db->where('tbl_release.user_id')
        $this->db->where('tbl_release.release_status',$status[0]);
        $this->db->or_where('tbl_release.release_status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }




}
?>
