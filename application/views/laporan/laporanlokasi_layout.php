     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Laporan</h1>
                <ul>
                    <li><a href="#">- Laporan Status Pegawai</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Laporan Status Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'LaporanLokasi/filterData' ?>">
                                        <div class="form-row"> 
                                            <div class="col-md-3 form-group mb-3">
                                                <label for="pegawai">Nama Pegawai</label>
                                                <select name="pegawai" id="pegawai" required class="form-control selectpegawai">
                                                    <option value="semua" >Semua </option>   									
                                                    <?php if (!empty($data_pegawai)){ foreach ($data_pegawai as $peg) {
                                                            $selected = (isset($nmfilter)?($nmfilter==$peg['id_user'] ?'selected':''):'') 
                                                        ?>
                                                        
                                                        <option value="<?php echo $peg['id_user'] ?>" <?php echo $selected ?>><?php echo $peg['nama'] ?></option>
                                                    <?php }} ?>
                                                </select> 
                                            </div>
                                            <div class="col-md-2 form-group mb-3 ">
                                                <label>Dari Tanggal </label>
                                                <input type="date" class="form-control bulan" id="dtglfilter" name="dtglfilter" value="<?php echo (isset($dtglfilter)?$dtglfilter:date('Y-m-d')) ?>">
                                        
                                            </div> 
                                            <div class="col-md-2 form-group mb-3 ">
                                                <label>Sampai Tanggal </label>
                                                <input type="date" class="form-control bulan" id="stglfilter" name="stglfilter" value="<?php echo (isset($stglfilter)?$stglfilter:date('Y-m-d')) ?>">
                                        
                                            </div>               
                                            <div class="col-md-3 form-group mb-3 pt-4">
                                                <button class="btn btn-primary" type="submit" >Filter</button>
                                            </div>
                                        </div>
                                 </form>  
                                 <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%; font-size:12px;">
                                   
                                    <thead>
                                        <tr >
                                            
                                            <th > No</th>
                                            <th > Nama</th> 
                                            <th > Waktu</th>
                                            <th > Jalan</th>
                                          
                                           
                                        </tr>
                                       
                                    </thead>
                                    <tbody>    
                                    <?php if(isset($data_table)){
                                    $i = 1;
                                    foreach($data_table as $row){?>	
                                    								
                                        <tr>
                                            <td ><?php echo $i++;?></td>
                                            <td ><?php echo $row["nama"];?></td>
                                            <td ><?php echo $row["waktu"]?></td>
                                            <td ><?php echo $row["jalan"];?></td>
                                            
                                       
                                        </tr>
                                       
                                    <?php }								
                                    }?>
                                    </tbody>
                                  
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                             
            </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        <!-- ============ Body content End ============= -->
    </div>
    <!-- <script>
             function fn_submit(){
                 var mont = $('.bulan').val();
                 console.log(mont);
                $.post("<?php echo base_url().'Rekap/filterData'?>",{ bulan : mont}).
                done(function(){
                        window.location.href = "<?php echo base_url()."Rekap" ?>";
                });
                
                }
   </script> -->

 <script>
        
	var stglfilter= $("#stglfilter").val();
	var dtglfilter= $("#dtglfilter").val();

    var table = $('.datatable_print').DataTable({
      "dom": 'Bfrtip',
      "responsive" : true,
      "buttons": [{
          extend: 'print',
          text: 'Cetak',
          title: 'Laporan Status Pegawai (Lokasi) </br> <h4> Tanggal : '+dtglfilter+' - '+stglfilter+' </h4>',
         footer : true,
          className: 'btn-success',
          exportOptions: {
            columns: [0, 1, 2, 3],
          }          
      }]
  }); 
  table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );


        // $('.datatable_print').DataTable({
        //     "dom": 'Bfrtip',
        //     "responsive" : true,
        //     "buttons": [{
        //         extend: 'print',
        //         text: 'Cetak',
        //         title: 'Laporan Status Pegawai (Lokasi) </br> <h4> Tanggal : '+dtglfilter+' - '+stglfilter+' </h4>',
        //         className: 'btn-success',
        //         exportOptions: {
        //             columns: ':not(:last-child)',
        //         },
        //         customize: function(win)
        //     {
 
        //         var last = null;
        //         var current = null;
        //         var bod = [];
 
        //         var css = '@page { size: landscape;} font-size : 10pt ',
        //             head = win.document.head || win.document.getElementsByTagName('head')[0],
        //             style = win.document.createElement('style');
 
        //         style.type = 'text/css';
        //         style.media = 'print';
 
        //         if (style.styleSheet)
        //         {
        //           style.styleSheet.cssText = css;
        //         }
        //         else
        //         {
        //           style.appendChild(win.document.createTextNode(css));
        //         }
 
        //         head.appendChild(style);
        //  }           
        //     }]
        // }); 
    </script>