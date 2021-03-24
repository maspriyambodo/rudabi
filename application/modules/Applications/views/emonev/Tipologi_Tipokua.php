<?php
$tipo = json_decode($data);
?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Emonev/Tipologi/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>kode kua</th>
                        <th>kabupaten</th>
                        <th>nama kua</th>
                        <th>tipologi</th>
                        <th>tanggal input</th>
                        <th>alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tipo as $value) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->kodekua; ?>
                            </td>
                            <td>
                                <?php echo $value->kabupaten; ?>
                            </td>
                            <td>
                                <?php echo $value->kua; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $value->tipokua; ?>
                            </td>
                            <td class="text-center">
                                <?php echo date("d F Y", strtotime($value->tgl)); ?>
                            </td>
                            <td>
                                <?php echo $value->alamat; ?>
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
            "searching": false,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'l><'col-sm-6 text-right'B>>
<'row'<'col-sm-12'tr>>
<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
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