<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Upload Receivables <small></small></h3>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>seize/update_receivables/" enctype='multipart/form-data'>

            <div class="x_title">
                <h2>Upload Info <small class="alert"><?php if($this->session->userdata('error')!=NULL){  } ?></small></h2>
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

                

                <div class="form-group col-md-10 col-sm-12 col-xs-12" id="uploadItem" style="display:block;">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Upload List</label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" placeholder="" name="received_list">
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

</div>
</div>