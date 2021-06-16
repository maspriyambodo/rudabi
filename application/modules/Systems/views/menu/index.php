<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($privilege['create']) {
            echo '<div class="text-right">'
            . '<div class="form-group">'
            . '<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal_add"><i class="far fa-plus-square"></i> Add new</button>'
            . '</div>'
            . '</div>';
            require_once 'modal_add.php';
        } else {
            null;
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>parent</th>
                        <th>menu</th>
                        <th>location</th>
                        <th>order</th>
                        <th>group</th>
                        <th>icon</th>
                        <th>status</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$privilege['read']) {
                        $data = [];
                    }
                    foreach ($data as $key => $menu) {
                        $id_menu = Enkrip($menu->id_menu);
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($menu->parent_name == null) {
                                    echo 'parent';
                                } else {
                                    echo $menu->parent_name;
                                }
                                ?>
                            </td>
                            <td><?php echo $menu->nama_menu; ?></td>
                            <td><?php echo $menu->link; ?></td>
                            <td class="text-center"><?php echo $menu->order_no; ?></td>
                            <td><?php echo $menu->group_menu; ?></td>
                            <td><?php echo $menu->icon; ?></td>
                            <td class="text-center">
                                <?php
                                if ($menu->stat_menu) {
                                    echo '<span class="label label-xl label-dot label-success" title="active"></span>';
                                } else {
                                    echo '<span class="label label-xl label-dot label-danger" title="non-active"></span>';
                                }
                                ?>
                            </td>
                            <?php
                            $editbtn = '<button type="button" value="' . $id_menu . '" class="btn btn-icon btn-warning btn-xs" title="Edit" onclick="Edit(this.value)"><i class="far fa-edit"></i></button>';
                            $activebtn = '<button type="button" value="' . $id_menu . '" class="btn btn-icon btn-default btn-xs" title="Set Active" onclick="Active(this.value)"><i class="fas fa-unlock text-success"></i></button>';
                            $delbtn = '<button type="button" value="' . $id_menu . '" class="btn btn-icon btn-danger btn-xs" title="Delete Menu" onclick="Delete(this.value)"><i class="far fa-trash-alt"></i></button>';
                            echo '<td class="text-center"><div class="btn-group">';
                            if ($privilege['update']) {
                                echo $editbtn;
                            } else {
                                null;
                            }
                            if (!$menu->stat_menu and $privilege['delete']) {
                                echo $activebtn;
                            } elseif ($menu->stat_menu and $privilege['delete']) {
                                echo $delbtn;
                            } else {
                                null;
                            }
                            echo '</div></td>';
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
if ($privilege['delete']) {
    require 'modal_delete.php';
    require 'modal_active.php';
} else {
    null;
}
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
?>
<script>
    window.onload = function () {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: false,
            extendedTimeOut: "2000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        var a, b;
        a = $('input[name="err_msg"]').val();
        b = $('input[name="succ_msg"]').val();
        if (a !== "") {
            toastr.error(a);
        } else if (b !== "") {
            toastr.success(b);
        }
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
    };
    function Delete(val) {
        $('input[name="d_id_menu"]').val(val);
        $('#modal_delete').modal({show: true, backdrop: 'static', keyboard: false});
    }
    function Active(val) {
        $('input[name="a_id_menu"]').val(val);
        $('#modal_active').modal({show: true, backdrop: 'static', keyboard: false});
    }
    function Edit(id) {
        window.location.href = '<?php echo site_url('Systems/Menu/Edit?id='); ?>' + id;
    }
</script>