        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">- Pengumuman</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Pengumuman <span>
                    <a class="float-right" href="<?php echo base_url().'Pengumuman/AddPage';?>"><i class="i-Add"></i></a>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th style="width: 100px">ID</th>
                            <th >Tanggal</th>
                            <th >Pengumuman</th>
                            <th >Aksi</th>
                        </thead>
                        <tbody>
                        <?php if(isset($data_table)){
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $row["id"];?></td>
                                        <td ><?php echo $row["tgl"];?></td>
                                        <td ><?php echo $row["pengumuman"];?></td>
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'Pengumuman/EditPage/'.$row["id"];?>">
                                                    <i class='i-Pen-4'></i></a>          
                                            <a href='#' onclick="fn_deleteData('<?php echo 'Pengumuman/DeleteData/'.$row['id']?>')">
                                            <i class='i-Close'></i></a>
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
    