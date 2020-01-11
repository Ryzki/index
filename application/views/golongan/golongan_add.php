        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Golongan</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Golongan </h4>
                </div>
                <div class="card-body">
	
					<form class="needs-validation" novalidate action="<?php echo base_url().'Golongan/'.$action ?>" method="post">
						<div class="form-row">
							<div class="col-md-2 mb-3">
								<label>Golongan</label>
								<input type="text" class="form-control" placeholder="Kode Golongan" name="kode"
								value="<?php echo (isset($data_table)?$data_table['gol']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-4 mb-3">
								<label>Keterangan</label>
								<input type="text" class="form-control" placeholder="Keterangan" name="nama"
								value="<?php echo (isset($data_table)?$data_table['keterangan']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
						</div>
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_gol']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Golongan'?>">Batal</a>
							</div>
						</div>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	
