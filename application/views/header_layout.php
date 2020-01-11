<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.ui-lib.com/gull-html/dashboard.v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 00:00:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahkota Cipta Indonesia</title>
  <link rel="icon" href="<?php echo base_url().'assets/images/mahkota.png'; ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/styles/css/themes/lite-purple.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/styles/vendor/perfect-scrollbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/styles/vendor/datatables.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/styles/vendor/buttons.dataTables.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/styles/vendor/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/styles/vendor/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/styles/css/custom.css">
    <!-- LEAFLET MAP-->
    <link href="<?php echo base_url() ?>assets/leaflet/leaflet.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.css" rel="stylesheet" />

    <!-- dropzone css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/styles/vendor/dropzone.min.css">  

     <!-- SLIM CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/';?>slim/slim/slim.min.css">
    <!-- END SLIM CSS-->  
    
   

    <!-- baru -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/summernote/summernote.css">  
    <link rel="stylesheet" href="<?php echo base_url()?>assets/styles/vendor/highcharts.css">
    <script src="<?php echo base_url().'assets/js/vendor/highcharts.js'; ?>"></script>

    <script src="<?php echo base_url().'assets/js/vendor/jquery-3.3.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/vendor/datatables.min.js'; ?>"></script>
    
  
</head>

<body>
    <div class="app-admin-wrap">
        <div class="main-header">
            <div class="logo">
                <img src="<?php echo base_url().'assets/images/mahkota.png'; ?>" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>



            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">

                        <img src="<?php echo base_url().'assets/images/faces/user.jpg'; ?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                               <u><strong><?php echo $this->session->userdata('nama') ?></strong></u>
                            </div>

                            <a class="dropdown-item" href="<?php echo base_url().'Login/SignOut'?>">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>