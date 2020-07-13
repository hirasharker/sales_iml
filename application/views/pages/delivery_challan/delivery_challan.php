
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Delivery Challan <small></small></h3>
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
                <li role="presentation" class="active"><a href="#waiting-for-clearence" aria-controls="waiting-for-clearence" role="tab" data-toggle="tab">Delivery Challan</a></li>
                <li role="presentation"><a href="#printing-dc" aria-controls="printing-dc" role="tab" data-toggle="tab">Delivery Challan for Printing</a></li>
                <!-- <li role="presentation"><a href="#verified" aria-controls="verified" role="tab" data-toggle="tab">Verified</a></li> -->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-clearence">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4>Customer List for Delivery Challan<small></small></h4>
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
                                <table id="" class="table table-striped table-bordered responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Model Name</th>
                                        <th>Booking Date</th>
                                        <th>Delivery Yard</th>
                                        <th>Chassis No</th>
                                        <th>Engine No</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if($this->session->userdata('role')!=15){?>

                                    <?php foreach($customer_list as $value){ ?>


                                    <tr>
                                    <form action="<?php echo base_url();?>delivery_challan/update_engine_and_chassis_no" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php echo $value->model_name ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php echo $value->yard_name; ?></td>
                                        <td>
                                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id;?>">
                                            <?php echo $value->chassis_no; ?>
                                            
                                        </td>
                                        <td><?php echo $value->engine_no; ?></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                                    </form>
                                    </tr>


                                    <?php }  ?>

                                    <?php } else {?>


                                    <?php foreach($customer_list as $value){ ?>


                                    <tr>
                                    <form action="<?php echo base_url();?>delivery_challan/update_engine_and_chassis_no" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php echo $value->model_name ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php echo $value->yard_name; ?></td>
                                        <td>
                                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id;?>">
                                            <?php echo $value->chassis_no; ?>
                                            
                                        </td>
                                        <td><?php echo $value->engine_no; ?></td>
                                        <td><button type="submit" class="btn btn-primary">Update</button></td>
                                    </form>
                                    </tr>


                       

                                    <?php  } } ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="printing-dc">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4>Delivery Challan for Printing<small></small></h4>
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
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Engine No</th>
                                        <th>Chassis No</th>
                                        <th>Print</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php if($this->session->userdata('role')!=15){?>


                                    <?php foreach($customer_list_for_printing_challan as $value){ if($value->delivery_yard_id==$yard_detail->delivery_yard_id){ ?>
                                    <tr>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php echo $value->phone; ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php echo $value->engine_no; ?></td>
                                        <td><?php echo $value->chassis_no; ?></td>
                                        <td>
                                            <form action="<?php echo base_url(); ?>delivery_challan/print_dc/" target="_blank" method="post">
                                                <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                                <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-print"></i> print</a>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    <?php } }?>

                                    <?php } else {?>

                                    <?php foreach($customer_list_for_printing_challan as $value){ ?>
                                    <tr>
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td><?php echo $value->phone; ?></td>
                                        <td><?php echo $value->time_stamp; ?></td>
                                        <td><?php echo $value->engine_no; ?></td>
                                        <td><?php echo $value->chassis_no; ?></td>
                                        <td>
                                            <form action="<?php echo base_url(); ?>delivery_challan/print_dc/" target="_blank" method="post">
                                                <input type="hidden" value="<?php echo $value->customer_id; ?>" name="customer_id">
                                                <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-print"></i> print</a>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    <?php  }?>

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


