        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">- Pengumuman</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Pengumuman </h4>
                </div>
                <div class="card-body">
	
					<form class="needs-validation" novalidate action="<?php echo base_url().'Pengumuman/'.$action ?>" method="post">
						<div class="form-row">
							<div class="col-md-12 mb-3">
								<label for="nama">Pengumuman</label>
								<textarea class="form-control" name="ket" required rows=3 maxLength=300><?php echo (isset($data_table)?$data_table['pengumuman']:'') ?></textarea>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
						
						</div>
						<div class="form-row">
							<div class="col-md-12 border-top pt-3">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Pengumuman'?>">Batal</a>
							</div>
						</div>
					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	<script>
		
	</script>
