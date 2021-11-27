<table id="datatable-buttons5" class="table table-striped table-bordered" >
<thead>
  <tr>
    <th>SN</th>
    <th>Resale ID</th>
    <th>Resale Request Date</th>
    <th>Garaze/SVD Name</th>
    <th>Engine No</th>
    <th>Chassis No</th>
    <th>Tyre Quantity (R)</th>
    <th>Tyre Quantity (S)</th>
    <th>Battery Condition (R)</th>
    <th>Battery Condition (S)</th>
    <th>Gas Cylinder (R)</th>
    <th>Gas Cylinder (S)</th>
    <th>Key (R)</th>
    <th>Key (S)</th>
    <th>Vehicle Condition (R)</th>
    <th>Vehicle Condition (S)</th>
    <th>Soft-Top (R)</th>
    <th>Soft-Top (S)</th>
    <th>Tyre Condition</th>
    <th>Engine Condition</th>
    <th>Wind Shield</th>
    <th>Self Starter</th>
    <th>Ignition Switch</th>
    <th>Body Condition</th>
    <th>Denting/Painting</th>
    <th>Status</th>
    
  </tr>
  </thead>
  <tbody>
  	<?php $i=1; foreach($seize_list as $value){?>
	<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php echo $value->seize_id; ?></td>
		<td><?php echo $value->resale_time_stamp; ?></td>			
		
		<td><?php echo $value->depot_name; ?></td>
		<td><?php echo $value->engine_no; ?></td>
		<td><?php echo $value->chassis_no; ?></td>

		<td><?php echo $value->s_tyre_quantity; ?></td>
		<td><?php echo $value->tyre_quantity; ?></td>
		<td><?php echo strtoupper($value->s_battery_condition); ?></td>
		<td><?php echo strtoupper($value->battery_condition); ?></td>
		<td><?php echo strtoupper($value->s_gas_cylinder); ?></td>
		<td><?php echo strtoupper($value->gas_cylinder); ?></td>
		<td><?php echo strtoupper($value->s_key_status); ?></td>
		<td><?php echo strtoupper($value->key_status); ?></td>
		<td><?php echo strtoupper($value->s_vehicle_condition); ?></td>
		<td><?php echo strtoupper($value->overall_vehicle_condition); ?></td>
		<td><?php echo strtoupper($value->s_softtop); ?></td>
		<td><?php echo strtoupper($value->softtop); ?></td>
		<td><?php echo strtoupper($value->tyre_condition); ?></td>
		<td><?php echo strtoupper($value->engine_condition); ?></td>
		<td><?php echo strtoupper($value->wind_shield_glass); ?></td>
		<td><?php echo strtoupper($value->self_starter); ?></td>
		<td><?php echo strtoupper($value->ignition_switch); ?></td>
		<td><?php echo strtoupper($value->body_condition); ?></td>
		<td><?php echo strtoupper($value->denting_painting); ?></td>
		<td>
			<?php 
				switch ($value->s_status) {
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
	
    	
      		
      	

  

	