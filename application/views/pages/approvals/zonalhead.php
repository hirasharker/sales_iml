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
	<div class="col-md-12 col-sm-12 col-xs-12">
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
                            <table id="datatable-buttons1" class="table table-striped table-bordered responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Photo</th>
                                        <th>NID</th>
                                        <th>Purchase Order</th>
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downlpayment</th>
                                        <th>Discount</th>
                                        <th>BC</th>
                                        <th>DC</th>
                                        <th>Date</th>
                                        <th>Sales Person</th>
                                        <th>Dealer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($customer_list as $value){ if($value->status==0){if($this->session->userdata('employee_id')==$value->zhead_id || $this->session->userdata('employee_id')==28){ ?>
                                    <tr>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><a href="<?php echo base_url().'files/'.$value->image_path?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'files/'.$value->image_path?>" alt="image"></a></td>
                                        <td><a href="<?php echo base_url().'nid/'.$value->nid_path;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'nid/'.$value->nid_path?>" alt="nid"></a></td>
                                        <td>
                                        <?php if($value->purchase_order!=''){?>
                                        <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                        <?php } else { echo '___';}?>
                                        </td>
                                        <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                        <td><?php echo $value->total_price; ?></td>
                                        <td><?php echo $value->downpayment; ?></td>
                                        <td><?php echo $value->discount; ?></td>
                                        <td><?php echo $value->broker_commission; ?></td>
                                        <td><?php echo $value->dealer_commission; ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php 
                                        foreach($employee_list as $emp_value){
                                            if($emp_value->employee_id==$value->mkt_id){
                                              echo $emp_value->employee_name;
                                            }
                                        }
                                        ?>
                                        </td>
                                        <td><?php
                                        if($dealer_list!=NULL){
                                            foreach($dealer_list as $d_value){
                                                if($d_value->dealer_id==$value->dealer_id){
                                                    echo $d_value->dealer_name;
                                                }
                                            }
                                        }
                                        
                                        ?></td>
                                        <td><a href="" data-toggle="modal" data-target=".approve-bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> <?php if($value->payment_mode !=3 && $value->payment_mode !=4 ){?><a href="<?php echo base_url();?>approval_zonalhead/decision/approve/<?php echo $value->customer_id;?>" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a> | <?php } else{ ?><a href="<?php echo base_url();?>approval_zonalhead/decision/approve_without_inspection/<?php echo $value->customer_id;?>" style="color:#005102"><i class="fa fa-check" aria-hidden="true" ></i> Approve without inspection</a> | <?php } ?> | <a href="<?php echo base_url();?>approval_zonalhead/decision/deny/<?php echo $value->customer_id;?>" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i> Deny</a></td>
                                    </tr>
                                <?php } } }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>



                <!-- Large modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                
                <?php foreach($customer_list as $value){ if($value->status==0){?>

                <div class="modal fade approve-bs-example-modal-lg<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <th scope="row">Period</th>
                                        <td><?php echo $value->period; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Discount</th>
                                        <td><?php echo $value->discount; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Broker Commission</th>
                                        <td><?php echo $value->broker_commission; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Dealer Commission</th>
                                        <td><?php echo $value->dealer_commission; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve/<?php echo $value->customer_id;?>" class="btn btn-primary">Approve (need inspection)</a>
                            <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve_without_inspection/<?php echo $value->customer_id;?>" class="btn btn-primary">Approve</a>
                            <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/deny/<?php echo $value->customer_id;?>" class="btn btn-primary">Deny</a> -->
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
                                            <!-- <th>Photo</th> -->
                                            <!-- <th>NID</th> -->
                                            <!-- <th>Purchase Order</th> -->
                                            <th>Model No</th>
                                            <th>Total Price</th>
                                            <th>Discount</th>
                                            <th>Downpayment</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status==11){if($this->session->userdata('employee_id')==$value->zhead_id || $this->session->userdata('employee_id')==28){ ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <!-- <td><a href="<?php echo base_url().'nid/'.$value->nid_path;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'nid/'.$value->nid_path?>" alt="nid"></a></td> -->
                                            <!-- <td>
                                            <?php if($value->purchase_order!=''){?>
                                            <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                            <?php } else { echo '___';}?>
                                            </td> -->
                                            <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                            <td><?php echo $value->total_price; ?></td>
                                            <td><?php echo $value->discount; ?></td>
                                            <td><?php echo $value->downpayment; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><a href="" data-toggle="modal" data-target=".deny-bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="<?php echo base_url();?>approval_zonalhead/decision/approve/<?php echo $value->customer_id;?>" style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a> | <a href="<?php echo base_url();?>approval_zonalhead/decision/approve_without_inspection/<?php echo $value->customer_id;?>" style="color:#005102"><i class="fa fa-check" aria-hidden="true" ></i> Approve without inspection</a></td>
                                        </tr>
                                    <?php } } }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>


                 <!-- Large modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->
                
                <?php foreach($customer_list as $value){ if($value->status==11){?>

                <div class="modal fade deny-bs-example-modal-lg<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Discount </th>
                                        <td><?php echo $value->discount; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Downpayment</th>
                                        <td><?php echo $value->downpayment; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Period</th>
                                        <td><?php echo $value->period; ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Total Price</th>
                                        <td><?php echo $value->total_price; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <!-- <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve/" class="btn btn-primary">Approve (need inspection)</a>
                            <a type="button" href="<?php echo base_url();?>approval_zonalhead/decision/approve_without_inspection/" class="btn btn-primary">Approve</a> -->
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
                                        <th>Image</th>
                                        <th>NID</th>
                                        <th>Purchase Order</th>
                                        <th>Model No</th>
                                        <th>Total Price</th>
                                        <th>Downlpayment</th>
                                        <th>Date</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status > 0 && $value->status <=9){ if($this->session->userdata('employee_id')==$value->zhead_id || $this->session->userdata('employee_id')==28){  ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><a href="<?php echo base_url().'files/'.$value->image_path?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'files/'.$value->image_path?>" alt="image"></a></td>
                                            <td><a href="<?php echo base_url().'nid/'.$value->nid_path;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'nid/'.$value->nid_path?>" alt="nid"></a></td>
                                            <td>
                                            <?php if($value->purchase_order!=''){?>
                                            <a href="<?php echo base_url().'purchase_order/'.$value->purchase_order;?>" target="_blank"><img width="30px" height="40px" src="<?php echo base_url().'purchase_order/'.$value->purchase_order?>" alt="p_order"></a>
                                            <?php } else { echo '___';}?>
                                            </td>
                                            <td><?php foreach($model_list as $m_value){ if($m_value->model_id==$value->model_id){ echo $m_value->model_name; }}?></td>
                                            <td><?php echo $value->total_price; ?></td>
                                            <td><?php echo $value->downpayment; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <!-- <td><a href="" data-toggle="modal" data-target=".approve-bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a></td> -->
                                        </tr>
                                    <?php } } }?>
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


