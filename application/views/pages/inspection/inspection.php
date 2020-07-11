<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>




<div class="right_col" role="main" class="no-print">
<div class="">
  <div class="page-title no-print">
    <div class="title_left">
      <h3>Address Verification <small></small></h3>
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
  <div class="row no-print">
	<div class="col-md-12">
        <div class="card"><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#waiting-for-address-verification" aria-controls="waiting-for-address-verification" role="tab" data-toggle="tab">Waiting for Address Verification</a></li>
                <li role="presentation"><a href="#temporary-heldup" aria-controls="temporary-heldup" role="tab" data-toggle="tab">Temporary Heldup</a></li>
                <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#verified" aria-controls="verified" role="tab" data-toggle="tab">Verified</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-address-verification">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h2>Customer List for Address Verification<small></small></h2>
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
                              <?php if($this->session->userdata('message')!=NULL){?>
                              <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo $this->session->userdata('message'); $this->session->unset_userdata('message');?></strong>
                              </div>
                              <?php }?>

                              <?php if($this->session->userdata('inspection_error')!=NULL){?>
                              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><?php echo $this->session->userdata('inspection_error'); $this->session->unset_userdata('inspection_error');?></strong>
                              </div>
                              <?php }?>
                                <table id="" class="table table-striped table-bordered no-print">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Present Address</th>
                                        <th>Permanent Address</th>
                                        <th>Model</th>
                                        <!-- <th>Business Address</th> -->
                                        <th>Mode</th>
                                        <th>Period</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($pending_customer_list as $value){ ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><?php echo $value->present_address; ?></td>
                                            <td><?php echo $value->permanent_address; ?></td>
                                            <!-- <td><?php echo $value->business_address; ?></td> -->
                                            <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){
                                                echo $m_value->model_name;
                                            } }
                                            ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    switch ($value->payment_mode){
                                                        case 1:
                                                        echo "CREDIT";
                                                        break;
                                                        case 2:
                                                        echo "SEMI-CASH";
                                                        break;
                                                        case 3:
                                                        echo "CASH";
                                                        break;
                                                         case 3:
                                                        echo "CORPORATE";
                                                        break;
                                                        default:
                                                        break;
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $value->period;?></td>
                                            <td><?php echo $value->phone; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><a type="button" class="btn btn-primary approve" data-toggle="modal" data-target="#approve" data-whatever="@mdo" data-customer-id="<?php echo $value->customer_id; ?>">approve</a>

                                                <a type="button" class="btn btn-primary heldup" data-toggle="modal" data-target="#heldup" data-whatever="@mdo" data-customer-id="<?php echo $value->customer_id; ?>">heldup</a>

                                                <a type="button" class="btn btn-primary deny" data-toggle="modal" data-target="#deny" data-whatever="@mdo" data-customer-id="<?php echo $value->customer_id; ?>">deny</a>

                                                <form action="<?php echo base_url(); ?>inspection/print_inspection_form" target="_blank" method="post">
                                                    <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                                    <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-print"></i> print</a>
                                                </form>
                                                <?php if($this->session->userdata('role')==15){?>
                                                <form action="<?php echo base_url(); ?>inspection/inspection_form_pdf" target="_blank" method="post">
                                                    <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                                    <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-print"></i> test</a>
                                                </form>

                                                
                                                <?php }?>

                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div role="tabpanel" class="tab-pane" id="temporary-heldup">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h2>Customer List for Address Verification (Temporary Heldup)<small></small></h2>
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
                                    <?php foreach($temp_customer_list as $value){ ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><?php echo $value->present_address; ?></td>
                                            <td><?php echo $value->permanent_address; ?></td>
                                            <td><?php echo $value->business_address; ?></td>
                                            <td><?php echo $value->phone; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><a type="button" class="btn btn-primary approve" data-toggle="modal" data-target="#approve" data-whatever="@mdo" data-customer-id="<?php echo $value->customer_id; ?>">approve</a>

                                                <a type="button" class="btn btn-primary deny" data-toggle="modal" data-target="#deny" data-whatever="@mdo" data-customer-id="<?php echo $value->customer_id; ?>">deny</a>

                                                <form action="<?php echo base_url(); ?>inspection/print_inspection_form" target="_blank" method="post">
                                                    <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                                    <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-print"></i> print</a>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php }?>
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
                                        <th>Permanent Address</th>
                                        <th>Business Address</th>
                                        <th>Note</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($denied_customer_list as $value){ ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><?php echo $value->present_address; ?></td>
                                            <td><?php echo $value->permanent_address; ?></td>
                                            <td><?php echo $value->business_address; ?></td>
                                            <td><?php echo $value->address_verification_note; ?></td>
                                            <td><?php echo $value->phone; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td><!-- <a data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value->customer_id;?>" ><i class="fa fa-expand" aria-hidden="true" ></i> Detail</a> | <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-verify<?php echo $value->customer_id;?>"  style="color:#269414"><i class="fa fa-check" aria-hidden="true" ></i> Verify</a> --></td>
                                        </tr>
                                    <?php }?>
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
                                    <?php foreach($approved_customer_list as $value){?>
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



    <?php foreach($pending_customer_list as $value){ ?>
    
    <!-- <div class="modal fade bs-example-modal-lg-verify<?php echo $value->customer_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close no-print" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Customer Detail</h4>
            </div>
            <form id="pending-customer-list-<?php echo $value->customer_id; ?>" action="<?php echo base_url();?>inspection/address_verification/" method="post" enctype='multipart/form-data'>
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
                                <th>Model</th>
                                <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){
                                    echo $m_value->model_name;
                                } }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Mode</th>
                                <td>
                                    <?php 
                                        switch ($value->payment_mode){
                                            case 1:
                                            echo "CREDIT";
                                            break;
                                            case 2:
                                            echo "SEMI-CASH";
                                            break;
                                            case 3:
                                            echo "CASH";
                                            break;
                                             case 3:
                                            echo "CORPORATE";
                                            break;
                                            default:
                                            break;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Period</th>
                                <td><?php echo $value->period;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Contact No</th>
                            <td><?php echo $value->phone;?></td>
                            </tr>
                            <tr>
                            <th scope="row">Note </th>
                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>">
                            <td><textarea class="col-md-8 col-sm-8 col-xs-8" name="address_verification_note" required></textarea></td>
                            </tr>
                            
                            <tr>
                            <th scope="row">Upload Inspection Form </th>
                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>" required >
                            <td><input type="file" class="form-control" name="inspection_form"></td>
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
                
                <input type="submit" value="Verify" class="btn btn-primary">
                
                
            </div>
            </form>

        </div>
        </div>
    </div> -->



    <?php }?>



<!-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#deny" data-whatever="@mdo">deny</a> -->


<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
    <!-- AJAX OUTPUT GOES HERE -->
</div>

<div class="modal fade" id="heldup" tabindex="-1" role="dialog" aria-labelledby="heldupLabel" aria-hidden="true">
    <!-- AJAX OUTPUT GOES HERE -->
</div>

<div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="denyLabel" aria-hidden="true">
    <!-- AJAX OUTPUT GOES HERE -->
</div>


<!-- <div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="denyLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="denyLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div> -->


<script type="text/javascript">
    $( ".approve" ).click(function() {
          // alert( "Handler for .change() called."+this.value);
          var customerId            =   $(this).data("customer-id")

          // alert(customerId);

            $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>inspection/ajax_generate_customer_detail_to_approve/",
              data: { 'customer_id': customerId },
              success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);

                $('#approve').html(opts);
                  
              }
            }); //ajax
          

          
    });

    $( ".heldup" ).click(function() {
          // alert( "Handler for .change() called."+this.value);
          var customerId            =   $(this).data("customer-id")

          // alert(customerId);

            $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>inspection/ajax_generate_customer_detail_to_heldup/",
              data: { 'customer_id': customerId },
              success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);

                $('#heldup').html(opts);
                  
              }
            }); //ajax
          

          
    });

    $( ".deny" ).click(function() {
          // alert( "Handler for .change() called."+this.value);
          var customerId            =   $(this).data("customer-id")

          // alert(customerId);

            $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>inspection/ajax_generate_customer_detail_to_deny/",
              data: { 'customer_id': customerId },
              success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);

                $('#deny').html(opts);
                  
              }
            }); //ajax
          

          
    });
</script>



<!-- <div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="verifyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
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
                                    <th>Model</th>
                                    <td><?php foreach($model_list as $m_value){if($m_value->model_id == $value->model_id){
                                        echo $m_value->model_name;
                                    } }
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Mode</th>
                                    <td>
                                        <?php 
                                            switch ($value->payment_mode){
                                                case 1:
                                                echo "CREDIT";
                                                break;
                                                case 2:
                                                echo "SEMI-CASH";
                                                break;
                                                case 3:
                                                echo "CASH";
                                                break;
                                                 case 3:
                                                echo "CORPORATE";
                                                break;
                                                default:
                                                break;
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Period</th>
                                    <td><?php echo $value->period;?></td>
                                </tr>
                                <tr>
                                <th scope="row">Contact No</th>
                                <td><?php echo $value->phone;?></td>
                                </tr>
                                <tr>
                                <th scope="row">Note </th>
                                <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>">
                                <td><textarea class="col-md-8 col-sm-8 col-xs-8" name="address_verification_note" required></textarea></td>
                                </tr>
                                
                                <tr>
                                <th scope="row">Upload Inspection Form </th>
                                <input type="hidden" name="customer_id" value="<?php echo $value->customer_id; ?>" required >
                                <td><input type="file" class="form-control" name="inspection_form"></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div> -->


    
