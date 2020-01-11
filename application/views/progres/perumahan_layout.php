        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Produksi</h1>
                <ul>
                    <li><a href="#">- Progres Perumahan</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
    
            <!-- ============ Content Here ============= -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Perumahan <span>
                    
                    </span>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="datatable_default table table-striped table-bordered">
                        <thead>
                            <th> No </th>
                            <th >Blok</th>
                            <th >Type</th>
                            <th >Lokasi</th>
                            <th >Progress</th>
                            <th >Luas Rumah</th>
                            <th >Harga</th>
                            <th >Booking Fee</th>
                           
                            <th width="5%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php if(isset($data_table)){
                                $i = 1;
								foreach($data_table as $row){?>										
                                    <tr>
                                        <td ><?php echo $i++;?></td>
                                        <td ><?php echo $row["blok"];?></td>
                                        <td ><?php echo $row["type"];?></td>
                                        <td ><?php echo $row["alamat"];?></td>
                                        <td ><?php echo $row["progres"];?> %</td>
                                        <td ><?php echo $row["luas"];?> m2</td>
                                        <td ><?php echo number_format($row["harga"]) ;?></td>
                                        <td ><?php echo number_format($row["dp"]) ;?> </td>
                                        
                                        <td ><center>
                                            <h4>
              
                                            <a href='<?php echo base_url().'Progres/ProgresPage/'.$row["id_rumah"];?>'  title="Add Progress">
                                            <i class='i-Line-Chart'></i></a>
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
    