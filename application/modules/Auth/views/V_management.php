<div class="card card-custom">
    <div class="card-body">
        <form action="<?php echo base_url('Auth/Management_save'); ?>" method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="text-center text-uppercase">
                        <tr>
                            <th>username</th>
                            <th>subdit</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="uname" class="form-control" required="" autocomplete="off"/>
                            </td>
                            <td>
                                <select name="subdit" class="form-control" required="">
                                    <option value="">Pilih Direktorat</option>
                                    <?php
                                    foreach ($subdit as $subdit_data) {
                                        $id_subdit = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($subdit_data->id));
                                        echo '<option value="' . $id_subdit . '">' . $subdit_data->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class="text-center">
                                new
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                                <button type="submit" class="btn btn-icon btn-success btn-xs"><i class="fas fa-save"></i></button>
                            </td>
                        </tr>
                        <?php foreach ($user as $user_data) { ?>
                            <tr>
                                <td>
                                    <?php echo $user_data->uname; ?>
                                </td>
                                <td>
                                    <?php echo $user_data->nama; ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($user_data->stat == 1) {
                                        echo '<button type="button" title="Aktif" class="btn btn-icon btn-success btn-xs"><i class="fas fa-lock-open"></i></button>';
                                    } else {
                                        echo '<a href="' . base_url('Auth/Management_aktif?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $user_data->id))) . '" title="Aktifkan Akun" class="btn btn-icon btn-danger btn-xs"><i class="fas fa-lock"></i></a>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php $id_user = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($user_data->id)); ?>
                                        <button type="button" class="btn btn-icon btn-default btn-xs" title="Reset password to default" data-toggle="modal" data-target="#rstpwdmodal" onclick="Resetpwd('<?php echo $id_user ?>')"><i class="fas fa-key"></i></button>
                                        <button type="button" class="btn btn-icon btn-warning btn-xs" title="Edit data" data-toggle="modal" data-target="#Editmodal" onclick="Edit('<?php echo $id_user ?>')"><i class="fas fa-pencil-alt"></i></button>
                                        <?php
                                        if ($user_data->stat == 1) {
                                            echo '<button type="button" class="btn btn-icon btn-danger btn-xs" title="Hapus data" data-toggle="modal" data-target="#Hapusmodal" onclick="Hapus(&apos;' . $id_user . '&apos;)"><i class="fas fa-trash"></i></button>';
                                        } else {
                                            echo '<button type="button" class="btn btn-icon btn-danger btn-xs" disabled><i class="fas fa-trash"></i></button>';
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="rstpwdmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-uppercase">Reset Password</h4>
            </div>
            <form method="POST" action="<?php echo base_url('Auth/Reset/'); ?>">
                <div class="modal-body">
                    <p class="text-warning" id="r_warning"></p>
                    <input type="hidden" name="r_id" readonly=""/>
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-success text-uppercase">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="Editmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-uppercase">edit data user</h4>
            </div>
            <form method="post" action="<?php echo base_url('Auth/Management_Update/'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-uppercase">Username</label>
                        <input type="hidden" name="e_id" readonly="readonly"/>
                        <input type="text" name="e_uname" class="form-control" required="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">sub direktorat</label>
                        <select name="e_subdit" class="form-control" required="">
                            <option value="">Pilih Direktorat</option>
                            <?php
                            foreach ($subdit as $e_subdit) {
                                echo '<option value="' . $e_subdit->id . '">' . $e_subdit->nama . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success text-uppercase">update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="Hapusmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-uppercase">hapus data user</h4>
            </div>
            <form method="post" action="<?php echo base_url('Auth/Management_Delete/'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="h_id" readonly="readonly"/>
                    <p class="text-warning">
                        anda yakin ingin hapus data?
                    </p>
                    <small class="text-danger">* data yang dihapus tidak dapat dikembalikan !</small>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success text-uppercase">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('message') ?>"/>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('error') ?>"/>
<?php
unset($_SESSION['error']);
unset($_SESSION['message']);
?>
<script>
    window.onload = function () {
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
        var a = $('input[name="succ_msg"]').val();
        var b = $('input[name="err_msg"]').val();
        if (a !== '') {
            toastr.success(a);
        } else if (b !== '') {
            toastr.error(b);
        } else {
            return false;
        }
    };
    function Edit(obj) {
        $.ajax({
            url: "<?php echo base_url('Auth/Get/'); ?>" + obj,
            dataType: 'JSON',
            success: function (data) {
                $('input[name=e_id]').val(obj);
                $('input[name=e_uname]').val(data[0].uname);
                $('select[name=e_subdit]').val(data[0].hak_akses);
            },
            error: function () {
                alert('Fatal Error !');
                location.reload();
            }
        });
    }
    function Hapus(obj) {
        $.ajax({
            url: "<?php echo base_url('Auth/Get/'); ?>" + obj,
            dataType: 'JSON',
            success: function () {
                $('input[name=h_id]').val(obj);
            },
            error: function () {
                alert('Fatal Error !');
                location.reload();
            }
        });
    }
    function Resetpwd(obj) {
        $.ajax({
            url: "<?php echo base_url('Auth/Get/'); ?>" + obj,
            dataType: 'JSON',
            success: function (data) {
                $('input[name=r_id]').val(obj);
                document.getElementById('r_warning').innerHTML = 'Anda yakin ingin reset password ' + data[0].uname;
            },
            error: function () {
                alert('Fatal Error !');
                location.reload();
            }
        });
    }
</script>