     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                <li><a href="#">- Pindah Lokasi Absen</a></li>
					                  
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-header">
                            <h4> Data Ubah Absen <span><a class="float-right" href="<?php echo site_url('Pindahabsen/TambahData');?>"><i class="i-Add"></i></a></span> </h4>
                           
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered datatable_default" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th>Nama Pegawai</th>
                                            <th>Lokasi Absen Sekarang</th>
                                            <th>Lokasi Absen Sebelumnya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                         
                                        <?php $i=1;
                                            foreach ($pegawai as $p ) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $p['nama']; ?></td>
                                                    <td><?php echo $p['lokasi_baru']; ?></td>
                                                    <td><?php echo $p['lokasi_awal']; ?></td>
                                                    <td ><center>
                                                    <h4> <a href="<?php echo base_url().'Pindahabsen/updatedata/'.$p["id_ubahabsen"];?>">
                                                            <i class='i-Pen-4'></i></a>
                                                                 
                                                    </h4>
                                                    </center>
                                                </td>
                                                </tr>
                                            <?php $i++;}?>
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>