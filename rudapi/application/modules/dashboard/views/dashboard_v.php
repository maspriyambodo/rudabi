<?php echo $this->load->view('templates/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header"> <div class="container-fluid"> <div class="row mb-2"> <div class="col-sm-6"> <h3 class="m-0 text-dark"><?php echo ucfirst($this->uri->segment(1));?> API</h3> </div><!-- /.col --> <div class="col-sm-6"> <ol class="breadcrumb float-sm-right"> <li class="breadcrumb-item active"><?php echo $breadcumb;?></li> </ol> </div><!-- /.col --> </div><!-- /.row --> </div><!-- /.container-fluid --> </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <?php if($tampil->is_view == 1) : ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Data API Simas</span> <span class="info-box-number"> <?php echo $cp->total;?> <a href="<?php echo site_url('imgproduct');?>"><small>Detail</small></a> </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Data API Simpenghulu</span> <span class="info-box-number"> <?php echo $cp->total;?> <a href="<?php echo site_url('imgproduct');?>"><small>Detail</small></a> </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Data API Bimwin</span> <span class="info-box-number"> <?php echo $cp->total;?> <a href="<?php echo site_url('imgproduct');?>"><small>Detail</small></a> </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Data API Siwak</span> <span class="info-box-number"> <?php echo $cp->total;?> <a href="<?php echo site_url('imgproduct');?>"><small>Detail</small></a> </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php else: ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">Maaf, tidak memiliki akses melihat data <?php echo $this->uri->segment(1);?>.</div>
          </div>
        </div>
      </div>
    </section>
  <?php endif?>

<!-- Main Footer -->
<footer class="main-footer"> <strong>Copyright &copy; 2020 <a href="">Batur Samy</a>.</strong> All rights reserved. <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 1.0.0 </div></footer>
</div>

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- Sweetalert 2 -->
<script src="<?php echo base_url();?>assets/sweetalert/swal.js"></script>
<!-- FancyGrid -->
<script src="<?php echo base_url();?>assets/mejo/fancygrid/fancy.full.min.js"></script>
<!-- Uibutton -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  // keluar
  var Page = {};
  Page.Keluar = function(){
    Swal.fire({
      title: 'Yakin Ingin Keluar Aplikasi?',
      text: "Pastikan Pengolahan Data Sudah Disimpan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, keluar!'
    }).then((result) => {
      if(result.value == true)
      {
        Swal.fire({
          title: 'Keluar!',
          text: 'Kamu berhasil keluar.',
          icon: 'success',
          showConfirmButton: false,
          timer: 8000,
          backdrop:true,
          allowOutsideClick: false
        });
        window.location.href = '<?php echo site_url('dashboard/keluar');?>';
      }else{
        Swal.fire({
          title: 'Cancel!',
          text: 'Kamu Tidak Jadi Keluar Aplikasi.',
          icon: 'info',
          showConfirmButton: false,
          timer: 2000,
          allowOutsideClick: false
        });
      }
    });
  }
</script>
</body>
</html>