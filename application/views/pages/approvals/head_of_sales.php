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
                    <div class="col-md-12 col-sm-6 col-xs-12">
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
                            <table class="table table-striped table-bordered responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Purchase Order</th>
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downpayment</th>
                                        <th>Discount</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Approved by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($customer_list as $value){ if($value->status==1){?>
                                    <tr>
                                        <form action="<?php echo base_url();?>approval_head_of_sales/decision/approve/<?php echo $value->customer_id;?>" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td>
                                        <?php if($value->purchase_order!=''){?>
                                        <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                        <?php } else { echo '___';}?>
                                        </td>
                                        <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                        <td><?php echo $value->total_price; ?></td>
                                        <td><?php echo $value->downpayment; ?></td>
                                        <td><input type="number" name="discount" value="<?php echo $value->discount;?>" ></td>
                                        <td><textarea name="head_of_sales_note"></textarea></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php foreach ($employee_list as $emp_value) { if($emp_value->employee_id == $value->zhead_id){
                                            echo $emp_value->employee_name;
                                        }
                                        }?></td>
                                        <td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <button  type="submit" class="btn btn-primary">Approve</button><a class="btn btn-danger" href="<?php echo base_url();?>approval_head_of_sales/decision/deny/<?php echo $value->customer_id;?>"> Deny</a></td>
                                        </form>
                                    </tr>
                                <?php } }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>



                <!-- Large modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                
                <?php foreach($customer_list as $value){ if($value->status==1){?>

                <div class="modal fade bs-example-modal-lg<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
                        </div>
                        <div class="modal-body">
                        <h5></h5>
                            <!-- <div class="x_content"> -->
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
                                        <th scope="row">Permanent Address</th>
                                        <td><?php echo $value->permanent_address;?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Model Name</th>
                                        <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row">Payment Mode</th>
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
                                        </tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Downpayment</th>
                                        <td><?php echo $value->downpayment; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Discount</th>
                                        <td><?php echo $value->discount; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Period</th>
                                        <td><?php echo $value->period; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Co-ordinator</th>
                                        <td><?php foreach ($employee_list as $emp_value) { if($emp_value->employee_id == $value->coordinator_id){
                                            echo $emp_value->employee_name;
                                        }
                                        }?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <a type="button" href="<?php echo base_url();?>approval_head_of_sales/decision/approve/<?php echo $value->customer_id?>" class="btn btn-primary">Approve</a> -->
                            <!-- <a type="button" href="<?php echo base_url();?>approval_head_of_sales/decision/deny/<?php echo $value->customer_id?>" class="btn btn-primary">Deny</a> -->
                        </div>

                    </div>
                    </div>
                </div>

                <?php }}?>

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
                                <table id="datatable-buttons2" class="table table-striped table-bordered responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Purchase Order</th>
                                            <th>Model No</th>
                                            <th>Total Price</th>
                                            <th>Downlpayment</th>
                                            <th>Discount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status==12){?>
                                        <tr>
                                            <form action="<?php echo base_url();?>approval_head_of_sales/decision/approve/<?php echo $value->customer_id;?>" method="post">
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td>
                                            <?php if($value->purchase_order!=''){?>
                                            <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                            <?php } else { echo '___';}?>
                                            </td>
                                            <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                            <td><?php echo $value->total_price; ?></td>
                                            <td><?php echo $value->downpayment; ?></td>
                                            <td><input type="number" name="discount" value="<?php echo $value->discount;?>" ></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><a href="" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <button  type="submit" class="btn btn-primary">Approve</button></td>
                                            </form>
                                        </tr>
                                    <?php } }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>


                 <!-- Large modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                
                <?php foreach($customer_list as $value){ if($value->status==12){?>

                <div class="modal fade bs-example-modal-lg<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
                        </div>
                        <div class="modal-body">
                        <h5></h5>
                            <!-- <div class="x_content"> -->
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
                                        <th scope="row">Permanent Address</th>
                                        <td><?php echo $value->permanent_address;?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Model Name</th>
                                        <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row">Payment Mode</th>
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
                                        </tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Downpayment</th>
                                        <td><?php echo $value->downpayment; ?></td>
                                        </tr>
                                        <th scope="row">Discount</th>
                                        <td><?php echo $value->discount; ?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <th scope="row">Period</th>
                                        <td><?php echo $value->period; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Co-ordinator</th>
                                        <td><?php foreach ($employee_list as $emp_value) { if($emp_value->employee_id == $value->coordinator_id){
                                            echo $emp_value->employee_name;
                                        }
                                        }?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a type="button" href="<?php echo base_url();?>approval_head_of_sales/decision/approve/" class="btn btn-primary">Approve</a>
                        </div>

                    </div>
                    </div>
                </div>

                <?php }}?>


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
                                        <th>Purchase Order</th>
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downlpayment</th>
                                        <th>Discount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status >1 && $value->status <=9){?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td>
                                            <?php if($value->purchase_order!=''){?>
                                            <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                            <?php } else { echo '___';}?>
                                            </td>
                                            <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                            <td><?php echo $value->total_price; ?></td>
                                            <td><?php echo $value->downpayment; ?></td>
                                            <td><?php echo $value->discount;?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                        </tr>
                                    <?php } }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="clearfix"></div>
                <!-- </div> -->
            </div>
        </div>
    </div>
  </div>
</div>
</div>


