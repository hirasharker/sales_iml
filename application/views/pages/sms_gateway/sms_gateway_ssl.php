






<script type="text/javascript">
$( window ).load(function() {
  alert('test');
  $.ajax({
          type: "POST",
          url: "http://sms.sslwireless.com/pushapi/dynamic/server.php",
          data: { 'user': '<?php echo $user_name; ?>',
                  'pass': '<?php echo $password; ?>',
                  'sid': '<?php echo $sid; ?>',
                  'sms[0][0]': '<?php echo "8801713388741"; ?>',
                  'sms[0][1]': '<?php echo $sms_body; ?>'},
          success: function(data){
              // Parse the returned json data
              var opts = $.parseJSON(data);
              $('#test').html(opts);
              // Use jQuery's each to iterate over the opts value
              
          }
      });//ajax ends here________
});
</script>

<p id="test"></p>

