<?php
//loading konfigurasi website
$site = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <!--icon web-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/style.css">

  </head>
  <body>