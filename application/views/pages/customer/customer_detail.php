<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <a href="<?php echo base_url();?>customer/"><i class="fa fa-arrow-left"></i>Add New Customer</a>
      </div>

    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h3>Customer Information <small> 
                <?php
                    switch ( $customer_detail->status) {
                        case 0:
                            echo 'Waiting for approval of Zonal Head';
                            break;
                        case 1:
                            echo 'Waiting for approval of Head of Sales';
                            break;
                        case 2:
                            echo 'Waiting for Inspection and History Verification';
                            break;
                        case 3:
                            echo 'Waiting for History Verification';
                            break;
                        case 4:
                            echo 'Waiting for Inspection';
                            break;
                        case 5:
                            echo 'Waiting for Accounts Clearence';
                            break;
                        case 6:
                            echo 'Waiting for Documents Collection';
                            break;
                        case 7:
                            echo 'Waiting for Printing DO';
                            break;
                        case 8:
                            echo 'Waiting for Printing DC';
                            break;
                        case 9:
                            echo 'Delivered';
                            break;
                        case 11:
                            echo 'Denied by Zonal Head';
                            break;
                        case 12:
                            echo 'Denied by Head of Sales';
                            break;
                        case 13:
                            echo 'Inspection Failed';
                            break;
                        case 19:
                            echo 'Inspection Heldup';
                            break;
                        case 14:
                            echo 'History Verification Failed';
                            break;
                        default:
                            break;
                    }
                 ?>
            </small></h3>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <?php if($customer_detail->image_path != NULL){?>
                  <img class="img-responsive avatar-view" src="<?php echo base_url();?>files/<?php echo $customer_detail->image_path; ?>" alt="Avatar" title="Customer's Photo">
                  <?php } else {?>
                  <img class="img-responsive avatar-view" src="<?php echo base_url();?>images/user.png" alt="Avatar" title="Customer's Photo">
                  <?php }?>
                </div>
              </div>
              <h3><?php echo $customer_detail->customer_name; ?></h3>
              <h4><?php echo $customer_detail->customer_code; ?></h4>

              <ul class="list-unstyled user_data">
                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $customer_detail->present_address; ?>
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $customer_detail->occupation; ?>
                </li>

                <li class="m-top-xs">
                  <i class="fa fa-external-link user-profile-icon"></i>
                  <a href="https://webmail.ifadgroup.com/" target="_blank"><?php echo $customer_detail->email_id; ?></a>
                </li>
              </ul>

              <!-- <a class="btn btn-success" disable="true"><i class="fa fa-edit m-right-xs"></i>Edit</a> -->
              <br />

              <!-- start skills -->
              <!-- <h4>Skills</h4>
              <ul class="list-unstyled user_data">
                <li>
                  <p>Web Applications</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                  </div>
                </li>
                <li>
                  <p>Website Design</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                  </div>
                </li>
                <li>
                  <p>Automation & Testing</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                  </div>
                </li>
                <li>
                  <p>UI / UX</p>
                  <div class="progress progress_sm">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                  </div>
                </li>
              </ul> -->
              <!-- end of skills -->

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_basic_info" id="basic-info" role="tab" data-toggle="tab" aria-expanded="true">Basic Information</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_contact_detail" role="tab" id="contact-detail" data-toggle="tab" aria-expanded="false">Contact Details</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_vehicle_info" role="tab" id="vehicle-info" data-toggle="tab" aria-expanded="false">Vehicle Information</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_payment_detail" role="tab" id="payment-detail" data-toggle="tab" aria-expanded="false">Payment Details</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_authorised_info" role="tab" id="authorised-info" data-toggle="tab" aria-expanded="false">Authorised Information</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_upload" role="tab" id="upload" data-toggle="tab" aria-expanded="false">Uploads</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content col-md-10 col-lg-9">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_basic_info" aria-labelledby="basic-info">

                    <!-- start recent activity -->
                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Finance Name</b></td>
                          <td><?php echo $customer_detail->finance_name;?></td>
                          <td><b>National ID</b></td>
                          <td><?php echo $customer_detail->national_id;?></td>
                        </tr>
                        <tr>
                          <td><b>Father's Name</b></td>
                          <td><?php echo $customer_detail->father_name;?></td>
                          <td><b>Mother's Name</b></td>
                          <td><?php echo $customer_detail->mother_name;?></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                    <!-- end recent activity -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_contact_detail" aria-labelledby="contact-detail">

                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Phone</b></td>
                          <td><?php echo $customer_detail->phone;?></td>
                          <td><b>Email</b></td>
                          <td><?php echo $customer_detail->email_id;?></td>
                        </tr>
                        <tr>
                          <td><b>Present Address</b></td>
                          <td><?php echo $customer_detail->present_address;?></td>
                          <td><b>Permanent Address</b></td>
                          <td><?php echo $customer_detail->permanent_address;?></td>
                        </tr>
                        <tr>
                          <td><b>Business Address</b></td>
                          <td><?php echo $customer_detail->business_address;?></td>
                          <td><b>Spouse's Address</b></td>
                          <td><?php echo $customer_detail->spouse_address;?></td>
                        </tr>
                        <tr>
                          <td><b>City</b></td>
                          <td><?php echo $customer_detail->city_name;?></td>
                          <td><b>District</b></td>
                          <td><?php echo $customer_detail->district_name;?></td>
                        </tr>
                        <tr>
                          <td><b>Sub District/PS</b></td>
                          <td><?php echo $customer_detail->sub_district_name;?></td>
                          <td><b>Postal Code</b></td>
                          <td><?php echo $customer_detail->post_code;?></td>
                        </tr>
                        <tr>
                          <td><b>Inspection Note</b></td>
                          <td><?php echo $customer_detail->address_verification_note;?></td>
                          <td><b>Previous History Note</b></td>
                          <td><?php echo $customer_detail->history_verification_note;?></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_vehicle_info" aria-labelledby="contact-detail">
                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Model</b></td>
                          <td><?php echo $customer_detail->model_name;?></td>
                          <td><b>Model Code</b></td>
                          <td><?php echo $customer_detail->model_code;?></td>
                        </tr>
                        <tr>
                          <td><b>Price</b></td>
                          <td><?php echo $customer_detail->credit_price;?></td>
                          <td><b>Type of Vehicle</b></td>
                          <td><?php echo $customer_detail->category;?></td>
                        </tr>
                        <tr>
                          <td><b>Engine No</b></td>
                          <td><?php echo $customer_detail->engine_no;?></td>
                          <td><b>Chassis No</b></td>
                          <td><?php echo $customer_detail->chassis_no;?></td>
                        </tr>
                        <tr>
                          <td><b>Application</b></td>
                          <td><?php echo $customer_detail->application_detail;?></td>
                        </tr>
                        <tr>
                          <td><b>Type of Body</b></td>
                          <td>
                            <?php
                                switch ( $customer_detail->body_type) {
                                    case 1:
                                        echo 'Open Truck';
                                        break;
                                    case 2:
                                        echo 'Covered Van';
                                        break;
                                    case 3:
                                        echo 'BUS';
                                        break;
                                    
                                    default:
                                        break;
                                }
                             ?>
                              

                          </td>
                          <td><b>Builder Name</b></td>
                          <td><?php echo $customer_detail->body_builder_name;?></td>
                        </tr>
                        <tr>
                          <td><b>Registration</b></td>
                          <td><?php echo $customer_detail->registration_no;?></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab_payment_detail" aria-labelledby="payment-detail">
                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Payment Mode</b></td>
                          <td>
                              <?php
                                switch ( $customer_detail->payment_mode) {
                                    case 1:
                                        echo 'Credit';
                                        break;
                                    case 2:
                                        echo 'Semi-Cash';
                                        break;
                                    case 3:
                                        echo 'Cash';
                                        break;
                                    
                                    default:
                                        break;
                                }
                             ?>
                          </td>
                          <td><b>Price</b></td>
                          <td><?php echo $customer_detail->credit_price;?></td>
                        </tr>
                        <tr>
                          <td><b>Discount</b></td>
                          <td><?php echo $customer_detail->discount;?></td>
                          <td><b>Downpayment</b></td>
                          <td><?php echo $customer_detail->downpayment;?></td>
                        </tr>
                        <tr>
                          <td><b>Period</b></td>
                          <td><?php echo $customer_detail->period;?></td>
                          <td><b>Interest Rate</b></td>
                          <td><?php echo $customer_detail->interest_rate;?></td>
                        </tr>
                        <tr>
                          <td><b>Installment Starts from</b></td>
                          <td><?php echo $customer_detail->installment_start_date;?></td>
                        </tr>
                        <tr>
                          <td><b>Dealer Commission</b></td>
                          <td><?php echo $customer_detail->dealer_commission;?></td>
                          <td><b>Broker Commission</b></td>
                          <td><?php echo $customer_detail->broker_commission;?></td>
                        </tr>
                        <tr>
                          <td><b>Comment</b></td>
                          <td><?php echo $customer_detail->user_comment;?></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                  </div>
                  
                  <div role="tabpanel" class="tab-pane fade" id="tab_authorised_info" aria-labelledby="authorised-info">
                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Sales Person</b></td>
                          <td><?php echo $sales_person->employee_name;?></td>
                          <td><b>Dealer Name</b></td>
                          <td><?php echo $customer_detail->dealer_name;?></td>
                        </tr>
                        <tr>
                          <td><b>Zonal Head</b></td>
                          <td><?php echo $customer_detail->zonal_head;?></td>
                          <td><b>Recovery Manager</b></td>
                          <td><?php echo $city_detail->recovery_manager;?></td>
                        </tr>
                        <tr>
                          <td><b>Broker Name</b></td>
                          <td><?php echo $customer_detail->broker_name;?></td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_upload" aria-labelledby="upload">
                    <!-- start user projects -->
                    <table class="data table table-bordered no-margin">
                      <tbody>
                        <tr>
                          <td><b>Customer's Photo</b></td>
                          <td><?php if($customer_detail->image_path != NULL){ ?>
                            <a href="<?php echo base_url();?>files/<?php echo $customer_detail->image_path;?>" target="_blank">Click here to download!</a>
                            <?php } else { echo "Not Found!";}?>
                          </td>
                          <td><b>National ID</b></td>
                          <td><?php if($customer_detail->nid_path != NULL){ ?>
                            <a href="<?php echo base_url();?>nid/<?php echo $customer_detail->nid_path;?>" target="_blank">Click here to download!</a>
                            <?php } else { echo "Not Found!";}?>
                          </td>
                        </tr>
                        <tr>
                          <td><b>Inspection Form</b></td>
                          <td><?php if($customer_detail->inspection_form != NULL){ ?>
                            <a href="<?php echo base_url();?>inspection_form/<?php echo $customer_detail->inspection_form;?>" target="_blank">Click here to download!</a>
                            <?php } else { echo "Not Found!";}?>
                          </td>
                          <td><b>Purchase Order</b></td>
                          <td><?php if($customer_detail->purchase_order != NULL){ ?>
                            <a href="<?php echo base_url();?>purchase_order/<?php echo $customer_detail->purchase_order;?>" target="_blank">Click here to download!</a>
                            <?php } else { echo "Not Found!";}?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end user projects -->
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>