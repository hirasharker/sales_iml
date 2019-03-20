<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total </br>Customers</span>
        <div class="count"><?php echo $total_customers;?></div>
        <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Booking </br>Last 7 days</span>
        <div class="count"><?php echo $booking_within_last_seven_days;?></div>
        <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Total Booking </br>Current Month</span>
        <div class="count green"><?php echo $booking_within_current_month;?></div>
        <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Sales </br>Last 7 days</span>
        <div class="count"><?php echo $sales_within_last_seven_days;?></div>
        <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Sales </br>Current Month</span>
        <div class="count"><?php echo $sales_within_current_month;?></div>
        <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    <!-- <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
    </div> -->
    </div>
    <!-- /top tiles -->
    <div class="row">
        
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Monthly Sales performance</h4>
                    <div class="clearfix"></div>
                </div>
                <div class="demo-container" >
                    <div id="curve_chart" style="height:280px"></div>
                </div>
                <!-- <div class="tiles">
                    <div class="col-md-4 tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline11 graph" style="height: 160px;">
                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                    </div>
                    <div class="col-md-4 tile">
                    <span>Total Revenue</span>
                    <h2>$231,809</h2>
                    <span class="sparkline22 graph" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                    </div>
                    <div class="col-md-4 tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline11 graph" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                    </div>
                </div> -->
            </div>

        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
            <div class="x_title">
                <h4>Top Sold Models</h4>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-6">
                <?php foreach($sold_models_within_current_month as $value){?>
                    <div>
                        <p><?php foreach($model_list as $m_value){if($m_value->model_id==$value->model_id){ echo $m_value->model_name;}}?></p>
                        <div class="">
                            <div class="progress progress_sm" style="width: 76%;">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $value->qty*100/$total_sold_quantity_by_month;?>"></div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>
            
        </div>
    </div>
    <div class="clearfix"></div>
    

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row x_title">
                <div class="col-md-6">
                <!-- <h3>Sales Statistics  <small>Graph title sub-title</small></h3> -->
                <h3>Sales Statistics </h3>
                </div>
                <!-- <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                </div> -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h4>Top 5 Zones</h4>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <!-- <div id="donutchart" style="width: 100%;"></div> -->
                    <table class="" style="width:100%">
                    <tr>
                        <th style="width:37%;">
                        <p>Top 5</p>
                        </th>
                        <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                            <p class="">Zone Name</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <p class="">Sales Quantity</p>
                        </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                        </td>
                        <td>
                        <table class="tile_info">
                            
                            <?php $i= 1; foreach($sold_within_current_month_by_zone as $value){?>
                            <tr>
                            <td>
                                <p><i class="fa fa-square <?php switch($i){case 1:echo 'aero';break;case 2:echo 'purple';break;case 3:echo 'red';break;}?>"></i>
                                <?php foreach($zone_list as $z_value){if($z_value->zone_id==$value->zone_id){echo $z_value->zone_name;}}?> </p>
                            </td>
                            <td><?php echo $value->qty;?></td>
                            </tr>
                            <?php $i++; }?>
                        </table>
                        </td>
                    </tr>
                    </table>
                </div>
                </div>
            </div>

            <div class="clearfix"></div>
            
        </div>
        
    </div>
    
    <div class="row">


        <!-- Start to do list -->
        
        <!-- End to do list -->
        
        <!-- start of weather widget -->
        
        <!-- end of weather widget -->
        </div>
    </div>
    </div>
</div>

<script>
    function init_chart_doughnut(){
				
        if( typeof (Chart) === 'undefined'){ return; }
        
        console.log('init_chart_doughnut');
        
        if ($('.canvasDoughnut').length){
            
        var chart_doughnut_settings = {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        <?php foreach($sold_within_current_month_by_zone as $value){
                            foreach($zone_list as $z_value)
                            {
                                if($z_value->zone_id==$value->zone_id)
                                {
                                    echo '"'.$z_value->zone_name.'"'.',';
                                }
                            } 
                        }?>
                        "0"
                    ],
                    datasets: [{
                        data: [
                            <?php foreach($sold_within_current_month_by_zone as $value){ 
                                echo '"'.$value->qty*100/$total_sold_quantity_by_month.'"'.',';
                            }?>
                            0
                        ],
                        backgroundColor: [
                            "#BDC3C7",
                            "#9B59B6",
                            "#E74C3C",
                            "#26B99A",
                            "#3498DB",
                            "#3498DB"
                        ],
                        hoverBackgroundColor: [
                            "#CFD4D8",
                            "#B370CF",
                            "#E95E4F",
                            "#36CAAB",
                            "#49A9EA",
                            "#49A9EA"
                        ]
                    }]
                },
                options: { 
                    legend: false, 
                    responsive: false 
                }
            }
        
            $('.canvasDoughnut').each(function(){
                
                var chart_element = $(this);
                var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);
                
            });			
        
        }  
        
    }

</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Sales'],
        ['January',  <?php echo $sales_quantity_of_january;?>],
        ['Fabruary',  <?php echo $sales_quantity_of_february;?>],
        ['March',  <?php echo $sales_quantity_of_march;?>],
        ['April',  <?php echo $sales_quantity_of_april;?>],
        ['May', <?php echo $sales_quantity_of_may;?>],
        ['June', <?php echo $sales_quantity_of_june;?>],
        ['July', <?php echo $sales_quantity_of_july;?>],
        ['August', <?php echo $sales_quantity_of_august;?>],
        ['September', <?php echo $sales_quantity_of_september;?>],
        ['October', <?php echo $sales_quantity_of_october;?>],
        ['November', <?php if($sales_quantity_of_november !=NULL) {echo $sales_quantity_of_november;}else {echo 0;} ?>],
        ['December', <?php if($sales_quantity_of_december !=NULL) {echo $sales_quantity_of_december;}else {echo 0;} ?>],
        
    ]);

    var options = {
        title: 'Sales Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);




    // var pieData = google.visualization.arrayToDataTable([
    //       ['Task', 'Hours per Day'],
    //       ['Work',     11],
    //       ['Eat',      2],
    //       ['Commute',  2],
    //       ['Watch TV', 2],
    //       ['Sleep',    7]
    //     ]);

    //     var options = {
    //       title: 'My Daily Activities',
    //       pieHole: 0.4,
    //       pieSliceText: 'label',
    //       slices: {  4: {offset: 0.2},
    //                 12: {offset: 0.3},
    //                 14: {offset: 0.4},
    //                 15: {offset: 0.5},
    //       }
    //     };

    //     var pieChart = new google.visualization.PieChart(document.getElementById('donutchart'));
    //     pieChart.draw(pieData, options);

    }
</script>