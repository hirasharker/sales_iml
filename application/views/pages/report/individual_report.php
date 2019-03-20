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
            <form class="form-horizontal form-label-left" method="post"  enctype='multipart/form-data'>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="customerId" type="number" class="form-control" name="customer_id" min="0" max="99999" value="0" placeholder="">
                  </div>
                </div>

                
              </form>
                <script>
                  $(function() { 
                     
                      $( "#customerId" ).keyup(function() {

                          $('#report-view').html('');
                          var customerId = $('#customerId').val();
                          console.log('clicked!'+customerId);
                          $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url()?>report/generate_individual_customer/",
                                  data: { 'customer_id': customerId  },
                                  success: function(data){
                                      // Parse the returned json data
                                    var opts = $.parseJSON(data);
                                      // Use jQuery's each to iterate over the opts value
                                    $('#report-view').html(opts);
                                     
                                  }
                              });
                      });

                      $("#reset").click(function(){
                          $('#customerId').val("");
                      });

                      $("#generate").click(function(){ 
                          $('#report-view').html('');

                          var customerId = $('#customerId').val();
                          $.ajax({
                                  type: "POST",
                                  url: "<?php echo base_url()?>report/generate_individual_customer/",
                                  data: { 'customer_id': customerId},
                                  success: function(data){
                                      // Parse the returned json data
                                      var opts = $.parseJSON(data);
                                      // Use jQuery's each to iterate over the opts value
                                      $('#report-view').html(opts);

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
          <h2>Customer Detail <small></small></h2>
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
          <table class="table table-striped table-bordered" >
            <thead>
              <tr>
                <th>SN</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Model</th>
                <th>Price</th>
                <th>Downpayment</th>
                <th>Sales Person</th>
                <th>Dealer Name</th>
                <th>Sales Generated By</th>
                <th>Payment Mode</th>
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

