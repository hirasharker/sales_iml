<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-clipboard"></i> Inventory <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>inventory/receive">Receive</a></li>
            <li><a href="<?php echo base_url();?>inventory/issue">Issue</a></li>
            
            <!-- <li><a href="<?php echo base_url();?>inventory/status">Invenotry Stauts</a></li> -->
            <li><a>Stock Transfer <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url();?>inventory/yard_transfer">Yard Transfer </a></li>
                    <li><a href="<?php echo base_url();?>inventory/dealer_transfer">Dealer Transfer</a></li>
                </ul>
            </li>
        </ul>
        </li>

        <li><a><i class="fa fa-clipboard"></i> Registration <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>registration">registration</a></li>
        </ul>
        </li>

        <li><a><i class="fa fa-user"></i> Customer Info <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>customer">Customer</a></li>
            <li><a href="<?php echo base_url();?>model">Model</a></li>
            <li><a href="<?php echo base_url();?>city">City</a></li>
            <li><a href="<?php echo base_url();?>zone">Zone</a></li>
            <li><a href="<?php echo base_url();?>dealer">Dealer</a></li>
        </ul>
        </li>
        <li><a><i class="fa fa-clipboard"></i> Documentary Process <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <!-- <li><a>Inspection<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li class="sub_menu"><a href="<?php echo base_url();?>inspection">Address Verification</a>
                </li>
                <li><a href="<?php echo base_url();?>inspection/customer_history">Customer History</a>
                </li>
            </ul>
            </li> -->
            <li class="sub_menu"><a href="<?php echo base_url();?>inspection">Address Verification</a>
                </li>
                <li><a href="<?php echo base_url();?>inspection/customer_history">Customer History</a>
                </li>
            <!-- <li><a href="<?php echo base_url();?>agreement">Agreement</a></li> -->
            <li><a href="<?php echo base_url();?>checklist">Documents Checklist</a></li>
            <li><a href="<?php echo base_url();?>delivery_order">Delivery Order</a></li>
            <li><a href="<?php echo base_url();?>delivery_challan">Delivery challan</a></li>
            
        </ul>
        </li>
        <li><a><i class="fa fa-check"></i> Approvals <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>approval_zonalhead">Zonal Head</a></li>
            <li><a href="<?php echo base_url();?>approval_head_of_sales">Head of Sales</a></li>
            <li><a href="<?php echo base_url();?>approval_accounts">Accounts</a></li>
            <li><a href="<?php echo base_url();?>approval_registration">Registration</a></li>
            <li><a href="<?php echo base_url();?>approval_dealer">Dealer</a></li>
        </ul>
        </li>
        <li><a><i class="fa fa-user"></i> Company Officials <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>officials">officials</a></li>
        </ul>
        </li>
         
        <li><a><i class="fa fa-phone"></i> MIS <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>lead">Lead </a></li>
            <li><a href="<?php echo base_url();?>activity">Activities</a></li>
            <li><a href="<?php echo base_url();?>crm_report">report</a></li>
        </ul>
        </li>



        



        <li><a><i class="fa fa-phone"></i> Call Center <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>call_center/">Customer List</a></li>
            <li><a href="<?php echo base_url();?>call_center/report">Booking Report</a></li>
        </ul>
        </li>

        <li><a><i class="fa fa-file"></i> Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>report/sales_report">Sales Report</a></li>
            <li><a href="<?php echo base_url();?>report/booking_report">Booking Report</a></li>
            <li><a href="<?php echo base_url();?>report/individual_customer">Individual Customer</a></li>
            <li><a href="<?php echo base_url();?>report/stock_report">Stock Report</a></li>
        </ul>
        </li>

        <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>form.html">Backup</a></li>
            <li><a href="<?php echo base_url();?>form_advanced.html">User</a></li>
            <li><a href="<?php echo base_url();?>form_upload.html">Permission</a></li>
        </ul>
        </li>
    </ul>
    </div>
</div>