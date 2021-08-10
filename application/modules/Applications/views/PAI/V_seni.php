<?php
$a = json_decode($data);
$c = 0; // jum_ls
$d = 0; // topo_kat_darat
$e = 0; // topo_kat_laut
$f = 0; // geo_kat_kota
$g = 0; // geo_kat_desa
$h = 0; // geo_kat_pelosok
$i = 0; // geo_kat_pelosok_teri
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Lembaga Seni per Provinsi
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
<!-- <div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Tipografi Lembaga Seni Islam
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
</div> -->
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Lembaga Seni Islam
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th rowspan="2">
                            jumlah lsi
                        </th>
                        <!-- <th colspan="2">
                            tipografi
                        </th> -->
                        <th colspan="4">
                            geografis
                        </th>
                    </tr>
                    <tr>
                        <th>
                            darat
                        </th>
                        <th>
                            laut
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
                            terisolasi
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_ls; // jum_ls
                        $d += $b->topo_kat_darat; // topo_kat_darat
                        $e += $b->topo_kat_laut; // topo_kat_laut
                        $f += $b->geo_kat_kota; // geo_kat_kota
                        $g += $b->geo_kat_desa; // geo_kat_desa
                        $h += $b->geo_kat_pelosok; // geo_kat_pelosok
                        $i += $b->geo_kat_pelosok_teri; // geo_kat_pelosok_teri
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Seni_Islam/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->lembaga_seni_provinsi . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_ls); ?></td>
                            <!-- <td><?php //echo number_format($b->topo_kat_darat); ?></td> -->
                            <!-- <td><?php //echo number_format($b->topo_kat_laut); ?></td> -->
                            <td><?php echo number_format($b->geo_kat_kota); ?></td>
                            <td><?php echo number_format($b->geo_kat_desa); ?></td>
                            <td><?php echo number_format($b->geo_kat_pelosok); ?></td>
                            <td><?php echo number_format($b->geo_kat_pelosok_teri); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
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
<input type="hidden" name="jum_ls" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="topo_kat_darat" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="topo_kat_laut" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="geo_kat_kota" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="geo_kat_desa" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="geo_kat_pelosok" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="geo_kat_pelosok_teri" readonly="" value="<?php echo $i; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g;
        a = $('input[name="jum_ls"]').val();
        b = $('input[name="topo_kat_darat"]').val();
        c = $('input[name="topo_kat_laut"]').val();
        d = $('input[name="geo_kat_kota"]').val();
        e = $('input[name="geo_kat_desa"]').val();
        f = $('input[name="geo_kat_pelosok"]').val();
        g = $('input[name="geo_kat_pelosok_teri"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Lembaga Seni Islam: " + numeral(a).format('0,0');
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
            chart.exporting.menu = new am4core.ExportMenu();
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
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Lembaga Seni Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_ls";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Data Provinsi {province_title}: [bold]{valueY}[/]";
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart);
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            chart.innerRadius = am4core.percent(30);
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template
                    .cursorOverStyle = [
                        {
                            "property": "cursor",
                            "value": "pointer"
                        }
                    ];

            pieSeries.alignLabels = false;
            pieSeries.labels.template.bent = true;
            pieSeries.labels.template.radius = 3;
            pieSeries.labels.template.padding(0, 0, 0, 0);

            pieSeries.ticks.template.disabled = true;
            var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
            shadow.opacity = 0;
            var hoverState = pieSeries.slices.template.states.getKey("hover");
            var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;
            chart.legend = new am4charts.Legend();

            chart.data = [{
                    "country": "Daratan",
                    "litres": b
                }, {
                    "country": "Lautan",
                    "litres": c
                }
            ];
        });
    };
</script>