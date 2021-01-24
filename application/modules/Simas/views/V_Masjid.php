<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data Masjid Tahun <?php echo date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-body" style="" kt-hidden-height="423">
        <div id="masjid_prov" style="width:100%;height:650px;"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            provinsi
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
                url: <?php echo $this->bodo->Url_API(); ?> + 'eimas/provtipol?KEY=BOBA'
            },
            columns: [
                {
                    data: null, className: "text-center", "render": function (data) {
                        var id = data.provinsi_id;
                        var prov, provinsi;
                        prov = data.provinsi_name;
                        provinsi = prov.replace(' ', '_');
                        return '<a href="<?php echo base_url('Simas/Masjid/Provinsi/'); ?>' + id + '/' + provinsi + '">' + data.provinsi_name + '</a>';
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
<script>
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("masjid_prov", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();
        chart.dataSource.url = "https://simas.kemenag.go.id/dataseuneu/docs/simas/masjidprovinsi?KEY=BOBA";

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.text = 'Daerah Tingkat Provinsi';
        categoryAxis.dataFields.category = "provinsi_name";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 100;
        valueAxis.title.text = "Jumlah Masjid";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "total";
        series.dataFields.categoryX = "provinsi_name";
        series.tooltipText = "Total Masjid \r\n Provinsi {provinsi_name}: [{categoryX}: bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;
        series.tooltip.pointerOrientation = "vertical";

        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });
        chart.cursor = new am4charts.XYCursor();
    });
</script>