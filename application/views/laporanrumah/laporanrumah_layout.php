     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Laporan</h1>
                <ul>
                    <li><a href="#">- Laporan Perumahan</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Laporan Perumahan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'LaporanRumah/filterData' ?>">
                                        <div class="form-row"> 
                                            <div class="col-md-3 form-group mb-3">
                                                <label for="status">Status Perumahan</label>
                                                <select name="status" id="status" required class="form-control selectpegawai">
                                                    <option value="semua" > Semua </option>  
                                                    <?php 
                                                            $selected = ($cek!=null?'selected':''); 
                                                    ?>

                                                    <option value="belum" <?php echo ($cek=='belum'?$selected:'') ?>> Belum Bayar </option>  
                                                    <option value="terbayar" <?php echo ($cek=='terbayar'?$selected:'') ?>> Terbayar </option>  
                                                    <option value="terverifikasi" <?php echo ($cek=='terverifikasi'?$selected:'') ?>> Terverifikasi </option>   									
                                                    
                                                </select> 
                                            </div>
                                            <div class="col-md-2 form-group mb-3 ">
                                                <label>Dari Tanggal </label>
                                                <input type="date" class="form-control bulan" id="dtglfilter"  name="dtglfilter" value="<?php echo (isset($dtglfilter)?$dtglfilter:date('Y-m-d')) ?>">
                                        
                                            </div> 
                                            <div class="col-md-2 form-group mb-3 ">
                                                <label>Sampai Tanggal </label>
                                                <input type="date" class="form-control bulan" id="stglfilter" name="stglfilter" value="<?php echo (isset($stglfilter)?$stglfilter:date('Y-m-d')) ?>">
                                        
                                            </div>               
                                            <div class="col-md-3 form-group mb-3 pt-4">
                                                <button class="btn btn-primary" type="submit" >Filter</button>
                                            </div>
                                        </div>
                                 </form>  
                                <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th> 
                                            <th>Tgl Transaksi</th>
                                            <th>Alamat</th>
                                            <th>Nama Perumahan</th>
                                            <th>BLok</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                    <?php if(isset($data_rumah)){
                                $i = 1;
								foreach($data_rumah as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["kodeTransaksi"];?></td>
                                        <td ><?php echo date('d-m-Y',strtotime($row["tgl"]));?></td>
                                       
                                        <td ><?php echo $row["alamat"];?></td>
                                        <td ><?php echo $row["ket"].'-'.$row['blok'];?></td>
                                        <td ><?php echo $row["blok"];?></td>
                                        <td ><?php echo $row["type"];?></td>
                                        <?php $badge = ($row['status_transaksi']==0?"badge-danger":($row['status_transaksi']==1?"badge-warning":
                                                    ($row['status_transaksi']==2?"badge-success":"badge-info"))) ?>  
                                         <?php $badges = ($row['status_transaksi']==0?"Belum Terbayar":($row['status_transaksi']==1?"Terbayar":
                                                    ($row['status_transaksi']==2?"Terverifikasi":"Batal"))) ?>            
                                        <td><span class="badge <?php echo $badge ?>" ><?php echo $badges?></span></td>  
                                        
                                       
                                    </tr>
								<?php }								
							}?> 
                                       
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                             
            </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        <!-- ============ Body content End ============= -->
    </div>
    

    <script>
  
        var dtTitle = "Laporan Perumahan";
        var status = $("#status").val();
        var dtglfilter = $("#dtglfilter").val();
        var stglfilter = $("#stglfilter").val();

        $('.datatable_print').DataTable({
            "dom": 'Bfrtip',
            "responsive" : true,
            "buttons": [{
                extend: 'print',
                text: 'Cetak',
                title: dtTitle+'<br><h4> Status :'+status+'<br> Tanggal : '+dtglfilter+' - '+stglfilter,
                className: 'btn-success',
                exportOptions: {
                    columns: ':not(:last-child)',
                }           
            }]
        }); 
    </script>