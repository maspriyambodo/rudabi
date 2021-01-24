<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data Masjid di Provinsi {provinsi} </h5>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="t_masjidprov" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            kabupaten
                        </th>
                        <th rowspan="2">
                            jumlah
                        </th>
                        <th colspan="8">
                            tipologi
                        </th>
                    </tr>
                    <tr>
                        <th>negara</th>
                        <th>raya</th>
                        <th>agung</th>
                        <th>besar</th>
                        <th>jami</th>
                        <th>bersejarah</th>
                        <th>publik</th>
                        <th>nasional</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
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
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: <?php echo $this->bodo->Url_API(); ?> + 'eimas/provtipol?KEY=BOBA&provinsi_id=<?php echo $id; ?>'
            },
            columns: [
                {
                    data: null, className: "text-center",
                    "render": function (data) {
                        var a, b;
                        a = data.kabupaten_name;
                        b = a.replace('KAB. ', '');
                        return '<a href="<?php echo base_url('Simas/Masjid/Kabupaten/'); ?>' + data.kabupaten_id + '/Provinsi/{provinsi}">' + b + '</a>';
                    }
                },
                {data: "jumlah_masjid", className: "sum_sum text-center"},
                {data: "masjid_negara", className: "sum_neg text-center"},
                {data: "masjid_raya", className: "sum_ray text-center"},
                {data: "masjid_agung", className: "sum_ang text-center"},
                {data: "masjid_besar", className: "sum_bes text-center"},
                {data: "masjid_jami", className: "sum_jam text-center"},
                {data: "masjid_bersejarah", className: "sum_ber text-center"},
                {data: "masjid_publik", className: "sum_pub text-center"},
                {data: "masjid_nasional", className: "sum_nas text-center"}
            ],
            "footerCallback": function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.sum_sum', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_neg', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_ray', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_ang', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_bes', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_jam', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_ber', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_pub', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });


                api.columns('.sum_nas', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
            }
        });
    };
</script>