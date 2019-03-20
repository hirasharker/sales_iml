
		<table >
					<tr>
						<td>Name</td>
						<td><?php echo $customer_detail->customer_name; ?></td>
					</tr>
					<tr>
						<td>Present Address</td>
						<td><?php echo $customer_detail->present_address; ?></td>
					</tr>
					<tr>
						<td>Permanent Address</td>
						<td><?php echo $customer_detail->permanent_address; ?></td>
					</tr>
					<tr>
						<td>Model</td>
						<td><?php echo $model_detail->model_name; ?></td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><?php echo $customer_detail->phone; ?></td>
					</tr>
					<tr>
						<td><a href="<?php echo base_url();?>">Click here for detail...</a></td>
						<td><?php echo base_url();?></td>
					</tr>
        </table>

	