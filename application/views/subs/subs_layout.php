        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Aplikasi</h1>
                <ul>
                    <li><a href="#">- Subscriber</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Subscriber <span>
                                        </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th> No </th>
                            <th >E-mail</th>
                            <th >Hp/Telpon</th>
                            <th >Tanggal</th>
                           
                        
                           
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
                                $i = 1;
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["email"];?></td>
                                        <td ><?php echo $row["telpon"];?></td>
                                        <td ><?php echo $row["tgl"];?></td>
  
                                        <td ><center>
                                            <h4>
                                           	 
                                            <a href='#' onclick="fn_deleteData('<?php echo 'Subs/DeleteData/'.$row['email']?>')">
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
    