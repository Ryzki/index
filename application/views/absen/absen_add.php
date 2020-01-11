     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">Abensi Pegawai</a></li>    
                    <li><a href="#">Add & Edit Data</a></li>                 
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                        <h4> <?php echo $caption ?> Data Absensi  </h4>
                        </div>
                          <div class="card-body">                          
                            <form method="POST" action="<?php echo site_url('Absensi/'.$action) ?>" class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-2 form-group mb-3">
                                        <label >NIP</label>
                                        <input type="text" name="nip" class="form-control" required readonly 
                                        value="<?php echo (isset($data_pegawai)?$data_pegawai['nip']:'') ?>" placeholder="NIP Pegawai">
                                    </div>
                               
                                    <div class="col-md-8 form-group mb-3">
                                        <label >Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama"  placeholder="Nama Pegawai" readonly 
                                        required value="<?php echo (isset($data_pegawai)?$data_pegawai['nm_pegawai']:'') ?>">
                                    </div>

                                    <div class="col-md-2 form-group mb-3">
                                        <label >Tgl Absen</label>
                                        <input type="datetime-local" class="form-control" name="tgl_absen"  placeholder="Tanggal Absen" 
                                        required value="<?php echo (isset($data_table)?
                                        date('Y-m-d',strtotime($data_table['tgl_absen'])).'T'.date('H:i',strtotime($data_table['tgl_absen'])):
                                        date('Y-m-d').'T'.date('H:i')) ?>">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">                                  	 
                                    <div class="col-md-12 border-top pt-3">
                                        <input type="hidden" name='id' value="<?php echo (isset($data_table)?$data_table['id']:'') ?>">
                                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                                        <a class="btn btn-danger" href="<?php echo base_url().'Absensi'?>">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>