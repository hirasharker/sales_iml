<table id="datatable-buttons5" class="table table-striped table-bordered" >
<thead>
  <tr>
    <th>SN</th>
    <th>Seized Date</th>
    <th>Release Date</th>
    <th>Zone</th>
    <th>Recovery Officer</th>
    <th>Unit Head</th>
    <th>Divisional Head</th>
    <th>Customer ID</th>
    <th>Customer Name</th>
    <th>Garaze/SVD Name</th>
    <th>Engine No</th>
    <th>Chassis No</th>
    <th>Seize Period(till given date)</th>
    
    <th>Seize Period (Days)</th>
    <th>Seized Cost</th>
    <th>Garaze Rent (Per Day)</th>
    <th>Status</th>
    
  </tr>
  </thead>
  <tbody>
  	<?php $i=1; foreach($seize_list as $value){?>
	<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php echo $value->time_stamp; ?></td>			
		<td><?php echo $value->dh_approval_time; ?></td>
		<td><?php echo $value->zone_name; ?></td>
		<td><?php
			foreach ($employee_list as $emp_value) {
				if($emp_value->employee_id == $value->user_id){
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
				if($emp_value->employee_id == $value->zhead_id){
					echo $emp_value->employee_name;	
				}
			}
		 	?>
		</td>
		<td><?php echo $value->customer_id; ?></td>
		<td><?php echo $value->customer_name; ?></td>
		<td><?php echo $value->depot_name; ?></td>
		<td><?php echo $value->engine_no; ?></td>
		<td><?php echo $value->chassis_no; ?></td>
		<td>
			<?php if ($value->dh_approval_time == NULL){ 
			 echo $value->seize_period_till_report_date;
			}elseif (strtotime($value->dh_approval_time) > strtotime($end_date) ){
				$seize_date = new DateTime($value->time_stamp);
			 	$report_date = new DateTime($end_date);
			 	$interval = date_diff($seize_date,$report_date);
			 	echo $interval->format('%d');
			 }else{
			 	$seize_date = new DateTime($value->time_stamp);
			 	$report_date = new DateTime($value->dh_approval_time);
			 	$interval = date_diff($seize_date,$report_date);
			 	echo $interval->format('%d');
			 } ?>
		</td>
		<td>
			<?php if ($value->dh_approval_time == NULL){ 
			 echo $value->seize_period;
			 }else{
			 	$seize_date = new DateTime($value->time_stamp);
			 	$report_date = new DateTime($value->dh_approval_time);
			 	$interval = date_diff($seize_date,$report_date);
			 	echo $interval->format('%d');
			 } ?>
		</td>
		<td><?php echo $value->seize_cost; ?></td>
		<td><?php echo $value->daily_rent; ?></td>
		<td><?php echo $value->status; ?></td>

	</tr>
	<?php }?>
  </tbody>
</table>
	
    	
      		
      	

  

	