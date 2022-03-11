<?php
$pegawai = json_decode($data);
?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Sekretariat/Pegawai/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>nama</th>
                        <th>jenis<br>kelamin</th>
                        <th>agama</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $pegawai) { ?>
                        <tr>
                            <td>
                                <?php echo $pegawai->nama; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $pegawai->kelamin; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $pegawai->agama; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url('Applications/Sekretariat/Pegawai/Detail?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $pegawai->peg_id . '&b=' . $pegawai->nama . '&c=' . $param[0] . '&d=' . $param[1] . '&e=' . $param[2] . '&f=' . $param[3]))); ?>" class="btn btn-icon btn-xs btn-default" title="<?php echo 'Detail data ' . $pegawai->nama ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://sicakep.kemenag.go.id/" target="new">sicakep</a>
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