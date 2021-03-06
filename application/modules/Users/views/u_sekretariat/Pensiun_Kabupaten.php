<?php
$pensiun = json_decode($data);
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Pegawai: <?php echo $param[1] ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Users/Sekretariat/Pensiun/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>nip</th>
                        <th>nama</th>
                        <th>jenis<br>kelamin</th>
                        <th>golongan</th>
                        <th>tgl<br>lahir</th>
                        <th>usia</th>
                        <th>alamat</th>
                        <th>masa<br>pensiun</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pensiun as $value) { ?>
                        <tr>
                            <td class = "text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $value->user_nip; ?></td>
                            <td><?php echo $value->user_fullname; ?></td>
                            <td class="text-center"><?php echo $value->kelamin; ?></td>
                            <td class="text-center"><?php echo $value->item_name; ?></td>
                            <td class="text-center"><?php echo $value->peg_tgl_lahir; ?></td>
                            <td class="text-center"><?php echo $value->usia; ?></td>
                            <td><?php echo $value->peg_alamat; ?></td>
                            <td class="text-center"><?php echo $value->waktu_tersisa; ?></td>
                            <td class="text-center"><?php echo date("Y", strtotime($value->waktu_tersisa . "year")); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
    };
</script>