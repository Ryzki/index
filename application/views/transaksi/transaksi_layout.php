        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">- Transaksi</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Transaksi <span>
                    <a class="float-right" href="<?php echo base_url().'Transaksi/AddPage';?>"><i class="i-Add"></i></a>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th> No </th>
                            <th >Kode Transaksi</th>
                            <th >Nama Customer</th>
                            <th >Alamat</th>
                            <th >Rumah</th>
                            <th >Status</th>
                            
                           
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
                                $i = 1;
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["kodeTransaksi"];?></td>
                                        <td ><?php echo $row["nama"];?></td>
                                        <td ><?php echo $row["alamat"];?></td>
                                        <td ><?php echo $row["ket"].'-'.$row['blok'];?></td>
                                        <?php $badge = ($row['status_transaksi']==0?"badge-danger":($row['status_transaksi']==1?"badge-warning":
                                                    ($row['status_transaksi']==2?"badge-success":"badge-info"))) ?> 
                                         <?php $badges = ($row['status_transaksi']==0?"Belum Terbayar":($row['status_transaksi']==1?"Terbayar":
                                                    ($row['status_transaksi']==2?"Terverifikasi":"Batal"))) ?>            
                                        <td><span class="badge <?php echo $badge ?>" ><?php echo $badges?></span></td>  
                                        
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'Transaksi/EditPage/'.$row["kodeTransaksi"];?>" title="Edit Transaksi">
                                                    <i class='i-Pen-4'></i></a>         
                                            <a href='#' title="Hapus Transaksi" onclick="fn_deleteData('<?php echo 'Transaksi/DeleteData/'.$row['kodeTransaksi']?>')">
                                            <i class='i-Close'></i></a>
                                            <a href="<?php echo base_url().'Transaksi/EditPageDetail/'.$row["kodeTransaksi"];?>" title="Edit Detail Transaksi">
                                                    <i class='i-Professor'></i></a> 
                                            </h4>
                                            </center>
                                        </td>
                                    </tr>
								<?php }								
							}?> 
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- ============ Body content End ============= -->
    </div>        
    