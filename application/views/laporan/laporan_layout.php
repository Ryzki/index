     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Laporan</h1>
                <ul>
                    <li><a href="#">- Laporan Absensi</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Laporan Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'Rekap/filterData' ?>">
                                        <div class="form-row"> 
                                            <div class="col-md-2 form-group mb-3">
                                                <input type="month" class="form-control bulan" name="bulan">
                                            </div>              
                                            <div class="col-md-2 form-group mb-3">
                                                <button class="btn btn-primary" type="submit" >Filter</button>
                                            </div>
                                        </div>
                                 </form>    

                                <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th> 
                                            <th>Nama Pegawai</th>
                                            <th>Alpha</th>
                                            <th>Izin</th>
                                            <th>Sakit</th>
                                            <th>Cuti</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                         <?php $i=1;
                                            foreach ($data_table as $row ) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['nip']; ?></td>
                                                <td><?php echo  $row['nm_pegawai'] ?></td>
                                                <td><?php echo  $row['alpha'] ?></td>
                                                <td><?php echo  $row['izin'] ?></td>
                                                <td><?php echo  $row['sakit'] ?></td>
                                                <td><?php echo  $row['cuti'] ?></td>
                                            </tr>
                                        <?php $i++;}?>                     
                                       
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
    <!-- <script>
             function fn_submit(){
                 var mont = $('.bulan').val();
                 console.log(mont);
                $.post("<?php echo base_url().'Rekap/filterData'?>",{ bulan : mont}).
                done(function(){
                        window.location.href = "<?php echo base_url()."Rekap" ?>";
                });
                
                }
   </script> -->