<?php
$sum_anggaran = 0;
$sum_realisasi = 0;
$target_wilayah = 0;
$realisasi_wilayah = 0;
foreach ($data as $value) {
    $anggaran = str_replace(',', '', $value->total_anggaran);
    $realisasi = str_replace(',', '', $value->total_realisasi);
    $wilayah = str_replace(',', '', $value->target_wilayah);
    $r_wilayah = str_replace(',', '', $value->realisasi_wilayah);
    $sum_anggaran += $anggaran;
    $sum_realisasi += $realisasi;
    $target_wilayah += $wilayah;
    $realisasi_wilayah += $r_wilayah;
}

if ($sum_anggaran > 0 && $sum_anggaran < 1000) {
    // 1 - 999
    $sum_anggaran_format = floor($sum_anggaran);
    $suffix = '';
} else if ($sum_anggaran >= 1000 && $sum_anggaran < 1000000) {
    // 1k-999k
    $sum_anggaran_format = floor($sum_anggaran / 1000);
    $suffix = 'Ribu';
} else if ($sum_anggaran >= 1000000 && $sum_anggaran < 1000000000) {
    // 1m-999m
    $sum_anggaran_format = floor($sum_anggaran / 1000000);
    $suffix = 'Juta+';
} else if ($sum_anggaran >= 1000000000 && $sum_anggaran < 1000000000000) {
    // 1b-999b
    $sum_anggaran_format = floor($sum_anggaran / 1000000000);
    $suffix = 'Miliar+';
} else if ($sum_anggaran >= 1000000000000) {
    // 1t+
    $sum_anggaran_format = floor($sum_anggaran / 1000000000000);
    $suffix = 'Triliun+';
}

if ($sum_realisasi > 0 && $sum_realisasi < 1000) {
    // 1 - 999
    $sum_realisasi_format = floor($sum_realisasi);
    $suffix_realisasi = '';
} else if ($sum_realisasi >= 1000 && $sum_realisasi < 1000000) {
    // 1k-999k
    $sum_realisasi_format = floor($sum_realisasi / 1000);
    $suffix_realisasi = 'Ribu+';
} else if ($sum_realisasi >= 1000000 && $sum_realisasi < 1000000000) {
    // 1m-999m
    $sum_realisasi_format = floor($sum_realisasi / 1000000);
    $suffix_realisasi = 'Juta+';
} else if ($sum_realisasi >= 1000000000 && $sum_realisasi < 1000000000000) {
    // 1b-999b
    $sum_realisasi_format = floor($sum_realisasi / 1000000000);
    $suffix_realisasi = 'Miliar+';
} else if ($sum_realisasi >= 1000000000000) {
    // 1t+
    $sum_realisasi_format = floor($sum_realisasi / 1000000000000);
    $suffix_realisasi = 'Triliun+';
}
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Jumlah Target &amp; Realisasi Catin
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin: 5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data target catin
            </div>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Target Catin
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
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th colspan="2">target wilayah</th>
                        <th colspan="2">target anggaran</th>
                    </tr>
                    <tr>
                        <th>jumlah</th>
                        <th>realisasi</th>
                        <th>jumlah</th>
                        <th>realisasi</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?php echo number_format($target_wilayah); ?></th>
                        <th><?php echo number_format($realisasi_wilayah); ?></th>
                        <th><?php echo number_format($sum_anggaran); ?></th>
                        <th><?php echo number_format($sum_realisasi); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var url = 'https://rudabi.kemenag.dev/rudabi_api/datapi/embimwin/targetcatin2020?KEY=boba';
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
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                        <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {
                    data: null,
                    render: function (data) {
                        var a, b, c;
                        a = data.id_prop;
                        b = data.nama_lokasi;
                        c = b.replace(' ', '_');
                        return '<a href="<?php echo base_url('Applications/Bimwin/Target/Provinsi/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {
                    data: null, className: "text-center sum_wil",
                    render: function (data) {
                        var target_wilayah = numeral(data.target_wilayah).format('0,0');
                        return target_wilayah;
                    }
                },
                {
                    data: null, className: "text-center realisasi_wilayah",
                    render: function (data) {
                        var realisasi_wilayah = numeral(data.realisasi_wilayah).format('0,0');
                        return realisasi_wilayah;
                    }
                },
                {
                    data: "total_anggaran", className: "text-center total_anggaran"
                },
                {
                    data: "total_realisasi", className: "text-center total_realisasi"
                }
            ]
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = url;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "nama_lokasi";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Target & Realisasi Wilayah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "target_wilayah";
            series.dataFields.categoryX = "nama_lokasi";
            series.clustered = false;
            series.tooltipText = "Target Wilayah di {categoryX}: [bold]{valueY}[/]";
            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "realisasi_wilayah";
            series2.dataFields.categoryX = "nama_lokasi";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Realisasi Wilayah {categoryX} : [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);

            var chart = am4core.create("chartdiv_a", am4charts.PieChart);

            chart.innerRadius = am4core.percent(40);
            chart.exporting.menu = new am4core.ExportMenu();
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "value";
            pieSeries.dataFields.category = "category";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.innerRadius = 10;
            pieSeries.slices.template.fillOpacity = 0.5;

            pieSeries.slices.template.propertyFields.disabled = "labelDisabled";
            pieSeries.labels.template.propertyFields.disabled = "labelDisabled";
            pieSeries.ticks.template.propertyFields.disabled = "labelDisabled";

            pieSeries.data = [{
                    "category": "Target Wilayah",
                    "value": <?php echo $target_wilayah; ?>
                }, {
                    "category": "Realisasi Wilayah",
                    "value": <?php echo $realisasi_wilayah; ?>
                }];
            pieSeries.slices.template.states.getKey("hover").properties.shiftRadius = 0;
            pieSeries.slices.template.states.getKey("hover").properties.scale = 1;
            var pieSeries2 = chart.series.push(new am4charts.PieSeries());
            pieSeries2.dataFields.value = "value";
            pieSeries2.dataFields.category = "category";
            pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0;
            pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;
            pieSeries2.slices.template.propertyFields.fill = "fill";
            pieSeries2.data = [{
                    "category": "Target Anggaran",
                    "value": <?php echo $sum_anggaran_format; ?>
                }, {
                    "category": "Realisasi Anggaran",
                    "value": <?php echo $sum_realisasi_format; ?>
                }];
            pieSeries2.slices.template.tooltipText = "{category}: {value} <?php echo $suffix; ?>";

            pieSeries.adapter.add("innerRadius", function (innerRadius, target) {
                return am4core.percent(40);
            });

            pieSeries2.adapter.add("innerRadius", function (innerRadius, target) {
                return am4core.percent(60);
            });

            pieSeries.adapter.add("radius", function (innerRadius, target) {
                return am4core.percent(100);
            });

            pieSeries2.adapter.add("radius", function (innerRadius, target) {
                return am4core.percent(80);
            });

        });
    };
</script>