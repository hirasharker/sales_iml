public function get_all_registrations(){
       $this->db->select('*');
       $this->db->from('tbl_registration');
       $result_query        =   $this->db->get();
       $result              =   $result_query->result();
       return $result;
    }

    
    public function add_registration($data){
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
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_registration_like_name_and_id($keyword){
        $this->db->select('registration_id, registration_name, CONCAT(registration_id,("/"),registration_name) as registration_data');
        $this->db->like('registration_id', $keyword);
        $this->db->or_like('registration_name', $keyword);
        $query = $this->db->get('tbl_registration');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['registration_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }