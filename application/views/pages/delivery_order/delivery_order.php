
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Delivery Order <small></small></h3>
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
                <li role="presentation" class="active"><a href="#add-delivery-yard" aria-controls="add-delivery-yard" role="tab" data-toggle="tab">Add Delivery Yard</a></li>
                <li role="presentation"><a href="#waiting-for-clearence" aria-controls="waiting-for-clearence" role="tab" data-toggle="tab">Waiting for Pringting Delivery Order</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="add-delivery-yard">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4>Customer List for Delivery Order<small></small></h4>
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
                                <table id="datatable-buttons1" class="table table-striped table-bordered responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list as $value){if($this->session->userdata('role')==3){ if($value->coordinator_id ==$this->session->userdata('employee_id') ){ ?>
                                    <tr>
                                    <form action="<?php echo base_url();?>delivery_order/update_delivery_yard" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td ><?php echo $value->time_stamp; ?></td>
                                        <input type="hidden" name="customer_id" value="<?php echo $value->customer_id;?>">
                                        <td><button type="submit" class="btn btn-primary">Generate DO</button></td>
                                    </form>
                                    </tr>

                                    <?php } } else { ?>
                                    <tr>
                                    <form action="<?php echo base_url();?>delivery_order/update_delivery_yard" method="post">
                                        <td><?php echo $value->customer_code; ?></td>
                                        <td><?php echo $value->customer_name; ?></td>
                                        <td ><?php echo $value->time_stamp; ?></td>
                                            <input type="hidden" name="customer_id" value="<?php echo $value->customer_id;?>">
                                        <td><button type="submit" class="btn btn-primary">Generate DO</button></td>
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

                <div role="tabpanel" class="tab-pane" id="waiting-for-clearence">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h4>Pending List for Delivery Order<small></small></h4>
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
                                        <th>Date</th>
                                        <th>Delivery Yard</th>
                                        <th>Print Delivery Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($customer_list_for_printing_do as $value){ ?>
                                        <tr>
                                            <td><?php echo $value->customer_code; ?></td>
                                            <td><?php echo $value->customer_name; ?></td>
                                            <td><?php echo $value->time_stamp; ?></td>
                                            <td>
                                                <?php foreach($yard_list as $y_value){ if($y_value->delivery_yard_id == $value->delivery_yard_id){
                                                    echo $y_value->yard_name;
                                                 } }?> 
                                            </td>
                                            <input type="hidden" value="<?php echo $value->customer_id; ?>">
                                            <td>
                                                <form action="<?php echo base_url();?>delivery_order/print_do" target="_blank" method="post">
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
            </div><!-- tab-content -->
            
        </div>
    </div>
  </div>
</div>
</div>

<script>
</script>

