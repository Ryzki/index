     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                <li><a href="#">- Izin Pegawai</a></li>
					                  
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-header">
                            <h4> Data Izin Pegawai <span>
                    <a class="float-right" href="<?php echo base_url().'Izin/AddPage';?>"><i class="i-Add"></i></a>
                    </span></h4>
                          </div>
                          <div class="card-body">
                            <input type="hidden" id="datatable_title" value="Data Izin Pegawai">
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pegawai</th>
                                            <th>Absen</th>
                                            <th>Keterangan</th>
                                            <th>Tgl Mulai</th>
                                            <th>Tgl Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                         
                                        <?php if(!empty($data_table)){ foreach ($data_table as $row ) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row['tgl_mohon'])); ?></td>
                                                    <td><?php echo $row['nm_pegawai']; ?></td>
                                                    <td><?php echo $row['ket_absen']; ?></td>
                                                    <td><?php echo $row['keterangan']; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row['tgl_mulai'])); ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row['tgl_selesai'])); ?></td>
                                                    <td><?php echo ($row['status']==0?"<span class='badge badge-warning m-2'>Pengajuan</span>":
                                                    ($row['status']==1?"<span class='badge badge-success m-2'>Diterima</span>":
                                                    "<span class='badge badge-danger m-2'>Ditolak</span>")); ?></td>
                                                    <td ><center>
                                                    <h4><a href="#" onclick="fn_UpdateData('<?php echo $row['id'] ?>','1')" title="Diterima">
                                                            <i class='i-Yes'></i></a>
                                                        
                                                    <a href='#' onclick="fn_UpdateData('<?php echo $row['id'] ?>','2')"  title="Ditolak">
                                                    <i class='i-Close'></i></a>
                                                    <a href='#' onclick="fn_deleteData('<?php echo 'Izin/DeleteData/'.$row['id']?>')">
                                                    <i class='i-Remove'></i></a>                                                    
                                                    </h4>
                                                    </center>
                                                </td>
                                                </tr>
                                            <?php }}?>
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>

    <script type="text/javascript">
        function fn_UpdateData(cid,cstat) {
            var ket = (cstat==1?'Diterima':'Ditolak');
        	swal({
				  title: 'Apakah anda yakin ?',
				  text: "Data Permohonan Izin Ini akan "+ket+"!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes'
				}).then(function() {
				  $.post("<?php echo base_url().'Izin/UpdateData'?>",{'id':cid,'stat':cstat})
                    .done(function(){
                        console.log("OK");
                        location.reload();
                    });
				  	
				})
        }    
    </script>