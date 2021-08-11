<?php
$b = json_decode($data);
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Konflik
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>Jenis Pelaku</th>
                        <th>Nama Konflik</th>
                        <th>Penyebab</th>
                        <th>Tempat</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Jumlah Pelaku</th>
                        <th>Jenis Korban</th>
                        <th>Korban</th>
                        <th>Meninggal</th>
                        <th>Luka</th>
                        <th>Tingkat Kerusakan</th>
                        <th>Sarana/Prasarana</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($b as $key => $c) { ?>
                        <tr>
                            <td><?php echo $c->jenis_pelaku; ?></td>
                            <td><?php echo $c->konflik_name; ?></td>
                            <td><?php echo $c->penyebab_konflik; ?></td>
                            <td><?php echo $c->tempat_kejadian; ?></td>
                            <td><?php echo $c->tanggal_kejadian; ?></td>
                            <td><?php echo $c->waktu_kejadian; ?></td>
                            <td><?php echo $c->jumlah_pelaku; ?></td>
                            <td><?php echo $c->jenis_korban; ?></td>
                            <td><?php echo $c->jumlah_korban; ?></td>
                            <td><?php echo $c->jumlah_meninggal; ?></td>
                            <td><?php echo $c->jumlah_luka; ?></td>
                            <td><?php echo $c->tingkat_kerusakan; ?></td>
                            <td><?php echo $c->sarana_prasarana; ?></td>
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