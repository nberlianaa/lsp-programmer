<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Menu Dashboard-->
        <li><a href="<?php echo base_url('admin/dashboard')?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

        <!--Menu User-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock "></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data Pengguna</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pengguna</a></li>
          </ul>

        <!--konfigurasi-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench "></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i> Konfigurasi Icon</a></li>

          </ul>

      <!--Menu Kamar-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bed "></i> <span>Kamar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/room') ?>"><i class="fa fa-table"></i> Data Kamar</a></li>
            <li><a href="<?php echo base_url('admin/room/tambah') ?>"><i class="fa fa-plus"></i> Tambah Kamar</a></li>
            <li><a href="<?php echo base_url('admin/tipe') ?>"><i class="fa fa-tag"></i> Kategori</a></li>
            <li><a href="<?php echo base_url('admin/resort') ?>"><i class="fa fa-home"></i> Resort</a></li>
          </ul>

        <!--Review-->
        <li><a href="<?php echo base_url('admin/review') ?>"><i class="fa fa-pencil"></i><span>Review</span></a></li> 

        <!--Booking-->
        <li><a href="<?php echo base_url('admin/booking') ?>"><i class="fa fa-book"></i><span>Booking</span></a></li> 

        <!--Transaksi-->
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-book"></i><span>Transaksi</span></a></li>

        <!--Laporan-->
        <li><a href="<?php echo base_url('admin/laporan') ?>"><i class="fa fa-list"></i><span>Laporan</span></a></li>
      </li>
    </ul>
  </section>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->

             <!-- /.box-header -->
            <div class="box-body">