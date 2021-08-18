
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Service Inspection</title>
<link href="<?php echo base_url();?>build/css/inspection-print.css" rel="stylesheet" media="print">
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
                <h1 class="compnay-name">IFAD MOTORS LIMITED</h1>
                <!-- <p class="address1">Registered Office : Vill: Narsingpur, PS: Ashulia, Upzilla: Savar, Dist: Dhaka. Vat Registration no: 017151004202</p> -->
                <p class="address2">Corporate Office : Ifad Tower, 07 (New) Tejgaon Industrial Area, Tejgaon, Dhaka - 1208. Tel # 8870305-8,</p>
                <p class="address3">Fax: 880-2-9632765, E-mail : contact@ifadgroup.com</p>
            </div>
        </div><!-- banner -->

        <h2>SERVICE INSPECTION</h2>
        <p>Date: <?php echo date('d-m-y')?></p>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <table border="0" cellspacing="5" cellpadding="3">
            
            <tr>
                <td class="left no-print">RESALE ID</td>
                <td class="right">000<?php echo $service_detail->resale_id; ?></td>
            </tr>
            <tr>
                <td class="left no-print">SEIZE ID </td>
                <td class="right">000<?php echo $service_detail->seize_id; ?></td>
            </tr>
            <tr>
                <td class="left no-print">ENGINE NO </td>
                <td class="right"><?php echo $service_detail->engine_no; ?></td>
            </tr>
            <tr>
                <td class="left no-print">CHASSIS NO </td>
                <td class="right"><?php echo $service_detail->chassis_no; ?></td>
            </tr>
            <tr>
                <td class="left no-print">TYRE QUANTITY </td>
                <td class="right"><?php echo $service_detail->tyre_quantity; ?></td>
            </tr>
            <tr>
                <td class="left no-print">TYRE CONDITION </td>
                <td class="right"><?php echo strtoupper($service_detail->tyre_condition); ?></td>
            </tr>
            <tr>
                <td class="left no-print">ENGINE CONDITION </td>
                <td class="right"><?php echo strtoupper($service_detail->engine_condition); ?></td>
            </tr>
            <tr>
                <td class="left no-print">BATTERY CONDITION </td>
                <td class="right"><?php echo strtoupper($service_detail->battery_condition); ?></td>
            </tr>
            <tr>
                <td class="left no-print">GAS CYLINDER </td>
                <td class="right"><?php echo strtoupper($service_detail->gas_cylinder); ?></td>
            </tr>
            <tr>
                <td class="left no-print">WIND SHIELD GLASS </td>
                <td class="right"><?php echo strtoupper($service_detail->wind_shield_glass); ?></td>
            </tr>
            <tr>
                <td class="left no-print">IGNITION SWITCH </td>
                <td class="right"><?php echo strtoupper($service_detail->ignition_switch); ?></td>
            </tr>
            <tr>
                <td class="left no-print">KEY </td>
                <td class="right"><?php echo strtoupper($service_detail->key_status); ?></td>
            </tr>
            <tr>
                <td class="left no-print">BODY CONDITION </td>
                <td class="right"><?php echo strtoupper($service_detail->body_condition); ?></td>
            </tr>
            <tr>
                <td class="left no-print">DENTING/PAINTING </td>
                <td class="right"><?php echo strtoupper($service_detail->denting_painting); ?></td>
            </tr>
            <tr>
                <td class="left no-print">OVERALL VEHICLE CONDITION </td>
                <td class="right"><?php echo strtoupper($service_detail->overall_vehicle_condition); ?></td>
            </tr>

            <tr>
                <td class="left no-print">INSPECTION DATE </td>
                <td class="right"><?php echo $service_detail->time_stamp; ?></td>
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
            <P>SERVICE PERSONAL</P>
        </div>
        <!-- <div class="right">
            <p>PLEASE SIGN BELOW </p>
            <br/>
            <br />
            <p>CUSTOMER SIGNATURE</p>
        </div> -->
        <div class="clearfix"></div>
        <div class="right">
            <!-- <p>Customer Copy</p> -->
        </div>
        <div class="left">
            <!-- <p>Dealt By : <?php echo $sales_person->employee_name;?></p> -->
        </div>
    </div>
</div>


</body>
</html>
