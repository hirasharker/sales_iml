    	
      		<table id="datatable-buttons5" class="table table-striped table-bordered" >
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Present Address</th>
                    <th>Phone</th>
                    <th>Model</th>
                    <th>Chassis No</th>
                    <th>Engine No</th>
                    <th>Price</th>
                    <th>Registration Fee</th>
                    <th>Sales Person</th>
                    <th>Dealer Name</th>
                    <th>Payment Mode</th>
                    <th>Downpayment</th>
                    <th>Interest Rate</th>
                    <th>Period</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                    <th>Co-ordinator</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($customer_list as $value){?>
                    <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $value->customer_code; ?></td>           
                        <td><?php echo $value->customer_name; ?></td>
                        <td><?php echo $value->present_address; ?></td>
                        <td><?php echo $value->phone; ?></td>
                        <td>
                        <?php foreach($model_list as $m_value){if($m_value->model_id==$value->model_id){
                            echo $m_value->model_name;
                            }}?>
                        </td>
                        <td><?php echo $value->chassis_no; ?></td>
                        <td><?php echo $value->engine_no; ?></td>
                        <td><?php echo $value->total_price; ?></td>
                        <td><?php echo $value->registration_cost; ?></td>
                        <td>
                            <?php foreach($employee_list as $e_value){if($e_value->employee_id==$value->mkt_id){
                                echo $e_value->employee_name;
                                }}?>
                        </td>
                        <td>
                            <?php foreach($dealer_list as $d_value){if($d_value->dealer_id == $value->dealer_id){ 
                                echo $d_value->dealer_name; 
                                }}?>
                        </td>
                        <td>
                        <?php switch ($value->payment_mode) {
                            case 1:
                                echo 'Credit';
                                break;
                            case 2:
                                echo 'Semi-Cash';
                                break;
                            case 3:
                                echo 'Cash';
                                break;
                            case 4:
                                echo 'Corporate';
                                break;
                            default:
                                break;
                        }?>
                        </td>
                        <td><?php echo $value->downpayment; ?></td>
                        <td><?php echo $value->interest_rate; ?></td>
                        <td><?php echo $value->period; ?></td>
                        <td><?php echo $value->time_stamp; ?></td>
                        <td><?php 
                          switch ($value->status){
                            case 0:
                            echo "Waiting for approval of Zonal Head";
                            break;
                            case 1:
                            echo "Waiting for approval of Head of Sales";
                            break;
                            case 2:
                            echo "Waiting for address and history verification";
                            break;
                            case 3:
                            echo "Waiting for history verification";
                            break;
                            case 4:
                            echo "Waiting for address verification";
                            break;
                            case 19:
                            echo "Address verification temporary heldup";
                            break;
                            case 5:
                            echo "Waiting for accounts clearence";
                            break;
                            case 6:
                            echo "Waiting for Documents";
                            break;
                            case 7:
                            echo "Waiting for Printing DO";
                            break;
                            case 8:
                            echo "Waiting for Delivery Challan";
                            break;
                            case 9:
                            echo "Delivered";
                            break;
                            case 11:
                            echo "Denied by Zonal Head!";
                            break;
                            case 12:
                            echo "Denied by Head of Sales!";
                            break;
                            case 13:
                            echo "Address Verification Failed!";
                            break;
                            case 14:
                            echo "History Verification Failed!";
                            break;
                            case 15:
                            echo "Payment Verification Failed!";
                            break;
                            case 16:
                            echo "Document Verification Failed!";
                            break;
                            case 25:
                            echo "Canceled!";
                            break;
                            default:
                            break;
                          }
                        ?></td>
                        <td>
                            <?php foreach($employee_list as $e_value){if($e_value->employee_id==$value->coordinator_id){
                                echo $e_value->employee_name;
                            }}?>
                            
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>

            
      	

  

	