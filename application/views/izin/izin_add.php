        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
					<li><a href="#">- Izin Pegawai</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Izin Pegawai </h4>
                </div>
                <div class="card-body">
	
					<form class="needs-validation" novalidate enctype="multipart/form-data"
					action="<?php echo base_url().'Izin/'.$action ?>" method="post">

						<div class="form-row">
							<div class="col-md-4 mb-3">
								<label for="pegawai">Nama Pegawai</label>
								<select  name="pegawai" id="pegawai" required class="form-control select2" <?php echo ($action=="UpdateData"?'disabled':'') ?>>
									<option value="" >Pilih Pegawai</option>   									
									<?php if (!empty($data_pegawai)){ foreach ($data_pegawai as $peg) {
										$selected = (isset($data_table)?($data_table['nip']==$peg['nip']?'selected':''):'');?>
										<option value="<?php echo $peg['nip'] ?>" <?php echo $selected ?> ><?php echo $peg['nm_pegawai'] ?></option>
									<?php }} ?>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<label for="jenis">Jenis Izin</label>
								<select  name="jenis" id="jenis" required class="form-control select2">
									<option value="" >Jenis Izin</option>   									
									<?php if (isset($data_izin)){ foreach ($data_izin as $izin) {
										$selected = (isset($data_table)?($data_table['ket_absen']==$izin['ket_absen']?'selected':''):'');?>
										<option value="<?php echo $izin['ket_absen'] ?>" <?php echo $selected ?> ><?php echo $izin['ket_absen'] ?></option>
									<?php }} ?>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-2 mb-3">
								<label >Tgl Mulai</label>
								<input type="date" class="form-control" name="tgl_mulai" required 
								value="<?php echo (isset($data_table['tgl_mulai'])?date('Y-m-d',strtotime($data_table['tgl_mulai'])):date('Y-m-d'))?>" >
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>													
							<div class="col-md-2 mb-3">
								<label >Tgl Selesai</label>
								<input type="date" class="form-control" name="tgl_selesai" required 
								value="<?php echo (isset($data_table['tgl_selesai'])?date('Y-m-d',strtotime($data_table['tgl_selesai'])):date('Y-m-d'))?>" >
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>
							<div class="col-md-2 mb-3">
								<label >Status</label>
								<select  name="status" id="status" required class="form-control select2">
									<option value="1" <?php echo (isset($data_table['status'])?($data_table['status']==1?'selected':''):'') ?>>Diterima</option>
									<option value="2" <?php echo (isset($data_table['status'])?($data_table['status']==2?'selected':''):'') ?>>Ditolak</option>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>
							<div class="col-md-8 mb-3">
								<label >Keterangan</label>
								<input type="text" class="form-control" name="ket" required 
								value="<?php echo (isset($data_table['keterangan'])?$data_table['keterangan']:'')?>" >	
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>
							<div class="col-md-4 mb-3">
								<label >Bukti File</label>
								<input type="file" class="form-control" name="userFile" accept=".jpg, .pdf" >	
								<input type="hidden" name ="file_old" value="<?php echo (!empty($data_tabel)?$data_tabel['file']:'') ?>">
								<div class="valid-feedback">
									Looks good!
								</div>								
							</div>																						
						</div>


						<div class="row">
							<div class="col-md-12 border-top pt-3">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Izin'?>">Batal</a>
							</div>
						</div>

					</form>


                </div>
                
            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>  


	
