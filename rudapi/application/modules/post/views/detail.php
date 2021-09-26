<?php echo $this->load->view('templates/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><?php echo 'Data '.ucfirst($this->uri->segment(1)).' '.ucfirst($this->uri->segment(2));?></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(1)).' '.ucfirst($this->uri->segment(2));?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Params</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Key</a>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table">
                  <thead style="background-color: #343a40; border: 1px solid #343a40; color: white;">
                    <tr>
                      <th scope="col">Kategori Situs</th>
                      <th scope="col">Nama API</th>
                      <th scope="col">URL</th>
                      <th scope="col">Methods</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $tampil->sumber;?></td>
                      <td><?php echo $tampil->nama;?></td>
                      <td><?php echo $tampil->nama_path;?></td>
                      <td><?php echo $tampil->methods;?></td>
                      <td><?php echo $tampil->keterangan;?></td>
                      <td><?php echo $tampil->tanggal;?></td>
                      <td><?php echo $tampil->status;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table">
                  <thead style="background-color: #343a40; border: 1px solid #343a40; color: white;">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama API</th>
                      <th scope="col">Params</th>
                      <th scope="col">Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($param as $p){?>
                    <tr>
                      <th scope="row"><?php echo $no++;?></th>
                      <td><?php echo $p->nama;?></td>
                      <td><?php echo $p->params;?></td>
                      <td><?php echo $p->tanggal;?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Boosttrap server side -->
<script src="<?php echo base_url();?>assets/datatable/jquery-3.5.1.js"></script>
<script src="<?php echo base_url();?>assets/datatable/jquery.dataTables.min.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/dataTables.buttons.min.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/jszip.min.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/pdfmake.min.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/vfs_fonts.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/buttons.html5.min.js" defer></script>
<script src="<?php echo base_url();?>assets/datatable/buttons.print.min.js" defer></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- Sweetalert 2 -->
<script src="<?php echo base_url();?>assets/sweetalert/sweetalert2.all.js"></script>
<!-- FancyGrid -->
<script src="<?php echo base_url();?>assets/mejo/fancygrid/fancy.full.min.js"></script>

{JS START}
<?php
echo $js_inlines;
?>
<script type="text/javascript">
    var Page = {};

    // keluar aplikasi
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

    // simpan data
    Page.Simpan = function(){
      var id = $('input[name="id"]').val();
      var nama = $('input[name="nama"]').val();
      var id_ktgrapi = $('select[name="id_ktgrapi"]').val();
      var id_path = $('input[name="id_path"]').val();
      var path = $('input[name="path"]').val();
      var methods = $('input[name="methods"]').val();
      var params = $('input[name="params"]').val();
      var keterangan = $('textarea[name="keterangan"]').val();
      var is_trash = $('select[name="is_trash"]').val();

      if(nama == ''){
        Swal.fire("Gagal!", "Nama API Tidak Boleh Kosong.", "error");
      }else if(id_ktgrapi == 'Pilih'){
        Swal.fire("Gagal!", "Kategori Post API Harap Dipilih.", "error");
      }else if(path == ''){
        Swal.fire("Gagal!", "Nama Controller dan Function Tidak Boleh Kosong.", "error");
      }else if(methods == ''){
        Swal.fire("Gagal!", "Methods Tidak Boleh Kosong.", "error");
      }else if(params == ''){
        Swal.fire("Gagal!", "Params Tidak Boleh Kosong.", "error");
      }else if(keterangan == ''){
        Swal.fire("Gagal!", "Keterangan Tidak Boleh Kosong.", "error");
      }else if(is_trash == 'Pilih'){
        Swal.fire("Gagal!", "Status Data Harap Dipilih.", "error");
      }else{
        $.ajax({
          url: '<?php echo base_url();?>post/simas/perbaharui',
          type: 'POST',
          data: {id:id, nama:nama, id_ktgrapi:id_ktgrapi, id_path:id_path, path:path, methods:methods, params:params, keterangan:keterangan, is_trash:is_trash},
          success: function(response){
            // console.log(response);
            $("#modal_tambah").modal('hide');
            Swal.fire("Berhasil!", "Data Berhasil Disimpan!","success").then( () => {
              location.href = '<?php echo base_url();?>post';
            }
          )}
        });
      }
    }

    // Inputan Tertentu
    $(function(){
      $("input[name='id_provinsi']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
      });
      $("input[name='nama']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^a-z]/g, ''));
      });
      $("input[name='methods']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^a-z ]/g, ''));
      });
      $("input[name='params']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^a0-z9=? ]/g, ''));
      });
      $("textarea[name='keterangan']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^a-z ]/g, ''));
      });
    });

    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}
</body>
</html>