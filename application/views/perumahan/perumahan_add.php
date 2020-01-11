        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Perumahan</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Perumahan </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Perumahan/'.$action ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-3 mb-3">
								<label>Blok</label>
								<input type="text" class="form-control" placeholder="Blok" name="blok"
								value="<?php echo (isset($data_table)?$data_table['blok']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-3 mb-9">
								<label>Type</label>
								<input type="text" class="form-control" placeholder="Type" name="type" id="type"
								value="<?php echo (isset($data_table)?$data_table['type']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-2 mb-9">
								<label>Luas Tanah</label>
								<input type="number" class="form-control" placeholder="Luas" name="luas" id="luas"
								value="<?php echo (isset($data_table)?$data_table['luas']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-2 mb-9">
								<label>Kamar Tidur</label>
								<input type="number" class="form-control" placeholder="Jumlah Kamar Tidur" name="kamar" id="kamar"
								value="<?php echo (isset($data_table)?$data_table['kamar']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
							<div class="col-md-2 mb-9">
								<label>Listrik (Watt)</label>
								<input type="number" class="form-control" placeholder="Jumlah Watt Listrik" name="listrik" id="listrik"
								value="<?php echo (isset($data_table)?$data_table['listrik']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>			
						</div>
                        <div class="form-row">
							<div class="col-md-2 mb-3">
								<label>Air (PDAM)</label>
								<select  name="air" id="air" required class="form-control select2" >
									<option value="" >Air PDAM</option>  
									
									<option value="Ya" <?php echo ($data_table['air']=="Ya"?"selected":""); ?> >Ya</option>
									<option value="Tidak" <?php echo ($data_table['air']=="Tidak"?"selected":""); ?> >Tidak</option>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<label>Dapur</label>
								<select  name="dapur" id="dapur" required class="form-control select2" >
									<option value="" >Dapur</option>  
									
									<option value="Ya" <?php echo ($data_table['dapur']=="Ya"?"selected":""); ?> >Ya</option>
									<option value="Tidak" <?php echo ($data_table['dapur']=="Tidak"?"selected":""); ?> >Tidak</option>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-2 mb-9">
								<label>Ruang Tamu</label>
								
                                <select  name="ruang_tamu" id="ruang_tamu" required class="form-control select2" >
									<option value="" >Ruang Tamu</option>  
									
									<option value="Ya" <?php echo ($data_table['ruang_tamu']=="Ya"?"selected":""); ?> >Ya</option>
									<option value="Tidak" <?php echo ($data_table['ruang_tamu']=="Tidak"?"selected":""); ?> >Tidak</option>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-2 mb-9">
								<label>Kamar Mandi</label>
								<input type="number" class="form-control" placeholder="Jumlah Kamar Mandi" name="kamar_mandi" id="kamar_mandi"
								value="<?php echo (isset($data_table)?$data_table['kamar_mandi']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                            <div class="col-md-2 mb-9">
								<label>Lantai</label>
								<input type="number" class="form-control" placeholder="Jumlah Lantai" name="lantai" id="lantai"
								value="<?php echo (isset($data_table)?$data_table['lantai']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>	
							<div class="col-md-2 mb-9">
								<label>Garasi </label>
								<select  name="garasi" id="garasi" required class="form-control select2" >
									<option value="" >Garasi</option>  
									
									<option value="Ya" <?php echo ($data_table['garasi']=="Ya"?"selected":""); ?> >Ya</option>
									<option value="Tidak" <?php echo ($data_table['garasi']=="Tidak"?"selected":""); ?> >Tidak</option>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
						</div>
                        <div class="form-row">
													
							
							<div class="col-md-2 mb-9">
								<label>Progress </label>
								<input type="number" class="form-control" placeholder="Progres Pekerjaan" name="progres" id="progres"
								value="<?php echo (isset($data_table)?$data_table['progres']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label>Harga</label>
								<input type="text" class="form-control rupiah" placeholder="Harga" name="harga"
								value="<?php echo (isset($data_table)?$data_table['harga']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label>Booking Fee</label>
								<input type="text" class="form-control rupiah" placeholder="Booking fee" name="dp"
								value="<?php echo (isset($data_table)?$data_table['dp']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-4 mb-9">
								<label>Lokasi</label>
                                <select  name="kodeLokasi" id="kodeLokasi" required class="form-control select2" >
									<option value="" >Pilih Lokasi</option>  
									<?php if (!empty($data_lokasi)){ foreach ($data_lokasi as $peg) {
										$selected = (isset($data_table)?($data_table['kodeLokasi']==$peg['kodeLokasi']?'selected':''):'');?>
										<option value="<?php echo $peg['kodeLokasi'] ?>" <?php echo $selected ?> ><?php echo $peg['ket'] ?></option>
									<?php }} ?>
                                </select>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
                           		
						</div>
						<div class="row">  
							
						</div>
                    
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_rumah']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Perumahan'?>">Batal</a>
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