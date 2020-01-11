        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">- Perumahan</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Add Progress Perumahan <span>
                    
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                <form class="needs-validation" novalidate action="<?php echo base_url().'Progres/SaveDataProgress' ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
							<div class="col-md-2 mb-3">
								<label>Progress Terakhir</label>
								<input type="text" class="form-control" placeholder="Progres" name="nama"
								value="<?php echo (isset($data_table)?$data_table['progres']:'0') ?> %" disabled>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-4 mb-3">
								<label>Progress (%)</label>
								<input type="number" class="form-control" placeholder="Progres Baru" name="progres" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                    </div>
                    <div class="form-row">
                    <div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 1</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
							<div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 2</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
							<div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 3</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>	
                           
                          
                    </div>
                    <div class="row">                                  	 
								<div class="col-md-12 border-top pt-3 ">
								<input type="hidden" name="id" value="<?php echo $data_id ?>" >
								<button class="btn btn-primary" type="submit">Simpan Progress</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Progres/ProgresPage/'.$data_id?>">Batal</a>
								</div>
                          
						</div>
					</form>
                </div>

            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>        
    