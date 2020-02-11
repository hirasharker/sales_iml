<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Stock Report <small></small></h3>
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
            <form class="form-horizontal form-label-left" method="post" enctype='multipart/form-data'>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Stock Yard </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="yardId" class="form-control select-tag" name="yard_id" >
                        <option value="">All</option>
                        <?php foreach($yard_list as $value){?> 
                        <option value="<?php echo $value->delivery_yard_id; ?>"><?php echo $value->yard_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Dealer Point </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="dealerId" class="form-control select-tag" name="dealer_id" >
                        <option value="">All</option>
                        <?php foreach($dealer_list as $value){?> 
                        <option value="<?php echo $value->dealer_id; ?>"><?php echo $value->dealer_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Registration Zone </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="zoneId" class="form-control select-tag" name="zone_id">
                        <option value="">All</option>
                        <?php foreach($zone_list as $value){?> 
                        <option value="<?php echo $value->zone_id; ?>"><?php echo $value->zone_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Model </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="vehicleModel" class="form-control select-tag" name="model_id" >
                        <option value="">All</option>
                        <?php foreach($model_list as $value){?> 
                        <option modelCode="<?php echo $value->model_code;?>" value="<?php echo $value->model_id; ?>"><?php echo $value->model_name;?></option>
                        <?php }?>
                      </select>
                      <input id="modelCode" type="hidden" name="model_code">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Position </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" id="status" name="status" >
                      <option value="">All</option>
                      <option value="1">Stockyard</option>
                      <option value="2">Applied for Registration</option>
                      <option value="3">Registered Vehicle</option>
                      
                      <option value="4">Dealer Stock (Non Registered VH)</option>
                      <option value="6">Dealer Stock (Registered VH)</option>
                      <option value="5">Booked (Without Registration)</option>
                      <option value="7">Booked (With Registration)</option>
                      <option value="8">Sold (Without Registration)</option>
                      <option value="10">Sold (With Registration)</option>
                      
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Bank </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="bankId" class="form-control select-tag" name="bank_id" >
                        <option value="">All</option>
                        <?php foreach($bank_list as $value){?> 
                        <option value="<?php echo $value->bank_id; ?>"><?php echo $value->bank_name;?></option>
                        <?php }?>
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

                
                
              </form>
                <script>
                  $(function() { 
                      $("#generate").click(function(){ 
                          $('#report-view').html('');
                          
                          var zoneId = $('#zoneId').val();
                          var modelId= $('#vehicleModel').val();
                          var yardId = $('#yardId').val();
                          var dealerId= $('#dealerId').val();
                          var bankId = $('#bankId').val();
                          var status =  $('#status').val();
                          $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url()?>report/generate_stock_report/",
                                  data: { 'zone_id': zoneId, 'model_id': modelId,'yard_id': yardId, 'dealer_id': dealerId, 'bank_id': bankId, 'status' : status  },
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
  

                  }); 
                </script>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button id="generate" class="btn btn-success">Generate</button>
                    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                </div>
                
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
          <h2>Vehicle List <small></small></h2>
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
          <div id="report-view">
            
          </div>
          
          
        </div>
      </div>
      </div>
  </div>
</div>
</div>



