        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">-Detail Transaksi</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Transaksi </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Transaksi/'.$action ?>" method="post" enctype="multipart/form-data">
					<?php if (isset($transaksi)) { ?>
					<div class="form-row">
							<div class="col-md-12 mb-3">
							<label for="kodeTransaksi"> Kode Transaksi</label>
								<input type="text" class="form-control" name="kodeHidden" id="kodeTransaksi" required 
								value="<?php echo (isset($transaksi['kodeTransaksi'])?$transaksi['kodeTransaksi']:'')?>" <?php echo (isset($data_table['kodeTransaksi'])?'disabled':'')?>>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
                           		
					</div>
					<?php } ?>
						<div class="form-row">
													
							<div class="col-md-4 mb-9">
								<label>NIK</label>
								<input type="text" class="form-control" placeholder="NIK Customer" name="ktp" 
								value="<?php echo (isset($data_table)?$data_table['ktp']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-4 mb-9">
								<label> Nama</label>
								<input type="text" class="form-control" placeholder="Nama Customer" name="nama" id="nama"
								value="<?php echo (isset($data_table)?$data_table['nama']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-4 mb-9">
								<label>No NPWP</label>
								<input type="text" class="form-control" placeholder="NPWP" name="npwp" id="npwp"
								value="<?php echo (isset($data_table)?$data_table['npwp']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           		
						</div>
						<p>
                        <div class="form-row">
                        <div class="col-md-3 mb-9">
								<label>Pekerjaan </label>
								<input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" 
								value="<?php echo (isset($data_table)?$data_table['pekerjaan']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
							<div class="col-md-3 mb-9">
								<label>Alamat </label>
								<input type="text" class="form-control" placeholder="Alamat Customer" name="alamat" id="alamat"
								value="<?php echo (isset($data_table)?$data_table['alamat']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>					
							<div class="col-md-3 mb-9">
								<label>Tempat Lahir </label>
								<input type="text" class="form-control" placeholder="Tempat Lahir" name="tmpt_lahir" 
								value="<?php echo (isset($data_table)?$data_table['tmpt_lahir']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-3 mb-9">
								<label>Tanggal Lahir </label>
								<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" 
								value="<?php echo (isset($data_table)?$data_table['tanggal_lahir']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           
                           		
						</div>
						<p>
                        <div class="form-row">
                        <div class="col-md-3 mb-9">
								<label>Telepon </label>
								<input type="text" class="form-control" placeholder="Telepon" name="telpon" 
								value="<?php echo (isset($data_table)?$data_table['telpon']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
							<div class="col-md-3 mb-9">
								<label>No Hp </label>
								<input type="text" class="form-control" placeholder="No Hp" name="handphone" id=""
								value="<?php echo (isset($data_table)?$data_table['handphone']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>					
							<div class="col-md-3 mb-9">
								<label>E-mail </label>
								<input type="text" class="form-control" placeholder="E-mail" name="email" 
								value="<?php echo (isset($data_table)?$data_table['email']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-3 mb-9">
								<label>Status  </label>
								<input type="text" class="form-control" placeholder="Status Pernikahan" name="status" 
								value="<?php echo (isset($data_table)?$data_table['status']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           	
						</div>
                        <p>
                        <div class="row">   
                        <div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label>Foto KTP</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
                                    <?php if (isset($data_table['fktp'])) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/transaksi/'.$data_table['fktp']:'') ?>" alt=""/>
                                            <?php } ?>
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
							<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label>Foto NPWP</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
                                    <?php if (isset($data_table['fnpwp'])) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/transaksi/'.$data_table['fnpwp']:'') ?>" alt=""/>
                                            <?php } ?>
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
						
                        </div>
                        <p>
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<input type="hidden" name="kodeTransaksi" value="<?php echo (isset($data_table)?$data_table['kodeTransaksi']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Transaksi'?>">Batal</a>
							</div>
						</div>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	
 <script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.js"></script>
<script> 
   
   
</script>