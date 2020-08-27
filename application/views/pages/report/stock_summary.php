<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Stock Summary <small></small></h3>
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
              
              <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
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
                      $("#generate-model-wise").click(function(){ 
                          $('#report-view').html('');
                          
                          var date = $('#date').val();
                         
                          $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url()?>report/generate_model_wise_stock_summary/",
                                  data: { 'date': date },
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
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                    <!-- <button class="btn btn-primary" type="reset" id="reset">Reset</button> -->
                    <button id="generate-model-wise" class="btn btn-success">Generate (Model Wise Report)</button>
                    <button id="generate-registration-wise" class="btn btn-success">Generate (Registration Area Wise)</button>
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
          <h2> <small></small></h2>
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
