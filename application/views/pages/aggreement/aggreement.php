
<div class="right_col" role="main">
<div class="">
  <div class="page-title no-print">
    <div class="title_left">
      <h3>Agreement <small></small></h3>
    </div>

    <div class="title_right no-print">
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
                <li role="presentation" class="active"><a href="#waiting-for-clearence" aria-controls="waiting-for-clearence" role="tab" data-toggle="tab">Waiting for Pringting Agreements</a></li>
                <!-- <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#verified" aria-controls="verified" role="tab" data-toggle="tab">Verified</a></li> -->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-clearence">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4 class="no-print">Customer List for Agreements<small></small></h4>
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
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Business Address</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){ if($value->status >= 6 ){?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><?php echo $value->present_address; ?></td>
                                            <td><?php echo $value->permanent_address; ?></td>
                                            <td><?php echo $value->business_address; ?></td>
                                            <td><?php echo $value->phone; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><a data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a></td>
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

<?php foreach($customer_list as $value){ if($value->status>=6 ){?>
    
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
                            <th scope="row">Model</th>
                            <td><?php foreach($model_list as $model_value){if($value->model_id==$model_value->model_id){echo $model_value->model_name;}}?></td>
                            </tr>
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
                            <td><?php echo $value->total_price;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Downpayment</th>
                            <td><?php echo $value->downpayment;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Interest Rate</th>
                            <td><?php echo $value->interest_rate;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Period</th>
                            <td><?php echo $value->period;?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <button id="printBtn<?php echo $value->customer_id;?>" class="btn btn-primary no-print">Print</button>
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
            </div>

        </div>
        </div>
    </div>

    <?php }}?>
