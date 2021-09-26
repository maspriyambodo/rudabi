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

  <!-- Main content -->
  <section class="content">
    <?php if($tampil->is_view == 1) : ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body" id="mejo_grid">
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
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
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!------------------------ modal tambah ------------------------>
<div class="modal fade" id="modal_tambah" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Kecamatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="card-body">
            <div class="form-group">
              <label>Nama Kabupaten</label>
              <select class="form-control" name="id_kabupaten">
                <option>Pilih</option>
                <?php foreach($this->datainclude->_kabupaten() as $p){?>
                <option value="<?php echo $p->id_kabupaten;?>"><?php echo $p->nama;?></option>
                <?php }?>
              </select>
            </div>

            <div class="form-group">
              <label>ID Kecamatan</label>
              <input type="text" class="form-control" name="id_kecamatan" autocomplete="off" placeholder="ID Kecamatan">
            </div>

            <div class="form-group">
              <label>Nama Kecamatan</label>
              <input type="text" class="form-control" name="nama" autocomplete="off" placeholder="Nama Kecamatan">
            </div>

            <div class="form-group">
              <label>Latitude</label>
              <input type="text" class="form-control" name="latitude" autocomplete="off" placeholder="Latitude Kecamatan">
            </div>

            <div class="form-group">
              <label>Longitude</label>
              <input type="text" class="form-control" name="longitude" autocomplete="off" placeholder="Longitude Kecamatan">
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
    Page.RefreshGrid = function () {
    Page.InitGrid();
    };
    Page.InitGrid = function () {
    $('#mejo_grid').html('');
    var grid = new FancyGrid({
    lang: {
    thousandSeparator: '.',
    decimalSeparator: ',',
    paging: {
    of: 'of [0]',
    info: 'Show [0] - [1] of [2]',
    page: 'Page'
    }},
    theme: 'blue',
    renderTo: 'mejo_grid',
    height: 'fit',
    data: {
    pageSize: 10,
    remoteFilter: true,
    remoteSort: true,
    proxy: {
    url: '<?php echo base_url('master-kecamatan'); ?>'
    }},
    trackOver: true,
    selModel: {
    type: 'rows',
        memory: true
    },
    tbar: [
    {
    type: 'search',
        width: 350,
        emptyText: 'Search',
        paramsMenu: true,
        paramsText: 'Columns'
    },
    <?php if ($this->datainclude->_added()): ?>{
        type: 'button',
        text: '<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Tambah Data',
        width: 120,
        handler: function(){
          $('#modal_tambah').modal('show');
        }
    }<?php endif; ?>
    ],
        paging: true,
        defaults: {
        type: 'string',
        width: 100,
        sortable: true,
        resizable: true,
        ellipsis: true,
        align: 'center'
    },
    columns: [
        {
            index: 'no',
            title: 'No.',
            width: 70,
            sortable: false,
            locked: true,
            render: function (o) {
            o.style['text-align'] = 'center';
            return o;
            }
        },{
            index: 'id_kecamatan',
            title: 'ID Kecamatan',
            align: 'center',
            cellAlign: 'center',
            locked: true,
            width: 130
        },{
            index: 'kecamatan',
            title: 'Nama Kecamatan',
            align: 'center',
            width: 450
        },{
            index: 'kabupaten',
            title: 'Nama Kabupaten',
            align: 'center',
            width: 450
        },{
            index: 'latitude',
            title: 'Langitude',
            align: 'center',
            cellAlign: 'center',
            width: 210
        },{
            index: 'longitude',
            title: 'Longitude',
            align: 'center',
            cellAlign: 'center',
            width: 210
        },{
            index: 'status',
            title: 'Status Kecamatan',
            align: 'center',
            cellAlign: 'center',
            width: 210
        },{
            index: 'id_kecamatan',
            title: 'Aksi',
            align: 'center',
            cellAlign: 'center',
            ellipsis: false,
            width: 130,
            rightLocked: true,
            render: function(o) {
            o.style['text-align'] = 'center';
            if (o.data.is_actived == 1){
            o.value = ''
              +('<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Lihat Kecamatan" style="margin-right:20px;"><i class="fa fa-eye"></i><a>')
            <?php if ($this->datainclude->_edited()) : ?>
              +('<a class="text-warning btn_edit" href="javascript:;" onclick="Page.Edited(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit Kecamatan" style="margin-right:20px;"><i class="fa fa-edit"></i><a>')
            <?php endif; ?>
            <?php if ($this->datainclude->_deleted()) : ?>
              +('<a class="text-danger btn_hapus" href="javascript:;" onclick="Page.Delete(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Hapus Kecamatan" style="margin-right:10px;"><i class="fa fa-minus-circle"></i><a>')
            <?php endif; ?>
            } else if(o.data.is_actived == 0){
              o.value = ''
              +('')
            } else {
              o.value = '';
            }
              return o;
            },
        }]
    });
    };

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
      var id_kabupaten = $('select[name="id_kabupaten"]').val();
      var id_kecamatan = $('input[name="id_kecamatan"]').val();
      var nama = $('input[name="nama"]').val();
      var latitude = $('input[name="latitude"]').val();
      var longitude = $('input[name="longitude"]').val();

      if(id_kabupaten == 'Pilih'){
        Swal.fire("Gagal!", "Nama Kabupaten Tidak Boleh Kosong.", "error");
      }else if(id_kecamatan == ''){
        Swal.fire("Gagal!", "ID Kecamatan Tidak Boleh Kosong.", "error");
      }else if(nama == ''){
        Swal.fire("Gagal!", "Nama Kecamatan Tidak Boleh Kosong.", "error");
      }else if(latitude == ''){
        Swal.fire("Gagal!", "Latitude Tidak Boleh Kosong.", "error");
      }else if(longitude == ''){
        Swal.fire("Gagal!", "longitude Tidak Boleh Kosong.", "error");
      }else{
        $.ajax({
          url: '<?php echo base_url();?>masters/kecamatan/tambah',
          type: 'POST',
          data: {id_kabupaten:id_kabupaten, id_kecamatan:id_kecamatan, nama:nama, latitude:latitude, longitude:longitude},
          success: function(response){
            // console.log(response);
            $("#modal_tambah").modal('hide');
            Swal.fire("Berhasil!", "Data Berhasil Disimpan!","success").then( () => {
              location.href = '<?php echo base_url();?>masters/kecamatan';
            }
          )}
        });
      }
    }

    // hapus data
    Page.Delete = function(id_kecamatan) {
      Swal.fire({
        title: "Ingin Menonaktifkan Data Ini?",
        text: "Data Akan Masuk Kategori Nonaktif!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((status) => {
      if(status.value == true)
      {
        $.ajax({
          url: '<?php echo base_url(); ?>masters/kecamatan/hapus',
          type: 'POST',
          data: {id_kecamatan:id_kecamatan},
          success: function(response){
            Swal.fire("Berhasil!", "Data Berhasil Dinonaktifkan!","success").then( () => {
            location.href = '<?php echo base_url();?>masters/kecamatan';
            });
          }
        });
      }else{
        Swal.fire({
          title: 'Cancel!',
          text: 'Kamu Tidak Jadi Nonaktifkan Data Ini.',
          icon: 'info',
          showConfirmButton: false,
          timer: 2000,
          allowOutsideClick: false
        });
      }
      });
    };

    Page.Edited = function(id_kecamatan){
      // console.log(id_kecamatan);
      if(id_kecamatan != '') {
        window.location.href = '<?php echo base_url(); ?>masters/kecamatan/edited/' + id_kecamatan;
      }
    };

    // Inputan Tertentu
    $(function(){
      $("input[name='id_kecamatan']").on('input', function(e) {
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