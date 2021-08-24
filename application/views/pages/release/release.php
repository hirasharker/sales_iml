<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Release Form <small></small></h3>
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
    <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>release/add_release/">

            <div class="x_title">
                <h2>Release Info <small></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="row">


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer ID/ Engine /Chassis </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="searchKey" type="text" class="form-control" name="search_key" placeholder="">
                        </div>
                    </div>
                </div>

                <input id="stockId" type="hidden" name="stock_id">
                <input id="seizeId" type="hidden" name="seize_id">
                <input id="dealerId" type="hidden" name="dealer_id">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer ID </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" id="customerId"  readonly="true" class="form-control" name="customer_id" placeholder="Customer ID">
                            <input type="hidden" id="cityId" name="city_id">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Seize Date </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="seizeDate"  readonly="true" class="form-control" name="seize_date" placeholder="Seize Date">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer Name </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input  id="customerName"  readonly="true"  type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Dealer </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input  id="dealerName"  readonly="true"  type="text" class="form-control" name="dealer_name" placeholder="Dealer">
                        </div>
                    </div>
                </div>
                

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Engine No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text"  id="engineNo"  readonly="true" class="form-control" name="engine_no" placeholder="Engine No">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Chassis No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text"  id="chassisNo"  readonly="true" class="form-control" name="chassis_no" placeholder="Chassis No">
                        </div>
                    </div>
                </div>

                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Proposed Collection Amount</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number"  class="form-control" name="proposed_collection_amount" min="0" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Committed Next Payment Amount </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number"  class="form-control" name="committed_next_payment_amount" min="0" required>
                        </div>
                    </div>
                </div>

                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Committed next payment date </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="committed_next_payment_date" class="form-control has-feedback-left" id="single_cal5" placeholder="Invoice Date" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Rest Amount of OD </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number"  class="form-control" name="rest_amount_of_od" min="0" required>
                        </div>
                    </div>
                </div>

               

            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				        <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            
            </form>
            </div>
        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-5 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Release List <small></small></h2>
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
          
          <table id="datatable-buttons" class="table table-striped table-bordered responsive">
            <thead>
              <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Chassis No</th>
                <th>Engine No</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($release_list as $value){?>
              <tr>
                <td><?php echo $value->customer_id; ?></td>
                <td><?php echo $value->customer_name; ?></td>
                <td><?php echo $value->chassis_no; ?></td>
                <td><?php echo $value->engine_no; ?></td>
                <td><?php echo date('d-m-Y', strtotime($value->time_stamp)); ?></td>
                <td><?php echo $value->release_status; ?></td>

                
                <!-- <td><a href="#">edit </a>|<a href="#"> delete</a></td> -->
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>



</div>
</div>

<!-- <div>
  
  <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>seize/generate_customer_detail/">
    <input type="text" name="search_key">
    <input type="submit" >
  </form>
</div> -->

<script>
  $(function() { 
     
      $( "#searchKey" ).keyup(function() {

          $('#customerId').val("");
          $('#customerName').val("");
          $('#cityId').val("");
          $('#engineNo').val("");
          $('#chassisNo').val("");
          $('#stockId').val("");
          $('#dealerName').val("");
          $('#seizeDate').val("");

          $('#seizeId').val("");
          $('#dealerId').val("");

          $('#report-view').html('');
          var searchKey = $('#searchKey').val();
          console.log('clicked!'+searchKey);
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>release/generate_customer_detail/",
                  data: { 'search_key': searchKey  },
                  success: function(data){
                      // Parse the returned json data
                    var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                    if(opts.seize_status == 'f'){
                      alert('Not Under Seize!')
                    }else{
                      $('#customerId').val(opts.customer_id);
                      $('#customerName').val(opts.customer_name);
                      $('#cityId').val(opts.city_id);
                      $('#engineNo').val(opts.engine_no);
                      $('#chassisNo').val(opts.chassis_no);
                      $('#stockId').val(opts.stock_id);
                      $('#dealerName').val(opts.dealer_name);

                      $('#seizeDate').val(opts.seize_date);

                      $('#seizeId').val(opts.seize_id);
                      $('#dealerId').val(opts.dealer_id);


                      console.log(opts.chassis_no);
                      console.log(opts.seize_status);
                    }
                    
                     
                  }
              });
      });

      $("#reset").click(function(){
          $('#searchKey').val("");
      });

  }); 
</script>