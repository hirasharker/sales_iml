<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Resale Request <small></small></h3>
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
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-plus fa-chevron-up fa-chevron-down"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>resale/add_request/" enctype='multipart/form-data'>

            <div class="x_title">
                <h2>Resale Info <small class="alert"><?php if($this->session->userdata('error')!=NULL){  } ?></small></h2>
                <div class="clearfix"></div>
            </div>


            

            <div class="row">
                <?php if($this->session->userdata('message')!=NULL){?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong><?php echo $this->session->userdata('message'); $this->session->unset_userdata('message');?></strong>
                </div>
                <?php }?>

                <?php if($this->session->userdata('error')!=NULL){?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error');?></strong>
                </div>
                <?php }?>

                


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer ID/ Engine /Chassis </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input id="searchKey" type="text" class="form-control" name="search_key" placeholder="">
                        </div>
                    </div>
                </div>

                <input id="stockId" type="hidden" name="stock_id">
                <input id="seizeId" type="hidden" name="seize_id">
                <input id="cityId" type="hidden" name="city_id">
                <input id="rmId" type="hidden" name="rm_id">
                <input id="zheadId" type="hidden" name="zhead_id">


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer ID </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="number" id="customerId"  readonly="true" class="form-control" name="customer_id" placeholder="Customer ID">
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer Name </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input  id="customerName"  readonly="true"  type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Engine No </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="engineNo"  readonly="true" class="form-control" name="engine_no" placeholder="Engine No">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Chassis No </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="chassisNo"  readonly="true" class="form-control" name="chassis_no" placeholder="Chassis No">
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Seized Date </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="seizeDate"  readonly="true" class="form-control" name="seized_date" placeholder="Seized Date">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Vehicle Condition </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="vehicleCondition"  readonly="true" class="form-control" name="vehicle_condition" placeholder="Vehicle Condition">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Tyre Quantity </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="tyreQuantity"  readonly="true" class="form-control" name="tyre_quantity" placeholder="Tyre Quantity">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Battery Condition </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="batteryCondition"  readonly="true" class="form-control" name="battery_condition" placeholder="Battery Condition">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Gas Cylinder </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="gasCylinder"  readonly="true" class="form-control" name="gas_cylinder" placeholder="Gas Cylinder">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Key </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="keyStatus"  readonly="true" class="form-control" name="key_status" placeholder="Key">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">SVD/Garage Name </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="text"  id="depotName"  readonly="true" class="form-control" name="depot_name" placeholder="SVD/Garage Name">
                            <input id="depotId" type="hidden" name="depot_id">
                        </div>
                    </div>
                </div>

                

              
                <div class="row">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Customer 1 <small></small></h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="customer_name[]" placeholder="Customer Name">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="proposed_value[]" placeholder="Proposed Value">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="phone_no[]" placeholder="Phone No">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control select-tag" name="sales_mode[]">
                                  <option value="">Sales Mode</option>
                                  <option value="1">Credit</option>
                                  <option value="2">Semi Cash</option>
                                  <option value="3">Cash</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="downpayment[]" placeholder="Downpayment">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="period[]" placeholder="Tenure">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="interest_rate[]" placeholder="Interest Rate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="reference[]" placeholder="Reference">
                            </div>
                        </div>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Customer 2 <small></small></h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="customer_name[]" placeholder="Customer Name">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="proposed_value[]" placeholder="Proposed Value">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="phone_no[]" placeholder="Phone No">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control select-tag" name="sales_mode[]">
                                  <option value="">Sales Mode</option>
                                  <option value="1">Credit</option>
                                  <option value="2">Semi Cash</option>
                                  <option value="3">Cash</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="downpayment[]" placeholder="Downpayment">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="period[]" placeholder="Tenure">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="interest_rate[]" placeholder="Interest Rate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="reference[]" placeholder="Reference">
                            </div>
                        </div>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="page-title">
                      <div class="title_left">
                        <h3>Customer 3 <small></small></h3>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="customer_name[]" placeholder="Customer Name">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="proposed_value[]" placeholder="Proposed Value">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="phone_no[]" placeholder="Phone No">
                            </div>
                        </div>
                    </div>



                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select class="form-control select-tag" name="sales_mode[]">
                                  <option value="">Sales Mode</option>
                                  <option value="1">Credit</option>
                                  <option value="2">Semi Cash</option>
                                  <option value="3">Cash</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="downpayment[]" placeholder="Downpayment">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="period[]" placeholder="Tenure">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" value="0" name="interest_rate[]" placeholder="Interest Rate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" name="reference[]" placeholder="Reference">
                            </div>
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
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Resale Records <small></small></h2>
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
          <table id="datatable-buttons" class="table table-striped table-bordered responsive">
            <thead>
              <tr>
                <th>Resale ID</th>
                <th>Customer ID</th>
                <th>Chassis No</th>
                <th>Engine No</th>
                <th>Seize ID</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>

            <tbody>
            <?php foreach($resale_list as $value){?>
              <tr>
                <td>000<?php echo $value->resale_id; ?></td>
                <td><?php echo $value->previous_customer_id; ?></td>
                <td><?php echo $value->chassis_no; ?></td>
                <td><?php echo $value->engine_no; ?></td>
                <td>000<?php echo $value->seize_id; ?></td>
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

<!-- <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>resale/generate_seize_detail/">
    <input type="text" name="search_key">
    <input type="submit" >
</form> -->

<script>
  $(function() { 
     
      $( "#searchKey" ).keyup(function() {

          $('#customerId').val("");
          $('#cityId').val("");
          $('#rmId').val("");
          $('#zheadId').val("");
          $('#customerName').val("");
          $('#engineNo').val("");
          $('#chassisNo').val("");
          $('#dealerName').val("");
          $('#stockId').val("");

          $('#vehicleCondition').val("");
          $('#tyreQuantity').val("");
          $('#batteryCondition').val("");
          $('#gasCylinder').val("");
          $('#keyStatus').val("");
          $('#depotName').val("");
          $('#depotId').val("");
          $('#seizeId').val("");
          $('#seizeDate').val("");
          

          $('#report-view').html('');
          var searchKey = $('#searchKey').val();
          console.log('clicked!'+searchKey);
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>resale/generate_seize_detail/",
                  data: { 'search_key': searchKey  },
                  success: function(data){
                      // Parse the returned json data
                    var opts = $.parseJSON(data);
                    console.log(opts);
                      // Use jQuery's each to iterate over the opts value
                    if(opts.seize_status == 't' && opts.resale_status == 'f'){
                      $('#customerId').val(opts.customer_id);
                      $('#customerName').val(opts.customer_name);
                      $('#engineNo').val(opts.engine_no);
                      $('#chassisNo').val(opts.chassis_no);
                      $('#stockId').val(opts.stock_id);
                      $('#vehicleCondition').val(opts.vehicle_condition.toUpperCase());
                      $('#tyreQuantity').val(opts.tyre_quantity);
                      $('#batteryCondition').val(opts.battery_condition.toUpperCase());
                      $('#gasCylinder').val(opts.gas_cylinder.toUpperCase());
                      $('#keyStatus').val(opts.key_status.toUpperCase());
                      $('#depotName').val(opts.depot_name);
                      $('#depotId').val(opts.depot_id);
                      $('#seizeId').val(opts.seize_id);
                      $('#cityId').val(opts.city_id);
                      $('#rmId').val(opts.rm_id);
                      $('#zheadId').val(opts.seize_id);
                      $('#seizeDate').val(opts.time_stamp);
                    } else if (opts.resale_status == 't') {
                      alert('Already under resale process!');
                    }else {
                      alert('Currently not under seize!');
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