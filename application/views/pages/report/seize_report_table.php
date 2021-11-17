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
    <th>Seize Period (Days)</th>
    <th>Seized Cost</th>
    <th>Garaze Rent (Per Day)</th>
    <th>Total Rent</th>
    <th>Status</th>
    
  </tr>
  </thead>
  <tbody>
  	<?php $i=1; foreach($seize_list as $value){?>
	<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php echo $value->time_stamp; ?></td>			
		<td></td>
		<td></td>
		<td><?php echo $value->user_id; ?></td>
		<td></td>
		<td></td>
		<td><?php echo $value->customer_id; ?></td>
		<td><?php echo $value->customer_name; ?></td>
		<td><?php echo $value->depot_id; ?></td>
		<td><?php echo $value->engine_no; ?></td>
		<td><?php echo $value->chassis_no; ?></td>
		<td></td>
		<td><?php echo $value->seize_cost; ?></td>
		<td></td>
		<td></td>
		<td><?php echo $value->status; ?></td>

	</tr>
	<?php }?>
  </tbody>
</table>
	
    	
      		
      	

  

	