<?php
$b = json_decode($data);
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Baznas
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Website</th>
                        <th>Muzakki</th>
                        <th>Mustahik</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>No. Handphone</th>
                        <th>No. Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($b as $key => $c) { ?>
                        <tr>
                            <td><?php echo $c->name; ?></td>
                            <td><?php echo $c->alamat; ?></td>
                            <td><?php echo $c->website; ?></td>
                            <td><?php echo $c->muzakki; ?></td>
                            <td><?php echo $c->mustahik; ?></td>
                            <td><?php echo $c->lat; ?></td>
                            <td><?php echo $c->lng; ?></td>
                            <td><?php echo $c->no_hp; ?></td>
                            <td><?php echo $c->no_telp; ?></td>
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