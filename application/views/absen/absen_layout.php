     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">- Data Absen</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Data Absen Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <input type="hidden" id="datatable_title" value="Data Absen Pegawai">
                                <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th> 
                                            <th>Nama Pegawai</th>
                                            <th>Tanggal</th>
                                            <th>Jam Absen</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>                         
                                        <?php $i=1;
                                            foreach ($data_table as $row ) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['nip']; ?></td>
                                                    <td><?php echo $row['nm_pegawai'] ?></td>
                                                    <td><?php echo ($row['tgl']!="-"?date('d-m-Y',strtotime($row['tgl'])):""); ?></td>
                                                    <td><?php echo ($row['jam']!="-"?date('H:i',strtotime($row['jam'])):"") ; ?></td>
                                                    <?php $badge = ($row['cstatus']=="Terlambat"?"badge-warning":($row['cstatus']=="Tepat Waktu"?"badge-success":
                                                    ($row['cstatus']=="Belum Absen"?"badge-danger":"badge-info"))) ?>  
                                                    <td><span class="badge <?php echo $badge ?>" ><?php echo $row['cstatus']?></span></td>                                                
                                                    <td><?php if($row['id']!=-1){?>
                                                        <center><h4>
                                                        <a href="<?php echo base_url().'Absensi/EditPage/'.$row["id"].'/'.$row['nip'];?>">
                                                        <i class='i-Pen-4'></i></a>  
                                                        </h4></center>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Filter</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url().'Absensi/Filter'?>" >
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input class="form-control" name="tgl" value="<?php echo date('Y-m-d') ?>" type="date">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 border-top pt-3">
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        <!-- ============ Body content End ============= -->
    </div>
