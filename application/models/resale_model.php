<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Resale_Model extends CI_Model {

    public function get_all_resales(){
       $this->db->select('*');
       $this->db->from('tbl_resale');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    

    public function get_resale_by_id($resale_id){
       $this->db->select('*');
       $this->db->from('tbl_resale');
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
        $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
        $this->db->where('tbl_resale.status',$status[0]);
        $this->db->or_where('tbl_resale.status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_resales_by_rm_id_and_status($rm_id, $status=array()){
        $this->db->select('tbl_resale.*,tbl_seize.customer_id, tbl_seize.time_stamp');
        $this->db->from('tbl_resale');
        $this->db->join('tbl_seize','tbl_seize.seize_id = tbl_resale.seize_id','left');
        // $this->db->where('tbl_resale.user_id')
        $this->db->where('tbl_resale.status',$status[0]);
        $this->db->or_where('tbl_resale.status',$status[1]);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
}
?>
