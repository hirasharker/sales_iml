
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Sales Report <small></small></h3>
    </div>

    <div class="title_right">
      
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="height:auto">
            <br />
            <!-- <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>report/generate_booking_report/" enctype='multipart/form-data'> -->
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>call_center/view_customer_list" enctype='multipart/form-data' target="_blank">

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Yard </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="yardId" class="form-control select-tag" name="yard_id" >
                        <option value="">Any</option>
                        <?php foreach($yard_list as $value){?> 
                        <option value="<?php echo $value->delivery_yard_id; ?>"><?php echo $value->yard_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Mode </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="paymentMode" class="form-control select-tag" name="payment_mode" >
                      <option value="">Any</option>
                      <option value="1">Credit</option>
                      <option value="2">Semi Cash</option>
                      <option value="3">Cash</option>
                      <option value="4">Corporate</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Date </label>
                  <div id="reportrange_right" class="pull-left col-md-9 col-sm-9 col-xs-12" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" >
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span name="date">Click here to select range</span> <b class="caret"></b>
                    <input id="date" type="hidden" name="date" />
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                  <button id="" class="btn btn-success" type="submit">Generate</button>
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                </div>
              </form>
                
               
                
                <div class="clearfix"></div>
                <br />
            <!-- </form> -->
            </div>
        </div>
        </div>
  </div>

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
              </tbody>
          </table>
          
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" data-dismiss="modal" id="addFeedbackType">Submit</button>
      </div>

    </div>
  </div>
</div>
<!-- /modals -->


<script type="text/javascript">
  $("#districtId").change(function(){
      // $('#subDistrictId').val('');
      // $('#subDistrictId').change();
      if($('#districtId').val()!="NULL"){
        $('#subDistrictId').empty();
        $(".sub-district-container").css("display", "block");
        // $('.sub-district-container').show(500);
      }
      var districtId = $('#districtId option:selected').val();
      $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>customer/ajax_generate_sub_districts/",
          data: { 'district_id': districtId  },
          success: function(data){
              // Parse the returned json data
              var opts = $.parseJSON(data);
              // Use jQuery's each to iterate over the opts value
              $('#subDistrictId').append('<option value="">Select </option>');

              $.each(opts, function(i, d) {
                  // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                  $('#subDistrictId').append('<option value="' + d.sub_district_id + '">' + d.sub_district_name + '</option>');

              });
          }
      });
  });
</script>
<script>
  $(function() { 
      $("#reference").change(function(){ 
          var element = $(this).find('option:selected'); 
          var customerName = element.attr("customerName");
          var fatherName = element.attr("fatherName");
          var motherName = element.attr("motherName");
          var permanentAddress = element.attr("permanentAddress");
          var presentAddress = element.attr("presentAddress");

          // $('#permanentAddress').val(permanentAddress);
          // $('#presentAddress').val(presentAddress);
          
          if($("#reference").val()!="NULL"){
            $('#customerName').val(customerName);
            $('#fatherName').val(fatherName);
            $('#motherName').val(motherName);
            $('#phone').prop('disabled', true);
            $('#permanentAddress').prop('disabled', true);
            $('#presentAddress').prop('disabled', true);
          }else{
            $('#customerName').val("");
            $('#fatherName').val("");
            $('#motherName').val("");
            $('#phone').prop('disabled', false);
            $('#permanentAddress').prop('disabled', false);
            $('#presentAddress').prop('disabled', false);
          }
            
      });
      $("#zoneId").change(function(){ 
          var element = $(this).find('option:selected'); 

          $('#cityId').empty();
          var dropDown = document.getElementById("zoneId");
          var zoneId = dropDown.options[dropDown.selectedIndex].value;
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>report/get_city_list_ajax/",
                  data: { 'zoneId': zoneId  },
                  success: function(data){
                      // Parse the returned json data
                      var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                      $('#cityId').append('<option value="">Any</option>');
                      $.each(opts, function(i, d) {
                          // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                          $('#cityId').append('<option value="' + d.city_id + '">' + d.city_name + '</option>');
                      });
                  }
              });
      });

      $("#cityId").change(function(){ 
          var element = $(this).find('option:selected'); 
          
          $('#salesPerson').empty();
          var dropDown = document.getElementById("cityId");
          var cityId = dropDown.options[dropDown.selectedIndex].value;
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>customer/get_sales_person/",
                  data: { 'cityId': cityId  },
                  success: function(data){
                      // Parse the returned json data
                      var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                      $('#salesPerson').append('<option value="">Any</option>');
                      $.each(opts, function(i, d) {
                          // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                          $('#salesPerson').append('<option value="' + d.employee_id + '">' + d.employee_name + '</option>');
                      });
                  }
              });
      });
      $("#vehicleModel").change(function(){ 
          var element = $(this).find('option:selected'); 
          var modelCode = element.attr("modelCode");
          var totalPrice = element.attr("creditPrice");
          
          $('#modelCode').val(modelCode);
          $('#total-price').val(totalPrice);

      });
      $("#paymentMode").change(function(){ 
          var element = $(this).find('option:selected'); 
          if($("#paymentMode").val()==3){
            $('#period').prop('disabled', true);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', true);
          } else if($("#paymentMode").val()==4){
            $('#period').prop('disabled', true);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', true);
          } else if ($("#paymentMode").val()==2){
            $('#period').prop('disabled', false);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', false);
          } else{
            $('#period').prop('disabled', false);
            $('#totalPrice').prop('disabled', false);
            $('#downPayment').prop('disabled', false);
            $('#interestRate').prop('disabled', false);
          }
          
          // $('#zoneId').val(zoneId);
      });

      $("#reset").click(function(){
          $('#permanentAddress').prop('disabled', false);
          $('#presentAddress').prop('disabled', false);
          $('#period').prop('disabled', false);
          $('#interestRate').prop('disabled', false);
          $('#discount').prop('disabled', false);
          $("#paymentMode").val("1").change();
          $("#reference").val("NULL").change();
      });

      $("#generate").click(function(){ 
          $('#report-view').html('');

          
          var zoneId = $('#zoneId').val();
          var cityId = $('#cityId').val();
          var districtId = $('#districtId').val();
          var subDistrictId = $('#subDistrictId').val();
          var mktId  = $('#salesPerson').val();
          var modelId= $('#vehicleModel').val();
          var yardId = $('#yardId').val();
          var paymentMode = $('#paymentMode').val();
          var date   = $('#date').val();
          var status =  9;
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>call_center/generate_delivered_customer_list/",
                  data: { 'zone_id': zoneId, 'city_id' : cityId, 'district_id' : districtId, 'sub_district_id' : subDistrictId, 'mkt_id' : mktId, 'model_id': modelId,'yard_id': yardId, 'payment_mode': paymentMode, 'date': date, 'status' : status  },
                  success: function(data){
                      // Parse the returned json data
                      var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                      $('#report-view').html(opts);

                      var table = $("#datatable-buttons5").DataTable({
                      dom: "Bfrtip",
                      buttons: [
                      {
                        extend: "copy",
                        className: "btn-sm"
                      },
                      {
                        extend: "csv",
                        className: "btn-sm"
                      },
                      {
                        extend: "excel",
                        className: "btn-sm"
                      },
                      {
                        extend: 'pdf',
                        className: "btn-sm",
                        messageBottom: null
                      },
                      {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                      },
                      {
                        extend: "print",
                        className: "btn-sm"
                      },
                      ],
                      responsive: true,
                      retrieve: true,
                      destroy: true,
                      paging: true
                    });

                   

                  }
              });
          
      });


      $("#addFeedbackType").click(function(){ 
          $('.feed_back_type_select').empty();
          
          var feedbackTypeDetail = $('#feedbackTypeDetail').val();
         
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>call_center/ajax_add_feedback_detail/",
                  data: { 'feedback_type_detail': feedbackTypeDetail },
                  success: function(data){
                      var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                      $('#item').append('<option value="">Select Item</option>');

                      $.each(opts, function(i, d) {
                          // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                          $('.feed_back_type_select').append('<option value="'+d.feedback_type_id+'">' +d.feedback_type_detail+ '</option>');

                      });
                  }
              });
          
      });


      // $(".updateFeedback").click(function(){ 
      //     // $('.feed_back_type_select').empty();
          
      //     var feedbackTypeId = $(this).parent('div').find('.feed_back_type_select').val();
      //    alert(feedbackTypeId);
      // });






  }); 
</script>

