<?php $a = json_decode($data); ?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Simpenghulu/Penghulu/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">nip</th>
                        <th rowspan="2">nama</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">agama</th>
                        <th rowspan="2">KUA</th>
                        <th rowspan="2">golongan</th>
                        <th rowspan="2">pendidikan</th>
                        <th colspan="2">s k</th>
                        <th rowspan="2">alamat</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>usia</th>
                        <th>no</th>
                        <th>tmt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $b->pegawai_nip; ?></td>
                            <td><?php echo $b->pegawai_fullname; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_tempatlahir; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_tanggallahir; ?></td>
                            <td class="text-center">
                                <?php
                                $date = new DateTime($b->pegawai_tanggallahir);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                echo $interval->y;
                                ?>
                            </td>
                            <td class="text-center"><?php echo $b->pegawai_agama; ?></td>
                            <td class="text-center"><?php echo $b->kua_title; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_pangkat; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_pendidikan_terakhir; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_sk_penghulu_terakhir; ?></td>
                            <td class="text-center"><?php echo $b->pegawai_tgl_sk_penghulu; ?></td>
                            <td><?php echo $b->pegawai_alamat; ?></td>
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