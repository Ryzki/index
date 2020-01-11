        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Bank</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Bank </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Bank/'.$action ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Nama Bank</label>
								<input type="text" class="form-control" placeholder="Nama Bank" name="nama"
								value="<?php echo (isset($data_table)?$data_table['nama']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
                                <label>No Rekening</label>
								<input type="number" class="form-control" placeholder="No Rekening" name="no_rek" 
								value="<?php echo (isset($data_table)?$data_table['no_rek']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
                                <label>Atas Nama</label>
								<input type="text" class="form-control" placeholder="Atas Nama" name="atas_nama" 
								value="<?php echo (isset($data_table)?$data_table['atas_nama']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-6 mb-9">
                            <label>Logo Bank</label>
								<div class="slim " 
                                        data-ratio="680:220" data-force-size="600,200" 
                                        data-upload-base64="false" >
                                        <?php if (isset($data_table)) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/bank/'.$data_table['logo']:'') ?>" alt=""/>
                                            <?php } ?>
                                        <input type="file" name="foto[]" required accept="image/jpg, image/jpeg, image/png" />
                                    </div>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
                            		
						</div>
                    
                       
						<div class="row">                                  	 
								<div class="col-md-12 border-top pt-3 ">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_bank']:'') ?>" >
								<input type="hidden" name="foto_old" value="<?php echo (isset($data_table)?$data_table['logo']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Bank'?>">Batal</a>
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
