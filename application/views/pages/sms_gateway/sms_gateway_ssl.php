




<!DOCTYPE html>
<html>
<head>
  <title>Sending</title>

  <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>



<script type="text/javascript">
  $( window ).load(function() {
    // alert('test');
        $.ajax({
            type: "POST",
            url: "http://sms.sslwireless.com/pushapi/dynamic/server.php",
            data: { 'user': '<?php echo $user_name; ?>',
                    'pass': '<?php echo $password; ?>',
                    'sid': '<?php echo $sid; ?>',
                    'sms[0][0]': '8801701227977',
                    // 'sms[0][0]': '88'+'<?php echo $customer_detail->phone; ?>',
                    // 'sms[0][1]': '<?php echo $sms_body_for_customer; ?>',
                    'sms[1][0]': '8801730069555',
                    // 'sms[1][1]': '<?php echo $sms_body_for_customer; ?>',
                    

                  },
            success: function(data){
                // Parse the returned json data
                
                // Use jQuery's each to iterate over the opts value
                
            }
        });//ajax ends here________
        alert('send sms to customer');
        document.getElementById('myForm').submit();

  });
</script>

<!-- 'sms[2][0]': '8801713388741',
                    'sms[2][1]': '<?php echo $sms_body_for_zhead; ?>', -->

<!-- 'sms[0][0]': '88'+'<?php echo $customer_detail->phone ?>', -->

<form id="myForm" action="<?php echo base_url();?>customer/customer_detail" method="post">
  <input type="hidden" name="customer_id" value="<?php echo $customer_detail->customer_id; ?>">
</form>

</body>
</html>








<script type="text/javascript">
    
</script>

