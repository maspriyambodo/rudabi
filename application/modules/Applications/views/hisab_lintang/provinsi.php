<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Binsyar/Lintang/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th rowspan="2">no</th>
                        <th rowspan="2">kota/kabupaten</th>
                        <th colspan="3">lokasi</th>
                        <th rowspan="2">zona<br>waktu</th>
                        <th rowspan="2">ketinggian</th>
                    </tr>
                    <tr>
                        <th>lintang</th>
                        <th>bujur</th>
                        <th>maps</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td style="text-align:left !important;"><?php echo $b->city_title; ?></td>
                            <td><?php echo $b->lintang_tempat; ?></td>
                            <td><?php echo $b->bujur_tempat; ?></td>
                            <td>
                                <a href="https://www.google.com/maps/place/<?php
                                $c = str_replace(['°', ' ', '"'], ['%C2%B0', '+', '%22'], $b->lintang_tempat);
                                $d = str_replace(['°', ' ', '"'], ['%C2%B0', '+', '%22'], $b->bujur_tempat);
                                echo $c . $d;
                                ?>" target="new" class="btn btn-icon btn-default btn-xs" title="Peta Lokasi <?php echo $b->city_title; ?>"><i class="fas fa-map-marked-alt"></i></a>
                            </td>
                            <td><?php echo $b->time_zone; ?></td>
                            <td><?php echo $b->h; ?></td>
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