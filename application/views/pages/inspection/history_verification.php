
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>History Verification <small></small></h3>
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
	<div class="col-md-12">
        <div class="card"><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#waiting-for-history-verification" aria-controls="waiting-for-history-verification" role="tab" data-toggle="tab">Waiting for History Verification</a></li>
                <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#verified" aria-controls="verified" role="tab" data-toggle="tab">Verified</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="waiting-for-history-verification">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                        <h2>Customer List for History Verification<small></small></h2>
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
                            <table id="datatable-buttons1" class="table table-striped table-bordered no-print">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>National ID</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>Business Address</th>
                                    <th>Inspection Form</th>
                                    <th>All Chassis</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($customer_list as $value){ if($value->status==2 ||$value->status==3){?>

                                    <tr <?php if(strstr($value->duplicate_chassis,',')){ ?> style="color:#f00;" <?php }?>>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php echo $value->national_id; ?></td>
                                        <td><?php echo $value->present_address; ?></td>
                                        <td><?php echo $value->permanent_address; ?></td>
                                        <td><?php echo $value->business_address; ?></td>
                                        <td>
                                            <?php if($value->inspection_form!=''){?>
                                            <a href="<?php echo base_url().'inspection_form/'.$value->inspection_form;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'inspection_form/'.$value->inspection_form?>" alt="i_form"></a>
                                            <?php } else { echo '___';}?>
                                        </td>
                                        <td><?php echo $value->duplicate_chassis; ?></td>
                                        <td><?php echo $value->phone; ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-verify<?php echo $value->customer_id;?>"  style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Verify</a> | <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-deny<?php echo $value->customer_id;?>" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i> Deny</a></td>
                                    </tr>
                                <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            
            


            <div role="tabpanel" class="tab-pane" id="denied">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Customer List <small></small></h2>
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
                                <table id="datatable-buttons2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Present Address</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>00-00-000-000-00001</td>
                                        <td>Md. Salim Uddin</td>
                                        <td>Tongi, Gazipur.</td>
                                        <td>2017/10/25</td>
                                        <td><a href="#"><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="#" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Verify</a></td>
                                    </tr>
                                    <tr>
                                        <td>00-00-000-000-00002</td>
                                        <td>Md. Kalim Uddin</td>
                                        <td>Sonargaon Road, Dhaka.</td>
                                        <td>2017/11/15</td>
                                        <td><a href="#"><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="#" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Verify</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="verified">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Customer List <small></small></h2>
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
                            <table id="datatable-buttons3" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Present Address</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>00-00-000-000-00001</td>
                                    <td>Md. Salim Uddin</td>
                                    <td>Tongi, Gazipur</td>
                                    <td>2017/10/25</td>
                                    <td><a href="#"><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="#" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i> Deny</a></td>
                                </tr>
                                <tr>
                                    <td>00-00-000-000-00002</td>
                                    <td>Md. Kalim Uddin</td>
                                    <td>Sonargaon Road, Dhaka-1000.</td>
                                    <td>2017/11/15</td>
                                    <td><a href="#"><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="#" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i> Deny</a></td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>

    <?php foreach($customer_list as $value){ if($value->status==2 ||$value->status==3){?>
    
    <div class="modal fade bs-example-modal-lg-verify<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
            </div>
            <form action="<?php echo base_url();?>inspection/history_verification/" method="post">
            <div class="modal-body">
                <div class="x_content" id="modalContent">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th scope="row">Name</th>
                            <td><?php echo $value->customer_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Customer ID</th>
                            <td><?php echo $value->customer_code;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Father's Name</th>
                            <td><?php echo $value->father_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Mother's Name</th>
                            <td><?php echo $value->mother_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Present Address</th>
                            <td><?php echo $value->present_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Permanent Address</th>
                            <td><?php echo $value->permanent_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Business Address</th>
                            <td><?php echo $value->business_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Spouse Address</th>
                            <td><?php echo $value->spouse_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Contact No</th>
                            <td><?php echo $value->phone;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Note </th>
                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>">
                            <td><textarea class="col-md-8 col-sm-8 col-xs-8" name="history_verification_note"></textarea></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <button id="printBtnVerify<?php echo $value->customer_id;?>" class="btn btn-primary no-print">Print</button>
                <script>
                    $("#printBtnVerify<?php echo $value->customer_id;?>").click(function () {
                        // alert('Clicked');
                        $('.no-print').hide();
                        $("#modalContent").show();
                        window.print();
                        // $("#modalContent").printThis();
                        //Copy the element you want to print to the print-me div.
                        // $("#printarea").clone().appendTo("#print-me");
                        //Apply some styles to hide everything else while printing.
                        // $("body").addClass("printing");
                        //Print the window.
                        // window.print();
                        //Restore the styles.
                        // $("body").removeClass("printing");
                        //Clear up the div.
                        // $("#print-me").empty();
                        $('.no-print').show();
                    });
                </script>
            </div>
           
            <div class="modal-footer no-print">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve/" class="btn btn-primary">Verify</a> -->
                <input type="submit" value="Verify" class="btn btn-primary" >
            </div>
            </form>
        </div>
        </div>
    </div>

    <?php }}?>
    <?php foreach($customer_list as $value){ if($value->status==2 ||$value->status==3){?>
    
    <div class="modal fade bs-example-modal-lg-deny<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
            </div>
            <form action="<?php echo base_url();?>inspection/history_verification_deny/" method="post">
            <div class="modal-body">
                <div class="x_content" id="modalContent">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th scope="row">Name</th>
                            <td><?php echo $value->customer_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Customer ID</th>
                            <td><?php echo $value->customer_code;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Father's Name</th>
                            <td><?php echo $value->father_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Mother's Name</th>
                            <td><?php echo $value->mother_name;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Present Address</th>
                            <td><?php echo $value->present_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Permanent Address</th>
                            <td><?php echo $value->permanent_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Business Address</th>
                            <td><?php echo $value->business_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Spouse Address</th>
                            <td><?php echo $value->spouse_address;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Contact No</th>
                            <td><?php echo $value->phone;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Note </th>
                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>">
                            <td><textarea class="col-md-8 col-sm-8 col-xs-8" name="history_verification_note"></textarea></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <button id="printBtnVerify<?php echo $value->customer_id;?>" class="btn btn-primary no-print">Print</button>
                <script>
                    $("#printBtnVerify<?php echo $value->customer_id;?>").click(function () {
                        // alert('Clicked');
                        $('.no-print').hide();
                        $("#modalContent").show();
                        window.print();
                        // $("#modalContent").printThis();
                        //Copy the element you want to print to the print-me div.
                        // $("#printarea").clone().appendTo("#print-me");
                        //Apply some styles to hide everything else while printing.
                        // $("body").addClass("printing");
                        //Print the window.
                        // window.print();
                        //Restore the styles.
                        // $("body").removeClass("printing");
                        //Clear up the div.
                        // $("#print-me").empty();
                        $('.no-print').show();
                    });
                </script>
            </div>
           
            <div class="modal-footer no-print">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve/" class="btn btn-primary">Verify</a> -->
                <input type="submit" value="Deny" class="btn btn-primary" >
            </div>
            </form>
        </div>
        </div>
    </div>

    <?php }}?>