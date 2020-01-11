        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Produksi</h1>
                <ul>
                    <li><a href="#">- Perumahan</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Add Progress Perumahan <span>
						<?php if ($data_max['progres']<100) { ?>
							<a class="float-right" href="<?php echo base_url().'Progres/AddProgress/'.$data_id;?>"><i class="i-Add"></i></a>
						<?php } ?>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                <form class="needs-validation" novalidate action="<?php echo base_url().'Progres/CariProgres/'.$data_id ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
							<div class="col-md-2 mb-3">
								<label>Progress Perumahan</label>
								<select  name="progres" id="progres" required class="form-control select2" >
									<option value="" >Pilih Progress</option>  
									<?php if (empty($data_progres)) { foreach ($data_table as $peg) {
										 $selected = (isset($data_min)?($data_min['m']==$peg['progres']?'selected':''):'');?>
										<option value="<?php echo $peg['progres'] ?>" <?php echo $selected ?> ><?php echo $peg['progres'] ?> %</option>
									<?php }} else { foreach ($data_table as $peg) { 
                                        $selected = (isset($data_min)?($data_min['progres']==$peg['progres']?'selected':''):'');?>
										<option value="<?php echo $peg['progres'] ?>" <?php echo $selected ?> ><?php echo $peg['progres'] ?> %</option>
                                    <?php }} ?>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-2 mb-12">
                            <label>Action</label><br>
								
								<button class="btn btn-primary" type="submit">Cari</button>
								
                            </div>
					</div>
					</form>
                    <div class="row">                                  	 
                    <div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 1</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<?php if (isset($data_min)) { ?>
									<img src="<?php echo base_url().'assets/images/rumah/progres/'.$data_min['foto1']?>" alt=""/>
									<?php } ?>
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
							<div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 2</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<?php if (isset($data_min)) { ?>
									<img src="<?php echo (isset($data_min)?base_url().'assets/images/rumah/progres/'.$data_min['foto2']:'') ?>" alt=""/>
									<?php } ?>
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
							<div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label>Foto Progres 3</label> 
								<div class="slim " 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="false" >
									<?php if (isset($data_min)) { ?>
									<img src="<?php echo (isset($data_min)?base_url().'assets/images/rumah/progres/'.$data_min['foto3']:'') ?>" alt=""/>
									<?php } ?>
									<input type="file" name="foto[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>	
                           
                          
						</div>
					
                </div>

            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>        
    