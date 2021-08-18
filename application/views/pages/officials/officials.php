<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Authorized Officials <small></small></h3>
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
    <div class="col-md-7 col-sm-8 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>officials/add_employee/">

                <div class="x_title">
                <h2>Add Officials <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="employee_name" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="designation" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Role </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="role" name="role" class="form-control select-tag">
                      <option value="1">Marketing Correspondent</option>
                      <option value="2">Recovery Manager</option>
                      <option value="3">Co-ordinator</option>
                      <option value="4">Zonal Head</option>
                      <option value="5">Head of Sales</option>
                      <option value="6">Controller</option>
                      <option value="7">Documentation</option>
                      <option value="8">Accounts</option>
                      <option value="9">Delivery Yard</option>
                      <option value="10">Service</option>
                      </select>
                  </div>
                </div>
                <div id="zone" class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Zone </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select  name="zone_id" class="form-control select-tag" >
                      <?php foreach($zone_list as $value){?>
                      <option value="<?php echo $value->zone_id?>"><?php echo $value->zone_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="email_id" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="phone" placeholder="" required>
                  </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						      <button id="reset" class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
            </form>
            </div>
        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-7 col-sm-8 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Authorized Officials <small></small></h2>
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
                <th>ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Role</th>
                <th>Zone</th>
                <th>Email ID</th>
                <th>Contact No</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($employee_list as $value){ if($value->role != 15){?>
              <tr>
                <td><?php echo $value->employee_id;?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->designation; ?></td>
                <td><?php 
                    switch($value->role){
                      case 1:
                      echo "Sales Person";
                      break;
                      case 2:
                      echo "Recovery Manager";
                      break;
                      case 3:
                      echo "Co-ordinator";
                      break;
                      case 4:
                      echo "Zonal Head";
                      break;
                      case 5:
                      echo "Head of Sales";
                      break;
                      case 6:
                      echo "Controller";
                      break;
                      case 7:
                      echo "Documentation";
                      break;
                      case 8:
                      echo "Accounts";
                      break;
                      case 9:
                      echo "Delivery Yard";
                      break;
                      case 15:
                      echo "Admin";
                      break;
                      default:
                      break;
                    }
                ?>
                </td>
                <td><?php echo $value->zone_name; ?></td>
                <td><?php echo $value->email_id; ?></td>
                <td><?php echo $value->phone; ?></td>
                <td><a href="#">edit </a>|<a href="#"> delete</a></td>
              </tr>
            <?php } }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
</div>
</div>
<script>
  $(function() {
      
      $("#role").change(function(){ 
          // var element = $(this).find('option:selected'); 
          
          if($("#role").val()!=1){
            // $('#zone').attr('disabled', 'disabled');
            $('#zone').hide();
            $('#zone').val=1;
          }else{
            // $('#zone').prop('disabled', false);
            $('#zone').show();
          }
            
      });
      $("#reset").click(function(){
        $('#zone').prop('disabled', false);
      });
  }); 
  
</script>