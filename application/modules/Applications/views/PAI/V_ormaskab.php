<?php $a = json_decode($data); ?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Ormas/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>            
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">ormas islam</th>
                        <th rowspan="2">afiliasi</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">izin</th>
                        <th rowspan="2">transportasi</th>
                        <th rowspan="2">topologi</th>
                        <th rowspan="2">geografi</th>
                        <th rowspan="2">tanah</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                        <th colspan="2">jumlah pengurus</th>
                        <th colspan="6">sarana &amp; prasarana</th>
                        <th rowspan="2">visi</th>
                        <th rowspan="2">misi</th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            ketua
                        </th>
                        <th>
                            tmt
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            papan
                        </th>
                        <th>
                            lemari
                        </th>
                        <th>
                            meja
                        </th>
                        <th>
                            alas
                        </th>
                        <th>
                            komputer
                        </th>
                        <th>
                            plang
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td>
                                <?php echo $b->ormas_nama; ?>
                            </td>
                            <td>
                                <?php echo $b->ormas_ketua; ?>
                            </td>
                            <td>
                                <?php echo $b->ormas_thn_berdiri; ?>
                            </td>
                            <td><?php echo $b->ormas_afiliasi; ?></td>
                            <td><?php echo $b->ormas_alamat; ?></td>
                            <td><?php echo $b->ormas_izin_opr; ?></td>
                            <td><?php echo $b->ormas_transportasi; ?></td>
                            <td><?php echo $b->ormas_topography; ?></td>
                            <td><?php echo $b->ormas_geography; ?></td>
                            <td><?php echo $b->ormas_status_tanah; ?></td>
                            <td><?php echo $b->ormas_luas_tanah; ?></td>
                            <td><?php echo $b->ormas_luas_bangunan; ?></td>
                            <td><?php echo $b->ormas_pengurus_laki; ?></td>
                            <td><?php echo $b->ormas_pengurus_perempuan; ?></td>
                            <td><?php echo $b->ormas_papan; ?></td>
                            <td><?php echo $b->ormas_lemari; ?></td>
                            <td><?php echo $b->ormas_meja; ?></td>
                            <td><?php echo $b->ormas_alas; ?></td>
                            <td><?php echo $b->ormas_komputer; ?></td>
                            <td><?php echo $b->ormas_plang; ?></td>
                            <td><?php echo $b->ormas_visi; ?></td>
                            <td><?php echo $b->ormas_misi; ?></td>
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