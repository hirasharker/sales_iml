<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Approval of Accounts Head <small></small></h3>
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
                <li role="presentation" class="active"><a href="#waiting-for-approval" aria-controls="waiting-for-approval" role="tab" data-toggle="tab">Waiting for Approval</a></li>
                <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-approval">
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
                            <table id="datatable-buttons1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Model No</th>
                                    <th>Total Price</th>
                                    <th>Registration Fee</th>
                                    <th>Downpayment</th>
                                    <th>Discount</th>
                                    <th>Purchase Order</th>
                                    <th>Payment Mode</th>
                                    <!-- <th>Paid Amount as DP</th> -->
                                    <!-- <th>Paid Amount as Reg</th> -->
                                    <th>Booking Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($customer_list as $value){ if($value->status == 5){?>
                                <tr>
                                    <td><?php echo $value->customer_code; ?></td>
                                    <td><?php echo $value->customer_name; ?></td>
                                    <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){ echo $m_value->model_name; }} ?></td>
                                    <td><?php echo $value->total_price; ?></td>
                                    <td><?php echo $value->registration_cost; ?></td>
                                    <td><?php echo $value->downpayment; ?></td>
                                    <td><?php echo $value->discount; ?></td>
                                    <td>
                                    <?php if($value->purchase_order!=''){?>
                                    <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                    <?php } else { echo '___';}?>
                                    </td>
                                    <td><?php 
                                            switch ($value->payment_mode){
                                                case 1:
                                                echo "Credit";
                                                break;
                                                case 2:
                                                echo "Semi Cash";
                                                break;
                                                case 3:
                                                echo "Cash";
                                                break;
                                                default:
                                                break;
                                            }
                                        ?>
                                    </td>
                                   <!--  <?php if($dp_info!=''){?>
                                    <td><?php foreach($dp_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}} ?></td>
                                    <?php } else {?>
                                    <td>0</td>
                                    <?php }?> -->

                                    <!-- <?php if($reg_info!=''){?>
                                    <td><?php foreach($reg_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}}?></td>
                                    <?php } else {?>
                                    <td>0</td>
                                    <?php }?> -->
                                    <td><?php echo $value->time_stamp; ?></td>
                                    <td><a data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value->customer_id;?>"><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="approval_accounts/decision/approve/<?php echo $value->customer_id; ?>" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a> <!-- <a href="approval_accounts/decision/deny/<?php echo $value->customer_id; ?>" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i> Deny</a> --></td>
                                </tr>
                                <?php } }?>
                                
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
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downlpayment</th>
                                        <th>Purchase Order</th>
                                        <th>Paid Amount as DP</th>
                                        <th>Paid Amount as Reg</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status==15){?>
                                    <tr>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){ echo $m_value->model_name; }} ?></td>
                                        <td><?php echo $value->total_price; ?></td>
                                        <td><?php echo $value->downpayment; ?></td>
                                        <td>
                                        <?php if($value->purchase_order!=''){?>
                                        <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                        <?php } else { echo '___';}?>
                                        </td>
                                        <!-- <?php if($dp_info!=''){?>
                                        <td><?php foreach($dp_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}} ?></td>
                                        <?php } else {?>
                                        <td>0</td>
                                        <?php }?>-->
                                        <!--<?php if($reg_info!=''){?>
                                        <td><?php foreach($reg_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}}?></td>
                                        <?php } else {?>
                                        <td>0</td>
                                        <?php }?>-->
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><a href="approval_accounts/decision/approve/<?php echo $value->customer_id; ?>" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a></td>
                                    </tr>
                                    <?php }}?>
                                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="approved">
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
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downlpayment</th>
                                        <th>Purchase Order</th>
                                        <th>Paid Amount as DP</th>
                                        <th>Paid Amount as Reg</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status > 5 && $value->status <=9){?>
                                    <tr>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){ echo $m_value->model_name; }} ?></td>
                                        <td><?php echo $value->total_price; ?></td>
                                        <td><?php echo $value->downpayment; ?></td>
                                        <td>
                                        <?php if($value->purchase_order!=''){?>
                                        <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                        <?php } else { echo '___';}?>
                                        </td>
                                        <!--<?php if($dp_info!=''){?>
                                        <td><?php foreach($dp_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}} ?></td>
                                        <?php } else {?>
                                        <td>0</td>
                                        <?php }?>-->
                                       <!--  <?php if($reg_info!=''){?>
                                        <td><?php foreach($reg_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}}?></td>
                                        <?php } else {?>
                                        <td>0</td>
                                        <?php }?> -->
                                        <td><?php echo $value->time_stamp; ?></td>
                                    </tr>
                                    <?php }}?>
                                    
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


<?php foreach($customer_list as $value){if($value->status==5){ ?>
    
    <div class="modal fade bs-example-modal-lg<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
            </div>
            
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
                            <th scope="row">Total Price</th>
                            <td><?php echo $value->total_price;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Downpayment</th>
                            <td><?php echo $value->downpayment;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Period</th>
                            <td><?php echo $value->period;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Interest Rate</th>
                            <td><?php echo $value->interest_rate;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Paid Amount as DP</th>
                            <?php if($dp_info!=''){?>
                            <td><?php foreach($dp_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}} ?></td>
                            <?php } else {?>
                            <td>0</td>
                            <?php }?>
                            </tr>
                            <tr>
                            <th scope="row">Paid Amount as Registration</th>
                            <?php if($reg_info!=''){?>
                            <td><?php foreach($reg_info as $p_value){if($p_value!=''){if($p_value->SubCode==$value->customer_code){ if($p_value!=''){echo $p_value->amount;} }}}?></td>
                            <?php } else {?>
                            <td>0</td>
                            <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- <button id="printBtn<?php echo $value->customer_id;?>" class="btn btn-primary no-print">Print</button> -->
                <script>
                    $("#printBtn<?php echo $value->customer_id;?>").click(function () {
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
                <a type="button" href="<?php echo base_url();?>approval_accounts/decision/approve/<?php echo $value->customer_id; ?>" class="btn btn-primary">Approve</a>
                <a type="button" href="<?php echo base_url();?>approval_accounts/decision/deny/<?php echo $value->customer_id; ?>" class="btn btn-danger">Deny</a>
                
                
            </div>

        </div>
        </div>
    </div>

<?php } }?>