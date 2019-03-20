
	<table>
		<?php foreach($customer_list as $value){ ?>
		<tr>
			<td><?php echo $value->customer_id; ?></td>
		</tr>
	<?php } ?>
		
	</table>
	<p><?php echo $links; ?></p>
