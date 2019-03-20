
	
    		<?php $i=1; ?>
			<tr>
				<td><?php echo $i; $i++; ?></td>
				<td><?php echo $customer_detail->customer_code; ?></td>			
				<td><?php echo $customer_detail->customer_name; ?></td>
				<td>
					<?php foreach($city_list as $c_value){ if($c_value->city_id == $customer_detail->city_id){
							echo $c_value->city_name;
						}
					}?>
				</td>
				<td><?php echo $customer_detail->phone; ?></td>
				
				<td>
				<?php foreach($model_list as $m_value){if($m_value->model_id==$customer_detail->model_id){
						echo $m_value->model_name;
					}
				}?>
				</td>
				<td><?php echo $customer_detail->total_price-$customer_detail->discount; ?></td>
				<td><?php echo $customer_detail->downpayment; ?></td>
				<td>
				<?php foreach($employee_list as $em_value){if($em_value->employee_id==$customer_detail->mkt_id){
						echo $em_value->employee_name;
				}
				}?>
				</td>
				<td>
				<?php foreach($dealer_list as $dlr_value){if($dlr_value->dealer_id==$customer_detail->dealer_id){
						echo $dlr_value->dealer_name;
				}
				}?>
				</td>
				<td>
				<?php foreach($employee_list as $em_value){if($em_value->employee_id==$customer_detail->sales_generated_by){
						echo $em_value->employee_name;
				}
				}?>
				</td>
				<td><?php 
                        switch ($customer_detail->payment_mode){
                            case 1:
                            echo "Credit";
                            break;
                            case 2:
                            echo "Semi Cash";
                            break;
                            case 3:
                            echo "Cash";
                            break;
                            default:
                            break;
                        }
                    ?>
                </td>

				<td>
					<form action="<?php echo base_url(); ?>customer/customer_detail" method="post" target="_blank">
                      <input type="hidden" value="<?php echo $customer_detail->customer_id; ?>" name="customer_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#005102"><i class="fa fa-edit" aria-hidden="true" ></i>detail</a>
                  </form>
              	</td>

			</tr>
      	

  

	