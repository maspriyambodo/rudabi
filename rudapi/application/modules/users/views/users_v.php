<?php echo $this->load->view('templates/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark"><?php echo 'Data '.$this->uri->segment(1);?></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $breadcumb;?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr align="center">
                  <th>No.</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!------------------------ modal tambah ------------------------>
<div class="modal fade" id="modal_tambah" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="hidden" name="created" value="<?php echo $this->session->userdata('username');?>">
                <input type="hidden" name="created_date" value="<?php $tgl = date('Y-m-d H:i:s'); echo $tgl;?>">
                <input type="text" class="form-control" placeholder="Ketikkan Disini.." autocomplete="off" name="nama">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Ketikkan Disini.." autocomplete="off" name="username">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Ketikkan Disini.." autocomplete="off" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Level/Role</label>
              <div class="col-sm-10">
                <select class="form-control" name="level">
                  <option>Pilih</option>
                  <?php foreach($roles as $r){?>
                  <option value="<?php echo $r->id;?>"><?php echo ucfirst($r->nm_role);?></option>
                  <?php }?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Ketikkan Disini.." autocomplete="off" name="email">
              </div>
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

<!------------------------ modal edit ------------------------>
<div class="modal fade" id="modal_ubah" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Edit Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="id_edit">
                  <input type="hidden" name="created_edit" value="<?php echo $this->session->userdata('username');?>">
                  <input type="hidden" name="created_date_edit" value="<?php $tgl = date('Y-m-d H:i:s'); echo $tgl;?>">
                  <input type="text" class="form-control" name="nama_edit" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username_edit" autocomplete="off">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="password_edit" autocomplete="off">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Level/Role</label>
              <div class="col-sm-10">
                <select class="form-control" name="level_edit">
                  <option>Pilih</option>
                  <?php foreach($roles as $r){?>
                  <option <?php if($r->id == $editan->level){echo "selected"; } ?> value="<?php echo $r->id;?>"><?php echo ucfirst($editan->level);?></option>
                  <?php }?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email_edit" autocomplete="off">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Status Users</label>
              <div class="col-sm-10">
                <select name="is_trash_edit" class="form-control">
                  <option>Pilih</option>
                  <option value="1">User Aktif</option>
                  <option value="0">User Nonaktif</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </form>
        <div class="card-footer text-right">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
          <button type="button" class="btn btn-primary" id="btn_update"><i class="fa fa-save"></i> Simpan</button>
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
<script src="<?php echo base_url();?>assets/lteadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/lteadmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/lteadmin/dist/js/demo.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/lteadmin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/lteadmin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- Sweetalert 2 -->
<script src="<?php echo base_url();?>assets/sweetalert/swal.js"></script>

<script>
  $(document).ready(function(){
    $('#table').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      {
        text: 'Tambah',
        action: function ( e, dt, node, conf ) {
          $('#modal_tambah').modal('show');
        }
      },
        'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "processing": true, 
      "serverSide": true,
      "pagingType": "full_numbers",
      "scrollY": 325,
      "scrollX": true,
      "order": [],
      "ajax": {
      "url": "<?php echo site_url('users/ambildata')?>",
      "type": "POST"
      },
      "columnDefs": [
        { 
          "targets": [ 0 ], 
          "orderable": false, 
        },
      ],
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
        window.location.href = '<?php echo site_url('fasilitas/keluar');?>';
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

  // Inputan Tertentu
  $(function(){
    $("input[name='nama']").on('input', function(e) {
      $(this).val($(this).val().replace(/[^aA-zZ ]/g, ''));
    });
    $("input[name='username']").on('input', function(e) {
      $(this).val($(this).val().replace(/[^aA-zZ ]/g, ''));
    });
    $("input[name='email']").on('input', function(e) {
      $(this).val($(this).val().replace(/[^a-zA-Z0-9._!@-]/g, ''));
    });
  });

  // simpan data
  Page.Simpan = function(){
    var nama = $('input[name="nama"]').val();
    var username = $('input[name="username"]').val();
    var password = $('input[name="password"]').val();
    var level = $('select[name="level"]').val();
    var email = $('input[name="email"]').val();
    var created = $('input[name="created"]').val();
    var created_date = $('input[name="created_date"]').val();

    if(nama == ''){
      Swal.fire("Gagal!", "Nama Lengkap Tidak Boleh Kosong.", "error");
    }else if(username == ''){
      Swal.fire("Gagal!", "Username Tidak Boleh Kosong.", "error");
    }else if(password == ''){
      Swal.fire("Gagal!", "Password Tidak Boleh Kosong.", "error");
    }else if(level == ''){
      Swal.fire("Gagal!", "Harap Pilih Level Pengguna.", "error");
    }else if(email == ''){
      Swal.fire("Gagal!", "Email Tidak Boleh Kosong.", "error");
    }else{
      $.ajax({
        url: '<?php echo base_url();?>users/tambah',
        type: 'POST',
        data: {nama:nama, username:username, password:password, level:level, email:email, created:created, created_date:created_date},
        success: function(response){
          // console.log(response);
          $("#modal_tambah").modal('hide');
          Swal.fire("Berhasil!", "Data Berhasil Disimpan!","success").then( () => {
            location.href = '<?php echo base_url();?>users';
          }
        )}
      });
    }
  }

  //Hapus Data dengan konfirmasi
    $("#table").on('click','.btn_hapus',function(){
      var id_user = $(this).attr('data-id');
      Swal.fire({
        title: "Ingin Menonaktifkan Data Ini?",
        text: "Data Akan Masuk Users Nonaktif!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((status) => {
      if(status.value == true)
      {
        $.ajax({
          url: '<?php echo base_url(); ?>users/hapus',
          type: 'POST',
          data: {id_user:id_user},
          success: function(response){
            Swal.fire("Berhasil!", "Data Berhasil Dinonaktifkan!","success").then( () => {
            location.href = '<?php echo base_url();?>users';
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
    });
</script>