        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">-Detail Transaksi</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Transaksi </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Verifikasi/'.$action ?>" method="post" enctype="multipart/form-data">
					<?php if (isset($data_table)) { ?>
					<div class="form-row">
							<div class="col-md-12 mb-3">
							<label for="kodeTransaksi"> Kode Transaksi</label>
								<input type="text" class="form-control" name="kodeHidden" id="kodeTransaksi" required 
								value="<?php echo (isset($data_table['kodeTransaksi'])?$data_table['kodeTransaksi']:'')?>" <?php echo (isset($data_table['kodeTransaksi'])?'disabled':'')?>>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
                           		
					</div>
					<?php } ?>
						<div class="form-row">
													
							<div class="col-md-4 mb-9">
								<label>Jumlah Transfer</label>
								<input type="text" class="form-control rupiah" placeholder="Jumlah Transfer" name="jumlah_tf" 
								 required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-4 mb-9">
								<label> Tanggal Transfer</label>
								<input type="date" class="form-control" name="tanggal_tf" 
								 required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-4 mb-9">
								<label>No Rekening Customer</label>
								<input type="text" class="form-control" placeholder="No Rekening Customer " name="no_rek" 
								 required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           		
						</div>
                       
                        <p>
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<input type="hidden" name="kodeTransaksi" value="<?php echo (isset($data_table)?$data_table['kodeTransaksi']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Verifikasi'?>">Batal</a>
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
<script> 
   
   
</script>