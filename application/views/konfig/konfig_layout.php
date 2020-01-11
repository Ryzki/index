     <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Setup</h1>
                <ul>
                    <li><a href="#">Konfigurasi</a></li>                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>
             <div class="col-md-12 mb-4">
                    <div class="card text-left">

                           <div class="card-header">
                            <h4> Konfigurasi Aplikasi </h4>
                           
                          </div>
                          <div class="card-body">
                          
                            <form class="needs-validation" novalidate method="post">
                                <div class="form-row">
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Jam Masuk</label>
                                        <input type="time" class="form-control" name="jam_masuk"  id="jam_masuk"
                                         value="<?php echo (isset($data_table)?$data_table->jam_masuk:date("H:i"))?>" >
                                    </div>
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Jam Toleransi</label>
                                        <input type="time" class="form-control" name="jam_toleransi" id="jam_toleransi"
                                        value="<?php echo (isset($data_table)?$data_table->jam_toleransi:date("H:i"))?>">
                                    </div>
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Update Lokasi</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" min=0 step=10 name="min_update" id="min_update"
                                            value="<?php echo (isset($data_table)?$data_table->min_to_update:0)?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Menit</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Jam Pulang</label>
                                        <input type="time" class="form-control" name="jam_pulang" id="jam_pulang"
                                            value="<?php echo (isset($data_table)?$data_table->jam_pulang:date("H:i"))?>">
                                    </div>                                    
                                    <div class="col-md-6 form-group mb-3">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control" required id="keterangan">
                                    </div> 
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Jam Masuk</label>
                                        <input type="time" class="form-control" required  id="jammasuk">
                                    </div> 
                                    <div class="col-md-2 form-group mb-3">
                                        <label>Jam Keluar</label>
                                        <input type="time" class="form-control" required  id="jamkeluar">
                                    </div> 
                                    <div class="col-md-2 form-group mb-3 pt-4">
                                         <div class="form-row">
                                            <div class="col-md-6 form-group mb-3">
                                                <a class="btn btn-primary form-control" id="tambah" href="#" onclick="addRow()" >tambah</a>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                 <a class="btn btn-danger form-control" id="delete" href="#" onclick="removeRow()">hapus</a>
                                            </div>
                                        </div>
                                    </div> 
                                                                                                                                              
                                </div>
                                <div class="form-row"> 

                                    <div class="table-responsive">
                                        <table class="display table table-striped table-bordered datatable_shift" style="width:100%" data-order="[[1,&quot;asc&quot;]]">
                                            <thead>
                                                <tr>
                                                    <th>Keterangan</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                </tr>
                                            </thead>
                                            <tbody>  

                                                <?php if(!empty($data_shift)) {foreach($data_shift as $dt){?>                       
                                                    <tr>
                                                        <td> <?php echo $dt['keterangan'] ?></td>
                                                        <td> <?php echo $dt['jam_masuk'] ?></td>
                                                        <td> <?php echo $dt['jam_keluar'] ?></td>
                                                    </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        
                                        </table>
                                    </div>
  
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 border-top pt-3">
                                        <button class="btn btn-primary" type="button" onclick="fn_submit()">Simpan Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
                <!-- end of col -->
            <!-- ============ Content Here ============= -->
        </div>
        <!-- ============ Body content End ============= -->
    </div>
<script>
       

    function addRow(){
        dt =  $('.datatable_shift').DataTable();
        var ket = $("#keterangan").val();
        var jm = $("#jammasuk").val();
        var jk = $("#jamkeluar").val();
        dt.row.add([ket,jm,jk]).draw(false);
       
    }

    function removeRow(){
        dt =  $('.datatable_shift').DataTable();
        dt.row('.selected').remove().draw(false);
       
    }
    function fn_submit(){
        var jm =  $("#jam_masuk").val();
        var jt =  $("#jam_toleransi").val();
        var mu =  $("#min_update").val();
        var jp =  $("#jam_pulang").val();

        dt =  $('.datatable_shift').DataTable(); 
        var data = dt.data().toArray();
        $.post("<?php echo base_url().'Konfig/SaveData'?>",{ jam_masuk : jm, jam_toleransi : jt,min_update : mu, jam_pulang : jp, data : data}).
        done(function(){
               window.location.href = "<?php echo base_url()."Konfig" ?>";
        });
        
    }
</script>