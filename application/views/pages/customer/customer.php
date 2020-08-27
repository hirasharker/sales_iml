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
      
      <style type="text/css">
        .required {
          color: #f00;
        }
      </style>

      <?php if($customer_id == NULL){?>
        <div class="x_panel">
            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-minus"></i></a>
                </li>
                <li class="dropdown">
                </li>
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>customer/add_customer/" enctype='multipart/form-data'>

                <div class="x_title">
                <h2>Basic Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="reference" id="reference">
                      <option value="0" permanentAddress="none">none</option>
                      <?php foreach($reference_list as $value){?>
                      <option customerName="<?php echo $value->customer_name; ?>" fatherName="<?php echo $value->father_name; ?>" motherName="<?php echo $value->mother_name; ?>" value="<?php echo $value->customer_id; ?>"><?php echo $value->customer_code; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer's Name <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="customerName" class="form-control" name="customer_name" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Finance Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="financeName" class="form-control" name="finance_name" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">National ID <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="national_id" min="0" placeholder="" value="0" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="occupation" placeholder="" >
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="fatherName" type="text" class="form-control" name="father_name" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="motherName" type="text" class="form-control" name="mother_name" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="contact_person" placeholder=""  required maxlength="50">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image (Passport Size) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="customer_image">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload NID / Birth Certificate / Passport </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="nid_file" placeholder="">
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
                      <textarea class="form-control" rows="3" id="presentAddress" name="present_address" placeholder="" required></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required" >*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="permanentAddress" class="form-control" rows="3" name="permanent_address" placeholder="" required></textarea>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"><span>Business Address (optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="business_address" placeholder=""></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"><span>Spouse's Address (optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="spouse_address" placeholder=""></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="cityId" class="form-control select-tag" name="city_id" required>
                        <option value="0">select</option>
                        <?php foreach($city_list as $value){?> 
                        <option cityCode="<?php echo $value->city_code; ?>" zoneId="<?php echo $value->zone_id; ?>" value="<?php echo $value->city_id; ?>"><?php echo $value->city_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                  <input id="zoneId" type="hidden" name="zone_id" value="0">
                  <input id="cityCode" type="hidden" name="city_code" value="0">
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">District <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="districtId" class="form-control select-tag" name="district_id" required>
                        <option value="0">select</option>
                        <?php foreach($district_list as $value){?> 
                        <option value="<?php echo $value->district_id; ?>"><?php echo $value->district_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12 sub-district-container" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub District/ Police Station <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="subDistrictId" class="form-control select-tag" name="sub_district_id" required>
                        <option value="0">select</option>
                      </select>
                  </div>
                </div>
                <?php if($this->session->userdata('user_type')!=1){?>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sales Person <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="salesPerson" class="form-control select-tag" name="mkt_id" required>
                        <option value="0">select</option>
                        <?php foreach($marketing_person_list as $value){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>
                <?php }?>




                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display:block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sales Generated By <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="sales_generated_by">
                        <option value="0">Select Employee</option>
                        <?php foreach($employee_list as $value){if($value->role == 1){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }}?>
                      </select>
                  </div>
                </div>

                



                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display:block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Zonal Head <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="zhead_id" required>
                        <option value="">Select Zonal Head</option>
                        <?php foreach($zonal_head_list as $value){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>



                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="dealer" style="display:block;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dealer <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="dealerId" class="form-control select-tag" name="dealer_id" required>
                        <option value="">Select Dealer</option>
                        <?php foreach($dealer_list as $value){?> 
                        <option value="<?php echo $value->dealer_id; ?>"><?php echo $value->dealer_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min = "1000" max="9999" class="form-control" name="post_code" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">First Mobile No <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="phone" type="text" class="form-control" maxlength="11" name="phone" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Second Mobile No (Optional)</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="phone2" type="text" class="form-control" name="phone2" placeholder="" maxlength="11">
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

                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="vehicleModel" class="form-control" name="model_id" required>
                        <option value="">select</option>
                        <?php foreach($model_list as $value){?> 
                        <option modelCode="<?php echo $value->model_code;?>" creditPrice="<?php echo $value->credit_price;?>" value="<?php echo $value->model_id; ?>"><?php echo $value->model_name;?></option>
                        <?php }?>
                      </select>
                      <input id="modelCode" type="hidden" name="model_code">
                  </div>
                </div> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12 chassis-container" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Chassis No <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="chassisNo" class="form-control select-tag" name="chassis_no" required>
                        <option value="">select</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12 engine-container" style="display: none;">
                  <input type="hidden" name="stock_id" id="stockId">
                  <input type="hidden" name="delivery_yard_id" id="delivery-yard-id">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Engine No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="engineNo" readonly type="text" class="form-control" name="engine_no" placeholder="" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="modelName" type="text" class="form-control" name="model_name" placeholder="" readonly>
                      <input id="modelId" type="hidden" name="model_id">
                      <input id="modelCode" type="hidden" name="model_code">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Application </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="application" class="form-control select-tag" name="application_id">
                        <option value="0">Others</option>
                        <?php foreach($application_list as $value){?> 
                        <option value="<?php echo $value->application_id; ?>"><?php echo $value->application_detail;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                
                

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration NO </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="registration_no" placeholder="">
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />

                <div class="row" style="display: none;">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">With Body </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                       <input type="checkbox" class="js-switch" id="withBody" value="1" name="with_body" />
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bodyTypeContainer" style="display: none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Body </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="bodyType" class="form-control select-tag" name="body_type">
                        <option value="0">Select Type</option>
                        <option value="1">Open Truck</option>
                        <option value="2">Covered Van</option>
                        <option value="3">Bus</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bodyBuilderContainer" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Builders </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="bodyBuilder" class="form-control select-tag" name="body_builder_id">
                        <option value="0">select</option>
                        <?php foreach($body_builder_list as $value){?> 
                        <option value="<?php echo $value->body_builder_id; ?>"><?php echo $value->body_builder_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>
                

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h2>Payment Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Mode <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="paymentMode" class="form-control select-tag" name="payment_mode" required>
                      <option value="1">Credit</option>
                      <option value="2">Semi Cash</option>
                      <option value="3">Cash</option>
                      <!-- <option value="4">Corporate</option> -->
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Purchase Order </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="purchase_order" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Downpayment <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="downPayment" type="number" class="form-control"  value="0" min="0" name="downpayment" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Period <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="period" class="form-control select-tag" name="period" required>
                      <option value="">Select </option>
                      <option value="3">3</option>
                      <option value="6">6</option>
                      <option value="9">9</option>
                      <option value="12">12</option>
                      <option value="15">15</option>
                      <option value="24">24</option>
                      <option value="30">30</option>
                      <option value="36">36</option>
                      <!-- <option value="4">Corporate</option> -->
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="interestRate" type="number" class="form-control" name="interest_rate" min="0" placeholder="" value="0" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Starts from <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="installment_start_date" placeholder="" min="0" value="30" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Proposed Discount <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="discount" type="number" class="form-control" name="discount"  min="0" value="0" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12 additional-charge-container" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Charge <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="additional-charge" type="number" class="form-control" name="additional_charge"  min="0" value="0" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dealer Commission <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="dealer-commission" type="number" class="form-control" name="dealer_commission"  min="0" value="0" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Price </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="totalPrice" type="number" class="form-control" name="total_price"  min="0" value="0" placeholder="" disabled="true">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Cost </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="registrationCost" type="number" class="form-control" name="registration_cost"  min="0" value="0" placeholder="" readonly="true">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Depositted Amount <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="deposit-amount" type="number" class="form-control"  value="0" min="20000" name="deposit_amount" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Deposit Slip (DP) <span class="required">*</span></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="deposit_slip" placeholder="" required>
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                       <input type="checkbox" class="js-switch" id="broker" value="1" name="broker" />
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none" id="broker-name-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-name" type="text" class="form-control" name="broker_name" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none" id="broker-nid-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker NID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-nid" type="number" class="form-control" name="broker_nid" min="0" value="0" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none" id="broker-commission-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker Commission </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-commission" type="number" class="form-control" name="broker_commission" min="0" value="0" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="user_comment" placeholder=""></textarea>
                  </div>
                </div>

                

                <div class="clearfix"></div>
                <br />

                
                

                
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                
                <div class="clearfix"></div>
                <br />
            </form>
            </div>
        </div>








        <?php } else {?>






        <div class="x_panel">
            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Edit Customer <i class="fa fa-minus"></i></a>
                </li>
                <li class="dropdown">
                </li>
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>customer/update_customer/" enctype='multipart/form-data'>
                <input type="hidden" name="customer_id" value="<?php echo $customer_detail->customer_id; ?>">

                <div class="x_title">
                <h2>Basic Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="status" id="status">
                      <option value="0" <?php if($customer_detail->status == 0){echo 'selected';} ?> >Waiting for ZM</option>
                      <option value="1" <?php if($customer_detail->status == 1){echo 'selected';} ?> >Waiting for Head of Sales</option>
                      <option value="2" <?php if($customer_detail->status == 2){echo 'selected';} ?> >Waiting for Inspection and History</option>
                      <option value="4" <?php if($customer_detail->status == 4){echo 'selected';} ?> >Waiting for Inspection</option>
                      <option value="3" <?php if($customer_detail->status == 3){echo 'selected';} ?> >Waiting for History</option>
                      <option value="5" <?php if($customer_detail->status == 5){echo 'selected';} ?> >Waiting for Accounts</option>
                      <option value="6" <?php if($customer_detail->status == 6){echo 'selected';} ?> >Waiting for Documents</option>
                      <option value="7" <?php if($customer_detail->status == 7){echo 'selected';} ?> >Waiting for DO</option>
                      <option value="8" <?php if($customer_detail->status == 8){echo 'selected';} ?> >Waiting for DC</option>
                      <option value="9" <?php if($customer_detail->status == 9){echo 'selected';} ?> >Delivered</option>
                      <option value="11" <?php if($customer_detail->status == 11){echo 'selected';} ?> >Denied by ZM</option>
                      <option value="12" <?php if($customer_detail->status == 12){echo 'selected';} ?> >Denied by Head of Sales</option>
                      <option value="13" <?php if($customer_detail->status == 13){echo 'selected';} ?> >Inspection Failed</option>
                      <option value="19" <?php if($customer_detail->status == 19){echo 'selected';} ?> >Inspection Heldup</option>
                      <option value="14" <?php if($customer_detail->status == 14){echo 'selected';} ?> >History Ver. Failed</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="customerName" class="form-control" name="customer_name" placeholder="" value="<?php echo $customer_detail->customer_name; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Finance Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" id="customerName" class="form-control" name="finance_name" placeholder="" value="<?php echo $customer_detail->finance_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">National ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="national_id" min="0" placeholder="" value="<?php echo $customer_detail->national_id; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="occupation" placeholder="" value="<?php echo $customer_detail->occupation; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="fatherName" type="text" class="form-control" name="father_name" placeholder="" value="<?php echo $customer_detail->father_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="motherName" type="text" class="form-control" name="mother_name" placeholder="" value="<?php echo $customer_detail->mother_name; ?>">
                  </div>
                </div>
               
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image (Passport Size) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="customer_image">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload NID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="nid_file" placeholder="">
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
                      <textarea class="form-control" rows="3" id="presentAddress" name="present_address" placeholder="" required><?php echo $customer_detail->present_address; ?></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required" >*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea id="permanentAddress" class="form-control" rows="3" name="permanent_address" placeholder="" required><?php echo $customer_detail->permanent_address; ?></textarea>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"><span>Business Address (optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="business_address" placeholder=""><?php echo $customer_detail->business_address; ?></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"><span>Spouse's Address (optional)</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="spouse_address" placeholder=""><?php echo $customer_detail->spouse_address; ?></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">City </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="cityId" class="form-control select-tag" name="city_id" required>
                        <option value="">select</option>
                        <?php foreach($city_list as $value){?> 
                        <option cityCode="<?php echo $value->city_code; ?>" zoneId="<?php echo $value->zone_id; ?>" value="<?php echo $value->city_id; ?>" <?php if($customer_detail->city_id == $value->city_id){ echo 'selected';} ?> ><?php echo $value->city_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                  <input id="zoneId" type="hidden" name="zone_id" value="<?php echo $customer_detail->zone_id; ?>">
                  <input id="cityCode" type="hidden" name="city_code" value="<?php echo $customer_detail->city_code; ?>">
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">District </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="districtId" class="form-control select-tag" name="district_id" required>
                        <option value="">select</option>
                        <?php foreach($district_list as $value){?> 
                        <option value="<?php echo $value->district_id; ?>" <?php if($customer_detail->district_id == $value->district_id){ echo 'selected';} ?> ><?php echo $value->district_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12 sub-district-container" style="display: block;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub District/ Police Station </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="subDistrictId" class="form-control select-tag" name="sub_district_id" required>
                        <option value="">select</option>
                        <?php foreach ($sub_district_list as $sd_value) {?>
                        <option value="<?php echo $sd_value->sub_district_id; ?>" <?php if($customer_detail->sub_district_id == $sd_value->sub_district_id){ echo 'selected';} ?> ><?php echo $sd_value->sub_district_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
                <?php if($this->session->userdata('user_type')!=1){?>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sales Person </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="salesPerson" class="form-control select-tag" name="mkt_id" required>
                        <option value="">select</option>
                        <?php foreach($marketing_person_list as $value){?> 
                        <option value="<?php echo $value->employee_id; ?>" <?php if($customer_detail->mkt_id == $value->employee_id){ echo 'selected';} ?> ><?php echo $value->employee_name;?></option>
                        <?php }?>
                        <option value="0">Dealer</option>
                      </select>
                  </div>
                </div>
                <?php }?>


                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display:block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sales Generated By </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="sales_generated_by">
                        <option value="">Select Employee</option>
                        <?php foreach($employee_list as $value){if($value->role == 1){?> 
                        <option value="<?php echo $value->employee_id; ?>" <?php if($customer_detail->sales_generated_by == $value->employee_id){ echo 'selected';} ?> ><?php echo $value->employee_name;?></option>
                        <?php }}?>
                      </select>
                  </div>
                </div>

                



                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display:block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Zonal Head </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="zhead_id" required>
                        <option value="">Select Zonal Head</option>
                        <?php foreach($zonal_head_list as $value){?> 
                        <option value="<?php echo $value->employee_id; ?>" <?php if($customer_detail->zhead_id == $value->employee_id){ echo 'selected';} ?> ><?php echo $value->employee_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>


                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display:block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Head of Sales </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="zhead_id" required>
                        <option value="">Select Head of Sales</option>
                        <?php foreach($head_of_sales_list as $value){?> 
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div> -->









                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="dealer" style="display:none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dealer </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="dealerId" class="form-control select-tag" name="dealer_id">
                        <option value="">Select Dealer</option>
                        <?php foreach($dealer_list as $value){?> 
                        <option value="<?php echo $value->dealer_id; ?>" <?php if($customer_detail->dealer_id == $value->dealer_id){ echo 'selected';} ?> ><?php echo $value->dealer_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="post_code" placeholder="" required value="<?php echo $customer_detail->post_code; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="phone" type="text" class="form-control" name="phone" placeholder="" value="<?php echo $customer_detail->phone; ?>" required>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="email_id" value="<?php echo $customer_detail->email_id; ?>" placeholder="">
                  </div>
                </div>
                <div class="clearfix"></div>
                <br />

                <div class="x_title">
                <h2>Vehicle Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12 chassis-container" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Chassis No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="chassisNo" class="form-control select-tag" name="chassis_no" required>
                        <option value="">select</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12 engine-container" style="display: none;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Engine No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="engineNo" readonly type="text" class="form-control" name="engine_no" placeholder="" >
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="vehicleModel" class="form-control select-tag" name="model_id" required>
                        <option value="">select</option>
                        <?php foreach($model_list as $value){?> 
                        <option modelCode="<?php echo $value->model_code;?>" creditPrice="<?php echo $value->credit_price;?>" value="<?php echo $value->model_id; ?>" <?php if($customer_detail->model_id == $value->model_id){ echo 'selected';} ?> ><?php echo $value->model_name;?></option>
                        <?php }?>
                      </select>
                      <input id="modelCode" type="hidden" name="model_code" value="<?php echo $customer_detail->model_code; ?>">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Application </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="application" class="form-control select-tag" name="application_id" required>
                        <option value="">select</option>
                        <?php foreach($application_list as $value){?> 
                        <option value="<?php echo $value->application_id; ?>" <?php if($customer_detail->application_id == $value->application_id){ echo 'selected';} ?> ><?php echo $value->application_detail;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Engine No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="engine_no" placeholder="" value="<?php echo $customer_detail->engine_no; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Chassis No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="chassis_no" placeholder="" value="<?php echo $customer_detail->chassis_no; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="registration_no" placeholder="" value="<?php echo $customer_detail->registration_no; ?>">
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />

                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">With Body </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                       <input type="checkbox" class="js-switch" id="withBody" value="1" name="with_body" <?php if($customer_detail->body_type != 0 && $customer_detail->body_type != ""){echo "checked";} ?> />
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bodyTypeContainer" style="display: block">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Body </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="bodyType" class="form-control select-tag" name="body_type">
                        <option value="0">Select Type</option>
                        <option value="1" <?php if($customer_detail->body_type == 1){ echo 'selected';} ?> >Open Truck</option>
                        <option value="2" <?php if($customer_detail->body_type == 2){ echo 'selected';} ?> >Covered Van</option>
                        <option value="3" <?php if($customer_detail->body_type == 3){ echo 'selected';} ?> >Bus</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bodyBuilderContainer" style="display: block;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Builders </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="bodyBuilder" class="form-control select-tag" name="body_builder_id">
                        <option value="">select</option>
                        <?php foreach($body_builder_list as $value){?> 
                        <option value="<?php echo $value->body_builder_id; ?>" <?php if($customer_detail->body_builder_id == $value->body_builder_id){ echo 'selected';} ?> ><?php echo $value->body_builder_name;?></option>
                        <?php }?>
                      </select>
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
                      <select id="paymentMode" class="form-control select-tag" name="payment_mode" required>
                      <option value="1" <?php if($customer_detail->payment_mode == 1){ echo 'selected';} ?> >Credit</option>
                      <option value="2" <?php if($customer_detail->payment_mode == 2){ echo 'selected';} ?> >Semi Cash</option>
                      <option value="3" <?php if($customer_detail->payment_mode == 3){ echo 'selected';} ?> >Cash</option>
                      <!-- <option value="4">Corporate</option> -->
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Purchase Order </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" name="purchase_order" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Downpayment </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="downPayment" type="number" class="form-control"  min="0" name="downpayment" value="<?php echo $customer_detail->downpayment; ?>" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Period </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="period" type="number" class="form-control" name="period" min="0" placeholder="" value="<?php echo $customer_detail->period; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="interestRate" type="number" class="form-control" name="interest_rate" min="0" placeholder="" value="<?php echo $customer_detail->interest_rate; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Installment Starts from </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" name="installment_start_date" placeholder="" min="0" value="<?php echo $customer_detail->installment_start_date; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Proposed Discount </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="discount" type="text" class="form-control" name="discount"  min="0" value="<?php echo $customer_detail->discount; ?>" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Dealer Commission </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="dealer-commission" type="number" class="form-control" name="dealer_commission"  min="0" value="<?php echo $customer_detail->dealer_commission; ?>" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Price </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="total-price" type="number" class="form-control" name="total_price"  min="0" value="<?php echo $customer_detail->total_price; ?>" placeholder="" disabled="true">
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                       <input type="checkbox" class="js-switch" id="broker" value="1" name="broker" <?php if($customer_detail->broker_name != "" || $customer_detail->broker_nid != 0){echo "checked";} ?> />
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: block" id="broker-name-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-name" type="text" class="form-control" name="broker_name" value="<?php echo $customer_detail->broker_name; ?>" placeholder="">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: block" id="broker-nid-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker NID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-nid" type="number" class="form-control" name="broker_nid" min="0" value="<?php echo $customer_detail->broker_nid; ?>" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12" style="display: block;" id="broker-commission-container">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Broker Commission </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="broker-commission" type="number" class="form-control" name="broker_commission" min="0" value="<?php echo $customer_detail->broker_commission; ?>" placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" name="user_comment" placeholder=""><?php echo $customer_detail->user_comment; ?>"</textarea>
                  </div>
                </div>

                

                <div class="clearfix"></div>
                <br />

                
                

                
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                
                <div class="clearfix"></div>
                <br />
            </form>
            </div>
        </div>
        <?php }?>



      </div>
  </div>

















  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h3>Search Customer</h3>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="height:auto">
            <br />
            <!-- <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>report/generate_booking_report/" enctype='multipart/form-data'> -->
            <form class="form-horizontal form-label-left" enctype='multipart/form-data' action="#">


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
                                  url: "<?php echo base_url()?>customer/generate_individual_customer/",
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
                                  url: "<?php echo base_url()?>customer/generate_individual_customer/",
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

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){ 
      var dataTable = $('#datatable-buttons-custom').DataTable({
          dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ],
           "processing":true,  
           "serverSide":true,  
           "order":[], 
           "ajax":{  
                url:"<?php echo base_url() . 'customer/generate_customer'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {
                     "defaultContent": "-",  
                     "targets":"_all",
                },  
           ],  
      });  
 });  
</script>

<script>
  $(function() { 
      $("#period option[value='3']").remove();
      $("#period option[value='6']").remove();
      $("#period option[value='9']").remove();
      $("#period option[value='12']").remove();
      $("#period option[value='15']").remove();


      $("#reference").change(function(){ 
          var element = $(this).find('option:selected'); 
          var customerName = element.attr("customerName");
          var fatherName = element.attr("fatherName");
          var motherName = element.attr("motherName");
          var permanentAddress = element.attr("permanentAddress");
          var presentAddress = element.attr("presentAddress");

          // $('#permanentAddress').val(permanentAddress);
          // $('#presentAddress').val(presentAddress);
          
          if($("#reference").val()!="NULL"){
            $('#customerName').val(customerName);
            $('#fatherName').val(fatherName);
            $('#motherName').val(motherName);
            $('#phone').prop('disabled', true);
            $('#permanentAddress').prop('disabled', true);
            $('#presentAddress').prop('disabled', true);
          }else{
            $('#customerName').val("");
            $('#fatherName').val("");
            $('#motherName').val("");
            $('#phone').prop('disabled', false);
            $('#permanentAddress').prop('disabled', false);
            $('#presentAddress').prop('disabled', false);
          }
            
      });
      $("#cityId").change(function(){ 
          var element = $(this).find('option:selected'); 
          var zoneId = element.attr("zoneId");
          var cityCode = element.attr("cityCode");
          
          $('#zoneId').val(zoneId);
          $('#cityCode').val(cityCode);

          
          if($('#salesPerson').val()!="NULL"){
              // $('#salesPerson').empty();
          }
          var dropDown = document.getElementById("cityId");
          var cityId = dropDown.options[dropDown.selectedIndex].value;
          // $.ajax({
          //         type: "POST",
          //         url: "<?php echo base_url()?>customer/get_sales_person/",
          //         data: { 'cityId': cityId  },
          //         success: function(data){
          //             // Parse the returned json data
          //             var opts = $.parseJSON(data);
          //             // Use jQuery's each to iterate over the opts value
          //             $('#salesPerson').append('<option value="">Select Sales Person</option>');

          //             $.each(opts, function(i, d) {
          //                 // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
          //                 $('#salesPerson').append('<option value="' + d.employee_id + '">' + d.employee_name + '</option>');

          //             });
          //             $('#salesPerson').append('<option value="0">Dealer</option>');
          //         }
          //     });
      });

      $("#districtId").change(function(){
          // $('#subDistrictId').val('');
          // $('#subDistrictId').change();
          if($('#districtId').val()!="NULL"){
            $('#subDistrictId').empty();
            $(".sub-district-container").css("display", "block");
            // $('.sub-district-container').show(500);
          }
          var districtId = $('#districtId option:selected').val();
          console.log(districtId);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>customer/ajax_generate_sub_districts/",
              data: { 'district_id': districtId  },
              success: function(data){
                  // Parse the returned json data
                  var opts = $.parseJSON(data);
                  // Use jQuery's each to iterate over the opts value
                  console.log(opts);
                  $('#subDistrictId').append('<option value="">Select </option>');

                  $.each(opts, function(i, d) {
                    console.log(d.sub_district_id);
                      // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      $('#subDistrictId').append('<option value="' + d.sub_district_id + '">' + d.sub_district_name + '</option>');

                  });
              }
          });
      });

      $("#dealerId").change(function(){
          // $('#subDistrictId').val('');
          // $('#subDistrictId').change();
          if($('#dealerId').val()!="NULL"){
            $('#chassisNo').empty();
            $('#engineNo').val('');
            $('#modelId').val('');
            $('#modelName').val('');
            $('#modelCode').val('');
            $('#totalPrice').val('');

            $(".chassis-container").css("display", "block");
            // $('.sub-district-container').show(500);
          }
          var dealerId = $('#dealerId option:selected').val();
          console.log(dealerId);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>customer/ajax_generate_stock/",
              data: { 'dealer_id': dealerId  },
              success: function(data){
                  // Parse the returned json data
                  var opts = $.parseJSON(data);
                  // Use jQuery's each to iterate over the opts value
                  console.log(opts);
                  $('#chassisNo').append('<option value="">Select </option>');

                  $.each(opts, function(i, d) {
                    console.log(d.sub_district_id);
                      // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      $('#chassisNo').append('<option value="' + d.chassis_no + '">' + d.chassis_no + '</option>');

                  });
              }
          });
      });

      $("#chassisNo").change(function(){
          // $('#subDistrictId').val('');
          // $('#subDistrictId').change();
          if($('#chassisNo').val()!=""){
            $(".engine-container").css("display", "block");
            // $('.sub-district-container').show(500);
          }else {
            $('#stockId').val('');
            $('#engineNo').val('');
            $(".engine-container").css("display", "none");
            $('#modelId').val('');
            $('#modelCode').val('');
            $('#modelName').val('');
            $('#totalPrice').val('');
            $('#registrationCost').val('0');
          }

          var chassisNo = $('#chassisNo option:selected').val();
          console.log(chassisNo);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>customer/ajax_generate_engine_no/",
              data: { 'chassis_no': chassisNo  },
              success: function(data){
                  // Parse the returned json data
                  var opts = $.parseJSON(data);
                  // Use jQuery's each to iterate over the opts value
                  // console.log(opts);
                  $('#stockId').val(opts.stock_id);
                  $('#engineNo').val(opts.engine_no);
                  $('#modelId').val(opts.model_id);
                  $('#modelCode').val(opts.model_code);
                  $('#modelName').val(opts.model_name);
                  $('#totalPrice').val(opts.credit_price);
                  $('#delivery-yard-id').val(opts.yard_id);
                  if(opts.registration_cost == null){
                     $('#registrationCost').val("0");
                  }else {
                     $('#registrationCost').val(opts.registration_cost);
                  }
              }
          });
      });


      $("#period").change(function(){

          var chassisNo = $('#chassisNo option:selected').val();
          var period  = $('#period option:selected').val();
          var modelId = $("#modelId"). val();
         
          $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>customer/ajax_generate_engine_no/",
              data: { 'chassis_no': chassisNo  },
              success: function(data){
                  var opts = $.parseJSON(data);
                  var totalPrice  = opts.credit_price;
                  switch(period){
                    case "1":
                    case "2":
                    case "3":
                      console.log(period);

                      if(modelId == 71 || modelId == 72){
                        $(".additional-charge-container").css("display", "block");
                      } else {
                        $(".additional-charge-container").css("display", "none");
                        $('#totalPrice').val(parseFloat(totalPrice) + 5000);
                      }
                      break;
                    case "6":
                      if(modelId == 71 || modelId == 72){
                        $(".additional-charge-container").css("display", "block");
                      } else {
                        $(".additional-charge-container").css("display", "none");
                        $('#totalPrice').val(parseFloat(totalPrice) + 10000);
                      }
                      break;
                    case "9":
                      if(modelId == 71 || modelId == 72){
                        $(".additional-charge-container").css("display", "block");
                      } else {
                        $(".additional-charge-container").css("display", "none");
                        $('#totalPrice').val(parseFloat(totalPrice) + 15000);
                      }
                      break;
                    case "12":
                      if(modelId == 71 || modelId == 72){
                        $(".additional-charge-container").css("display", "block");
                      } else {
                        $(".additional-charge-container").css("display", "none");
                        $('#totalPrice').val(parseFloat(totalPrice) + 20000);
                      }
                      break;
                    case "15":
                      if(modelId == 71 || modelId == 72){
                        $(".additional-charge-container").css("display", "block");
                      } else {
                        $(".additional-charge-container").css("display", "none");
                        $('#totalPrice').val(parseFloat(totalPrice) + 30000);
                      }
                      break;
                    default:
                      $(".additional-charge-container").css("display", "none");
                      $('#totalPrice').val(parseFloat(totalPrice));
                      break;
                  } // Switch---
                 
              }
          });

      });


      $("#vehicleModel").change(function(){ 
          var element = $(this).find('option:selected'); 
          var modelCode = element.attr("modelCode");
          var totalPrice = element.attr("creditPrice");
          
          $('#modelCode').val(modelCode);
          $('#total-price').val(totalPrice);

      });
      
      $("#paymentMode").change(function(){ 
          var element = $(this).find('option:selected'); 
          if($("#paymentMode").val()==3){
            $('#period').prop('disabled', true);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', true);
            $('#period').val("0");
            $('#interestRate').val("0");
            $('#downpayment').val("0");
          } else if($("#paymentMode").val()==4){
            $('#period').prop('disabled', true);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', true);
            $('#period').val("0");
            $('#interestRate').val("0");
            $('#downpayment').val("0");
          } else if ($("#paymentMode").val()==2){
            $('#period').prop('disabled', false);
            $('#interestRate').prop('disabled', true);
            $('#downPayment').prop('disabled', false);
            $('#period').val("0");
            $('#interestRate').val("0");
            $('#downpayment').val("0");
            $("#period option[value='24']").remove();
            $("#period option[value='30']").remove();
            $("#period option[value='36']").remove();
            $('#period').append('<option value="3">3</option>');
            $('#period').append('<option value="6">6</option>');
            $('#period').append('<option value="9">9</option>');
            $('#period').append('<option value="12">12</option>');
            $('#period').append('<option value="15">15</option>');
          } else{
            $('#period').prop('disabled', false);
            $('#totalPrice').prop('disabled', false);
            $('#downPayment').prop('disabled', false);
            $('#interestRate').prop('disabled', false);
            $('#period').val("0");
            $('#interestRate').val("0");
            $('#downpayment').val("0");
            $("#period option[value='3']").remove();
            $("#period option[value='6']").remove();
            $("#period option[value='9']").remove();
            $("#period option[value='12']").remove();
            $("#period option[value='15']").remove();
            $('#period').append('<option value="24">24</option>');
            $('#period').append('<option value="30">30</option>');
            $('#period').append('<option value="36">36</option>');
          }
          // $('#zoneId').val(zoneId);
      });



      $("#withBody").change( function(){
        console.log('clicked!');
        if( $(this).is(':checked') ) {
          $( "#bodyTypeContainer" ).show(500);
          $( "#bodyBuilderContainer" ).show(500);
        }else {
          $('#bodyType').val('');
          $('#bodyType').change();
          $('#bodyBuilder').val('');
          $('#bodyBuilder').change();
          $( "#bodyTypeContainer" ).hide(500);
          $( "#bodyBuilderContainer" ).hide(500);
          // $('#customerType').prop('disabled',false);
          // resetForm();
        }
      });
      
      $("#broker").change( function(){
        console.log('clicked!');
        if( $(this).is(':checked') ) {
           console.log('checked!');
          $( "#broker-name-container" ).show(500);
          $( "#broker-nid-container" ).show(500);
          $( "#broker-commission-container" ).show(500);
        }else {
          $('#broker_nid').val('');
          $('#broker_name').val('');
          $('#broker_commission').val('');
          $( "#broker-name-container" ).hide(500);
          $( "#broker-nid-container" ).hide(500);
          $( "#broker-commission-container" ).hide(500);
          // $('#customerType').prop('disabled',false);
          // resetForm();
        }
      });

      $("#reset").click(function(){
          $('#permanentAddress').prop('disabled', false);
          $('#presentAddress').prop('disabled', false);
          $('#period').prop('disabled', false);
          $('#interestRate').prop('disabled', false);
          $('#discount').prop('disabled', false);
          $("#paymentMode").val("1").change();
          $("#reference").val("NULL").change();
      });
  }); 
</script>

<script type="text/javascript">
  var dealerId = $('#dealerId option:selected').val();
  console.log(dealerId);
  $.ajax({
      type: "POST",
      url: "<?php echo base_url()?>customer/ajax_generate_stock/",
      data: { 'dealer_id': dealerId  },
      success: function(data){
          // Parse the returned json data
          var opts = $.parseJSON(data);
          // Use jQuery's each to iterate over the opts value
          console.log(opts);
          $('#chassisNo').append('<option value="">Select </option>');

          $.each(opts, function(i, d) {
            console.log(d.sub_district_id);
              // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
              $('#chassisNo').append('<option value="' + d.chassis_no + '">' + d.chassis_no + '</option>');

          });
      }
  });
</script>



