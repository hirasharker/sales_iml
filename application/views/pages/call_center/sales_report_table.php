<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Customer List <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"  >
          <!-- <p class="text-muted font-13 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
          </p> -->
          <table id="datatable-buttons5" class="table table-striped table-bordered" >
            <thead>
              <tr>
                <th>SN</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Present Address</th>
                <th>Permanent Address</th>
                <th>Phone</th>
                <th>Model</th>
                <th>Payment Mode</th>
                <th>DC Date</th>
                <th>Delivery Point</th>
                <th>Type of Complain</th>
                <th>Feedback</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody id="report-view">
              	<?php $i=1; foreach($customer_list as $value){?>
	      		<!-- <form action="<?php echo base_url(); ?>call_center/update_customer_feedback" method="post" target="_blank"> -->
	      		<form method="post" target="_blank">
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $value->customer_code; ?></td>			
					<td><?php echo $value->customer_name; ?></td>
					<td><?php echo $value->present_address; ?></td>
					<td><?php echo $value->permanent_address; ?></td>
					<td><?php echo $value->phone; ?></td>
					
					<td>
					<?php foreach($model_list as $m_value){if($m_value->model_id==$value->model_id){
							echo $m_value->model_name;
						}
					}?>
					</td>
					<td><?php 
	                        switch ($value->payment_mode){
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
					<td><?php echo $value->dc_update_time; ?></td>
					<td>
					<?php foreach($yard_list as $y_value){if($y_value->delivery_yard_id==$value->delivery_yard_id){
							echo $y_value->yard_name;
						}
					}?>
					</td>
					<td>
						<select class="form-control select-tag feed_back_type_select" name="feedback_type_id">
							<option>Select Type of Complain </option>
							<?php foreach($feedback_type_list as $ft_value){ ?>
							<option value="<?php echo $ft_value->feedback_type_id ?>"><?php echo $ft_value->feedback_type_detail ?></option>	
							<?php } ?>
						</select>
						<a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></a>

					</td>
					<td><textarea name="customer_feedback"></textarea></td>
					<td>
	                  <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
	                  <!-- <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#005102" type="submit">Update</a> -->
	                  <!-- <button type="submit"  >Update</button> -->
	                  	<input type="submit" class="btn btn-primary" value="Update" onclick="updateFeedback">
	                  
	              	</td>
				</tr>
				 </form>

				 
				<?php }?>
              </tbody>
          </table>
          
        </div>
      </div>
    </div>
 </div>