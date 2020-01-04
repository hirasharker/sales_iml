<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Lead <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-12 col-xs-12 form-group pull-right top_search">
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
    <div class="col-md-5 col-sm-12 col-xs-12">
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>lead/add_lead/">

            <div class="x_title">
                <h2>Lead Info <small></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Customer Name </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Source </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="source_id">
                          <option value="">select</option>
                          <?php foreach($source_list as $value){?>
                          <option value="<?php echo $value->source_id;?>"><?php echo $value->source_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Model </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="model_id">
                          <option value="">select</option>
                          <?php foreach($model_list as $value){?>
                          <option value="<?php echo $value->model_id;?>"><?php echo $value->model_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Sales Person </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="mkt_id">
                          <option value="">select</option>
                          <?php foreach($sales_person_list as $value){?>
                          <option value="<?php echo $value->employee_id;?>"><?php echo $value->employee_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Phone No </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="phone1" placeholder="Phone No">
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Zone </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="zone_id">
                          <option value="">select</option>
                          <?php foreach($zone_list as $value){?>
                          <option value="<?php echo $value->zone_id;?>"><?php echo $value->zone_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select District </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="district_id">
                          <option value="">select</option>
                          <?php foreach($district_list as $value){?>
                          <option value="<?php echo $value->district_id;?>"><?php echo $value->district_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Sub District/PS </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="sub_district_id">
                          <option value="">select</option>
                          <?php foreach($sub_district_list as $value){?>
                          <option value="<?php echo $value->sub_district_id;?>"><?php echo $value->sub_district_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Address Line </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <textarea class="form-control" name="address_line_1"></textarea>
                    </div>
                </div>

                


            </div>
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
    <div class="col-md-5 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>City List <small></small></h2>
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
          <table id="datatable-buttons" class="table table-striped table-bordered responsive">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>District</th>
                <th>P/S</th>
                <th>Sales Person</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($lead_list as $value){?>
              <tr>
                <td><?php echo $value->customer_name; ?></td>
                <td><?php echo $value->phone1; ?></td>
                <td><?php echo $value->district_id; ?></td>
                <td><?php echo $value->sub_district_id ?></td>
                <td><?php foreach($sales_person_list as $mkt_value){if($mkt_value->employee_id==$value->mkt_id){
                      echo $mkt_value->employee_name;
                } }
                ?></td>
                <td><a href="#">edit </a>|<a href="#"> delete</a></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
</div>
</div>