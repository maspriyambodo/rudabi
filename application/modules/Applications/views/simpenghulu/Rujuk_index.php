<?php
$b = json_decode($data);
$d = 0; // dt_nikah
$e = 0; // dt_rujuk
$f = 0; // dt_bawahumur_pria
$g = 0; // dt_bawahumur_wanita
$h = 0; // dt_nikahkantor
$i = 0; // dt_nonkantor
$j = 0; // dt_pddk_sd_pria
$k = 0; // dt_pddk_smp_pria
$l = 0; // dt_pddk_sma_pria
$m = 0; // dt_pddk_s1_pria
$n = 0; // dt_pddk_smp_wanita
$o = 0; // dt_pddk_sma_wanita
$p = 0; // dt_pddk_s1_wanita
?>
<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-2 col-form-label">Pilih Tahun</label>
            <div class="col-4">
                <select name="tahun" class="form-control form-control-solid" onchange="Tahun()">
                    <?php
                    foreach ($rekap_tahun as $value) {
                        if ($param[0] == $value->rekap_tahun) {
                            $selected = 'selected=""';
                        } else {
                            $selected = null;
                        }
                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $value->rekap_tahun)) . '" ' . $selected . '>' . $value->rekap_tahun . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Usia Pernikahan
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
            Detail Data Nikah &amp; Rujuk
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
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">data<br>nikah</th>
                        <th rowspan="2">data<br>rujuk</th>
                        <th rowspan="2">pria<br>dibawah umur</th>
                        <th rowspan="2">wanita<br>dibawah umur</th>
                        <th colspan="2">lokasi nikah</th>
                        <th colspan="4">pendidikan pria</th>
                        <th colspan="3">pendidikan wanita</th>
                    </tr>
                    <tr>
                        <th>kua</th>
                        <th>diluar kua</th>
                        <th>sd</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($b as $key => $c) {
                        $d += $c->dt_nikah; // dt_nikah
                        $e += $c->dt_rujuk; // dt_rujuk
                        $f += $c->dt_bawahumur_pria; // dt_bawahumur_pria
                        $g += $c->dt_bawahumur_wanita; // dt_bawahumur_wanita
                        $h += $c->dt_nikahkantor; // dt_nikahkantor
                        $i += $c->dt_nonkantor; // dt_nonkantor
                        $j += $c->dt_pddk_sd_pria; // dt_pddk_sd_pria
                        $k += $c->dt_pddk_smp_pria; // dt_pddk_smp_pria
                        $l += $c->dt_pddk_sma_pria; // dt_pddk_sma_pria
                        $m += $c->dt_pddk_s1_pria; // dt_pddk_s1_pria
                        $n += $c->dt_pddk_smp_wanita; // dt_pddk_smp_wanita
                        $o += $c->dt_pddk_sma_wanita; // dt_pddk_sma_wanita
                        $p += $c->dt_pddk_s1_wanita; // dt_pddk_s1_wanita
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php
                                if ($c->rekap_tahun == "semua tahun") {
                                    $q = '?a=' . date("Y") . '&b=' . $c->rekap_province . '&c=' . $c->province_title;
                                } else {
                                    $q = '?a=' . $c->rekap_tahun . '&b=' . $c->rekap_province . '&c=' . $c->province_title;
                                }
                                echo '<a href="' . base_url('Applications/Simpenghulu/Nikah_Rujuk/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($q))) . '" title="Detail Provinsi ' . $c->province_title . '">' . $c->province_title . '</a>';
                                ?>
                            </td>
                            <td><?php echo number_format($c->dt_nikah); ?></td>
                            <td><?php echo number_format($c->dt_rujuk); ?></td>
                            <td><?php echo number_format($c->dt_bawahumur_pria); ?></td>
                            <td><?php echo number_format($c->dt_bawahumur_wanita); ?></td>
                            <td><?php echo number_format($c->dt_nikahkantor); ?></td>
                            <td><?php echo number_format($c->dt_nonkantor); ?></td>
                            <td><?php echo number_format($c->dt_pddk_sd_pria); ?></td>
                            <td><?php echo number_format($c->dt_pddk_smp_pria); ?></td>
                            <td><?php echo number_format($c->dt_pddk_sma_pria); ?></td>
                            <td><?php echo number_format($c->dt_pddk_s1_pria); ?></td>
                            <td><?php echo number_format($c->dt_pddk_smp_wanita); ?></td>
                            <td><?php echo number_format($c->dt_pddk_sma_wanita); ?></td>
                            <td><?php echo number_format($c->dt_pddk_s1_wanita); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <td>total</td>
                        <td><?php echo number_format($d); ?></td>
                        <td><?php echo number_format($e); ?></td>
                        <td><?php echo number_format($f); ?></td>
                        <td><?php echo number_format($g); ?></td>
                        <td><?php echo number_format($h); ?></td>
                        <td><?php echo number_format($i); ?></td>
                        <td><?php echo number_format($j); ?></td>
                        <td><?php echo number_format($k); ?></td>
                        <td><?php echo number_format($l); ?></td>
                        <td><?php echo number_format($m); ?></td>
                        <td><?php echo number_format($n); ?></td>
                        <td><?php echo number_format($o); ?></td>
                        <td><?php echo number_format($p); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_nikah" value="<?php echo number_format($d); ?>" readonly=""/>
<input type="hidden" name="dt_rujuk" value="<?php echo $e; ?>" readonly=""/>
<input type="hidden" name="dt_bawahumur_pria" value="<?php echo $f; ?>" readonly=""/>
<input type="hidden" name="dt_bawahumur_wanita" value="<?php echo $g; ?>" readonly=""/>
<input type="hidden" name="dt_nikahkantor" value="<?php echo $h; ?>" readonly=""/>
<input type="hidden" name="dt_nonkantor" value="<?php echo $i; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_sd_pria" value="<?php echo $j; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_smp_pria" value="<?php echo $k; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_sma_pria" value="<?php echo $l; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_s1_pria" value="<?php echo $m; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_smp_wanita" value="<?php echo $n; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_sma_wanita" value="<?php echo $o; ?>" readonly=""/>
<input type="hidden" name="dt_pddk_s1_wanita" value="<?php echo $p; ?>" readonly=""/>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "Applications/Simpenghulu/Nikah_Rujuk/index?key=" + a;
    }
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data: " + $('input[name="dt_nikah"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
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

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_nikah";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Provinsi {province_title} [bold]{valueY}[/]";
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
            categoryAxis.sortBySeries = series;
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart);
            chart.data = [
                {
                    "country": "Pria dibawah umur",
                    "litres": $('input[name="dt_bawahumur_pria"]').val()
                },
                {
                    "country": "Wanita dibawah umur",
                    "litres": $('input[name="dt_bawahumur_wanita"]').val()
                }
            ];
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;
            chart.hiddenState.properties.radius = am4core.percent(0);
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