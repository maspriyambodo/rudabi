<?php
$a = json_decode($data);
$c = 0; // jum_dakwah
$d = 0; // topo_daratan
$e = 0; // topo_lautan
$f = 0; // geo_kota
$g = 0; //geo_desa
$h = 0; // geo_pelosok
$i = 0; // geo_pelosok_terisolir
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Lembaga Dakwah per Provinsi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Tipografi Lembaga Dakwah
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv_a"></u></b>
        </div>
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Geografi Lembaga Dakwah
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv_b"></u></b>
        </div>
        <div id="chartdiv_b" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Lembaga Dakwah
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th rowspan="2">
                            jumlah<br>dakwah
                        </th>
                        <th colspan="2">
                            topografi
                        </th>
                        <th colspan="4">
                            geografi
                        </th>
                    </tr>
                    <tr>
                        <th>
                            daratan
                        </th>
                        <th>
                            lautan
                        </th>
                        <th>
                            kota
                        </th>
                        <th>
                            desa
                        </th>
                        <th>
                            pelosok
                        </th>
                        <th>
                            terisolir
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_dakwah; // jum_dakwah
                        $d += $b->topo_daratan; // topo_daratan
                        $e += $b->topo_lautan; // topo_lautan
                        $f += $b->geo_kota; // geo_kota
                        $g += $b->geo_desa; //geo_desa
                        $h += $b->geo_pelosok; // geo_pelosok
                        $i += $b->geo_pelosok_terisolir; // geo_pelosok_terisolir
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Dakwah/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_dakwah); ?></td>
                            <td><?php echo number_format($b->topo_daratan); ?></td>
                            <td><?php echo number_format($b->topo_lautan); ?></td>
                            <td><?php echo number_format($b->geo_kota); ?></td>
                            <td><?php echo number_format($b->geo_desa); ?></td>
                            <td><?php echo number_format($b->geo_pelosok); ?></td>
                            <td><?php echo number_format($b->geo_pelosok_terisolir); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>
                            jumlah
                        </th>
                        <th><?php echo number_format($c); ?></th>
                        <th><?php echo number_format($d); ?></th>
                        <th><?php echo number_format($e); ?></th>
                        <th><?php echo number_format($f); ?></th>
                        <th><?php echo number_format($g); ?></th>
                        <th><?php echo number_format($h); ?></th>
                        <th><?php echo number_format($i); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>        
    </div>
</div>
<input type="hidden" name="jum_dakwah" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="topo_daratan" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="topo_lautan" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="geo_kota" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="geo_desa" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="geo_pelosok" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="geo_pelosok_terisolir" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="sum_tipo" readonly="" value="<?php echo $d + $e; ?>"/>
<input type="hidden" name="sum_geo" readonly="" value="<?php echo $f + $g + $h + $i; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i;
        a = $('input[name=jum_dakwah]').val();
        b = $('input[name=topo_daratan]').val();
        c = $('input[name=topo_lautan]').val();
        d = $('input[name=geo_kota]').val();
        e = $('input[name=geo_desa]').val();
        f = $('input[name=geo_pelosok]').val();
        g = $('input[name=geo_pelosok_terisolir]').val();
        h = $('input[name=sum_tipo]').val();
        i = $('input[name=sum_geo]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Lembaga Dakwah: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv_a').innerText = "Total Data Tipografi: " + numeral(h).format('0,0');
        document.getElementById('title_chartdiv_b').innerText = "Total Data Geografi: " + numeral(i).format('0,0');
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "province_title";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah Lembaga Dakwah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_dakwah";
            series.dataFields.categoryX = "province_title";
            series.clustered = false;
            series.tooltipText = "Jumlah Lembaga Dakwah di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
            categoryAxis.sortBySeries = series;
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Daratan",
                    litres: b
                },
                {
                    country: "Lautan",
                    litres: c
                }
            ];

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_b", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = [
                {"geografi": "Kota", "jumlah": d},
                {"geografi": "Desa", "jumlah": e},
                {"geografi": "Pelosok", "jumlah": f},
                {"geografi": "Terisolir", "jumlah": g}
            ];
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Kategori Geografi';
            categoryAxis.dataFields.category = "geografi";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Lembaga Dakwah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "geografi";
            series.tooltipText = "Jumlah Lembaga Dakwah {geografi}: [bold]{valueY}[/]";
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
    };
</script>