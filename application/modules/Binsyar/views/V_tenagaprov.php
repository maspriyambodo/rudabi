<?php $a = json_decode($data); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-capitalize">data tenaga ahli provinsi <?php echo $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">nama</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">telepon</th>
                        <th rowspan="2">alamat</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>usia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $b->tenaga_nama; ?></td>
                            <td class="text-center">
                                <?php echo $b->tenaga_tempat_lahir; ?>
                            </td>
                            <td class="text-center"><?php echo $b->tenaga_tanggal_lahir; ?></td>
                            <td class="text-center">
                                <?php
                                $date = new DateTime($b->tenaga_tanggal_lahir);
                                $now = new DateTime();
                                $interval = $now->diff($date);
                                echo $interval->y;
                                ?>
                            </td>
                            <td class="text-center"><?php echo $b->tenaga_telp; ?></td>
                            <td class="text-center">
                                <?php echo $b->tenaga_alamat; ?>
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
            "scrollY": "400px"
        });
    };
</script>