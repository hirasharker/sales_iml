<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Customers <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Customers <small>click the plus icon to add new Customer..</small></h2> -->
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>customer/add_customer/">

                <div class="x_title">
                <h2>Basic Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="">
                  </div>
                </div> -->
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="reference" id="reference">
                      <option value="" permanentAddress="none">none</option>
                      <?php foreach($reference_list as $value){?>
                      <!-- <option customerName="<?php echo $value->CustName; ?>" permanentAddress="<?php echo $value->PermanentAddress; ?>" presentAddress="<?php echo $value->PresentAddress; ?>" value="<?php echo $value->CustCode; ?>"><?php echo $value->CustCode; ?></option> -->
                      <option customerName="<?php echo $value->CustName; ?>" value="<?php echo $value->CustCode; ?>"><?php echo $value->CustCode; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="customerName" class="form-control" name="customer_name" placeholder="">
                  </div>
                </div>
                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control">
                      <option>Male</option>
                      <option>Female</option>
                      </select>
                  </div>
                </div> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">National ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="national_id" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="occupation" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="fatherName" type="text" class="form-control" name="father_name" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="motherName" type="text" class="form-control" name="mother_name" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image (Passport Size) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="customer_image" placeholder="">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload NID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="customer_nid" placeholder="">
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                <h2>Contact Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Present Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" id="presentAddress" name="present_address" placeholder=""></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="permanentAddress" class="form-control" rows="3" name="permanent_address" placeholder=""></textarea>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Address <span class="required">(optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="business_address" placeholder=""></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Spouse's Address <span class="required">(optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="spouse_address" placeholder=""></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">City </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="cityId" class="form-control select-tag" name="city_id" required>
                        <option value="">select</option>
                        <?php foreach($city_list as $value){?> 
                        <option cityCode="<?php echo $value->city_code; ?>" zoneId="<?php echo $value->zone_id; ?>" value="<?php echo $value->city_id; ?>"><?php echo $value->city_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                  <input id="zoneId" type="hidden" name="zone_id">
                  <input id="cityCode" type="hidden" name="city_code">
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="phone" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="email_id" placeholder="">
                  </div>
                </div>
                <div class="clearfix"></div>
                <br />

                <div class="x_title">
                <h2>Vehicle Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="vehicleModel" class="form-control select-tag" name="model_id" required>
                        <option value="">select</option>
                        <?php foreach($model_list as $value){?> 
                        <option modelCode="<?php echo $value->model_code;?>" value="<?php echo $value->model_id; ?>"><?php echo $value->model_name;?></option>
                        <?php }?>
                      </select>
                      <input id="modelCode" type="hidden" name="model_code">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Engine No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="engine_no" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Chassis No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="chassis_no" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="registration_no" placeholder="">
                  </div>
                </div>
                

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h2>Payment Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Mode </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="paymentMode" class="form-control select-tag" name="payment_mode">
                      <option value="1">Credit</option>
                      <option value="2">Semi Cash</option>
                      <option value="3">Cash</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Price </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="totalPrice" type="text" class="form-control" name="total_price" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Downpayment </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="downpayment" type="text" class="form-control" name="downpayment" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Period </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="period" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="interestRate" type="text" class="form-control" name="interest_rate" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Starts from </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="installment_start_date" placeholder="" value="60">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="discount" type="text" class="form-control" name="discount" placeholder="">
                  </div>
                </div>

                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Start Date </label>
                    <div class="col-md-9 col-sm-9 col-xs-12 daterangepicker dropdown-menu ltr single opensright show-calendar picker_4 xdisplay"><div class="calendar left single" style="display: block;"><div class="daterangepicker_input"><input class="input-mini form-control active" type="text" name="birthday" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th class="prev available"><i class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i></th><th colspan="5" class="month">Oct 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">25</td><td class="off available" data-title="r0c1">26</td><td class="off available" data-title="r0c2">27</td><td class="off available" data-title="r0c3">28</td><td class="off available" data-title="r0c4">29</td><td class="off available" data-title="r0c5">30</td><td class="weekend available" data-title="r0c6">1</td></tr><tr><td class="weekend available" data-title="r1c0">2</td><td class="available" data-title="r1c1">3</td><td class="available" data-title="r1c2">4</td><td class="available" data-title="r1c3">5</td><td class="available" data-title="r1c4">6</td><td class="available" data-title="r1c5">7</td><td class="weekend available" data-title="r1c6">8</td></tr><tr><td class="weekend available" data-title="r2c0">9</td><td class="available" data-title="r2c1">10</td><td class="available" data-title="r2c2">11</td><td class="available" data-title="r2c3">12</td><td class="available" data-title="r2c4">13</td><td class="available" data-title="r2c5">14</td><td class="weekend available" data-title="r2c6">15</td></tr><tr><td class="weekend available" data-title="r3c0">16</td><td class="available" data-title="r3c1">17</td><td class="today active start-date active end-date available" data-title="r3c2">18</td><td class="available" data-title="r3c3">19</td><td class="available" data-title="r3c4">20</td><td class="available" data-title="r3c5">21</td><td class="weekend available" data-title="r3c6">22</td></tr><tr><td class="weekend available" data-title="r4c0">23</td><td class="available" data-title="r4c1">24</td><td class="available" data-title="r4c2">25</td><td class="available" data-title="r4c3">26</td><td class="available" data-title="r4c4">27</td><td class="available" data-title="r4c5">28</td><td class="weekend available" data-title="r4c6">29</td></tr><tr><td class="weekend available" data-title="r5c0">30</td><td class="available" data-title="r5c1">31</td><td class="off available" data-title="r5c2">1</td><td class="off available" data-title="r5c3">2</td><td class="off available" data-title="r5c4">3</td><td class="off available" data-title="r5c5">4</td><td class="weekend off available" data-title="r5c6">5</td></tr></tbody></table></div></div><div class="calendar right" style="display: none;"><div class="daterangepicker_input"><input class="input-mini form-control" type="text" name="daterangepicker_end" value="" style="display: none;"><i class="fa fa-calendar glyphicon glyphicon-calendar" style="display: none;"></i><div class="calendar-time" style="display: none;"><div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i></div></div><div class="calendar-table"><table class="table-condensed"><thead><tr><th></th><th colspan="5" class="month">Nov 2016</th><th class="next available"><i class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i></th></tr><tr><th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr></thead><tbody><tr><td class="weekend off available" data-title="r0c0">30</td><td class="off available" data-title="r0c1">31</td><td class="available" data-title="r0c2">1</td><td class="available" data-title="r0c3">2</td><td class="available" data-title="r0c4">3</td><td class="available" data-title="r0c5">4</td><td class="weekend available" data-title="r0c6">5</td></tr><tr><td class="weekend available" data-title="r1c0">6</td><td class="available" data-title="r1c1">7</td><td class="available" data-title="r1c2">8</td><td class="available" data-title="r1c3">9</td><td class="available" data-title="r1c4">10</td><td class="available" data-title="r1c5">11</td><td class="weekend available" data-title="r1c6">12</td></tr><tr><td class="weekend available" data-title="r2c0">13</td><td class="available" data-title="r2c1">14</td><td class="available" data-title="r2c2">15</td><td class="available" data-title="r2c3">16</td><td class="available" data-title="r2c4">17</td><td class="available" data-title="r2c5">18</td><td class="weekend available" data-title="r2c6">19</td></tr><tr><td class="weekend available" data-title="r3c0">20</td><td class="available" data-title="r3c1">21</td><td class="available" data-title="r3c2">22</td><td class="available" data-title="r3c3">23</td><td class="available" data-title="r3c4">24</td><td class="available" data-title="r3c5">25</td><td class="weekend available" data-title="r3c6">26</td></tr><tr><td class="weekend available" data-title="r4c0">27</td><td class="available" data-title="r4c1">28</td><td class="available" data-title="r4c2">29</td><td class="available" data-title="r4c3">30</td><td class="off available" data-title="r4c4">1</td><td class="off available" data-title="r4c5">2</td><td class="weekend off available" data-title="r4c6">3</td></tr><tr><td class="weekend off available" data-title="r5c0">4</td><td class="off available" data-title="r5c1">5</td><td class="off available" data-title="r5c2">6</td><td class="off available" data-title="r5c3">7</td><td class="off available" data-title="r5c4">8</td><td class="off available" data-title="r5c5">9</td><td class="weekend off available" data-title="r5c6">10</td></tr></tbody></table></div></div><div class="ranges" style="display: none;"><div class="range_inputs"><button class="applyBtn btn btn-sm btn-success" type="button">Apply</button> <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button></div></div></div>
                    <fieldset>
                      <div class="control-group">
                        <div class="controls">
                          <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                </div> -->
                <script>
                  $(function() { 
                      $("#reference").change(function(){ 
                          var element = $(this).find('option:selected'); 
                          var customerName = element.attr("customerName");
                          var permanentAddress = element.attr("permanentAddress");
                          var presentAddress = element.attr("presentAddress");

                          // $('#permanentAddress').val(permanentAddress);
                          // $('#presentAddress').val(presentAddress);
                            $('#customerName').val(customerName);
                            $('#permanentAddress').prop('disabled', true);
                            $('#presentAddress').prop('disabled', true);
                      });
                      $("#cityId").change(function(){ 
                          var element = $(this).find('option:selected'); 
                          var zoneId = element.attr("zoneId");
                          var cityCode = element.attr("cityCode");
                          
                          $('#zoneId').val(zoneId);
                          $('#cityCode').val(cityCode);

                      });
                      $("#vehicleModel").change(function(){ 
                          var element = $(this).find('option:selected'); 
                          var modelCode = element.attr("modelCode");
                          
                          $('#modelCode').val(modelCode);

                      });
                      $("#paymentMode").change(function(){ 
                          var element = $(this).find('option:selected'); 
                          var paymentMode = element.attr("value");
                          if(paymentMode==3){
                            $('#totalPrice').prop('disabled', true);
                            $('#downPayment').prop('disabled', true);
                            $('#interestRate').prop('disabled', true);
                            $('#discount').prop('disabled', true);
                          }
                          
                          // $('#zoneId').val(zoneId);
                      });

                      $("#reset").click(function(){
                          $('#permanentAddress').prop('disabled', false);
                          $('#presentAddress').prop('disabled', false);
                          $('#totalPrice').prop('disabled', false);
                          $('#downPayment').prop('disabled', false);
                          $('#interestRate').prop('disabled', false);
                          $('#discount').prop('disabled', false);
                          $("#paymentMode").val("1").change();
                      });
                  }); 
                </script>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                
                <div class="clearfix"></div>
                <br />
            </form>
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
        <div class="x_content">
          <!-- <p class="text-muted font-13 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
          </p> -->
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Model No</th>
                <th>Total Price</th>
                <th>Downlpayment</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($customer_list as $value){?>
              <tr>
                <td><?php echo $value->customer_code; ?></td>
                <td><?php echo $value->customer_name; ?></td>
                <td><?php foreach($model_list as $model_value){if($value->model_id==$model_value->model_id){echo $model_value->model_name;}}?></td>
                <td><?php echo $value->total_price; ?></td>
                <td><?php echo $value->downpayment; ?></td>
                <td><?php echo $value->time_stamp; ?></td>
                <td><?php 
                  switch ($value->status){
                    case 1:
                    echo "Waiting for approval of Zonal Head";
                    break;
                    case 2:
                    echo "Waiting for inspection";
                    break;
                    case 3:
                    echo "Waiting for printing Aggreements";
                    break;
                    case 4:
                    echo "Waiting for printing DO";
                    break;
                    case 5:
                    echo "Delivered";
                    default:
                    break;
                  }
                ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
</div>
</div>

