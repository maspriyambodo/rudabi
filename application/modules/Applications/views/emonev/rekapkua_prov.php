<?php $kua = json_decode($data); ?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Emonev/Rekap_kua/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>kota/kabupaten</th>
                        <th>kepala kua</th>
                        <th>nama kua</th>
                        <th>alamat</th>
                        <th>telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kua as $kua) { ?>
                        <tr>
                            <td><?php echo $kua->propinsi; ?></td>
                            <td><?php echo $kua->kabupaten; ?></td>
                            <td><?php echo $kua->kepala; ?></td>
                            <td><?php echo $kua->kua; ?></td>
                            <td><?php echo $kua->alamat; ?></td>
                            <td><?php echo $kua->tlp; ?></td>
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