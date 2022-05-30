<table id="datatable-buttons5" class="table table-striped table-bordered" >
<thead>
  <tr>
    <th>SN</th>
    <th>Zone</th>
    <th>Divisional Head</th>
    <th>Unit Head</th>
    <th>Resale Issuer</th>
    <th>Previous ID</th>
    <th>New Customer ID</th>
    <th>Engine No</th>
    <th>Chassis No</th>
    <th>Model</th>
    <th>Registratoin Zone</th>
    <th>Resale Id</th>
    <th>Sales Request Date</th>
    <th>Service Inspection Date</th>
    <th>Overall Vehicle Condition</th>
    <th>Sale Date</th>
    <th>Sale Mode</th>
    <th>Sale Value</th>
    <th>Downpayment</th>
    <th>Tenure</th>
    <th>Interest Rate</th>
    <th>SVD/Garage</th>
    <th>Status</th>
    
  </tr>
  </thead>
  <tbody>
  	<?php $i=1; foreach($resale_list as $value){?>
	<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php echo $value->zone_name; ?></td>
		<td><?php
			foreach ($employee_list as $emp_value) {
				if($emp_value->employee_id == $value->zhead_id){
					echo $emp_value->employee_name;	
				}
			}
		 	?>
		</td>

		<td><?php
			foreach ($employee_list as $emp_value) {
				if($emp_value->employee_id == $value->rm_id){
					echo $emp_value->employee_name;	
				}
			}
		 	?>
		</td>
		<td><?php
			foreach ($employee_list as $emp_value) {
				if($emp_value->employee_id == $value->user_id){
					echo $emp_value->employee_name;	
				}
			}
		 	?>
		</td>
		<td><?php echo $value->previous_customer_id; ?></td>
		<td><?php echo $value->resale_customer_id; ?></td>
		<td><?php echo $value->engine_no; ?></td>
		<td><?php echo $value->chassis_no; ?></td>

		<td><?php echo $value->model_name; ?></td>
		<td><?php
			foreach ($zone_list as $z_value) {
				if($z_value->zone_id == $value->registration_zone_id){
					echo $z_value->zone_name;	
				}
			}
		 	?>
		</td>
		<td><?php echo "000".$value->resale_id; ?></td>
		<td><?php echo $value->time_stamp; ?></td>
		
		
		
		<td><?php echo $value->service_inspection_time; ?></td>
		<td><?php echo $value->overall_vehicle_condition; ?></td>
		<td><?php echo $value->dc_update_time; ?></td>
		<td><?php echo $value->payment_mode; ?></td>
		<td><?php echo $value->resale_price; ?></td>
		<td><?php echo $value->downpayment; ?></td>
		<td><?php echo $value->period; ?></td>
		<td><?php echo $value->interest_rate; ?></td>
		<td><?php echo $value->depot_name; ?></td>
		<td>
			<?php 
				switch ($value->status) {
					case 1:
						echo 'Released';
						break;
					case 2:
						echo 'Sold';
						break;
					default:
						echo 'Under Seize';
						break;
				}
			?>
		</td>

	</tr>
	<?php }?>
  </tbody>
</table>
	
    	
      		
      	

  

	