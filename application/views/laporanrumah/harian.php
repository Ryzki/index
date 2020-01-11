     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Laporan</h1>
                <ul>
                    <li><a href="#">- Laporan Harian Sales</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Laporan Harian Sales</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'HarianSales/filterData' ?>">
                                <div class="form-row"> 

                                            <div class="col-md-2 form-group mb-3 ">
                                                <label> Tanggal </label>
                                                <input type="date" class="form-control bulan" id="tgl" name="tgl" value="<?php echo (isset($stglfilter)?$stglfilter:date('Y-m-d')) ?>">
                                        
                                            </div>               
                                            <div class="col-md-3 form-group mb-3 pt-4">
                                                <button class="btn btn-primary" type="submit" >Filter</button>
                                            </div>
                                        </div>
                                 </form>  

                                 <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'HarianSales/cetak' ?>">
                                <div class="form-row">               
                                            <div class="col-md-3 form-group mb-3 pt-4">
                                                <button class="btn " type="submit" >Cetak</button>
                                            </div>
                                        </div>
                                 </form>  
                                <table class="display table table-striped table-bordered  table-sm" style="width:100%; font-size:12px;">
                                   
                                    <thead>
                                        <tr >
                                            
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">NO</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">NAMA KONSUMEN</th> 
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">PEKERJAAN</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">DETAIL PEKERJAAN</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">NO. HANDPHONE</th>
                                            <th colspan="3" style="text-align: center; vertical-align: middle;">FOLLOW UP</th>
                                            <th rowspan="2" style="text-align: center; vertical-align: middle;">ALASAN/KETERANGAN</th>
                                        </tr>
                                        <tr>
                                            <th>MEET</th>
                                            <th>CALL</th>
                                            <th>CLOSE</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>    
                                    <?php if(isset($data_konsumen)){
                                    $i = 1;
                                    foreach($data_konsumen as $row){?>	
                                    <input type="hidden" id="sales" value="<?php echo $row["sales"];?>">									
                                        <tr>
                                            <td style="text-align: center; vertical-align: middle;"><?php echo $i++;?></td>
                                            <td ><?php echo $row["nama"];?></td>
                                            <td ><?php echo $row["pekerjaan"];?></td>
                                            <td ><?php echo $row["detail_pekerjaan"]?></td>
                                            <td ><?php echo $row["no_hp"];?></td>
                                            <?php if ($row["follow_up"]==1) { ?>
                                                <td  style="text-align: center; vertical-align: middle;">&#10004</i></td>
                                                <td>-</td><td>-</td>
                                            <?php } else if ($row["follow_up"]==2) { ?>
                                                <td>-</td><td  style="text-align: center; vertical-align: middle;">&#10004</i></td>
                                                <td>-</td>
                                            <?php } else { ?>
                                                <td>-</td><td>-</td>
                                                <td  style="text-align: center; vertical-align: middle;">&#10004</i></td>
                                                
                                            <?php } ?>  
                                            <td ><?php echo $row["ket"];?></td>
                                        </tr>
                                    <?php }								
                                    }?>
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                             
            </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        <!-- ============ Body content End ============= -->
    </div>
 