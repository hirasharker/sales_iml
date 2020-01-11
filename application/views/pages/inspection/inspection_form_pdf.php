<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inspection Form</title>
<link href="<?php echo base_url();?>build/css/inspection-pdf.css" rel="stylesheet" >
<!-- jQuery -->
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
</head>


<body>

<div class="print-container" style="page-break-after: always;">
	<div class="header">
        <div class="banner">
            <div class="logo">
                <img src="images/img.jpg"  alt= "LOGO"/>
            </div>
            <div class="title">
                <h1 class="compnay-name">IFAD MOTORS LIMITED</h1>
                <!-- <p class="address1">Registered Office : Vill: Narsingpur, PS: Ashulia, Upzilla: Savar, Dist: Dhaka. Vat Registration no: 017151004202</p> -->
                <p class="address2">Corporate Office : Ifad Tower, 07 (New) Tejgaon Industrial Area, Tejgaon, Dhaka - 1208. Tel # 8870305-8,</p>
                <p class="address3">Fax: 880-2-9632765, E-mail : contact@ifadgroup.com</p>
            </div>
        </div><!-- banner -->

        <h2>INSPECTION FORM</h2>
        <p>Date: <?php echo date('d-m-y')?></p>
    </div>
    <div class="clearfix"></div>
    <div class="content">
    	<table border="0">
        	
            <tr>
            	<td class="left no-print">CUSTOMER ID NO</td>
                <td class="right"><?php echo $customer_detail->customer_code; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">CUSTOMER'S NAME </td>
                <td class="right"><?php echo $customer_detail->customer_name; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PHONE </td>
                <td class="right"><?php echo $customer_detail->phone; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">FATHER'S NAME </td>
                <td class="right"><?php echo $customer_detail->father_name; ?></td>
            </tr>
            <tr>
                <td class="left no-print">MOTHER'S NAME </td>
                <td class="right"><?php echo $customer_detail->mother_name; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">PRESENT ADDRESS </td>
                <td class="right"><p><?php echo $customer_detail->present_address; ?></p></td>
            </tr>
            <tr>
                <td class="left no-print">PERMANENT ADDRESS </td>
                <td class="right"><p><?php echo $customer_detail->permanent_address; ?></p></td>
            </tr>
            <tr>
                <td class="left no-print">BUSINESS ADDRESS </td>
                <td class="right"><p><?php echo $customer_detail->business_address; ?></p></td>
            </tr>
            <tr>
            	<td class="left no-print">MODEL </td>
                <td class="right"><?php foreach($model_list as $m_value){if($m_value->model_id == $customer_detail->model_id){ echo $m_value->model_name; }}?></td>
            </tr>
            <tr>
                <td class="left no-print">PAYMENT MODE </td>
                <td class="right">
                <?php 
                switch ($customer_detail->payment_mode){
                    case 1:
                    echo "CREDIT";
                    break;
                    case 2:
                    echo "SEMI-CASH";
                    break;
                    case 3:
                    echo "CASH";
                    break;
                     case 3:
                    echo "CORPORATE";
                    break;
                    default:
                    break;
                }
        ?></td>
            </tr>
            <tr>
                <td class="left no-print">PERIOD </td>
                <td class="right"><?php echo $customer_detail->period; ?></td>
            </tr>
            <tr>
                <td class="left no-print">DOWNPAYMENT </td>
                <td class="right"><?php echo $customer_detail->downpayment; ?></td>
            </tr>
            <tr>
                <td class="left no-print">COMMENT </td>
                <td class="right comment" border="2px"></td>
            </tr>
            
            
        </table>
    </div>
    <div class="clearfix"></div>
    
    <div class="footer no-print">
    	<div class="left">
        	<p>For IFAD MOTORS LTD</p>
            <br />
            <br />
            <p>(<?php echo strtoupper($this->session->userdata('employee_name'));?>)</p>
            <P>RECOVERY MANAGER</P>
        </div>
        <div class="right">
            <p>PLEASE SIGN BELOW </p>
            <br/>
            <br />
            <p>CUSTOMER SIGNATURE</p>
        </div>
        <div class="clearfix"></div>
        <div class="right">
            <!-- <p>Customer Copy</p> -->
        </div>
        <div class="left">
            <p>Dealt By : <?php echo $sales_person->employee_name;?></p>
        </div>
    </div>
</div>


</body>
</html>
