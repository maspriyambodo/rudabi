<?php echo $this->load->view('templates/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $titleHalaman;?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                    <form method="post">
                      <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="hidden" class="form-control" name="id_user" value="<?php echo $tampil->id_user;?>">
                              <input type="hidden" name="updated" value="<?php echo $this->session->userdata('username');?>">
                              <input type="hidden" name="updated_date" value="<?php $tgl = date('Y-m-d H:i:s'); echo $tgl;?>">
                              <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $tampil->nama;?>">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $tampil->username;?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" autocomplete="off" value="<?php echo $tampil->password;?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Level/Role</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="level">
                              <option>Pilih</option>
                              <?php foreach($roles as $r){?>
                              <option <?php if($r->id == $tampil->level){echo "selected"; } ?> value="<?php echo $r->id;?>"><?php echo ucfirst($r->nm_role);?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $tampil->email;?>">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Status Users</label>
                          <div class="col-sm-10">
                            <select name="is_trash" class="form-control">
                              <option>Pilih</option>
                              <option <?php if($tampil->is_trash == 1){ echo 'selected'; }?> value="1">User Aktif</option>
                              <option <?php if($tampil->is_trash == 0){ echo 'selected'; }?> value="0">User Nonaktif</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer text-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                        <button type="button" class="btn btn-primary" id="btn_update"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </form>
            </div>
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


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="">Batur Samy</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
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

  $("#btn_update").on('click',function(){
    var id_user = $('input[name="id_user"]').val();
    var nama = $('input[name="nama"]').val();
    var username = $('input[name="username"]').val();
    var password = $('input[name="password"]').val();
    var level = $('select[name="level"]').val();
    var email = $('input[name="email"]').val();
    var updated = $('input[name="updated"]').val();
    var updated_date = $('input[name="updated_date"]').val();
    var is_trash = $('select[name="is_trash"]').val();

    if(nama == ''){
      Swal.fire("Gagal!", "Nama Lengkap Tidak Boleh Kosong.", "error");
    }else if(username == ''){
      Swal.fire("Gagal!", "Username Tidak Boleh Kosong.", "error");
    }else if(password == ''){
      Swal.fire("Gagal!", "Password Tidak Boleh Kosong.", "error");
    }else if(level == 'Pilih'){
      Swal.fire("Gagal!", "Level/Role User Harap Dipilih.", "error");
    }else if(email == ''){
      Swal.fire("Gagal!", "Email Tidak Boleh Kosong.", "error");
    }else if(is_trash == 'Pilih'){
      Swal.fire("Gagal!", "Status User Harap Dipilih.", "error");
    }else{
      $.ajax({
      url  : "<?php echo base_url();?>users/perbaharui",
      type : "POST",
      data: {id_user:id_user, nama:nama, username:username, password:password, level:level, email:email, updated:updated, updated_date:updated_date, is_trash:is_trash},
        success: function(response){
          $('input[name="id_user"]').val("");
          $('input[name="nama"]').val();
          $('input[name="username"]').val();
          $('input[name="password"]').val();
          $('select[name="level"]').val();
          $('input[name="email"]').val("");
          $('input[name="updated"]').val("");
          $('input[name="updated_date"]').val("");
          $('select[name="is_trash"]').val();
          $("#editModal").modal('hide');
          Swal.fire("Berhasil!", "Data Berhasil Diperbaharui!","success").then( () => {
            location.href = '<?php echo base_url();?>users';
          });
        }
      });
    }
  });
</script>
</body>
</html>