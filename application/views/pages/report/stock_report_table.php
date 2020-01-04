			<table id="datatable-buttons5" class="table table-striped table-bordered" >
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Chassis No</th>
                  <th>Engine No</th>
                  <th>Bank Name</th>
                  <th>LC NO</th>
                  <th>Container NO</th>
                  <th>Model</th>
                  <th>Stock Yard</th>
                  <th>Registration Zone</th>
                  <th>Dealer</th>
                  <th>Received Date</th>
                  <th>Issue Date</th>
                </tr>
                </thead>
                <tbody>
                	<?php $i=1; foreach($stock_list as $value){?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $value->chassis_no; ?></td>			
							<td><?php echo $value->engine_no; ?></td>
							<td>
								<?php foreach ($bank_list as $b_value) {
									if($b_value->bank_id == $value->bank_id){
										echo $b_value->bank_name;
									}
								} ?>
							</td>
							<td><?php echo $value->lc_no; ?></td>
							<td><?php echo $value->container_no; ?></td>
							<td><?php echo $value->model_name; ?></td>
							<td><?php echo $value->yard_name; ?></td>
							<td><?php echo $value->zone_name; ?></td>

							<td>
								<?php foreach ($dealer_list as $d_value) {
									if($d_value->dealer_id == $value->dealer_id){
										echo $d_value->dealer_name;
									}
								} ?>
							</td>
							<td><?php echo $value->received_date; ?></td>
							<td><?php echo $value->issue_date; ?></td>

						</tr>
					<?php }?>
                </tbody>
            </table>
	
    	
      		
      	

  

	