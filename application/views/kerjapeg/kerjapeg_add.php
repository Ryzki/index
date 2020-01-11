        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Pekerjaan Pegawai</a></li>
					<li><a href="#">Add Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php print_r($caption) ?> Data Pekerjaan Pegawai </h4>
                </div>
                <div class="card-body">
	
					<form class="needs-validation" novalidate action="<?php echo base_url().'KerjaPeg/'.$action ?>" method="post">
						<div class="form-row">
							<div class="col-md-12 mb-3">
								<label for="nama">Nama Pegawai</label>
								<input type="text" class="form-control" id="nama" placeholder="Nama Pegawai" name="nama"
								value="<?php echo (isset($data_table)?$data_table['cNmPegawai']:'') ?>" required readonly>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="kerja"><strong>Daftar Pekerjaan Seksi <?php echo (isset($data_table)?$data_table['cNmSeksi']:'') ?></strong></label>
								<div class="form-row" id="kerja">
									<?php if(!empty($data_pekerjaan)){
										foreach($data_pekerjaan as $krj){ ?>
										<label class="checkbox_inline checkbox-outline-info checkbox" >
											<input type="checkbox" name="kerja[]" value="<?php echo $krj['cKdKerja']?>" 
											<?php echo (in_array($krj['cKdKerja'],$data_kerjapeg)?' checked':'')?>>
											<span><?php echo $krj['cNmKerja'] ?></span>
											<span class="checkmark"></span>
										</label>
										<?php } ?>
									<?php } ?>
								</div>								
							</div>						
						</div>
						<input type="hidden" name="nik" value="<?php echo (isset($data_table)?$data_table['cNIK']:'') ?>" >
						<button class="btn btn-primary" type="submit">Simpan Data</button>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	
