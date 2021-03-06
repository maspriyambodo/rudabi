<?php
$a = json_decode($data);
$c = 0; // jum_mufassir
$d = 0; // mufassir_pria
$e = 0; // mufassir_perempuan
$f = 0; // mufassir_kawin
$g = 0; // mufassir_belum_kawin
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Data Mufassir</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Mufassir per Provinsi
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
            Mufassir Jenis Kelamin
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
            Mufassir Status Kawin
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
            Detail Data Mufassir
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
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">Mufassir</th>
                        <th colspan="2">status kawin</th>
                    </tr>
                    <tr>
                        <th>pria</th>
                        <th>wanita</th>
                        <th>kawin</th>
                        <th>belum</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_mufassir; // jum_mufassir
                        $d += $b->mufassir_pria; // mufassir_pria
                        $e += $b->mufassir_perempuan; // mufassir_perempuan
                        $f += $b->mufassir_kawin; // mufassir_kawin
                        $g += $b->mufassir_belum_kawin; // mufassir_belum_kawin
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Users/PAI/Mufassir/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))) . '" title="Data Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_mufassir); ?></td>
                            <td><?php echo number_format($b->mufassir_pria); ?></td>
                            <td><?php echo number_format($b->mufassir_perempuan); ?></td>
                            <td><?php echo number_format($b->mufassir_kawin); ?></td>
                            <td><?php echo number_format($b->mufassir_belum_kawin); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?php echo number_format($c); ?></th>
                        <th><?php echo number_format($d); ?></th>
                        <th><?php echo number_format($e); ?></th>
                        <th><?php echo number_format($f); ?></th>
                        <th><?php echo number_format($g); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum_mufassir" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="mufassir_pria" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="mufassir_perempuan" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="mufassir_kawin" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="mufassir_belum_kawin" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="jen_kel" readonly="" value="<?php echo $d + $e; ?>"/>
<input type="hidden" name="stat_kawin" readonly="" value="<?php echo $f + $g; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g;
        a = $('input[name="jum_mufassir"]').val();
        b = $('input[name="mufassir_pria"]').val();
        c = $('input[name="mufassir_perempuan"]').val();
        d = $('input[name="mufassir_kawin"]').val();
        f = $('input[name="jen_kel"]').val();
        e = $('input[name="mufassir_belum_kawin"]').val();
        g = $('input[name="stat_kawin"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Mufassir: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv_a').innerText = "Total Data Jenis Kelamin: " + numeral(f).format('0,0');
        document.getElementById('title_chartdiv_b').innerText = "Total Data Status Kawin: " + numeral(g).format('0,0');
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
            valueAxis.title.text = "Jumlah Mufassir";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_mufassir";
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
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Laki-Laki",
                    litres: b
                },
                {
                    country: "Perempuan",
                    litres: c
                }
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_b", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Kawin",
                    litres: d
                },
                {
                    country: "Belum Kawin",
                    litres: e
                }
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";
        });
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
    };
</script>