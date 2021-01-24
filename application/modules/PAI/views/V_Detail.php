<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th colspan="2">
                            kota / kabupaten
                        </th>
                        <th colspan="2">penyuluh</th>
                    </tr>
                    <tr>
                        <th>kode</th>
                        <th>nama</th>
                        <th>jumlah</th>
                        <th>online</th>
                    </tr>
                </thead>
            </table>
        </div>  
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: <?php echo $this->bodo->Url_API(); ?> + 'epay?KEY=BOBA&provinsi_kode=%27<?php echo $kode; ?>%27'
            },
            columns: [
                {data: "penyuluh_KabKota_Kode", className: "text-center"},
                {data: "kabkota_nama", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c, d;
                        a = data.penyuluh_KabKota_Kode;
                        b = data.jumlah_penyuluh;
                        c = data.kabkota_nama;
                        d = c.replace(' ', '_');
                        return '<a href="<?php echo base_url('PAI/Epai/Penyuluh/'); ?>' + a + "/" + d + '">' + b + '</a>';
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c, d;
                        a = data.penyuluh_KabKota_Kode;
                        b = data.jumlah_penyuluh_online;
                        c = data.kabkota_nama;
                        d = c.replace(' ', '_');
                        return '<a href="<?php echo base_url('PAI/Epai/Penyuluh_Online/'); ?>' + a + "/" + d + '">' + b + '</a>';
                    }
                }
            ]
        });
    };
</script>