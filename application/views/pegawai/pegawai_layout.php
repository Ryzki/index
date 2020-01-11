     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                <li><a href="#">- Pegawai</a></li>
					                  
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-header">
                            <h4> Data Pegawai <span><a class="float-right" href="<?php echo site_url('Pegawai/AddPage');?>"><i class="i-Add"></i></a></span> </h4>
                           
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered datatable_default" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Pegawai</th>
                                            <th>Gol</th>
                                            <th>User App</th>
                                            <th>Lokasi Absen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                         
                                        <?php $i=1;
                                            foreach ($data as $b ) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $b['nip']; ?></td>
                                                    <td><?php echo $b['nm_pegawai']; ?></td>
                                                    <td><?php echo $b['gol']; ?></td>
                                                    <td><?php echo $b['user_app']; ?></td>
                                                    <td><?php echo $b['keterangan']; ?></td>
                                                    <td ><center>
                                                    <h4> <a href="<?php echo base_url().'Pegawai/EditPage/'.$b["id_pegawai"];?>">
                                                            <i class='i-Pen-4'></i></a>
                                                                 
                                                    <a href='#' onclick="fn_deleteData('<?php echo 'Pegawai/DeleteData/'.$b['id_pegawai']?>')">
                                                    <i class='i-Close'></i></a></h4>
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