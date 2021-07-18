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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>seize/add_seize_depot/">

            <div class="x_title">
                <h2>Sieze Depot Info <small></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="row">

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">SVD/Garage </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="depot_type">
                          <option value="">select</option>
                          <option value="svd">SVD</option>
                          <option value="garage">Garage</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SVD/Garage Name </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="depot_name" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">OWN/Rented </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="ownership_type">
                          <option value="">select</option>
                          <option value="owned">Owned</option>
                          <option value="rented">Rented</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">SVD/Garage Address </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" rows="3" name="address" placeholder="" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Name of Land/Garage Owner</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="depot_owner" placeholder="Land/Garage Owner Name">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Phone No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="phone" placeholder="Phone No">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Space </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="space" placeholder="Space">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Vehicle Capacity</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="vehicle_capacity" placeholder="Vehicle Capacity">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Shade Space </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="shade_space" placeholder="Shade Space">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Advance </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" min="0" class="form-control" name="advance" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Rent Type </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="rent_type" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Per Day Rent (if applicabe) </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" min="0" class="form-control" name="daily_rent" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Rent </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" min="0" class="form-control" name="rent" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Adjust from Advance </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" min="0" class="form-control" name="adjust_from_advance" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Payment Mode </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="payment_mode">
                          <option value="">select</option>
                          <option value="cash">Cash</option>
                          <option value="cheque">Cheque</option>
                        </select>
                    </div>
                </div>

                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Area </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select id="cityId" class="form-control select-tag" name="city_id" required>
                          <option value="0">select</option>
                          <?php foreach($city_list as $value){?> 
                          <option cityCode="<?php echo $value->city_code; ?>" zoneId="<?php echo $value->zone_id; ?>" value="<?php echo $value->city_id; ?>"><?php echo $value->city_name;?></option>
                          <?php }?>
                      </select>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Unit Head </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="rmName" class="form-control" name="rm_name" placeholder="" readonly="true">
                            <input type="hidden" id="rmId" class="form-control" name="rm_id">
                            <input type="hidden" id="zoneId" class="form-control" name="zone_id">
                            <input type="hidden" id="zheadId" class="form-control" name="zhead_id">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Divisional Head </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="zheadName" class="form-control" name="zhead_name" placeholder="" readonly="true">
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
          <h2>Seize Depot List <small></small></h2>
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
                <th>Depot Name</th>
                <th>Chassis No</th>
                <th>Engine No</th>
                <!-- <th>Recovery Manager</th> -->
                <!-- <th>Email</th> -->
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($depot_list as $value){?>
              <tr>
                <td><?php echo $value->depot_name; ?></td>
                
                <!-- <td><?php foreach($employee_list as $emp_value){if($emp_value->employee_id==$value->rm_id){
                      echo $emp_value->employee_name;
                } }
                ?></td>
                <td><?php foreach($employee_list as $emp_value){if($emp_value->employee_id==$value->rm_id){
                      echo $emp_value->email_id;
                } }
                ?></td> -->
                <td><a href="#">edit </a>|<a href="#"> delete</a></td>
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

<script type="text/javascript">
  $("#cityId").change(function(){

    var cityId = $('#cityId option:selected').val();
    var element = $(this).find('option:selected'); 
    var zoneId = element.attr("zoneId");
    console.log(zoneId);

    console.log(cityId);

    
    

    $.ajax({
        type: "POST",
        url: "<?php echo base_url()?>seize/ajax_generate_city_detail/",
        data: { 'city_id': cityId, 'zone_id': zoneId  },
        success: function(data){
            // Parse the returned json data
            var opts = $.parseJSON(data);
            // Use jQuery's each to iterate over the opts value
            console.log(opts);

            $('#rmName').val(opts.recovery_manager);
            $('#rmId').val(opts.rm_id);
            $('#zoneId').val(opts.zone_id);
            // $('#zheadId').val(opts.zonal_head);
            console.log(opts.rm_id);

        }
    });
  });
</script>