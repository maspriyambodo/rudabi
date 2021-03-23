<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($privilege['create']) { // jika memiliki privilege tambah data / create
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
                        <th>code</th>
                        <th>country</th>
                        <th>flags</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$privilege['read']) { // jika memiliki privilege tambah atau create
                        $data = [];
                    }
                    foreach ($data as $key => $a) {
                        $id_country = Enkrip($a->id_country);
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td class="text-center"><?php echo $a->code_country; ?></td>
                            <td><?php echo $a->nama_country; ?></td>
                            <td class="text-center">
                                <?php
                                if ($a->flags) {
                                    echo '<img src="' . base_url("assets/images/systems/flags/" . $a->flags) . '" width="25" alt="flag ' . $a->nama_country . '"/>';
                                } else {
                                    null;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($a->stat) {
                                    echo '<span class="label label-xl label-dot label-success" title="active"></span>';
                                } else {
                                    echo '<span class="label label-xl label-dot label-danger" title="non-active"></span>';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $editbtn = '<button id="editbtn" type="button" class="btn btn-icon btn-warning btn-xs" title="Edit Country" value="' . $id_country . '" onclick="Edit(this.value)"><i class="far fa-edit"></i></button>';
                                $delbtn = '<button id="delbtn" type="button" class="btn btn-icon btn-danger btn-xs" title="Delete Country" value="' . $id_country . '" onclick="Delete(this.value)"><i class="far fa-trash-alt"></i></button>';
                                $activebtn = '<button id="actvbtn" type="button" class="btn btn-icon btn-default btn-xs" title="Set Active" value="' . $id_country . '" onclick="Active(this.value)"><i class="fas fa-unlock text-success"></i></button>';

                                echo '<div class="btn-group">'; // open div btn-group

                                if ($privilege['update']) { // jika memiliki privilege edit
                                    echo $editbtn;
                                }
                                if (!$a->stat and $privilege['delete']) { // jika memiliki privilege delete
                                    echo $activebtn;
                                } elseif ($a->stat and $privilege['delete']) {
                                    echo $delbtn;
                                }

                                echo '</div>'; //close div btn-group
                                ?>
                            </td>
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
if ($privilege['update']) {
    require_once 'modal_edit.php';
}
if ($privilege['delete']) {
    require_once 'modal_delete.php';
    require_once 'modal_activate.php';
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
        if (a) {
            toastr.error(a);
        } else if (b) {
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
</script>