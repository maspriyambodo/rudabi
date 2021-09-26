<?php echo $this->load->view('templates/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><?php echo 'Edit Data '.ucfirst($this->uri->segment(1)).' '.ucfirst($this->uri->segment(2));?></h3>
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
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kategori</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Params</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <!-- Data Kategori -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <form method="post" action="<?php echo site_url('post/perbaharui/');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama API</label>
                    <input type="hidden" name="id_api" value="<?php echo $tampil->id;?>">
                    <input type="text" class="form-control" name="namas" autocomplete="off" value="<?php echo $tampil->nama;?>">
                  </div>

                  <div class="form-group">
                    <label>Kategori Post API</label>
                    <select class="form-control" name="id_ktgrapi">
                      <option>Pilih</option>
                      <?php foreach($kategori as $k){?>
                      <option <?php if($tampil->id_kategoriapi == $k->id){ echo 'selected'; }?> value="<?php echo $k->id;?>"><?php echo ucfirst($k->nama);?></option>
                      <?php }?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Path URL</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo $paths->nama_path;?></span>
                      </div>
                      <input type="hidden" name="id_path" value="<?php echo $tampil->id_path;?>">
                      <input type="text" class="form-control" name="path" autocomplete="off" value="<?php echo $tampil->path;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Methods</label>
                    <input type="text" class="form-control" name="methods" autocomplete="off" value="<?php echo $tampil->methods;?>">
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3"><?php echo $tampil->keterangan;?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Kategori Post API</label>
                    <select class="form-control" name="is_trash">
                      <option>Pilih</option>
                      <option <?php if($tampil->is_trash == 1){ echo 'selected'; }?> value="1">Data aktif</option>
                      <option <?php if($tampil->is_trash == 0){ echo 'selected'; }?> value="0">Data nonaktif</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> <!-- onclick="Page.Simpan()" -->
                </div>
              </form>
            </div>

            <!-- Parameter -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form method="post" action="<?php echo site_url('post/perbaharui_params/');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Parameter</label>
                    <?php foreach($param as $p){?>
                      <input type="hidden" name="id[]" value="<?php echo $p->id;?>">
                      <input type="hidden" name="id_post[]" value="<?php echo $p->id_post;?>">
                      <input type="text" class="form-control" name="nama[]" autocomplete="off" value="<?php echo $p->nama;?>"><br>
                    <?php } ?>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button> <!-- onclick="Page.Simpan()" -->
                </div>
              </form>
            </div>
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
<script src="<?php echo base_url();?>assets/sweetalert/swal.js"></script>
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