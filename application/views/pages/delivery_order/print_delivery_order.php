<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delivery Order</title>
<link href="<?php echo base_url();?>build/css/do-print.css" rel="stylesheet" media="print">
<!-- jQuery -->
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
</head>


<body>
<script>
    $( document ).ready(function() {
        window.print();
        setTimeout(myFunction, 3000);
        function myFunction() {
            alert("Print Timeout!!!")
            window.close();
        }
    });
</script>

<div class="print-container" style="page-break-after: always;">
	<div class="header">
        <div class="banner">
            <div class="logo">
                <img src="<?php echo base_url()?>images/img.jpg">
            </div>
            <div class="title">
                <h1 class="compnay-name">IFAD AUTOS LIMITED</h1>
                <!-- <p class="address1">Registered Office : Vill: Narsingpur, PS: Ashulia, Upzilla: Savar, Dist: Dhaka. Vat Registration no: 017151004202</p> -->
                <p class="address1">Registered Office : <?php 
                foreach ($yard_list as $y_value) {
                    if($y_value->delivery_yard_id==$customer_detail->delivery_yard_id){
                        echo $y_value->yard_address;
                    }
                }
                ?> Vat Registration no: </p>
                <p class="address2">Corporate Office : Sonartori Tower (13th - 18th floor), 12 Biponon C/A, Sonargaon Road, Dhaka. Tel # 9632753-7,</p>
                <p class="address3">Fax: 880-2-9632765, E-mail : contact@ifadgroup.com</p>
            </div>
        </div><!-- banner -->

        <h2><?php 
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
        ?></h2>
        <h1>DELIVERY ORDER</h1>
        <p>Date: <?php $phpdate = strtotime( $customer_detail->do_update_time );
                    $mysqldate = date( 'd-m-Y', $phpdate ); 
                    echo $mysqldate; ?></p>
        <h4>(Customer Copy)</h4>
    </div>
    <div class="clearfix"></div>
    <div class="content">
    	<table border="0">
            <?php if($customer_detail->delivery_order_no!=NULL){?>
            <tr>
                <td class="left no-print"><b>SL NO - <?php echo $customer_detail->delivery_order_no;?></b></td>
            </tr>
            <?php }?>
        	<tr>
            	<td class="left no-print">FINANCER NAME</td>
                <td class="right"><?php echo $customer_detail->finance_name;?></td>
            </tr>
            <tr>
            	<td class="left no-print">CUSTOMER ID NO</td>
                <td class="right"><?php echo $customer_detail->customer_code; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">CUSTOMER'S NAME </td>
                <td class="right"><?php echo $customer_detail->customer_name; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">S/O OR W/O </td>
                <td class="right"><?php echo $customer_detail->father_name; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PRESENT ADDRESS </td>
                <td class="right"><?php echo $customer_detail->present_address; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">PERMANENT ADDRESS </td>
                <td class="right"><?php echo $customer_detail->permanent_address; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PHONE </td>
                <td class="right"><?php echo $customer_detail->phone; ?></td>
            </tr>
            <tr>
            	<td class="left no-print">MODEL </td>
                <td class="right"><?php foreach($model_list as $m_value){if($m_value->model_id == $customer_detail->model_id){ echo $m_value->model_name; }}?></td>
            </tr>
            <tr>
            	<td class="left no-print">DELIVERY POINT </td>
                <td class="right"><?php 
                foreach ($yard_list as $y_value) {
                    if($y_value->delivery_yard_id==$customer_detail->delivery_yard_id){
                        echo $y_value->yard_name;
                    }
                }
                ?></td>
            </tr>
            <?php if($checklist_detail->vts != 1){?>
            <tr>
                <td class="left no-print"></td>
                <td><p class="without-vts">WITH OUT VTS</p></td>
            </tr>
            <?php } else {?>
            <tr>
                <td class="left no-print"></td>
                <td><p class="with-vts">WITH VTS</p></td>
            </tr>
            <?php }?>
            
        </table>
    </div>
    <div class="clearfix"></div>
    
    <div class="footer no-print">
    	<div class="left">
        	<p>For IFAD AUTOS LTD</p>
            <br />
            <br />
            <p>(AUTHORIZED SIGNATURE)</p>
        </div>
        <div class="right">
        	<p>RECEIVED CHASSIS WITH ALL </p>
            <p>LOOSE ITEMS, 10/20 ltr DIESEL,</p>
            <p>TYRE/BATTERY IN GOOD CONDITION </p>
            <br/>
            <br />
            <p>CUSTOMER SIGNATURE</p>
        </div>
        <div class="clearfix"></div>
        <div class="right">
            <!-- <p>Customer Copy</p> -->
        </div>
        <div class="right">
            <p>Dealt By : <?php echo $sales_person->employee_name;?></p>
        </div>
        
        <div class="clearfix"></div>

        <div class="left">
            <p>HELP LINE : <b>16598</b></p>
        </div>
    </div>
</div>






<div class="print-container" style="page-break-after: always;">
    <div class="header">
        <div class="banner">
            <div class="logo">
                <img src="<?php echo base_url()?>images/img.jpg">
            </div>
            <div class="title">
                <h1 class="compnay-name">IFAD AUTOS LIMITED</h1>
                <!-- <p class="address1">Registered Office : Vill: Narsingpur, PS: Ashulia, Upzilla: Savar, Dist: Dhaka. Vat Registration no: 017151004202</p> -->
                <p class="address1">Registered Office : <?php 
                foreach ($yard_list as $y_value) {
                    if($y_value->delivery_yard_id==$customer_detail->delivery_yard_id){
                        echo $y_value->yard_address;
                    }
                }
                ?> Vat Registration no: </p>
                <p class="address2">Corporate Office : Sonartori Tower (13th - 18th floor), 12 Biponon C/A, Sonargaon Road, Dhaka. Tel # 9632753-7,</p>
                <p class="address3">Fax: 880-2-9632765, E-mail : contact@ifadgroup.com</p>
            </div>
        </div><!-- banner -->

        <h2><?php 
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
        ?></h2>
        <h1>DELIVERY ORDER</h1>
        <p>Date: <?php $phpdate = strtotime( $customer_detail->do_update_time );
                    $mysqldate = date( 'd-m-Y', $phpdate ); 
                    echo $mysqldate; ?></p>
        <h4>(Operator Copy)</h4>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <table border="0">
            <?php if($customer_detail->delivery_order_no!=NULL){?>
            <tr>
                <td class="left no-print"><b>SL NO - <?php echo $customer_detail->delivery_order_no;?></b></td>
            </tr>
            <?php }?>
            <tr>
                <td class="left no-print">FINANCER NAME</td>
                <td class="right"><?php echo $customer_detail->finance_name;?></td>
            </tr>
            <tr>
                <td class="left no-print">CUSTOMER ID NO</td>
                <td class="right"><?php echo $customer_detail->customer_code; ?></td>
            </tr>
            <tr>
                <td class="left no-print">CUSTOMER'S NAME </td>
                <td class="right"><?php echo $customer_detail->customer_name; ?></td>
            </tr>
            <tr>
                <td class="left no-print">S/O OR W/O </td>
                <td class="right"><?php echo $customer_detail->father_name; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PRESENT ADDRESS </td>
                <td class="right"><?php echo $customer_detail->present_address; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PERMANENT ADDRESS </td>
                <td class="right"><?php echo $customer_detail->permanent_address; ?></td>
            </tr>
            <tr>
                <td class="left no-print">PHONE </td>
                <td class="right"><?php echo $customer_detail->phone; ?></td>
            </tr>
            <tr>
                <td class="left no-print">MODEL </td>
                <td class="right"><?php foreach($model_list as $m_value){if($m_value->model_id == $customer_detail->model_id){ echo $m_value->model_name; }}?></td>
            </tr>
            <tr>
                <td class="left no-print">DELIVERY POINT </td>
                <td class="right"><?php 
                foreach ($yard_list as $y_value) {
                    if($y_value->delivery_yard_id==$customer_detail->delivery_yard_id){
                        echo $y_value->yard_name;
                    }
                }
                ?></td>
            </tr>
            <?php if($checklist_detail->vts != 1){?>
            <tr>
                <td class="left no-print"></td>
                <td><p class="without-vts">WITH OUT VTS</p></td>
            </tr>
            <?php } else {?>
            <tr>
                <td class="left no-print"></td>
                <td><p class="with-vts">WITH VTS</p></td>
            </tr>
            <?php }?>
            
        </table>
    </div>
    <div class="clearfix"></div>
    
    <div class="footer no-print">
        <div class="left">
            <p>For IFAD AUTOS LTD</p>
            <br />
            <br />
            <p>(AUTHORIZED SIGNATURE)</p>
        </div>
        <div class="right">
            <p>RECEIVED CHASSIS WITH ALL </p>
            <p>LOOSE ITEMS, 10/20 ltr DIESEL,</p>
            <p>TYRE/BATTERY IN GOOD CONDITION </p>
            <br/>
            <br />
            <p>CUSTOMER SIGNATURE</p>
        </div>
        <div class="clearfix"></div>
        <div class="right">
            <!-- <p>Operator Copy</p> -->
        </div>
        <div class="right">
            <p>Dealt By : <?php echo $sales_person->employee_name;?></p>
        </div>
    </div>
</div>


</body>
</html>
