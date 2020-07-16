<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>

<form id="myForm" action="<?php echo base_url();?>customer/customer_detail" method="post">
	<input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
</form>



<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
</body>
</html>