        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">- Pindah Absen</a></li>
					<li><a href="#">Ubah Data</a></li>                    
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Pilih Lokasi Absen Pegawai</h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Pindahabsen/'.$action ?>" method="post">
						<div class="form-row">						
                          <div class="col-md-6 mb-3">
								<label for="pegawai">Lokasi</label>
								<select name="lokasi" id="lokasi" required class="form-control select2lokasi">									
									<?php if (!empty($lokasi)){ foreach ($lokasi as $lok) {?>
										<option value="<?php echo $lok['id_lokasi'] ?>" ><?php echo $lok['keterangan'] ?></option>
									<?php }} ?>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>					
						</div>
						<div class="col-md-12 mb-3">
								<label for="menu"><strong>Nama Pegawai</strong></label>
								<div class="form-row" id="pegawai">
									<?php if(!empty($parent)){
										foreach($parent as $p){ 
												echo "<div class='col-12 bd-top' ><label><strong>- ".$p['parent']."</strong></label></div>";
												$pare = $p['parent'];
												$child = array_filter($pegawai,function($var) use ($pare){
													return $var['parent'] == $pare;
													},ARRAY_FILTER_USE_BOTH);
												foreach($child as $c){ ?>
													<label class="checkbox_inline checkbox-outline-info checkbox" >
													<input type="checkbox" name="peg[]" value="<?php echo $c['nip']?>" >
													<span><?php echo  $c['nm_pegawai'] ?></span>
													<span class="checkmark"></span>
													</label>
										<?php }
										}
									}?>
										
								</div>								
							</div>	

                
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">
								<button class="btn btn-primary" type="submit">Ubah Lokasi Absen</button>
							</div>
						</div>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  
