<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Stock_Return_Model extends CI_Model {

    public function get_all_returns(){
       $this->db->select("tbl_stock_return.*, string_agg(tbl_stock_return_detail.engine_no, ', ') as engine_no, string_agg(tbl_stock_return_detail.chassis_no, ', ') as chassis_no, string_agg(tbl_dealer.dealer_name, ', ') as dealer_name, tbl_dealer.dealer_name");
       $this->db->from('tbl_stock_return');
       $this->db->join('tbl_dealer','tbl_dealer.dealer_id = tbl_stock_return.dealer_id','inner');
       $this->db->join('tbl_stock_return_detail','tbl_stock_return_detail.returned_id = tbl_stock_return.returned_id','inner');
       $this->db->group_by('tbl_stock_return.returned_id, tbl_dealer.dealer_name');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }
   
    public function get_return_by_id($returned_id){
        $this->db->select('*');
        $this->db->from('tbl_stock_return');
        $this->db->where('returned_id',$returned_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_stock_return_data($data){
        $this->db->insert('tbl_stock_return',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    public function add_stock_return_detail($data){
        $this->db->insert('tbl_stock_return_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_return($data,$returned_id){
        
        $this->db->where('returned_id',$returned_id);
        $this->db->update('tbl_stock_return',$data);
    }
   
    public function delete_return($stock_return_id){
        $this->db->where('stock_return_id',$stock_return_id);
        $this->db->delete('tbl_stock_return');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_return_like_name_and_id($keyword){
        $this->db->select('return_id, return_name, CONCAT(return_id,("/"),return_name) as return_data');
        $this->db->like('return_id', $keyword);
        $this->db->or_like('return_name', $keyword);
        $query = $this->db->get('tbl_stock_return');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['return_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
