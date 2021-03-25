<?php
$a = json_decode($data);
$c = 0; //dt_penghulu
$d = 0; //dt_1a
$e = 0; //dt_1b
$f = 0; //dt_1c
$g = 0; //dt_1d
$h = 0; //dt_2a
$i = 0; //dt_2b
$j = 0; //dt_2c
$k = 0; //dt_2d
$l = 0; //dt_3a
$m = 0; //dt_3b
$n = 0; //dt_3c
$o = 0; //dt_3d
$p = 0; //dt_4a
$q = 0; //dt_4b
$r = 0; //dt_4c
$s = 0; //dt_4d
$t = 0; //dt_4e
$u = 0; //dt_sma
$v = 0; //dt_s1
$w = 0; //dt_s2
$x = 0; //dt_s3
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Simpenghulu/Penghulu/index'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Penghulu Per Golongan
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
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <div class="card-label">Detail Data Penghulu</div>
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
                        <th rowspan="2">no</th>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah<br>penghulu</th>
                        <th colspan="4">golongan / I</th>
                        <th colspan="4">golongan / II</th>
                        <th colspan="4">golongan / III</th>
                        <th colspan="5">golongan / IV</th>
                        <th colspan="4">pendidikan</th>
                    </tr>
                    <tr>
                        <th>i/a</th>
                        <th>i/b</th>
                        <th>i/c</th>
                        <th>i/d</th>
                        <th>ii/a</th>
                        <th>ii/b</th>
                        <th>ii/c</th>
                        <th>ii/d</th>
                        <th>iii/a</th>
                        <th>iii/b</th>
                        <th>iii/c</th>
                        <th>iii/d</th>
                        <th>iv/a</th>
                        <th>iv/b</th>
                        <th>iv/c</th>
                        <th>iv/d</th>
                        <th>iv/e</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_penghulu; //dt_penghulu
                        $d += $b->dt_1a; //dt_1a
                        $e += $b->dt_1b; //dt_1b
                        $f += $b->dt_1c; //dt_1c
                        $g += $b->dt_1d; //dt_1d
                        $h += $b->dt_2a; //dt_2a
                        $i += $b->dt_2b; //dt_2b
                        $j += $b->dt_2c; //dt_2c
                        $k += $b->dt_2d; //dt_2d
                        $l += $b->dt_3a; //dt_3a
                        $m += $b->dt_3b; //dt_3b
                        $n += $b->dt_3c; //dt_3c
                        $o += $b->dt_3d; //dt_3d
                        $p += $b->dt_4a; //dt_4a
                        $q += $b->dt_4b; //dt_4b
                        $r += $b->dt_4c; //dt_4c
                        $s += $b->dt_4d; //dt_4d
                        $t += $b->dt_4e; //dt_4e
                        $u += $b->dt_sma; //dt_sma
                        $v += $b->dt_s1; //dt_s1
                        $w += $b->dt_s2; //dt_s2
                        $x += $b->dt_s3; //dt_s3 
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td style="text-align: left !important;">
                                <?php
                                echo '<a href="' . base_url('Applications/Simpenghulu/Penghulu/Detail?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->city_id . '&b=' . $b->city_title . '&c=' . $param[0] . '&d=' . $param[1]))) . '" title="Detail Data ' . $b->city_title . '">' . $b->city_title . '</a>';
                                ?>
                            </td>
                            <td><?php echo $b->dt_penghulu; ?></td>
                            <td><?php echo $b->dt_1a; ?></td>
                            <td><?php echo $b->dt_1b; ?></td>
                            <td><?php echo $b->dt_1c; ?></td>
                            <td><?php echo $b->dt_1d; ?></td>
                            <td><?php echo $b->dt_2a; ?></td>
                            <td><?php echo $b->dt_2b; ?></td>
                            <td><?php echo $b->dt_2c; ?></td>
                            <td><?php echo $b->dt_2d; ?></td>
                            <td><?php echo $b->dt_3a; ?></td>
                            <td><?php echo $b->dt_3b; ?></td>
                            <td><?php echo $b->dt_3c; ?></td>
                            <td><?php echo $b->dt_3d; ?></td>
                            <td><?php echo $b->dt_4a; ?></td>
                            <td><?php echo $b->dt_4b; ?></td>
                            <td><?php echo $b->dt_4c; ?></td>
                            <td><?php echo $b->dt_4d; ?></td>
                            <td><?php echo $b->dt_4e; ?></td>
                            <td><?php echo $b->dt_sma; ?></td>
                            <td><?php echo $b->dt_s1; ?></td>
                            <td><?php echo $b->dt_s2; ?></td>
                            <td><?php echo $b->dt_s3; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="2">jumlah</th>
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
                        <th><?php echo number_format($m); ?></th>
                        <th><?php echo number_format($n); ?></th>
                        <th><?php echo number_format($o); ?></th>
                        <th><?php echo number_format($p); ?></th>
                        <th><?php echo number_format($q); ?></th>
                        <th><?php echo number_format($r); ?></th>
                        <th><?php echo number_format($s); ?></th>
                        <th><?php echo number_format($t); ?></th>
                        <th><?php echo number_format($u); ?></th>
                        <th><?php echo number_format($v); ?></th>
                        <th><?php echo number_format($w); ?></th>
                        <th><?php echo number_format($x); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php
$y = $d + $e + $f + $g; //total golongan I
$z = $h + $i + $j + $k; //total golongan II
$aa = $l + $m + $n + $o; //total golongan III
$ab = $p + $q + $r + $s + $t; //total golongan IV
?>
<input type="hidden" name="dt_penghulu" readonly="" value="<?php echo number_format($c); ?>"/>
<input type="hidden" name="y" readonly="" value="<?php echo number_format($y); ?>"/>
<input type="hidden" name="z" readonly="" value="<?php echo number_format($z); ?>"/>
<input type="hidden" name="aa" readonly="" value="<?php echo number_format($aa); ?>"/>
<input type="hidden" name="ab" readonly="" value="<?php echo number_format($ab); ?>"/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data Penghulu: " + $('input[name="dt_penghulu"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Kota / Kabupaten';
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
            valueAxis.title.text = "Jumlah Penghulu";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_penghulu";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Jumlah Penghulu {city_title}: [bold]{valueY}[/]";
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
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Golongan / I",
                    litres: $('input[name=y]').val()
                },
                {
                    country: "Golongan / II",
                    litres: $('input[name=z]').val()
                },
                {
                    country: "Golongan / III",
                    litres: $('input[name=aa]').val()
                },
                {
                    country: "Golongan / IV",
                    litres: $('input[name=ab]').val()
                }
            ];
            chart.innerRadius = 100;
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