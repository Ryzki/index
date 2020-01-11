        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">- Promo</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Promo </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Promo/'.$action ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Nama Promo</label>
								<input type="text" class="form-control" placeholder="Nama Promo" name="nm_promo"
								value="<?php echo (isset($data_table)?$data_table['nm_promo']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
                                <br>
                                <label>Deskripsi</label>
								<textarea class="form-control" id="summernote" name="desc"  required><?php echo (isset($data_table)?$data_table['deskripsi']:'') ?></textarea>
								<div class="valid-feedback">
									Looks good!
								</div>
                              
							</div>						
							<div class="col-md-6 mb-9">
                            <label>Foto</label>
								<div class="slim" 
                                        data-ratio="800:400" data-size="800,400" 
                                        data-upload-base64="false" >
                                        <?php if (isset($data_table)) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/promo/'.$data_table['foto']:'') ?>" alt=""/>
                                            <?php } ?>
                                        <input type="file" name="foto[]" required accept="image/jpg, image/jpeg, image/png" />
                                    </div>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
                            		
						</div>
                        <p>
						<div class="row">                                  	 
                        		
                           
								<div class="col-md-12 border-top pt-3 ">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_promo']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Promo'?>">Batal</a>
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
