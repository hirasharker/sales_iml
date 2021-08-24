<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="approveLabel">Release Detail</h3>
            
        </div>
        <form action="<?php echo base_url();?>approval_release/approve_unit_head" method="post" enctype='multipart/form-data'>

            

        <div class="modal-body">

            <div id="modalContent">
                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">Seize ID</th>
                        <td>000<?php echo $release_detail->seize_id; ?></td>
                        </tr>
                        <tr>
                        <th scope="row">Date</th>
                        <td><?php echo date('d-m-Y', strtotime($release_detail->time_stamp)); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Customer ID</th>
                        <td><?php echo $release_detail->customer_id; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Customer Name</th>
                        <td><?php echo $release_detail->customer_name; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Customer Phone</th>
                        <td><?php echo $release_detail->phone; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Engine No</th>
                        <td><?php echo $release_detail->engine_no; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Chassis No</th>
                        <td><?php echo $release_detail->chassis_no; ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Seized Date</th>
                        <td><?php echo date('d-m-Y', strtotime($release_detail->seize_date)); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Proposed Collection Amount</th>
                        <td><?php echo strtoupper($release_detail->proposed_collection_amount
); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Committed next payment amount</th>
                        <td><?php echo strtoupper($release_detail->committed_next_payment_amount); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Committed next payment date</th>
                        <td><?php echo date('d-m-Y', strtotime($release_detail->committed_next_payment_date)); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Rest Amount of OD :</th>
                        <td><?php echo strtoupper($release_detail->rest_amount_of_od); ?></td>
                        </tr>

                        <tr>
                        <th scope="row">Proposed Collection Amount by Unit Head </th>
                        <td><input type="number" class="col-md-12 col-sm-12 col-xs-12" name="proposed_collection_amount_by_uh" required min="0"></td>
                        </tr>
                        

                        <tr>
                        <th scope="row">Note </th>
                        <input type="hidden" name="release_id" value="<?php echo $release_detail->release_id ?>">
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