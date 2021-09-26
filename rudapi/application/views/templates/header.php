<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo ucfirst($titleweb);?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Boosttrap server side -->
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- CK Editor -->
  <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
  <!-- Form wizard -->
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- Tag -->
  <link href="<?php echo base_url();?>assets/tag/tagsinput.css" rel="stylesheet" type="text/css">
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- FancyGrid -->
  <link href="<?php echo base_url();?>assets/mejo/mejo.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/mejo/fancygrid/fancy.min.css" rel="stylesheet">
  <script language="javascript" type="text/javascript"> 
  var maxAmount = 250;
  function textCounter(textField, showCountField) {
    if (textField.value.length > maxAmount) {
      textField.value = textField.value.substring(0, maxAmount);
    } else { 
      showCountField.value = maxAmount - textField.value.length;
    }
  }
</script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"> <!-- Left navbar links --> <ul class="navbar-nav"> <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li> <li class="nav-item d-none d-sm-inline-block"> <a href="<?php echo site_url('dashboard');?>" class="nav-link">Beranda</a> </li> <li class="nav-item d-none d-sm-inline-block"> <a href="<?php echo site_url('users');?>" class="nav-link">Users</a> </li> <li class="nav-item d-none d-sm-inline-block"> <a href="javascript:;" onclick="Page.Keluar()" class="nav-link">Keluar</a> </li> </ul> <!-- Right navbar links --> <ul class="navbar-nav ml-auto"> </ul> </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo --><a href="index3.html" class="brand-link"> <img src="<?php echo base_url();?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light">My CMS V.1</span> </a>
    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: -2px;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <!-- <a href="#" class="d-block">Selamat datang, <?php //echo ucwords($this->session->userdata('username'));?></a> --></div>
        </div>
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php print_r($menu); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>