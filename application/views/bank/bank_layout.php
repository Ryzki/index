        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">- Bank</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Bank <span>
                    <a class="float-right" href="<?php echo base_url().'Bank/AddPage';?>"><i class="i-Add"></i></a>
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th> No </th>
                            <th >Bank</th>
                            <th >Atas Nama</th>
                            <th >No Rekening</th>
                            <th >Logo</th>
                        
                           
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
                                $i = 1;
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["nama"];?></td>
                                        <td ><?php echo $row["atas_nama"];?></td>
                                        <td ><?php echo $row["no_rek"];?></td>
                                        <td ><img src="<?php echo (isset($row['logo'])?base_url().'assets/images/bank/'.$row['logo']:'') ?>" width="100px" height="33px" alt=""/></td>
                                
                                        
                                        <td ><center>
                                            <h4>
                                           	<a href="<?php echo base_url().'Bank/EditPage/'.$row["id_bank"];?>">
                                                    <i class='i-Pen-4'></i></a>   
                                            <a href='#' onclick="fn_deleteData('<?php echo 'Bank/DeleteData/'.$row['id_bank']?>')">
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
    