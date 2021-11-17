<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Seize Report <small></small></h3>
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
            <form class="form-horizontal form-label-left" method="post"  enctype='multipart/form-data'>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Zone </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="zoneId" class="form-control select-tag" name="zone_id">
                        <option value="">Any</option>
                        <?php foreach($zone_list as $value){?> 
                        <option value="<?php echo $value->zone_id; ?>"><?php echo $value->zone_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Unit Head </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="rmId" class="form-control select-tag" name="rm_id">
                        <option value="">Any</option>
                        <?php foreach($employee_list as $value){if($value->role==2){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }}?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Divisional Head </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="zmId" class="form-control select-tag" name="zm_id">
                        <option value="">Any</option>
                        <?php foreach($employee_list as $value){if($value->role==4){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }}?>
                      </select>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select SVD/Garage </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="svdId" class="form-control select-tag" name="depot_id" >
                        <option value="">Any</option>
                        <?php foreach($seize_depot_list as $value){?> 
                        <option value="<?php echo $value->depot_id; ?>"><?php echo $value->depot_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Delivery Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="status" class="form-control select-tag" name="status" >
                      <option value="">Any</option>
                      <option value="9">Pending</option>
                      <option value="30">Released</option>
                      <option value="30">Sold</option>
                      </select>
                  </div>
                </div>
                
                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Date </label>
                  <div id="reportrange_right" class="pull-left col-md-9 col-sm-9 col-xs-12" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" >
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span name="date">Click here to select range</span> <b class="caret"></b>
                    <input id="date" type="hidden" name="date" />
                  </div>
                </div> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">From </label>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- <input type="text" id="datepicker" name="start_date"> -->
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="" aria-describedby="inputSuccess2Status3" name="start_date">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <label class="control-label col-md-2 col-sm-2 col-xs-12">To </label>
                  
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- <input type="text" id="datepicker1" name="end_date"> -->
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="" aria-describedby="inputSuccess2Status3" name="end_date">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
                <script>
                  $(function() { 
                      
                     

                      $("#generate").click(function(){ 
                          $('#report-view').html('');

                          var zoneId = $('#zoneId option:selected').val();
                          var rmId = $('#rmId').val();
                          var zmId  = $('#zmId').val();
                          var svdId= $('#svdId').val();
                          var status = $('#status').val();
                          // alert(zoneId);
                          // var startDate   = $('#single_cal3').val();
                          // var endDate   = $('#single_cal4').val();
                          $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url()?>seize_report/generate_seize_report/",
                                  data: { 'zone_id': zoneId, 'rm_id' : rmId, 'zm_id' : zmId, 'depot_id': svdId, 'status': status },
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
                                      paging: false
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
          <div id="report-view">
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
            <!-- AJAX REPORT GOES HERE -->
          </div>
          
        </div>
      </div>
      </div>
  </div>
</div>
</div>

