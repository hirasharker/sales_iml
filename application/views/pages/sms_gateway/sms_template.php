<form class="form-horizontal form-label-left" method="post" action="http://sms.sslwireless.com/pushapi/dynamic/server.php">


			
			<input type="hidden" value="IfadMotors" name="user" />
			<input type="hidden" value="VcDPM53r4VQcWfb" name="pass" />
			<input type="hidden" value="IfadMotorsNonBng" name="sid" />
			<input type="hidden" value="8801713388741" name="sms[0][0]" />
			<input type="hidden" value="09B809AE09CD09AE09BE09A809BF09A40020099709CD09B009BE09B90995002C0020000A098609AA09A809BE09B000200986098709A109BF0020003A0020<?php echo $total_amount;?>000A09A109BE098909A8002009AA09C709AE09C709A809CD099F0020003A0020<?php echo $total_amount;?>002F002D000A099509BF09B809CD09A409BF0020003A0020<?php echo $total_amount;?>000A099509BF09B809CD09A409BF09B0002009A409BE09B009BF09960020003A002009AA09CD09B009A409BF002009AE09BE09B809C709B00020<?php echo $total_amount;?>002009A409BE09B009BF09960964" name="sms[0][1]" />
			<!-- <input type="hidden" value="8801730069555" name="sms[1][0]" />
			<input type="hidden" value="09B809AE09CD09AE09BE09A809BF09A40020099709CD09B009BE09B909950020098609AA09A809BE09B000200986098709A109BF002D00320030003200390035000A09A109BE098909A8002009AA09C709AE09C709A809CD099F002D003100300030003000300030002F002D000A099509BF09B809CD09A409BF002D00310035003000300030002F002D000A099509BF09B809CD09A409BF09B0002009A409BE09B009BF0996002D00310032002F00310032002F0032003000320030" name="sms[1][1]" /> -->
            
			<!-- 09B809AE09CD09AE09BE09A809BF09A40020099709CD09B009BE09B909950020098609AA09A809BE09B000200986098709A109BF002D -->

            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				        <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>

            <form id="myForm" action="<?php echo base_url();?>customer/customer_detail" method="post">
				<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
			</form>



			<script type="text/javascript">
			    document.getElementById('myForm').submit();
			</script>