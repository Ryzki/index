     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Laporan</h1>
                <ul>
                    <li><a href="#">- Laporan Harian Sales</a></li>
					                  
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header">
                            <h4>Laporan Harian Sales (<?php echo $this->session->userdata('nama'); ?>)</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="needs-validation" novalidate method="post" action="<?php echo base_url().'HarianUser/filterData' ?>">
                                <div class="form-row"> 
                                    
                                    <div class="col-md-2 form-group mb-3 ">
                                        <label> Tanggal </label>
                                        <input type="date" class="form-control bulan" id="tgl" name="tgl" value="<?php echo (isset($dtglfilter)?$dtglfilter:date('Y-m-d')) ?>">
                                
                                    </div>               
                                    <div class="col-md-3 form-group mb-3 pt-4">
                                        <button class="btn btn-primary" type="submit" >Filter</button>
                                    </div>
                                    </div>
                                 </form>  

                                 
                                <table class="display table table-striped table-bordered datatable_print table-sm" style="width:100%; font-size:12px;">
                                   
                                    <thead>
                                        <tr >
                                            
                                            <th ></th>
                                            <th > </th> 
                                            <th ></th>
                                            <th > </th>
                                            <th ></th>
                                            <th colspan="3" >FOLLOW UP</th>
                                            <th ></th><th ></th>
                                        </tr>
                                        <tr>
                                            <th >NO</th>
                                            <th >NAMA </th> 
                                            <th >PEKERJAAN</th>
                                            <th >DETAIL </th>
                                            <th >NO HP</th>
                                            <th>MEET</th>
                                            <th>CALL</th>
                                            <th>CLOSE</th>
                                            <th >KET</th>
                                            <th >FOTO</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                    <?php if(isset($data_konsumen)){
                                    $i = 1;
                                    foreach($data_konsumen as $row){?>	
                                    <input type="hidden" id="sales" value="<?php echo $this->session->userdata('nama');?>">									
                                        <tr>
                                            <td ><?php echo $i++;?></td>
                                            <td ><?php echo $row["nama"];?></td>
                                            <td ><?php echo $row["pekerjaan"];?></td>
                                            <td ><?php echo $row["detail_pekerjaan"]?></td>
                                            <td ><?php echo $row["no_hp"];?></td>
                                            <?php if ($row["follow_up"]==0) { ?>
                                                <td  >&#10004</i></td>
                                                <td>-</td><td>-</td>
                                            <?php } else if ($row["follow_up"]==1) { ?>
                                                <td>-</td><td  >&#10004</i></td>
                                                <td>-</td>
                                            <?php } else { ?>
                                                <td>-</td><td>-</td>
                                                <td  >&#10004</i></td>
                                            <?php } ?>  
                                            <td ><?php echo $row["ket"];?></td>
                                            <td>	<a href="<?php echo base_url('assets/images/pelanggan/').$row['foto']?>" >
                                                    <i class='i-Eye'></i></a> </td>
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
    <script>
  
  var dtTitle = "REPORT HARIAN SALES";
  var tgl = $("#tgl").val();
  var sales = $("#sales").val();

  var table = $('.datatable_print').DataTable({
      "dom": 'Bfrtip',
      "responsive" : true,
      "buttons": [{
          extend: 'print',
          text: 'Cetak',
          title: '<center><img src="<?php echo base_url('/assets/images/mahkota3.png') ?>" height="65px" width="65px" alt=""> <br>'+dtTitle+'<br><h5>SALES : '+sales+' | TANGGAL : '+tgl+'</h5></center><br>',
         footer : true,
          className: 'btn-success',
          exportOptions: {
              columns: ':not(:last-child)',
          },
          customize: function(win)
            {
 
                var last = null;
                var current = null;
                var bod = [];
 
                var css = '@page { size: landscape;} font-size : 10pt ',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
 
                style.type = 'text/css';
                style.media = 'print';
 
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
 
                head.appendChild(style);
         }           
      }]
  }); 
  table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
</script>