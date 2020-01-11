        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">- Promo</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Promo <span>
                    <a class="float-right" href="<?php echo base_url().'Promo/AddPage';?>"><i class="i-Add"></i></a>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th> No </th>
                            <th >Promo</th>
                            <th >Deskripsi</th>
                            <th >Foto</th>
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
                                $i = 1;
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["nm_promo"];?></td>
                                        <td ><?php echo $row["deskripsi"];?></td>
                                        <td ><img src="<?php echo (isset($row['foto'])?base_url().'assets/images/promo/'.$row['foto']:'') ?>" width="300px" height="150px" alt=""/></td> 
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'Promo/EditPage/'.$row["id_promo"];?>">
                                                    <i class='i-Pen-4'></i></a>   
                                            <a href='#' onclick="fn_deleteData('<?php echo 'Promo/DeleteData/'.$row['id_promo']?>')">
                                                    <i class='i-Close'></i></a></h4>
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
    