        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">- Kirim Pesan</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4> Kirim Pesan </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Kirimpesan/'.$action ?>" method="post">
						<div class="form-row">						
                          <div class="col-md-6 mb-3">
								<label for="pegawai">Nama Pegawai</label>
								<select  multiple name="pegawai[]" id="pegawai" required class="form-control selectpegawai">
									<option value="semua" >Semua </option>   									
									<?php if (!empty($data_pegawai)){ foreach ($data_pegawai as $peg) {?>
										<option value="<?php echo $peg['nip'] ?>" ><?php echo $peg['nm_pegawai'] ?></option>
									<?php }} ?>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
							<div class="col-md-4">
							</div>
							<div class="col-md-6 mb-3">
								<label>Pesan</label>
								<textarea  class="form-control" name="pesan"  required >
                                </textarea>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>			
						</div>
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_pegawai']:'') ?>" >
								<button class="btn btn-primary" type="submit">Kirim Pesan</button>
							</div>
						</div>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  
