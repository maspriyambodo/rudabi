<?php
$a = json_decode($data);
$c = 0; // jum_dewan
$d = 0; // jum_dewan_sunda
$e = 0; // jum_dewan_jawa
$f = 0; // jum_dewan_sumatera
$g = 0; // jum_dewan_sulawesi
$h = 0; // jum_dewan_lain
$i = 0; // dewan_asing_inggris
$j = 0; // dewan_asing_arab
$k = 0; // dewan_asing_lain
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data dewan hakim per provinsi
            </div>
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
            <div class="text-uppercase">
                data dewan hakim
            </div>
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
            Detail Data Dewan Hakim
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
                        <th rowspan="2">jumlah<br>dewan</th>
                        <th colspan="5">dewan indonesia</th>
                        <th colspan="3">dewan asing</th>
                    </tr>
                    <tr>
                        <th>
                            sunda
                        </th>
                        <th>
                            jawa
                        </th>
                        <th>
                            sumatera
                        </th>
                        <th>
                            sulawesi
                        </th>
                        <th>
                            lain
                        </th>
                        <th>
                            inggris
                        </th>
                        <th>
                            arab
                        </th>
                        <th>
                            lain
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_dewan; // jum_dewan
                        $d += $b->jum_dewan_sunda; // jum_dewan_sunda
                        $e += $b->jum_dewan_jawa; // jum_dewan_jawa
                        $f += $b->jum_dewan_sumatera; // jum_dewan_sumatera
                        $g += $b->jum_dewan_sulawesi; // jum_dewan_sulawesi
                        $h += $b->jum_dewan_lain; // jum_dewan_lain
                        $i += $b->dewan_asing_inggris; // dewan_asing_inggris
                        $j += $b->dewan_asing_arab; // dewan_asing_arab
                        $k += $b->dewan_asing_lain; // dewan_asing_lain
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Dewan/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))) . '" title="Detail Data ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_dewan); ?></td>
                            <td><?php echo number_format($b->jum_dewan_sunda); ?></td>
                            <td><?php echo number_format($b->jum_dewan_jawa); ?></td>
                            <td><?php echo number_format($b->jum_dewan_sumatera); ?></td>
                            <td><?php echo number_format($b->jum_dewan_sulawesi); ?></td>
                            <td><?php echo number_format($b->jum_dewan_lain); ?></td>
                            <td><?php echo number_format($b->dewan_asing_inggris); ?></td>
                            <td><?php echo number_format($b->dewan_asing_arab); ?></td>
                            <td><?php echo number_format($b->dewan_asing_lain); ?></td>
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
                        <th><?php echo number_format($h); ?></th>
                        <th><?php echo number_format($i); ?></th>
                        <th><?php echo number_format($j); ?></th>
                        <th><?php echo number_format($k); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>        
    </div>
</div>
<input type="hidden" name="jum_dewan" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="jum_dewan_sunda" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="jum_dewan_jawa" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="jum_dewan_sumatera" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="jum_dewan_sulawesi" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="jum_dewan_lain" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="dewan_asing_inggris" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="dewan_asing_arab" readonly="" value="<?php echo $j; ?>"/>
<input type="hidden" name="dewan_asing_lain" readonly="" value="<?php echo $k; ?>"/>
<input type="hidden" name="dewan_indo" readonly="" value="<?php echo $d + $e + $f + $g + $h; ?>"/>
<input type="hidden" name="dewan_asing" readonly="" value="<?php echo $i + $j + $k; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k;
        a = $('input[name="jum_dewan"]').val();
        b = $('input[name="jum_dewan_sunda"]').val();
        c = $('input[name="jum_dewan_jawa"]').val();
        d = $('input[name="jum_dewan_sumatera"]').val();
        e = $('input[name="jum_dewan_sulawesi"]').val();
        f = $('input[name="jum_dewan_lain"]').val();
        g = $('input[name="dewan_asing_inggris"]').val();
        h = $('input[name="dewan_asing_arab"]').val();
        i = $('input[name="dewan_asing_lain"]').val();
        j = $('input[name="dewan_indo"]').val();
        k = $('input[name="dewan_asing"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Dewan Hakim: " + numeral(a).format('0,0');
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
            valueAxis.title.text = "Jumlah Dewan Hakim";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_dewan";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Dewan Hakim Provinsi {province_title}: [bold]{valueY}[/]";
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
                    country: "Dewan Hakim Indonesia",
                    litres: j
                },
                {
                    country: "Dewan Hakim Asing",
                    litres: k
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