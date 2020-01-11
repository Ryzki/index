        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Home</h1>
                <ul>
                    <li><a href="#">- Dashboard</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Home-2"></i>
                            <div class="content"  style="max-width: 150px !important;">
                                <p class="text-muted mt-2 mb-0">Total Perumahan</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo $total_perumahan['total']; ?></p>
                                <span class="badge badge-danger">Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Home1"></i>
                            <div class="content" style="max-width: 150px !important;">
                                <p class="text-muted mt-2 mb-0">Total Rumah</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo $total_rumah['total']; ?></p>
                                <span class="badge badge-danger">Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Home-4"></i>
                            <div class="content" style="max-width: 150px !important;">
                                <p class="text-muted mt-2 mb-0">Terjual</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo $terjual['total']; ?></p>
                                <span class="badge badge-danger">Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Home-4""></i>
                            <div class="content" style="max-width: 150px !important;">
                                <p class="text-muted mt-2 mb-0">Tersedia</p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo $tersedia['total']; ?></p>
                                <span class="badge badge-danger">Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CHART -->
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            
                             <span class="flex-grow-1"></span><span class="badge badge-pill badge-primary">  </span>
                            <div id="containers" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            
                             <span class="flex-grow-1"></span><span class="badge badge-pill badge-danger">  </span>
                            <div id="containers2" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- ============ Body content End ============= -->
    </div>

    <!-- ============ BAR CHART ============= -->
    <script type="text/javascript">
        $dataBar = JSON.parse('<?php echo json_encode($data_bar); ?>');
        $dataLok = JSON.parse('<?php echo json_encode($data_lokasi); ?>');
        console.log($dataBar[0]);
        Highcharts.chart('containers', {
        chart: {
            type: 'column'
        },
        title :{
            text : 'Data Rumah'
        },
        
        xAxis: {
            categories: $dataLok,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        exporting: { enabled: true },
        series: [{
            name: 'Tersedia',
            data: $dataBar[1]

        }, {
            name: 'Terjual',
            data: $dataBar[0]

        }]
    });


    </script>
    
    <script type="text/javascript">
    $dataPie = JSON.parse('<?php echo json_encode($data_pie); ?>');
    console.log( $dataPie);
        Highcharts.chart('containers2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Data Penjualan Bulan Ini'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:.0f} ',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Terjual',
            colorByPoint: true,
            data: $dataPie
        }]
    });
    </script>