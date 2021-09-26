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
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Direktorat</label>
                  <input type="hidden" name="id" value="<?php echo $tampil->id;?>">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $tampil->nama;?>">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="keterangan" rows="3"><?php echo $tampil->keterangan;?></textarea>
                </div>

                <div class="form-group">
                  <label>Status Direktorat</label>
                  <select class="form-control" name="is_trash">
                    <option>Pilih</option>
                    <option <?php if($tampil->is_trash == 1){ echo 'selected'; }?> value="1">Direktorat Aktif</option>
                    <option <?php if($tampil->is_trash == 0){ echo 'selected'; }?> value="0">Direktorat Nonaktif</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
            </form>
            <div class="card-footer text-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="button" class="btn btn-primary" onclick="Page.Simpan()"><i class="fa fa-save"></i> Simpan</button>
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
      var keterangan = $('textarea[name="keterangan"]').val();
      var is_trash = $('select[name="is_trash"]').val();

      if(nama == ''){
        Swal.fire("Gagal!", "Nama Direktorat Tidak Boleh Kosong.", "error");
      }else if(keterangan == ''){
        Swal.fire("Gagal!", "Keterangan Tidak Boleh Kosong.", "error");
      }else if(is_trash == 'Pilih'){
        Swal.fire("Gagal!", "Status Direktorat Tidak Boleh Kosong.", "error");
      }else{
        $.ajax({
          url: '<?php echo base_url();?>masters/direktorat/perbaharui',
          type: 'POST',
          data: {id:id, nama:nama, keterangan:keterangan, is_trash:is_trash},
          success: function(response){
            // console.log(response);
            $("#modal_tambah").modal('hide');
            Swal.fire("Berhasil!", "Data Berhasil Disimpan!","success").then( () => {
              location.href = '<?php echo base_url();?>masters/direktorat';
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
        $(this).val($(this).val().replace(/[^a-z ]/g, ''));
      });
      $("input[name='latitude']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9.,'-]/g, ''));
      });
      $("input[name='longitude']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9.,'-]/g, ''));
      });
    });

    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}
</body>
</html>