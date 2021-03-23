<?php $a = json_decode($data); ?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Majelis/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="t_majelis" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">
                            majelis
                        </th>
                        <th colspan="2">
                            ketua
                        </th>
                        <th colspan="4">
                            status
                        </th>
                        <th colspan="2">
                            pengurus
                        </th>
                        <th colspan="3">
                            jenis
                        </th>
                        <th rowspan="2">
                            kualifikasi
                        </th>
                        <th colspan="2">
                            pengajar
                        </th>
                        <th colspan="4">
                            kegiatan
                        </th>
                        <th colspan="2">
                            jamaah
                        </th>
                        <th rowspan="2">kelompok</th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            tmt
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            nama
                        </th>
                        <th>
                            pendidikan
                        </th>
                        <th>
                            izin
                        </th>
                        <th>
                            tanah
                        </th>
                        <th>
                            lt
                        </th>
                        <th>
                            lb
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            formal
                        </th>
                        <th>
                            informal
                        </th>
                        <th>
                            non-formal
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            jumlah
                        </th>
                        <th>
                            tempat
                        </th>
                        <th>
                            materi
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            profesi
                        </th>
                        <th>
                            suku
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->city_title; ?></td>
                            <td><?php echo $b->majelis_thn_berdiri; ?></td>
                            <td><?php echo $b->majelis_alamat; ?></td>
                            <td><?php echo $b->majelis_ketua; ?></td>
                            <td><?php echo $b->majelis_pend_ketua; ?></td>
                            <td><?php echo $b->majelis_izin_opr; ?></td>
                            <td><?php echo $b->majelis_status_tanah; ?></td>
                            <td><?php echo $b->majelis_luas_tanah; ?></td>
                            <td><?php echo $b->majelis_luas_bangunan; ?></td>
                            <td><?php echo $b->majelis_pengurus_laki; ?></td>
                            <td><?php echo $b->majelis_pengurus_perempuan; ?></td>
                            <td><?php echo $b->majelis_formal; ?></td>
                            <td><?php echo $b->majelis_informal; ?></td>
                            <td><?php echo $b->majelis_non_formal; ?></td>
                            <td><?php echo $b->majelis_kualifikasi; ?></td>
                            <td><?php echo $b->majelis_pengajar_laki; ?></td>
                            <td><?php echo $b->majelis_pengajar_perempuan; ?></td>
                            <td><?php echo $b->majelis_vol_kegiatan; ?></td>
                            <td><?php echo $b->majelis_tmp_binaan; ?></td>
                            <td><?php echo $b->majelis_materi; ?></td>
                            <td><?php echo $b->majelis_alamat_binaan; ?></td>
                            <td><?php echo $b->majelis_profesi; ?></td>
                            <td><?php echo $b->majelis_suku; ?></td>
                            <td><?php echo $b->majelis_kelompok; ?></td>
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
            "processing": false,
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