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
        <h4 class="modal-title">Form Tambah API Simas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form> <!-- method="post" action="<?php //echo site_url('post/tambah/');?>" -->
          <div class="card-body">
            <div class="form-group">
              <label>Nama API</label>
              <input type="text" class="form-control" name="nama" autocomplete="off" placeholder="Nama API">
            </div>

            <div class="form-group">
              <label>Kategori Post API</label>
              <select class="form-control" name="id_ktgrapi">
                <option>Pilih</option>
                <?php foreach($kategori as $k){?>
                <option value="<?php echo $k->id;?>"><?php echo ucfirst($k->nama);?></option>
                <?php }?>
              </select>
            </div>

            <div class="form-group">
              <label>Path URL</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo $paths->nama_path;?></span>
                </div>
                <input type="hidden" name="id_path" value="<?php echo $paths->id;?>">
                <input type="text" class="form-control" name="path" placeholder="Nama Controller dan Function" autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label>Methods</label>
              <input type="text" class="form-control" name="methods" autocomplete="off" placeholder="Methods" value="GET">
            </div>

            <div class="form-group">
              <label>Params</label>
              <input type="text" class="form-control" name="params[]" autocomplete="off" placeholder="Params">
            </div>

            <div id="repeat_params"></div>
              <input type="hidden" id="jumlah-form" name="jumlah_params" value="0">

            <div class="form-group">
              <button type="button" id="narsumbtn" class="btn btn-info" title="Tambah Penceramah"><i class="fas fa-plus-square"></i> Tambah</button>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="keterangan" rows="3"></textarea>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer text-right">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
            <button type="button" class="btn btn-primary" onclick="Page.Simpan()"><i class="fa fa-save"></i> Simpan</button> <!-- onclick="Page.Simpan()" -->
          </div>
        </form>
        
      </div>
    </div>
  </div>
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
<script src="<?php echo base_url();?>assets/sweetalert/sweetalert2.all.js"></script>
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
    url: '<?php echo base_url('data-post'); ?>'
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
            locked:true,
            render: function (o) {
            o.style['text-align'] = 'center';
            return o;
            }
        },{
            index: 'sumber',
            title: 'Sumber Data',
            align: 'center',
            locked:true,
            cellAlign: 'center',
            width: 150
        },{
            index: 'nama',
            title: 'Nama Post',
            align: 'center',
            width: 200
        },{
            index: 'nama_path',
            title: 'Path',
            align: 'center',
            width: 400
        },{
            index: 'methods',
            title: 'Methods',
            align: 'center',
            cellAlign: 'center',
            width: 150
        },{
            index: 'keterangan',
            title: 'Keterangan',
            align: 'center',
            width: 350
        },{
            index: 'status',
            title: 'Status',
            align: 'center',
            width: 190
        },{
            index: 'id',
            title: 'Aksi',
            align: 'center',
            cellAlign: 'center',
            ellipsis: false,
            width: 160,
            rightLocked: true,
            render: function(o) {
            o.style['text-align'] = 'center';
            if (o.data.is_trash == 1){
            o.value = ''
              +('<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Lihat Data" style="margin-right:20px;"><i class="fa fa-eye"></i><a>')
            <?php if($this->datainclude->_edited()) : ?>
              +('<a class="text-warning btn_edit" href="javascript:;" onclick="Page.Edited(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit Data" style="margin-right:20px;"><i class="fa fa-edit"></i><a>')
            <?php endif; ?>
            <?php if ($this->datainclude->_deleted()) : ?>
              +('<a class="text-danger btn_hapus" href="javascript:;" onclick="Page.Delete(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Hapus Data" style="margin-right:10px;"><i class="fa fa-minus-circle"></i><a>')
            <?php endif; ?>
            } else if(o.data.is_trash == 0){
              o.value = ''
              +('<a class="text-dark" href="javascript:;" onclick="Page.Detail(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Lihat Data" style="margin-right:20px;"><i class="fa fa-eye"></i><a>')
              <?php if ($this->datainclude->_edited()) : ?>
              +('<a class="text-warning btn_edit" href="javascript:;" onclick="Page.Edited(\'' + o.value + '\')" data-toggle="tooltip" data-html="true" title="Edit Data" style="margin-right:0px;"><i class="fa fa-edit"></i><a>')
              <?php endif; ?>
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
      var nama = $('input[name="nama"]').val();
      var id_ktgrapi = $('select[name="id_ktgrapi"]').val();
      var id_path = $('input[name="id_path"]').val();
      var path = $('input[name="path"]').val();
      var methods = $('input[name="methods"]').val();
      var params = $('input[name="params[]"]').map(function(){ return this.value; }).get();
      var keterangan = $('textarea[name="keterangan"]').val();

      if(nama == ''){
        Swal.fire("Gagal!", "Nama API Tidak Boleh Kosong.", "error");
      }else if(id_ktgrapi == ''){
        Swal.fire("Gagal!", "Kategori Post API Tidak Boleh Kosong.", "error");
      }else if(path == ''){
        Swal.fire("Gagal!", "Nama Controller dan Function Tidak Boleh Kosong.", "error");
      }else if(methods == ''){
        Swal.fire("Gagal!", "Methods Tidak Boleh Kosong.", "error");
      }else if(params == ''){
        Swal.fire("Gagal!", "Params Tidak Boleh Kosong.", "error");
      }else if(keterangan == ''){
        Swal.fire("Gagal!", "Keterangan Tidak Boleh Kosong.", "error");
      }else{
        $.ajax({
          url: '<?php echo base_url();?>post/tambah',
          type: 'POST',
          data: {nama:nama, id_ktgrapi:id_ktgrapi, id_path:id_path, path:path, methods:methods, 'params[]':params, keterangan:keterangan},
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

    // hapus data
    Page.Delete = function(id) {
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
          url: '<?php echo base_url(); ?>post/hapus',
          type: 'POST',
          data: {id:id},
          success: function(response){
            Swal.fire("Berhasil!", "Data Berhasil Dinonaktifkan!","success").then( () => {
            location.href = '<?php echo base_url();?>post';
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

    Page.Edited = function(id){
      // console.log(id);
      if(id != '') {
        window.location.href = '<?php echo base_url(); ?>post/edited/' + id;
      }
    };

    Page.Detail = function(id){
      // console.log(id);
      if(id != '') {
        window.location.href = '<?php echo base_url(); ?>post/detail/' + id;
      }
    };

    // Inputan Tertentu
    $(function(){
      $("input[name='nama']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^a-z ]/g, ''));
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

    $("#narsumbtn").click(function () {
      var jumlah = parseInt($("#jumlah-form").val());
      var nextform = jumlah + 1;
      $("#repeat_params").append('<div class="form-group input-group" id="nextform' + nextform + '">' + '<input id="narsumtxt" type="text" name="params[]" class="form-control" autocomplete="off" required="" placeholder="Params '+ nextform +'"/>'
        + '<button class="btn" type="button" Title="Hapus" onclick="hapus_metod(' + nextform + ')"><i class="fas fa-minus-square" style="color:red;"></i></button>' + '</div>');
      $("#jumlah-form").val(nextform);
    });

    function hapus_metod(id) {
      var a = "#nextform" + id;
      var b = $('input[name="jumlah_params"]').val();
      $(a).remove();
      $("#jumlah-form").val(parseInt(b) - 1);
    }

    $(function() {
        Page.InitGrid();
    });
</script>
{JS END}
</body>
</html>