<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Approval of Dealer Limit <small></small></h3>
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
                <li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved Dealers</a></li>
                <li role="presentation"><a href="#blacklist" aria-controls="blacklist" role="tab" data-toggle="tab">Blacklist</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-approval">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                            <h2>Pending Dealer List <small></small></h2>
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
                                    <th>Dealer Name</th>
                                    <th>Dealer Location</th>
                                    <th>Zone</th>
                                    <th>Stock Limit</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($pending_dealer_list as $value){ ?>
                                
                                    <tr>
                                        <td><?php echo $value->dealer_name; ?></td>
                                        <td><?php echo $value->dealer_location; ?></td>
                                        <td><?php echo $value->zone_name; ?></td>
                                        <form id="<?php echo 'pending'.$value->dealer_id; ?>" method="post" action="<?php echo base_url(); ?>approval_dealer/decision">
                                            <input type="hidden" name="dealer_id" value="<?php echo $value->dealer_id; ?>">
                                            <input type="hidden" name="decision_key" value="approve" class="<?php echo 'decision-pending'.$value->dealer_id ?>">
                                            <td>
                                                <input type="number" class="form-control" step="1" name="dealer_limit" min="0" placeholder="" value="0" required></td>
                                            <td><a data-value="<?php echo 'pending'.$value->dealer_id; ?>" href="#" style="color:#269414" class="approve"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a> | <a data-value="<?php echo 'pending'.$value->dealer_id; ?>" href="#" style="color:#f00" class="deny"><i class="fa fa-check" aria-hidden="true" ></i> deny</a></td>
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
                <div role="tabpanel" class="tab-pane" id="approved">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Approved Dealer List <small></small></h2>
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
                                            <th>Dealer Name</th>
                                            <th>Dealer Location</th>
                                            <th>Zone</th>
                                            <th>Stock Limit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($approved_dealer_list as $value){ ?>
                                    
                                        <tr>
                                            <td><?php echo $value->dealer_name; ?></td>
                                            <td><?php echo $value->dealer_location; ?></td>
                                            <td><?php echo $value->zone_name; ?></td>
                                            <form id="<?php echo 'approved'.$value->dealer_id; ?>" method="post" action="<?php echo base_url(); ?>approval_dealer/decision">
                                                <input type="hidden" name="dealer_id" value="<?php echo $value->dealer_id; ?>">
                                                <input type="hidden" name="decision_key" value="update" class="<?php echo 'decision-approved'.$value->dealer_id ?>">
                                            <td>
                                                <input type="number" class="form-control" step="1" name="dealer_limit" min="0" placeholder="" value="<?php echo $value->dealer_limit; ?>" required></td>
                                            <td><a data-value="<?php echo 'approved'.$value->dealer_id; ?>" href="#" style="color:#269414" class="update"><i class="fa fa-check" aria-hidden="true" ></i> Update</a> | <a data-value="<?php echo 'approved'.$value->dealer_id; ?>" href="#" style="color:#f00" class="deny"><i class="fa fa-check" aria-hidden="true" ></i> deny</a></td>
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
                <div role="tabpanel" class="tab-pane" id="blacklist">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Blacklisted Dealer <small></small></h2>
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
                                            <th>Dealer Name</th>
                                            <th>Dealer Location</th>
                                            <th>Zone</th>
                                            <th>Stock Limit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($blacklisted_dealer_list as $value){ ?>
                                        <tr>
                                            <td><?php echo $value->dealer_name; ?></td>
                                            <td><?php echo $value->dealer_location; ?></td>
                                            <td><?php echo $value->zone_name; ?></td>
                                            <form id="<?php echo 'blacklisted'.$value->dealer_id; ?>" method="post" action="<?php echo base_url(); ?>approval_dealer/decision">
                                                <input type="hidden" name="dealer_id" value="<?php echo $value->dealer_id; ?>">
                                                <input type="hidden" name="decision_key" value="approve" class="<?php echo 'decision-blacklisted'.$value->dealer_id ?>">
                                                <td>
                                                    <input type="number" class="form-control" step="1" name="dealer_limit" min="0" placeholder="" value="<?php echo $value->dealer_limit; ?>" required></td>
                                                <td><a data-value="<?php echo 'blacklisted'.$value->dealer_id; ?>" href="#" style="color:#269414" class="approve"><i class="fa fa-check" aria-hidden="true" ></i> Approve</a></td>
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

<script type="text/javascript">
    $(function() { 
        $( ".approve" ).click(function() {
            var id = $(this).data("value");
            $('.decision-'+id).val('approve');
            $('#'+id).submit();
        });

        $( ".deny" ).click(function() {
            // alert("clicked!");
            var id = $(this).data("value");
            $('.decision-'+id).val('deny');
            $('#'+id).submit();
        });

        $( ".update" ).click(function() {
            var id = $(this).data("value");
            $('.decision-'+id).val('update');
            $('#'+id).submit();
        });
    });
</script>