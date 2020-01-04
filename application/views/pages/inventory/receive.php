<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Receive Product <small></small></h3>
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
    <div class="col-md-10 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-plus fa-chevron-up fa-chevron-down"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>inventory/add_received_product/" enctype='multipart/form-data'>

            <div class="x_title">
                <h2>Receive Info <small class="alert"><?php if($this->session->userdata('error')!=NULL){  } ?></small></h2>
                <div class="clearfix"></div>
            </div>


            

            <div class="row">
                <?php if($this->session->userdata('message')!=NULL){?>
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong><?php echo $this->session->userdata('message'); $this->session->unset_userdata('message');?></strong>
                </div>
                <?php }?>

                <?php if($this->session->userdata('error')!=NULL){?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error');?></strong>
                </div>
                <?php }?>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Container No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="container_no" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Invoice No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="invoice_no" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Invoice Date </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="invoice_date" class="form-control has-feedback-left" id="single_cal5" placeholder="Invoice Date" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">LC No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="lc_no" placeholder="" required>
                  </div>
                </div>
                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bill of Entry </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="bill_of_entry" placeholder="" required>
                  </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Bill of Entry Date </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="bill_of_entry_date" class="form-control has-feedback-left" id="single_cal3" placeholder="Invoice Date" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bill of Lading </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="bill_of_lading" placeholder="" required>
                  </div>
                </div>

                

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Bank </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="bank_id" required>
                          <option value="">select</option>
                          <?php foreach($bank_list as $value){?>
                          <option value="<?php echo $value->bank_id;?>"><?php echo $value->bank_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Yard </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="yard_id">
                          <option value="">select</option>
                          <?php foreach($yard_list as $value){?>
                          <option value="<?php echo $value->delivery_yard_id;?>"><?php echo $value->yard_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12" id="uploadItem" style="display:block;">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Upload List</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" placeholder="" name="received_list">
                    </div>
                </div>

                <div class="form-group col-md-10 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Received Date </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="received_date" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
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
    <div class="col-md-10 col-sm-10 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Received Records <small></small></h2>
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
                <th>Received Date</th>
                <th>Invoice No</th>
                <th>Invoice Date</th>
                <th>LC NO</th>
                <th>Bill of Entry</th>
                <th>BOE Date</th>
                <th>Bill of Lading</th>
                <th>Container No</th>
                <th>Yard Name</th>
                <th>Chassis No</th>
                <th>Engine No</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($received_list as $value){?>
              <tr>
                <td><?php echo $value->received_date; ?></td>
                <td><?php echo $value->invoice_no; ?></td>
                <td><?php echo $value->invoice_date; ?></td>
                <td><?php echo $value->lc_no; ?></td>
                <td><?php echo $value->bill_of_entry; ?></td>
                <td><?php echo $value->bill_of_entry_date; ?></td>
                <td><?php echo $value->bill_of_lading; ?></td>
                <td><?php echo $value->container_no; ?></td>
                <td><?php echo $value->yard_name; ?></td>
                <td><?php echo $value->chassis_no; ?></td>
                <td><?php echo $value->engine_no; ?></td>
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