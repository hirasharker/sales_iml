<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="approveLabel">Resale Detail</h3>
            
        </div>
        <form action="<?php echo base_url();?>approval_resale/approve_unit_head" method="post" enctype='multipart/form-data'>

            

        <div class="modal-body">

            <div id="modalContent">
                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">Seize ID</th>
                        <td>000<?php echo $resale_detail->seize_id; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Date</th>
                        <td><?php echo date('d-m-Y', strtotime($resale_detail->time_stamp)); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Pre-Customer ID</th>
                        <td><?php echo $resale_detail->previous_customer_id; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Pre-Customer Name</th>
                        <td><?php echo $resale_detail->previous_customer_name; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Pre-Customer Phone</th>
                        <td><?php echo $resale_detail->phone; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Engine No</th>
                        <td><?php echo $resale_detail->engine_no; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Chassis No</th>
                        <td><?php echo $resale_detail->chassis_no; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Seized Date</th>
                        <td><?php echo date('d-m-Y', strtotime($resale_detail->seize_date)); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Vehicle Condition</th>
                        <td><?php echo strtoupper($resale_detail->vehicle_condition); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Tyre QTY</th>
                        <td><?php echo strtoupper($resale_detail->tyre_quantity); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Battery Condition</th>
                        <td><?php echo strtoupper($resale_detail->battery_condition); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Gas Cylinder</th>
                        <td><?php echo strtoupper($resale_detail->gas_cylinder); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Key</th>
                        <td><?php echo strtoupper($resale_detail->key_status); ?></td>
                        </tr>

                        <tr>
                            <table class="table table-bordered">
                              <thead>
                                
                                <tr>
                                  <th>#</th>
                                  <th>Customer Name</th>
                                  <th>Phone</th>
                                  <th>Proposed Value</th>
                                  <th>Sales Mode</th>
                                  <th>DP</th>
                                  <th>Period</th>
                                  <th>Interest Rate</th>
                                  <!-- <th>Reference</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($resale_customers as $value) { ?>
                                <tr>
                                  <td scope="row"><input type="radio" class="flat" value = "<?php echo $value->resale_customer_id ?>" checked name="resale_customer_id">
                                  </td>
                                  <td><?php echo strtoupper($value->resale_customer_name); ?></td>
                                  <td><?php echo $value->resale_phone_no; ?></td>
                                  <td><?php echo $value->proposed_value; ?></td>
                                  <td><?php echo $value->sales_mode; ?></td>
                                  <td><?php echo $value->downpayment; ?></td>
                                  <td><?php echo $value->period; ?></td>
                                  <td><?php echo $value->interest_rate; ?></td>
                                  <!-- <td><?php echo $value->reference; ?></td> -->
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                        </tr>

                        <tr>
                        <th scope="row">Note </th>
                        <input type="hidden" name="resale_id" value="<?php echo $resale_detail->resale_id ?>">
                        <td><textarea class="col-md-12 col-sm-12 col-xs-12" name="rm_note" required></textarea></td>
                        </tr>
                        
                        <!-- <tr>
                        <th scope="row">Upload Inspection Form </th>
                        <input type="hidden" name="customer_id" value="<?php echo $customer_detail->customer_id; ?>" required >
                        <td><input type="file" class="form-control" name="inspection_form" required></td>
                        </tr> -->
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">approve</button>
        </div>

        </form>
    </div>
</div>