     <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">Live Lokasi Pegawai</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                            <form class="needs-validation" novalidate action="<?php echo base_url().'Live/'.$action ?>" method="post">
                            <div class="row">
                            
                                <div class="col-md-3 mb-3">
                                        <label for="pegawai">Nama Pegawai</label>
                                        <select  name="pegawai" id="pegawai" required class="form-control pilihpegawai">	
                                            <option value="semua"> Keseluruhan </option>								
                                            <?php if (!empty($data)){ foreach ($data as $peg) {
                                                $selected = (isset($select)?($peg['id_user']==$select?'selected':''):'');?>
                                                <option value="<?php echo $peg['id_user'] ?>"  <?php echo $selected ?> > <?php echo $peg['nama'] ?> </option>
                                            <?php }} ?>
                                        </select> 
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                </div>	

                                <div class="col-md-2 mb-3">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" name="tgl" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>  
                                                                
                                <div class="col-md-3 mb-3 pt-4" >
                                    <button class="btn btn-primary" type="submit" >Cari Lokasi Pegawai</button>
                                </div>
                             
                            </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                 <div id="map-container" style="width:100%;height:400px;z-index:1"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>

<script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
<script>    
    var map;
    var markers = [];
    var position = [-8.6790147,116.1126074]; //default position
    var lokasi = <?php echo json_encode($data_table); ?>;
    console.log(lokasi);
    initMap();
    
    function initMap() {
        map = L.map('map-container').setView([-8.6790147,116.1126074],9.5);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        addMarkers(lokasi);

    }

    function addMarkers(locations){
        var icon = '<?php echo base_url()?>assets/images/marker.png';                   

        var marker, i;
        for (i = 0; i < locations.length; i++) {  
            var myIcon = L.icon({iconUrl:icon});
            
            var location = locations[i]['koordinat'];
            var position = location.split(",");
            
            var popupContent = '<div id="content-popup" class"row">'+
            '<div class="card"><div class="card-header"><i class="i-Male"> </i>'+locations[i]["nama"]+'</div>'+
            '<div class="card-body p-0">'+
                  '<p class="pl-3 pr-3" style="text-align:justify">'+locations[i]["jalan"]+'</p>'+
            '</div></div>';
            marker = L.marker([position[0],position[1]],{icon:myIcon}).bindPopup(popupContent,{closeButton: false,autoClose: true}).addTo(map);
            markers.push(marker);
        }
         
        setTimeout(function(){
            clearMarkers();                
            var data = lokasi;               
            addMarkers(data);
        },60000);
    }

    function clearMarkers(){
        for (var i = 0; i < markers.length; i++) {
            map.removeLayer(markers[i]);
        }
        markers = [];                      
    }       

</script>