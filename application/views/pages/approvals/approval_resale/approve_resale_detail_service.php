<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Service Inspection <small></small></h3>
    </div>

    <!-- <?php print_r($resale_detail); echo "hello";?> -->

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
                <!-- <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a> -->
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>approval_resale/add_service_inspection/">

              <input type="hidden" name="resale_id" value="<?php echo $resale_detail->resale_id; ?>">
              <input type="hidden" name="seize_id" value="<?php echo $resale_detail->seize_id; ?>">


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" readonly="true" value="000<?php echo $resale_detail->resale_id; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Resale Request Date </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" readonly="true" class="form-control" name="resale_date" value="<?php echo date('d-m-Y', strtotime($resale_detail->time_stamp)); ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Engine No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="engine_no" readonly="true" value="<?php echo $resale_detail->engine_no; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Chassis No </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="chassis_no" readonly="true" value="<?php echo $resale_detail->chassis_no; ?>">
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="x_title">
                  <h4>Report from Seize</h4>
                <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
               
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-3 col-sm-12 col-xs-12">Tyre Quantity </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" readonly="true" class="form-control" value="<?php echo $resale_detail->tyre_quantity; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Battery Condition </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $resale_detail->battery_condition; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gas Cylinder </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $resale_detail->gas_cylinder; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Soft-top </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" readonly="true" value="<?php echo $resale_detail->softtop; ?>">
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- seize report ends here -->

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="control-label col-md-3 col-sm-12 col-xs-12">Tyre Qty</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" class="form-control" name="tyre_quantity" min="1" max="4">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Tyre Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="tyre_condition" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="damaged">Damaged</option>
                          <option value="average">Average</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Engine Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="engine_condition" required>
                          <option value="">select</option>
                          <option value="running">Running</option>
                          <option value="damaged">Damaged</option>
                          <option value="average">Average</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Battery Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="battery_condition" required>
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
                        <select class="form-control select-tag" name="gas_cylinder" required>
                          <option value="">select</option>
                          <option value="cng">CNG</option>
                          <option value="lpg">LPG</option>
                          <option value="cooking">Cooking</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Wind Shield Glass </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="wind_shield_glass" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="damaged">Damaged</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Self Starter </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="self_starter" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="damaged">Damaged</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Ignition Switch </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="ignition_switch" required>
                          <option value="">select</option>
                          <option value="found">Found</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Key </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="key_status" required>
                          <option value="">select</option>
                          <option value="found">Found</option>
                          <option value="not_found">Not Found</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Body Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="body_condition" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="average">Average</option>
                          <option value="cracked">Cracked</option>
                          <option value="damaged">Damaged</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Denting/Painting </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="denting_painting" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="average">Average</option>
                          <option value="not_good">Not Good</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Overall Vehicle Condition </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="overall_vehicle_condition" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="average">Average</option>
                          <option value="not_good">Not Good</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Soft-top </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="softtop" required>
                          <option value="">select</option>
                          <option value="good">Good</option>
                          <option value="average">Average</option>
                          <option value="damaged">Damaged</option>
                        </select>
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

  
</div>
</div>