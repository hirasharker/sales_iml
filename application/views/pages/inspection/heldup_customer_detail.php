<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="heldupLabel">Customer Detail</h3>
            
        </div>
        <form action="<?php echo base_url();?>inspection/address_verification_temporary_heldup/" method="post" enctype='multipart/form-data'>

        <div class="modal-body">
            
            <div id="modalContent">
                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">Name</th>
                        <td><?php echo $customer_detail->customer_name; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Customer ID</th>
                        <td><?php echo $customer_detail->customer_id; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Father's Name</th>
                        <td><?php echo $customer_detail->father_name; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Mother's Name</th>
                        <td><?php echo $customer_detail->mother_name; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Present Address</th>
                        <td><?php echo $customer_detail->present_address; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Permanent Address</th>
                        <td><?php echo $customer_detail->permanent_address; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Business Address</th>
                        <td><?php echo $customer_detail->business_address; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Spouse Address</th>
                        <td><?php echo $customer_detail->spouse_address; ?></td>
                        </tr>
                        <tr>
                        <th>Model</th>
                         <td><?php echo $customer_detail->model_name; ?></td>
                        </tr>
                        <tr>
                            <th>Payment Mode</th>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>Period</th>
                            <td><?php echo $customer_detail->period; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Contact No</th>
                        <td><?php echo $customer_detail->phone; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Note </th>
                        <input type="hidden" name="customer_id" value="">
                        <td><textarea class="col-md-8 col-sm-8 col-xs-8" name="address_verification_note" required></textarea></td>
                        </tr>
                        
                        
                        <input type="hidden" name="customer_id" value="<?php echo $customer_detail->customer_id; ?>" required >
                        
                        
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">heldup</button>
        </div>

        </form>
    </div>
</div>