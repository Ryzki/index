<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TESTING</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">     
    <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="assets/styles/vendor/sweetalert2.min.css">

</head>

<body>
    <div class="auth-layout-wrap" style="background-color: #eee">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
	                	    <div class="auth-logo text-center mb-4">
	                            
	                        </div>
                            <h1 class="mb-3 text-18">Test Image Recognition</h1>
                            <form method="post" action="<?php echo base_url().'FaceRC/Recognition'?>">
                                <div class="form-group">
                                    <label for="username">Gambar 1</label>
                                    <input id="username" class="form-control" type="file" name="img1">
                                </div>
                                <div class="form-group">
                                    <label for="password">Gambar 2</label>
                                    <input id="password" class="form-control" type="file" name="img2">
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit">Veryfi</button>

                            </form>

                            <div class="mt-3 text-center">
                            	 2019 © <b>PD PARKIR</b> - Kota Denpasar                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="display:inline-block;vertical-align:middle">
                    	<div class="p-4">
                    		<img src="assets/images/logo.png" alt="">
                    	</div>           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/sweetalert2.min.js"></script>
    <script src="assets/js/es5/script.min.js"></script>

    <script type="text/javascript">
        // SWAL
        <?php 
            $resp = $this->session->flashdata('respon');
            if(isset($resp)){                
                echo "swal({type:'info', title:'Ooopps !!',text:'".$resp['msg']."',buttonsStyling:!1,confirmButtonClass:'btn btn-lg btn-info'} );";
            }
        ?>        
    </script>

</body>
</html>