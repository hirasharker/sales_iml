<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Seize Depot <small></small></h3>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>seize/add_seize/">

            <div class="x_title">
                <h2>Seize Info <small></small></h2>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer ID </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" id="customerId"  readonly="true" class="form-control" name="customer_id" placeholder="Customer ID">
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
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer Name (if different from records) </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="different_customer" placeholder="Different Customer">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Phone (if different from records) </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="different_phone" placeholder="Different Phone">
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Previous Seize History </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="different_customer" placeholder="Different Customer">
                        </div>
                    </div>
                </div> -->


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Seized From </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="seize_location">
                          <option value="">select</option>
                          <option value="road">Road</option>
                          <option value="stand">Stand</option>
                          <option value="garage">Garage</option>
                          <option value="home">Customer's Home</option>
                          <option value="abandoned">Abandoned</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Vehicle Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="vehicle_condition">
                          <option value="">select</option>
                          <option value="running">Running</option>
                          <option value="damaged">Damaged</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Tyre Qty </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" class="form-control" name="tyre_quantity" min="1" max="4">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Battery Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="vehicle_condition">
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="damaged">Damaged</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Gas Cylinder </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="gas_cylinder">
                          <option value="">select</option>
                          <option value="cng">CNG</option>
                          <option value="lpg">LPG</option>
                          <option value="cooking">Cooking</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Key </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="gas_cylinder">
                          <option value="">select</option>
                          <option value="found">Found</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Garage </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="seize_depot_id">
                          <option value="">select</option>
                          <?php foreach($zone_list as $value){?>
                          <option value="<?php echo $value->zone_id;?>"><?php echo $value->zone_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Sieze Cost </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" class="form-control" name="tyre_quantity" min="0">
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

  <!-- <div class="row">
    <div class="col-md-5 col-sm-6 col-xs-12">
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
          
          <table id="datatable-buttons" class="table table-striped table-bordered responsive">
            <thead>
              <tr>
                <th>City Name</th>
                <th>Zone</th>
                <th>Code</th>
                <th>Recovery Manager</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($city_list as $value){?>
              <tr>
                <td><?php echo $value->city_name; ?></td>
                <td><?php echo $value->zone_name; ?></td>
                <td><?php echo $value->city_code ?></td>
                <td><?php foreach($employee_list as $emp_value){if($emp_value->employee_id==$value->rm_id){
                      echo $emp_value->employee_name;
                } }
                ?></td>
                <td><?php foreach($employee_list as $emp_value){if($emp_value->employee_id==$value->rm_id){
                      echo $emp_value->email_id;
                } }
                ?></td>
                <td><a href="#">edit </a>|<a href="#"> delete</a></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div> -->



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

          $('#report-view').html('');
          var searchKey = $('#searchKey').val();
          console.log('clicked!'+searchKey);
          $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>seize/generate_customer_detail/",
                  data: { 'search_key': searchKey  },
                  success: function(data){
                      // Parse the returned json data
                    var opts = $.parseJSON(data);
                      // Use jQuery's each to iterate over the opts value
                    $('#customerId').val(opts.customer_id);
                    $('#customerName').val(opts.customer_name);
                    $('#engineNo').val(opts.engine_no);
                    $('#chassisNo').val(opts.chassis_no);
                    console.log(opts.chassis_no);
                     
                  }
              });
      });

      $("#reset").click(function(){
          $('#searchKey').val("");
      });

      


  }); 
</script>