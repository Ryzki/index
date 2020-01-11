        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">- Golongan</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Golongan <span>
                    <a class="float-right" href="<?php echo base_url().'Golongan/AddPage';?>"><i class="i-Add"></i></a>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th style="width: 100px">ID</th>
                            <th >Keterangan</th>
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $row["gol"];?></td>
                                        <td ><?php echo $row["keterangan"];?></td>
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'Golongan/EditPage/'.$row["id_gol"];?>">
                                                    <i class='i-Pen-4'></i></a>         
                                            <a href='#' onclick="fn_deleteData('<?php echo 'Golongan/DeleteData/'.$row['id_gol']?>')">
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
    