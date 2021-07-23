<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="approveLabel">Resale Detail</h3>
            
        </div>
        <form action="<?php echo base_url();?>approval_rm/approve_resale/" method="post" enctype='multipart/form-data'>

        <div class="modal-body">
            
            <div id="modalContent">
                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">Seize ID</th>
                        <td>000<?php echo $resale_detail->seize_id; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Timestamp</th>
                        <td><?php echo $resale_detail->time_stamp; ?></td>
                        </tr>
                        
                        <?php foreach ($resale_customer_detail as $value) { ?>
                            <tr>
                            <th scope="row"><?php echo $value->resale_customer_name; ?></th>
                            <td><?php echo $value->proposed_value; ?></td>
                            </tr>
                        <?php } ?>

                        <tr>
                        <th scope="row">Note </th>
                        <input type="hidden" name="resale_id" value="">
                        <td><textarea class="col-md-12 col-sm-12 col-xs-12" name="rm_approval_note" required></textarea></td>
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