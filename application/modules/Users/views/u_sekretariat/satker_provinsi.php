<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Satker provinsi <?php echo $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Users/Sekretariat/Satker/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th colspan="2">satker</th>
                    </tr>
                    <tr>
                        <th>kode</th>
                        <th>nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td class="text-uppercase">
                                <?php
                                $kab = str_replace("Kab.", "Kabupaten", $b->kab_nama);
                                echo $kab;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($b->kab_kode_satker == '') {
                                    echo 'TIDAK ADA DATA';
                                } else {
                                    echo $b->kab_kode_satker;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($b->kab_nama_satker == '') {
                                    echo 'TIDAK ADA DATA';
                                } else {
                                    echo $b->kab_nama_satker;
                                }
                                ?>
                            </td>
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