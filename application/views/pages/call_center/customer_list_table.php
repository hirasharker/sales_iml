<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>City <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-12 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>City List <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <!-- <p class="text-muted font-13 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
          </p> -->
          <div class="table-responsive" id="customerList">
          <table  class="table table-striped table-bordered" id="datatable-buttons5">
            <thead>
              <tr>
                <th>SN</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Present Address</th>
                <!-- <th>Permanent Address</th> -->
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
	      		<form method="post">
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><?php echo $value->customer_code; ?></td>			
					<td><?php echo $value->customer_name; ?></td>
					<td><?php echo $value->present_address; ?></td>
					<!-- <td><?php echo $value->permanent_address; ?></td> -->
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
							<option value="">Select Type of Complain </option>
							<?php foreach($feedback_type_list as $ft_value){ ?>
							<option value="<?php echo $ft_value->feedback_type_id ?>"><?php echo $ft_value->feedback_type_detail ?></option>	
							<?php } ?>
						</select>
						<a type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i></a>

					</td>
					<td><textarea name="customer_feedback" class="customer-feedback"></textarea></td>
					<td>
	                  <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id" class="customer-id">
	                  <!-- <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#005102" type="submit">Update</a> -->
	                  <!-- <button type="submit"  >Update</button> -->
	                  <input type="button" class="btn btn-primary updateFeedback" value="Update" >
	                  
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
  </div>
</div>
</div>








<!-- Small modal -->


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Add Type of Feedback</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" name="feedback_type_detail" id="feedbackTypeDetail">
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  	<select class="form-control" name="feedback_category" id="feedbackCategory">
                  		<option value="1">Complain</option>
                  		<option value="2">Feedback</option>
                  		<option value="3">Suggestion</option>
                  	</select>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" data-dismiss="modal" id="addFeedbackType">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- /modals -->
        
<script>
$(function() { 

  $("#addFeedbackType").click(function(){ 
      $('.feed_back_type_select').empty();
      
      var feedbackTypeDetail = $('#feedbackTypeDetail').val();
      var feedbackCategory = $('#feedbackCategory').val();
     
      $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>call_center/ajax_add_feedback_detail/",
              data: { 'feedback_type_detail': feedbackTypeDetail,
              		  'feedback_category': feedbackCategory, },
              success: function(data){
                  var opts = $.parseJSON(data);
                  // Use jQuery's each to iterate over the opts value
                  // $('#item').append('<option value="">Select Item</option>');
                  $.each(opts, function(i, d) {
                      // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      $('.feed_back_type_select').append('<option value="'+d.feedback_type_id+'">' +d.feedback_type_detail+ '</option>');
                  });
              }
          });
      $('.select-tag').select2({});
  });
}); 


$('#customerList').on('click', '.updateFeedback', function(e){ //Once remove button is clicked
    e.preventDefault();
    var customerFeedback = $(this).closest("tr").find(".customer-feedback").val();
    var feedbackTypeId = $(this).closest("tr").find(".feed_back_type_select").val();
    var customerId = $(this).closest("tr").find(".customer-id").val();
    // $($(this).closest("tr")).remove()
    var $tr = $(this).closest('tr');
    console.log(customerId);
    console.log(feedbackTypeId);
    console.log(customerFeedback);

      $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>call_center/ajax_update_customer_feedback/',
          data: {
              'customer_id': customerId,
              'feedback_type_id': feedbackTypeId,
              'customer_feedback': customerFeedback,
              // other data
          },
          success: function(data){
              // Parse the returned json data
              var resultSummary = $.parseJSON(data);

              if(resultSummary == 1){
              	$tr.remove();
              }
              console.log(resultSummary);
             // document.getElementById('sub-total').value = resultSummary.sub_total;
             // document.getElementById('discount-summary').value = resultSummary.discount;
             // document.getElementById('total-price').value = resultSummary.total_price;
          }
      });     //-----END AJAX FOR ADJUSTING SUBTOTAL
}); //create.on.............
</script>

