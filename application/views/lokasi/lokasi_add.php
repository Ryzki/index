        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
					<li><a href="#">- Lokasi</a></li>
					<li><a href="#">Add & Edit Data</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
			<!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4><?php echo $caption ?> Data Lokasi </h4>
                </div>
                <div class="card-body">
					<form class="needs-validation" novalidate action="<?php echo base_url().'Lokasi/'.$action ?>" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Keterangan</label>
								<input type="text" class="form-control" placeholder="Keterangan" name="ket"
								value="<?php echo (isset($data_table)?$data_table['ket']:'') ?>" required>
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-6 mb-9">
								<label>Alamat</label>
								<input type="text" class="form-control" placeholder="Alamat" name="alamat" id="area"
								value="<?php echo (isset($data_table)?$data_table['alamat']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
						</div>
                        <div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Kab/Kota</label>
							<select  name="kabKota" id="kabKota" required class="form-control select2" >
									<option value="" >Pilih Kab/Kota</option>   									
                                    <option value="Mataram" <?php echo (isset($data_table)?($data_table['kabKota']=='Mataram'?'selected':''):'') ?>> Mataram </option>
                                    <option value="Lombok Timur" <?php echo (isset($data_table)?($data_table['kabKota']=='Lombok Timur'?'selected':''):'') ?>> Lombok Timur </option>
                                    <option value="Lombok Barat" <?php echo (isset($data_table)?($data_table['kabKota']=='Lombok Barat'?'selected':''):'') ?>> Lombok Barat </option>
                                    <option value="KLU" <?php echo (isset($data_table)?($data_table['kabKota']=='KLU'?'selected':''):'') ?>> KLU </option>
                                    <option value="Sumbawa" <?php echo (isset($data_table)?($data_table['kabKota']=='Sumbawa'?'selected':''):'') ?>> Sumbawa </option>
                                    <option value="KSB" <?php echo (isset($data_table)?($data_table['kabKota']=='KSB'?'selected':''):'') ?>> KSB </option>
                                    <option value="Dompu" <?php echo (isset($data_table)?($data_table['kabKota']=='Dompu'?'selected':''):'') ?>> Dompu </option>
                                    <option value="Kota Bima" <?php echo (isset($data_table)?($data_table['kabKota']=='Kota Bima'?'selected':''):'') ?>> Kota Bima </option>
                                    <option value="Kab Bima" <?php echo (isset($data_table)?($data_table['kabKota']=='Kab Bima'?'selected':''):'') ?>> Kab Bima </option>
								</select> 
								<div class="valid-feedback">
									Looks good!
								</div>
							</div>						
							<div class="col-md-6 mb-9">
                            <label>Provinsi</label>
								<input type="text" class="form-control" placeholder="Provinsi" name="provinsi" id="provinsi"
								value="<?php echo (isset($data_table)?$data_table['provinsi']:'') ?>" required >
								<div class="valid-feedback">
									Looks good!
								</div>						
						</div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 mb-3">
                                <label>Deskripsi</label>
								<textarea class="form-control" id="summernote" name="des"  required><?php echo (isset($data_table)?$data_table['deskripsi']:'') ?></textarea>
								<div class="valid-feedback">
									Looks good!
								</div>
                              
							</div>	
                        </div>
                        <div class="row">
                        <div class="col-md-5 mb-3">
                        <label>File Brosur</label>
                                        <div class="slim " 
                                            data-ratio="3:4" data-force-size="300,400" 
                                            data-upload-base64="false" >
                                            <?php if (isset($data_table)) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/lokasi/'.$data_table['brosur']:'') ?>" alt=""/>
                                            <?php } ?>
                                            <input type="file" name="foto[]" required accept="image/jpg, image/jpeg, image/png" />
                                        </div>
								
							</div>	
                            <div class="col-md-7 mb-3">
                                <div class="row" >
                                    <div class="col-md-12 mb-3">
                                        <label>File Denah</label>
                                        <div class="slim " 
                                            data-ratio="4:2" data-force-size="400,300" 
                                            data-upload-base64="false" >
                                            <?php if (isset($data_table)) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/lokasi/'.$data_table['denah']:'') ?>" alt=""/>
                                            <?php } ?>
                                            <input type="file" name="foto[]" required accept="image/jpg, image/jpeg, image/png" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <label>File Master Plan</label> 
                                    <div class="slim " 
                                        data-ratio="800:800" data-force-size="800,800" 
                                        data-upload-base64="false" >
                                        <?php if (isset($data_table)) { ?>
                                            <img src="<?php echo (isset($data_table)?base_url().'assets/images/lokasi/'.$data_table['file']:'') ?>" alt=""/>
                                            <?php } ?>
                                        <input type="file" name="foto[]" required accept="image/jpg, image/jpeg, image/png" />
                                    </div>
                                    </div>
                                </div>
								
                                
							</div>	
                            <!-- <div class="col-md-12 form-group mb-3">
                                <label>Map</label>
                                <div id="map-container" style="width:100%;height:500px;z-index:1"></div>
                            </div>    -->
                        </div>
						<div class="row">                                  	 
                            <div class="col-md-12 border-top pt-3">						
                                <input type="hidden" name="id" value="<?php echo (isset($data_table)?$data_table['kodeLokasi']:'') ?>" >
                                
                                <input type="hidden" name="brosure_old" value="<?php echo (isset($data_table)?$data_table['brosur']:'') ?>" >
                                <input type="hidden" name="denah_old" value="<?php echo (isset($data_table)?$data_table['denah']:'') ?>" >
                                <input type="hidden" name="file_old" value="<?php echo (isset($data_table)?$data_table['file']:'') ?>" >

								<button class="btn btn-primary" type="submit">Simpan Data</button>
								<a class="btn btn-danger" href="<?php echo base_url().'Lokasi'?>">Batal</a>
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
   
    var map;
    var areaOverlays = []; 
    var areaHandle   = "<?php echo (isset($data_table)?$data_table['koordinat']:'') ?>";

    initMap();
    
    function initMap() {

      map = L.map('map-container').setView([-8.673636,115.239934],20);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);

        var options = {
            position: 'topright',
            draw: {
                polygon : true,
                circle :false,
                rectangle: false,
                circlemarker: false,
                polyline: false,
                marker: false
            },
            edit: {
                featureGroup: editableLayers, //REQUIRED!!
                remove: true,
                edit:false
            }
        };
        var drawControl = new L.Control.Draw(options);
        map.addControl(drawControl);

        map.on("draw:drawstart", function (e){
           editableLayers.clearLayers()
        });

        map.on(L.Draw.Event.CREATED, function (e) {
            editableLayers.addLayer(e.layer);
            coord = editableLayers.toGeoJSON().features[0].geometry.coordinates;            
            // console.log(editableLayers);

            var newPath = [];        
            // Now iterate through all the polylines and draw them on the map.
            for(var i = 0; i < coord[0].length; i++) {         
                newPath.push([coord[0][i][1],coord[0][i][0]]);           
            } 
            JSONString = JSON.stringify(newPath);
            $("#area").val(JSONString);

        });

        displayArea(editableLayers);
    }

    function displayArea(Layer) {
        if(areaHandle == "") {
            return;
        }

        area = JSON.parse(areaHandle);

        var polygon = new L.polygon(area);
        Layer.addLayer(polygon);
        // map.fitBounds(polygon.getBounds());
        center = polygon.getBounds().getCenter();
        map.flyTo(new L.LatLng(center.lat,center.lng), 15);
        
        console.log(polygon.getBounds().getCenter());
    }
</script>