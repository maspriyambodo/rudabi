<?php $a = json_decode($data); ?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Bimwin/Fasilitator/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th rowspan="2">nik</th>
                        <th rowspan="2">nama</th>
                        <th colspan="2">lahir</th>
                        <th rowspan="2">jabatan</th>
                        <th rowspan="2">instansi</th>
                        <th rowspan="2">alamat<br>rumah</th>
                        <th rowspan="2">alamat<br>kantor</th>
                        <th colspan="2">kontak</th>
                        <th colspan="2">sertifikasi</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>hp</th>
                        <th>email</th>
                        <th>no</th>
                        <th>tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->nik_fasilitator;?></td>
                            <td><?php echo $b->nama_fasilitator;?></td>
                            <td><?php echo $b->tempat_lahir;?></td>
                            <td class="text-center"><?php echo $b->tanggal_lahir;?></td>
                            <td><?php echo $b->jabatan_pekerjaan;?></td>
                            <td><?php echo $b->instansi_pekerjaan;?></td>
                            <td><?php echo $b->alamat;?></td>
                            <td><?php echo $b->alamat_kantor;?></td>
                            <td class="text-center"><?php echo $b->no_hp;?></td>
                            <td class="text-center"><?php echo $b->email;?></td>
                            <td class="text-center"><?php echo $b->no_sertifikasi;?></td>
                            <td class="text-center"><?php echo $b->tanggal;?></td>
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