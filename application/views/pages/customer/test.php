<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Issue <small></small></h3>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>inventory/add_issued_product/" enctype='multipart/form-data'>

            <div class="x_title">
                <h2>Issued Info <small></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="row">
              
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Yard </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="yard_id" id="delivery-yard">
                          <option value="">select</option>
                          <?php foreach($yard_list as $value){?>
                          <option value="<?php echo $value->delivery_yard_id;?>"><?php echo $value->yard_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Select Dealer </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="yard_id">
                          <option value="">select</option>
                          <?php foreach($dealer_list as $value){?>
                          <option value="<?php echo $value->dealer_id;?>"><?php echo $value->dealer_name;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group item-container" id="manuallyAddItem" style="display: none;">
                    <label>Select Vehicle</label>
                    <select class="form-control select-tag" id="item" name="item_id" >
                        <option value="0">select</option>
                    <?php foreach($stock_list as $value){?>
                        <option value="<?php echo $value->stock_id; ?>" engineNo="<?php echo $value->engine_no; ?>" chassisNo="<?php echo $value->chassis_no;?>"><?php echo $value->chassis_no;?></option>
                    <?php }?>
                    </select>
                </div>

                <div class="col-lg-12" id="create">
                    <div id="quantity-error">
                    </div>
                    <input type="hidden" id="count" value="0" name="count">
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-12 col-xs-12">Issued Date </label>
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="issued_date" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
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
    <div class="col-md-5 col-sm-6 col-xs-12">
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
                <td><?php echo $value->yard_name; ?></td>
                <td><?php echo $value->chassis_no ?></td>
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

<script>
  $("#delivery-yard").change(function(){
          // $('#subDistrictId').val('');
          // $('#subDistrictId').change();
          if($('#delivery-yard').val()!="NULL"){
            $('#item').empty();
            $(".item-container").css("display", "block");
            // $('.sub-district-container').show(500);
          }
          $('#create').empty();
          var preCode = '<div id="quantity-error">'
                        +'</div>'
                        +'<input type="hidden" id="count" value="0" name="count">';
          $('#create').append(preCode);
          var yardId = $('#delivery-yard option:selected').val();
          console.log(yardId);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>inventory/ajax_generate_items/",
              data: { 'yard_id': yardId },
              success: function(data){
                  // Parse the returned json data
                  var opts = $.parseJSON(data);
                  // Use jQuery's each to iterate over the opts value
                  console.log(opts);
                  $('#item').append('<option value="">Select </option>');

                  $.each(opts, function(i, d) {
                    console.log(d.sub_district_id);
                      // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      $('#item').append('<option value="' + d.stock_id + '" modelId="'+d.model_id+'" modelName="'+d.model_name+'" engineNo="'+d.engine_no+'" chassisNo="'+d.chassis_no+'">' + d.chassis_no + '</option>');

                  });
              }
          });
      });
</script>

<script>
        $( "#item" ).change(function() {
          // alert( "Handler for .change() called."+this.value);
          var element = $(this).find('option:selected'); 
          var chassisNo = element.attr("chassisNo");
          var engineNo = element.attr("engineNo");
          var modelId = element.attr("modelId");
          var modelName = element.attr("modelName");

          // var itemName = $('#item option:selected').text();
          count = document.getElementById('count').value;

          if(count == 0){
            var itemHeader  = '<div class="col-lg-12" style="margin-bottom: 10px;border-bottom: 2px solid #09192a;" id="itemHeader">'
            +'<div class="col-lg-5"><label class="lblItem">Chassis No</label></div>'
            +'<div class="col-lg-5"><label class="lblItem">Engine No</label></div>'
            +'</div>';
            
            $('#create').append(itemHeader);
          }

          var val = $('#item option:selected').val();
          if(val!=0){
            count++;
            var code = '<div class="col-lg-12" style="margin-bottom: 10px">'
                        +'<div class="col-lg-6">'
                          +'<input type="hidden" class="stock-id" name="stock_id[]" value="'+val+'" />'
                          +'<label class="lblEngineNo">'+engineNo+'</label>'
                          +'<input class="form-control engine-no" type="hidden" name="engine_no[]" value="'+engineNo+'">'
                          
                          +'</div>'
                          +'<div class="col-lg-5">'
                            +'<label class="lblChassisNo">'+chassisNo+'</label>'
                            +'<input class="form-control chassis-no" type="hidden" name="chassis_no[]" value="'+chassisNo+'">'
                          +'</div>'
                        +'<a href="" class="col-lg-1 remove"><i class="fa fa-times fa-lg text-danger" aria-hidden="true"></i></a></div>';

                  $('#create').append(code);
                    document.getElementById('count').value = count;

            $("#item option[value='"+this.value+"']").remove();

        }
          
        });

       $('#create').on('click', '.remove', function(e){ //Once remove button is clicked
            e.preventDefault();
             var engineNo = $(this).parent('div').find(".engine-no").val();
             var chassisNo = $(this).parent('div').find('.chassis-no').val();
             var stockId = $(this).parent('div').find('.stock-id').val();
             // alert(itemId);
             count--;
             document.getElementById('count').value = count;
            $('#item').append('<option value="'+stockId+'" engineNo="'+engineNo+'" chassisNo="'+chassisNo+'">'+chassisNo+'</option>');
            $(this).parent('div').remove(); //Remove field html

            if(count == 0){
              $('#itemHeader').remove();
            }
        });

</script>