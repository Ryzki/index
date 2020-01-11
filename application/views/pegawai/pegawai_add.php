     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">Pegawai</a></li>    
                    <li><a href="#">Add & Edit Data</a></li>                 
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                        <h4> <?php echo $caption ?> Data Pegawai  </h4>
                        </div>
                          <div class="card-body">                          
                            <form method="POST" action="<?php echo site_url('Pegawai/'.$action) ?>">
                                <div class="form-row">
                                    <div class="col-md-4 form-group mb-3">
                                        <label >NIP</label>
                                        <input type="text" name="nip" class="form-control" required 
                                        value="<?php echo (isset($data_table)?$data_table['nip']:'') ?>" placeholder="NIP Pegawai">
                                    </div>
                               
                                    <div class="col-md-4 form-group mb-3">
                                        <label >Nama Pegawai</label>
                                        <input type="text" class="form-control" name="nama"  placeholder="Nama Pegawai" 
                                        required value="<?php echo (isset($data_table)?$data_table['nm_pegawai']:'') ?>">
                                    </div>

                                    <div class="col-md-4 form-group mb-3">
                                        <label >IMEI</label>
                                        <input type="text" class="form-control" name="imei"  placeholder="IMEI HP" 
                                        required value="<?php echo (isset($data_table)?$data_table['imei']:'') ?>">
                                    </div>                                    
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 form-group mb-3">
                                        <label >Golongan</label>
                                        <select  name="gol" required class="form-control">
                                            <option value="">Golongan</option>   									
                                                <?php if(!empty($golongan)){ foreach ($golongan as $gol) {
                                                    $selected = (isset($data_table)?($data_table['gol']==$gol['gol']?'selected':''):'') ?>
                                                
                                                <option value="<?php echo $gol['gol'] ?>" <?php echo $selected ?>><?php echo $gol['gol'] ?></option>
                                                <?php }} ?>
                                        </select> 
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div> 
                                    <div class="col-md-4 form-group mb-3">
                                        <label >User App</label>
                                        <input type="text" class="form-control" name="user"  placeholder="Username App" 
                                        required value="<?php echo (isset($data_table)?$data_table['user_app']:'') ?>">
                                    </div>
                                    <div class="col-md-4 form-group mb-3">
                                        <label >Password</label>
                                        <input type="password" class="form-control" name="pass"  placeholder="Password App" 
                                        required value="<?php echo (isset($data_table)?$data_table['pass_app']:'') ?>">
                                    </div>
                                
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label >Lokasi</label>
                                        <select  name="lokasi" required class="form-control select2">
                                            <option value="">Lokasi</option>   									
                                                <?php if(!empty($lokasi)){ foreach ($lokasi as $lok) { 
                                                     $selected = (isset($data_table)?($data_table['id_lokasi']==$lok['id_lokasi']?'selected':''):'') ?>
                                                    ?>
                                                   <option value="<?php echo $lok['id_lokasi'] ?>" <?php echo $selected ?>><?php echo $lok['keterangan'] ?></option>
                                                <?php }} ?>
                                        </select> 
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>   
                                    <div class="col-md-6 form-group mb-3">
                                        <label >Shift</label>
                                        <select  name="shift" required class="form-control select2">
                                            <option value="0">Kantor</option>   									
                                                <?php if(!empty($shift)){ foreach ($shift as $sh) {
                                                      $selected = (isset($data_table)?($data_table['id_shift']==$sh['id_shift']?'selected':''):'') 
                                                    ?>
                                                
                                                <option value="<?php echo $sh['id_shift'] ?>" <?php echo $selected ?>><?php echo $sh['keterangan'] ?></option>
                                                <?php }} ?>
                                        </select> 
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>          
                                
                                
                                </div>

                                <div class="row">                                  	 
                                    <div class="col-md-12 border-top pt-3">
                                        <input type="hidden" name='id' value="<?php echo (isset($data_table)?$data_table['id_pegawai']:'') ?>">
                                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                                        <a class="btn btn-danger" href="<?php echo base_url().'Pegawai'?>">Batal</a>
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