<?php
$a = json_decode($data);
$c = 0; //jum_pengukuran
$d = 0; //jum_terlihat
$e = 0; //jum_nonterlihat
$f = 0; //bln_muharram
$g = 0; //bln_safar
$h = 0; //bln_rabiulawal
$i = 0; //bln_rabiulakhir
$j = 0; //bln_jumadalula
$k = 0; //bln_jumadalakhirah
$l = 0; //bln_rajab
$m = 0; //bln_syakban
$n = 0; //bln_ramadan
$o = 0; //bln_syawal
$p = 0; //bln_zulkadah
$q = 0; //bln_zulhijjah
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Hisab per Provinsi
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
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Hisab Terlihat &amp; Tidak Terlihat
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
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                Detail Hisab Laporan
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>pengukuran</th>
                        <th>terlihat</th>
                        <th>non<br>terlihat</th>
                        <th>muharram</th>
                        <th>safar</th>
                        <th>rabiul awal</th>
                        <th>rabiul akhir</th>
                        <th>jumadal<br>awal</th>
                        <th>jumadal<br>akhir</th>
                        <th>rajab</th>
                        <th>syakban</th>
                        <th>ramadhan</th>
                        <th>syawal</th>
                        <th>zulkadah</th>
                        <th>zulhijjah</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_pengukuran; //jum_pengukuran
                        $d += $b->jum_terlihat; //jum_terlihat
                        $e += $b->jum_nonterlihat; //jum_nonterlihat
                        $f += $b->bln_muharram; //bln_muharram
                        $g += $b->bln_safar; //bln_safar
                        $h += $b->bln_rabiulawal; //bln_rabiulawal
                        $i += $b->bln_rabiulakhir; //bln_rabiulakhir
                        $j += $b->bln_jumadalula; //bln_jumadalula
                        $k += $b->bln_jumadalakhirah; //bln_jumadalakhirah
                        $l += $b->bln_rajab; //bln_rajab
                        $m += $b->bln_syakban; //bln_syakban
                        $n += $b->bln_ramadan; //bln_ramadan
                        $o += $b->bln_syawal; //bln_syawal
                        $p += $b->bln_zulkadah; //bln_zulkadah
                        $q += $b->bln_zulhijjah; //bln_zulhijjah
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php
                                echo '<a href="' . base_url('Applications/Binsyar/Laporan/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->ukur_provinsi . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>';
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->jum_pengukuran;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->jum_terlihat;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->jum_nonterlihat;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_muharram;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_safar;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_rabiulawal;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_rabiulakhir;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_jumadalula;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_jumadalakhirah;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_rajab;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_syakban;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_ramadan;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_syawal;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_zulkadah;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $b->bln_zulhijjah;
                                ?>
                            </td>
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
                        <th><?php echo number_format($j); ?></th>
                        <th><?php echo number_format($k); ?></th>
                        <th><?php echo number_format($l); ?></th>
                        <th><?php echo number_format($m); ?></th>
                        <th><?php echo number_format($n); ?></th>
                        <th><?php echo number_format($o); ?></th>
                        <th><?php echo number_format($p); ?></th>
                        <th><?php echo number_format($q); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum_pengukuran" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="jum_terlihat" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="jum_nonterlihat" readonly="" value="<?php echo $e; ?>"/>
<script>
    window.onload = function () {
        var a, b, c;
        a = $('input[name="jum_pengukuran"]').val();
        b = $('input[name="jum_terlihat"]').val();
        c = $('input[name="jum_nonterlihat"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Hisab: " + a;
        document.getElementById('title_chartdiv_a').innerText = "Total Data Hisab: " + a;
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
            valueAxis.title.text = "Jumlah Hisab Pengukuran";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_pengukuran";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Hisab Provinsi {province_title}: [bold]{valueY}[/]";
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
            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "{valueY}";
            valueLabel.label.fontSize = 10;
            valueLabel.label.verticalCenter = "top";
            chart.cursor = new am4charts.XYCursor();
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Terlihat",
                    litres: b
                },
                {
                    country: "Tidak Terlihat",
                    litres: c
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
            ]
        });
    };
</script>