<?php
$a = json_decode($data);
$c = 0; // jum_kaligrafer
$d = 0; // pend_smp
$e = 0; // pend_sma
$f = 0; // pend_pesantren
$g = 0; // pend_diploma1
$h = 0; // pend_diploma2
$i = 0; // pend_diploma3
$j = 0; // pend_s1
$k = 0; // pend_s2
$l = 0; // pend_s3
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Kaligrafer/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            Pendidikan Kaligrafer
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
            Detail Data Kaligrafer
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
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="9">pendidikan</th>
                    </tr>
                    <tr>
                        <th>smp</th>
                        <th>sma</th>
                        <th>pesantren</th>
                        <th>d i</th>
                        <th>d ii</th>
                        <th>d iii</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_kaligrafer; // jum_kaligrafer
                        $d += $b->pend_smp; // pend_smp
                        $e += $b->pend_sma; // pend_sma
                        $f += $b->pend_pesantren; // pend_pesantren
                        $g += $b->pend_diploma1; // pend_diploma1
                        $h += $b->pend_diploma2; // pend_diploma2
                        $i += $b->pend_diploma3; // pend_diploma3
                        $j += $b->pend_s1; // pend_s1
                        $k += $b->pend_s2; // pend_s2
                        $l += $b->pend_s3; // pend_s3
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Kaligrafer/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $b->city_id . '&d=' . $b->city_title))) . '" title="Detail Data ' . $b->city_title . '">' . $b->city_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_kaligrafer); ?></td>
                            <td><?php echo number_format($b->pend_smp); ?></td>
                            <td><?php echo number_format($b->pend_sma); ?></td>
                            <td><?php echo number_format($b->pend_pesantren); ?></td>
                            <td><?php echo number_format($b->pend_diploma1); ?></td>
                            <td><?php echo number_format($b->pend_diploma2); ?></td>
                            <td><?php echo number_format($b->pend_diploma3); ?></td>
                            <td><?php echo number_format($b->pend_s1); ?></td>
                            <td><?php echo number_format($b->pend_s2); ?></td>
                            <td><?php echo number_format($b->pend_s3); ?></td>
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
                        <th><?php echo number_format($l); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum_kaligrafer" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="pend_smp" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="pend_sma" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="pend_pesantren" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="pend_diploma1" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="pend_diploma2" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="pend_diploma3" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="pend_s1" readonly="" value="<?php echo $j; ?>"/>
<input type="hidden" name="pend_s2" readonly="" value="<?php echo $k; ?>"/>
<input type="hidden" name="pend_s3" readonly="" value="<?php echo $l; ?>"/>
<input type="hidden" name="tot_pdd" readonly="" value="<?php echo $d + $e + $f + $g + $h + $i + $j + $k + $l; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k;
        a = $('input[name="jum_kaligrafer"]').val();
        b = $('input[name="pend_smp"]').val();
        c = $('input[name="pend_sma"]').val();
        d = $('input[name="pend_pesantren"]').val();
        e = $('input[name="pend_diploma1"]').val();
        f = $('input[name="pend_diploma2"]').val();
        g = $('input[name="pend_diploma3"]').val();
        h = $('input[name="pend_s1"]').val();
        i = $('input[name="pend_s2"]').val();
        j = $('input[name="pend_s3"]').val();
        k = $('input[name="tot_pdd"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Kaligrafer: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv_a').innerText = "Total Data Pendidikan: " + numeral(k).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
            categoryAxis.dataFields.category = "city_title";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Kaligrafer";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_kaligrafer";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Jumlah Data {city_title}: [bold]{valueY}[/]";
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
            var chart = am4core.create("chartdiv_a", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = [
                {
                    "pendidikan": "SMP",
                    "jumlah": b
                },
                {
                    "pendidikan": "SMA",
                    "jumlah": c
                },
                {
                    "pendidikan": "Pesantren",
                    "jumlah": d
                },
                {
                    "pendidikan": "DI",
                    "jumlah": e
                },
                {
                    "pendidikan": "DII",
                    "jumlah": f
                },
                {
                    "pendidikan": "DIII",
                    "jumlah": g
                },
                {
                    "pendidikan": "S1",
                    "jumlah": h
                },
                {
                    "pendidikan": "S2",
                    "jumlah": i
                },
                {
                    "pendidikan": "S3",
                    "jumlah": j
                }
            ];
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Jenjang Pendidikan';
            categoryAxis.dataFields.category = "pendidikan";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Kaligrafer";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "pendidikan";
            series.tooltipText = "Jumlah Data {pendidikan}: [bold]{valueY}[/]";
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