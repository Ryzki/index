    
    <script src="<?php echo base_url().'assets/js/vendor/bootstrap.bundle.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/vendor/perfect-scrollbar.min.js'; ?>"></script>
    
    <script src="<?php echo base_url().'assets/js/es5/script.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/form.validation.script.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/vendor/sweetalert2.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/vendor/select2.min.js'; ?>"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/dropzone.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.dt.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.inputmask.bundle.min.js"></script>

    <script src="<?php echo base_url().'assets/';?>slim/slim/slim.kickstart.min.js" type="text/javascript"></script>    
    <script src="<?php echo base_url().'assets/';?>summernote/summernote.js" type="text/javascript"></script>   
    <!-- baru -->
   
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url('assets/gentelella-master/build/js/custom.min.js')?>"></script>

       
    <script type="text/javascript">

        var url = window.location.pathname.split("/");
        var url_getdata = location.protocol + '//' + location.host + "/" + url[1]+ "/" + url[2]+'/getDataDT';

    	
          
        $(document).ready(function() {
            $('.select2').select2();

            $('.selectpegawai').select2({
                allowClear: true,
                placeholder : 'Pilih Pegawai'
            });
            $('.select2lokasi').select2({
                placeholder : 'Pilih Lokasi'
            });
            
            $('.pilihpegawai').select2({
                allowClear: true,
                placeholder : 'Pilih Pegawai'
            });

            $(".rupiah").inputmask("numeric",{
            groupSeparator: ".",
            autoGroup: true,
            rightAlign: false
            });

            $('#summernote').summernote({
                height: 120,
                focus: true,
                float: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ]
                
            });
           

            // $('.select2').on('select2:opening select2:closing', function( event ) {
            //     var $searchfield = $(this).parent().find('.select2-search__field');
            //     $searchfield.prop('disabled', true);
            // });
        }); 
       
       
        $('.datatable_default').DataTable({
            "pageLength":10,
            "lengthChange": false,
            "responsive" : true
        });
        
        $('.datatable_server').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{ url: url_getdata, "type":"post"},
            "pageLength":10,
            "lengthChange": false,
            "responsive" : true

        });        
 
    	 <?php 
            $resp = $this->session->flashdata('respon');
            if(isset($resp)){                
                echo "swal({type:'info', title:'Konfirmasi',text:'".$resp['msg']."',buttonsStyling:!1,confirmButtonClass:'btn btn-lg btn-info'} );";
            }
        ?>  

        function fn_deleteData(url) {
        	swal({
				  title: 'Are you sure?',
				  text: "It will permanently deleted !",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then(function() {
				  	window.location = url;
				  	
				})
        }
       
       
        function myFunction(kdPeg) {
            var kdKerja = $("#cKdKerja option:selected").val();
            $.post('<?php echo site_url('Penugasan/cekTugas') ?>',{
                'nik':kdPeg,
                'cKdKerja' :kdKerja 
            }).done(function(data){
                var result = $.parseJSON(data);
                if (result['msg']=='kosong') {
                    swal({type:'warning', title:'Warning',text:'Pekerjaan tidak ada!',buttonsStyling:!1,confirmButtonClass:'btn btn-lg btn-info'} );
                    $("#"+kdPeg).prop('checked',false);
                }
               
            })      
        }
       

    </script>
</body>


</html>