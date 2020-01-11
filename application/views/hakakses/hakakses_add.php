        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Hak Akses</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data User </h4>
                </div>
                <div class="card-body">
	
					<form class="needs-validation" novalidate action="<?php echo base_url().'HakAkses/'.$action ?>" method="post">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="nama">Nama Pegawai</label>
								<input type="text" class="form-control" name="nama" id="nama" required 
								value="<?php echo (isset($data_table['nama'])?$data_table['nama']:'')?>" >
								<div class="valid-feedback">
									Looks good!
								</div>
								<!-- <select  name="pegawai" id="pegawai" required class="form-control select2" <?php echo ($action=="UpdateData"?'disabled':'') ?>>
									<option value="" >Pilih Pegawai</option>   									
									<?php if (!empty($data_pegawai)){ foreach ($data_pegawai as $peg) {
										$selected = (isset($data_table)?($data_table['username']==$peg['username']?'selected':''):'');?>
										<option value="<?php echo $peg['username'] ?>" <?php echo $selected ?> ><?php echo $peg['nama'] ?></option>
									<?php }} ?>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div> -->
							</div>
							<div class="col-md-3 mb-3">
								<label for="cuser">Username</label>
								<input type="text" class="form-control" name="cuser" id="cuser" required 
								value="<?php echo (isset($data_table['username'])?$data_table['username']:'')?>" <?php echo (isset($data_table['username'])?'disabled':'')?>>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="cpass">Password</label>
								<input type="password" class="form-control" name="cpass" id="cpass" required 
								value="<?php echo (isset($data_table['password'])?$data_table['password']:'')?>" >
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>								
							<div class="col-md-12 mb-3">
								<label for="menu"><strong>Menu Aplikasi</strong></label>
								<div class="form-row" id="menu">
									<?php if(!empty($data_menu)){
										foreach($data_menu as $mn){ 
											if($mn['status']==1){
												echo "<div class='col-12 bd-top' ><label><strong>- ".$mn['nm_menu']."</strong></label></div>";
											}else{?>
										<label class="checkbox_inline checkbox-outline-info checkbox" >
											<input type="checkbox" name="menu[]" value="<?php echo $mn['kd_menu']?>" 
											<?php echo (in_array($mn['kd_menu'],$data_akses)?' checked':'')?>>
											<span><?php echo $mn['nm_menu'] ?></span>
											<span class="checkmark"></span>
										</label>
									<?php }}} ?>
								</div>								
							</div>						
						
						</div>
						<div class="row">
							<div class="col-md-12 border-top pt-3">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['username']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'HakAkses'?>">Batal</a>
							</div>
						</div>

					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	
