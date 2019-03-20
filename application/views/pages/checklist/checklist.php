
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Document Checklist <small></small></h3>
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
                <li role="presentation" class="active"><a href="#waiting-for-clearence" aria-controls="waiting-for-clearence" role="tab" data-toggle="tab">Waiting for Checklist</a></li>
                <!-- <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#verified" aria-controls="verified" role="tab" data-toggle="tab">Verified</a></li> -->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-clearence">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4>Customer List for checklist<small></small></h2>
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
                            <!-- datatable-buttons -->
                                <table id="" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>SP/DLR</th>
                                        <th>Model</th>
                                        <th>Net Price</th>
                                        <th>Downpayment</th>
                                        <th>Booking Date</th>
                                        <th>Mode</th>
                                        <th>PP. Image</th>
                                        <th>NID / Birth Cert./ Passport</th>
                                        <th>Inspection</th>
                                        <th>Cheque</th>
                                        <th>MICR Cheque</th>
                                        <th>MR for DP and Reg</th>
                                        <th>Trade License</th>
                                        <th>Due DP Cheque</th>
                                        <th>Purchase Order</th>
                                        <th>Aggreements</th>
                                        <th>Promissary</th>
                                        <th>V.T.S.</th>
                                        <!-- <th>Auth Letter</th> -->
                                        <!-- <th>Bank Application Form</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ ?>
                                    <tr>
                                    <form action="<?php echo base_url();?>checklist/update_checklist/" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td>
                                            <?php if($value->mkt_id!= 0 || $value->mkt_id != NULL){
                                                     foreach($employee_list as $e_value){
                                                        if($e_value->employee_id == $value->mkt_id){
                                                            echo $e_value->employee_name;
                                                        }
                                                    }
                                                }

                                                 if($value->dealer_id!= 0 || $value->dealer_id != NULL){
                                                 foreach($dealer_list as $d_value){
                                                    if($d_value->dealer_id == $value->dealer_id){
                                                        echo $d_value->dealer_name;
                                                    }
                                                 }

                                                }?>
                                        </td>
                                        <td><?php foreach($model_list as $m_value){
                                                if($m_value->model_id == $value->model_id){
                                                    echo $m_value->model_name;
                                                }
                                            }?>
                                        </td>
                                        <td><?php echo $value->total_price - $value->discount;?></td>
                                        <td><?php echo $value->downpayment;?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php
                                        switch ($value->payment_mode) {
                                            case 1:
                                                echo 'Credit';
                                                break;

                                            case 2:
                                                echo 'Semi-cash';
                                                break;

                                            case 3:
                                                echo 'Cash';
                                                break;
                                            
                                            default:
                                                break;
                                        }
                                        ?></td>
                                        <td>
                                            <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                            <input type="checkbox" placeholder="" name="image" value="1">
                                        </td>
                                        <td><input type="checkbox" placeholder="" name="nid_birth_passport" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="inspection" value="1" ></td>
                                        <td><input type="checkbox" placeholder="" name="installment_cheque" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="installment_micr_cheque" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="money_receipt" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="trade_license" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="due_dp_cheque" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="purchase_order" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="aggreement" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="promissary" value="1"></td>
                                        <td><input type="checkbox" placeholder="" name="vts" value="1"></td>
                                        <!-- <td><input type="checkbox" placeholder="" name="auth_letter" value="1"></td> -->
                                        <!-- <td><input type="checkbox" placeholder="" name="ba_form" value="1"></td> -->
                                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                                    </form>
                                    </tr>
                                    <?php }?>
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

<script>
</script>

