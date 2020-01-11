<style type="text/css">
	.grabbable {
	    cursor: move; /* fallback if grab cursor is unsupported */
	    cursor: grab;
	    cursor: -moz-grab;
	    cursor: -webkit-grab;
	}
	.grabbable:active { 
	    cursor: grabbing;
	    cursor: -moz-grabbing;
	    cursor: -webkit-grabbing;
	}
</style>
<script type="text/javascript" src="<?php echo base_url('assets/js/dragscroll.js')?>"></script>
        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Perumahan</a></li>
					<li><a href="#">Add Koordinat</a></li>                    
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
								<label>X</label>
								<input type="text" name="x" id="koordinatx" required="required" class="form-control" autocomplete="off"
								value="<?php echo (isset($data_table)?$data_table['X']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>		
                            <div class="col-md-3 mb-9">
								<label>Y</label>
								<input type="text" name="y" id="koordinaty" required="required" class="form-control" autocomplete="off"
								value="<?php echo (isset($data_table)?$data_table['Y']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>
							<div class="col-md-3 mb-9">
								<label>Action</label>
								<div class="col-md-12 ">
								<input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_rumah']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Perumahan'?>">Batal</a>
								</div>
							</div>	
						</div>
                        <div class="row">
                        <div  class="dragscroll grabbable" style="overflow-y: auto; overflow-x: auto; height: 770px">
                            <div onclick="point_it(event)" style="margin:auto; position: relative; background-image:url('<?php echo base_url('assets/images/lokasi/').$data_table['file']?>'); width:1600px; height:1600px;">
                                <?php
								echo "<img id='btn-info' data-toggle='modal' data-id='' data-target='#modal-info' style='cursor: pointer; margin-top:18px; margin-left: 43px; position:absolute;' title='Keterangan' width='251px' height='151px' src='".base_url('assets/images/ket.png')."'>";
								// echo "<img id='btn-info' data-toggle='modal' data-id='' data-target='#modal-info' style='cursor: pointer; margin-top:50px; margin-left: 43px; position:absolute; border-radius:20px;' title='Keterangan' width='15px' height='15px' src='".base_url('assets/images/kor.png')."'>";
                                    foreach ($koordinat as $row) {
										if ($row['id_rumah']==$data_id) {
                                        	echo "<img id='btn-info' data-toggle='modal' data-id='".$row['blok']."' data-target='#modal-info' style='cursor: pointer; margin-top:".$row['Y']."px; margin-left: ".$row['X']."px; position:absolute; border-radius:20px;' title='".$row['blok']."' width='15px' height='15px' src='".base_url('assets/images/koordinat.png')."'>";
										} else {
											echo "<img id='btn-info' data-toggle='modal' data-id='".$row['blok']."' data-target='#modal-info' style='cursor: pointer; margin-top:".$row['Y']."px; margin-left: ".$row['X']."px; position:absolute; border-radius:20px;' title='".$row['blok']."' width='15px' height='15px' src='".base_url('assets/images/kor.png')."'>";
										}
									}
                                ?>
                            </div>
                        </div>
                        </div>
                        
						
                    
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
								<!-- <input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['id_rumah']:'') ?>" >
								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Perumahan'?>">Batal</a> -->
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
<script type="text/javascript">            
    $(document).on("click", "#btn-info", function () {
        var id = $(this).data('id');
        $(".modal-body #detail-pesan").text("BLOK " + id);
        $("#hapus").attr('href', '<?php echo base_url('koordinat/delete?id=')?>' + id);
    });

   	function point_it(event){
	   var xx = document.getElementById("koordinatx");
	   var yy = document.getElementById("koordinaty");
	   pos_x = event.offsetX?(event.offsetX):event.pageX-document.getElementById("gambar").offsetLeft;
	   pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("gambar").offsetTop;
	   koordinatx = pos_x ;
	   koordinaty = pos_y ;
	   xx.value = koordinatx-10;
	   yy.value = koordinaty-10;
	}
</script>