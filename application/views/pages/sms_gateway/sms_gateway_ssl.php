<form action="http://sms.sslwireless.com/pushapi/dynamic/server.php" method="post">
<input type="hidden" value="username" name="user" />
<input type="hidden" value="password" name="pass" />
<input type="hidden" value="XXXXXXXXXXXXXXXXXXXX" name="sid" />
<input type="hidden" value="880XXXXXXXXXX" name="sms[0][0]" />
<input type="hidden" value="Test SMS One" name="sms[0][1]" />
<input type="hidden" value="123456789" name="sms[0][2]" />
<input type="hidden" value="880XXXXXXXXXX " name="sms[1][0]" />
<input type="hidden" value="Test SMS Two" name="sms[1][1]" />
<input type="hidden" value="123456790" name="sms[1][2]" />
<input type="submit" />
</form>

<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Dealer <small></small></h3>
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
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-minus"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="http://sms.sslwireless.com/pushapi/dynamic/server.php">

            
			
			<input type="hidden" value="IfadMotors" name="user" />
			<input type="hidden" value="VcDPM53r4VQcWfb" name="pass" />
			<input type="hidden" value="IfadMotorsNonBng" name="sid" />
			<input type="hidden" value="8801730069555" name="sms[0][0]" />
			<input type="hidden" value="09B809A809CD09AE09BE09A809BF09A40020099709CD09B009BE09B909950020098609AA09A809BE09B000200986098709A109BF002D002000320030003200390035000A09A109BE098909A8002009AA09C709AE09C709A809CD099F0020002D0020003100320030003000300030" name="sms[0][1]" />
			<input type="hidden" value="8801713388741" name="sms[1][0]" />
			<input type="hidden" value="09B809A809CD09AE09BE09A809BF09A40020099709CD09B009BE09B909950020098609AA09A809BE09B000200986098709A109BF002D002000320030003200390035000A09A109BE098909A8002009AA09C709AE09C709A809CD099F0020002D0020003100320030003000300030" name="sms[1][1]" />
            

            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				        <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
            </div>
        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>SMS LIST <small></small></h2>
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
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>dealer ID</th>
                <th>dealer Name</th>
                <th>Dealer Zone</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
           <!--  <?php foreach($dealer_list as $value){?>
              <tr>
                <td><?php echo $value->dealer_id; ?></td>
                <td><?php echo $value->dealer_name; ?></td>
                <td>
                  <?php 
                    foreach ($zone_list as $z_value) {
                      if($z_value->zone_id == $value->zone_id){
                        echo $z_value->zone_name;
                      }
                    }
                  ?>
                </td>
                <td><a href="#">edit </a>|<a href="#"> delete</a></td>
              </tr>
            <?php }?> -->
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
</div>
</div>