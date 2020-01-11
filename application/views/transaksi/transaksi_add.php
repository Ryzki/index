        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Transaksi</a></li>
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
					<form class="needs-validation" novalidate action="<?php echo base_url().'Transaksi/'.$action ?>" method="post" enctype="multipart/form-data">
					<?php if (isset($data_table)) { ?>
					<div class="form-row">
							<div class="col-md-4 mb-3">
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
								<label>NIK</label>
								<input type="text" class="form-control" placeholder="NIK Customer" name="nik" id="nik"
								value="<?php echo (isset($data_table)?$data_table['nik']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-4 mb-9">
								<label> Nama</label>
								<input type="text" class="form-control" placeholder="Nama Customer" name="nama" id="nama"
								value="<?php echo (isset($data_table)?$data_table['nama']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-4 mb-9">
								<label>Pekerjaan</label>
								<input type="text" class="form-control" placeholder="Pekerjaan Customer" name="pekerjaan" id="pekerjaan"
								value="<?php echo (isset($data_table)?$data_table['pekerjaan']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           		
						</div>
						<p>
                        <div class="form-row">
							<div class="col-md-8 mb-9">
								<label>Alamat </label>
								<input type="text" class="form-control" placeholder="Alamat Customer" name="alamat" id="alamat"
								value="<?php echo (isset($data_table)?$data_table['alamat']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>					
							
                            <div class="col-md-4 mb-9">
								<label>Lokasi</label>
                                <select  name="kodeLokasi" id="kodeLokasi" required class="form-control select2" >
									<option value="" >Pilih Lokasi</option>  
									<?php if (!empty($data_lokasi)){ foreach ($data_lokasi as $peg) {
										$selected = (isset($data_table)?($data_table['id_rumah']==$peg['id_rumah']?'selected':''):'');?>
										<option value="<?php echo $peg['id_rumah'] ?>" <?php echo $selected ?> ><?php echo $peg['ket'] ?>-<?php echo $peg['blok'] ?> </option>
									<?php }} ?>
                                </select>
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
								<a class="btn btn-danger" href="<?php echo base_url().'Transaksi'?>">Batal</a>
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