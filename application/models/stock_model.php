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
}
?>
