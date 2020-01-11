        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">- Pekerjaan Pegawai</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Pekerjaan Pegawai</h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th style="width: 100px">NIK</th>
                            <th >Nama Pegawai</th>
                            <th >Bagian</th>
                            <th >Seksi</th>
                            <th >Pekerjaan</th>
                            <th >Aksi</th>
                        </thead>
                        <tbody>
                        <?php if(isset($data_table)){
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $row["cNIK"];?></td>
                                        <td ><?php echo $row["cNmPegawai"];?></td>
                                        <td ><?php echo $row["cNmBagian"];?></td>
                                        <td ><?php echo $row["cNmSeksi"];?></td>
                                        <td ><?php echo $row["cPekerjaan"];?></td>
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'KerjaPeg/AddPage/'.$row["cNIK"];?>">
                                                    <i class='i-Check'></i></a>
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
    