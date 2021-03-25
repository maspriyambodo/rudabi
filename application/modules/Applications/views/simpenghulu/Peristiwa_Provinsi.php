<?php
$a = json_decode($data);
$c = 0; // dt_nikah
$d = 0; // pddk_sd_pria
$e = 0; // pddk_smp_pria
$f = 0; // pddk_sma_pria
$g = 0; // pddk_s1_pria
$h = 0; // pddk_s2_pria
$i = 0; // pddk_s3_pria
$j = 0; // pddk_sd_wanita
$k = 0; // pddk_smp_wanita
$l = 0; // pddk_sma_wanita
$m = 0; // pddk_s1_wanita
$n = 0; // pddk_s2_wanita
$o = 0; // pddk_s3_wanita
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Simpenghulu/Peristiwa/index'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            Detail Data Pendidikan
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
            Detail Data Peristiwa Nikah
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="width:100%;">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">rata-rata usia</th>
                        <th colspan="6">pendidikan pria</th>
                        <th colspan="6">pendidikan wanita</th>
                        <th colspan="2">lokasi nikah</th>
                        <th colspan="2">peristiwa</th>
                    </tr>
                    <tr>
                        <th>pria</th>
                        <th>wanita</th>
                        <th>sd</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                        <th>sd</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                        <th>kua</th>
                        <th>non kua</th>
                        <th>terlaksana</th>
                        <th>tidak terlaksana</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_nikah; // dt_nikah
                        $d += $b->pddk_sd_pria; // pddk_sd_pria
                        $e += $b->pddk_smp_pria; // pddk_smp_pria
                        $f += $b->pddk_sma_pria; // pddk_sma_pria
                        $g += $b->pddk_s1_pria; // pddk_s1_pria
                        $h += $b->pddk_s2_pria; // pddk_s2_pria
                        $i += $b->pddk_s3_pria; // pddk_s3_pria
                        $j += $b->pddk_sd_wanita; // pddk_sd_wanita
                        $k += $b->pddk_smp_wanita; // pddk_smp_wanita
                        $l += $b->pddk_sma_wanita; // pddk_sma_wanita
                        $m += $b->pddk_s1_wanita; // pddk_s1_wanita
                        $n += $b->pddk_s2_wanita; // pddk_s2_wanita
                        $o += $b->pddk_s3_wanita; // pddk_s3_wanita
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td style="text-align:left;">
                                <?php echo '<a href="' . base_url('Applications/Simpenghulu/Peristiwa/Detail?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->nikah_city_id . '&b=' . $b->city_title . '&c=' . $param[0] . '&d=' . $param[1]))) . '" title="Detail Peristiwa ' . $b->city_title . '">' . $b->city_title . '</a>'; ?>
                            </td>
                            <td><?php echo number_format($b->dt_nikah); ?></td>
                            <td><?php echo $b->rt_usia_pria; ?></td>
                            <td><?php echo $b->rt_usia_wanita; ?></td>
                            <td><?php echo $b->pddk_sd_pria; ?></td>
                            <td><?php echo $b->pddk_smp_pria; ?></td>
                            <td><?php echo $b->pddk_sma_pria; ?></td>
                            <td><?php echo $b->pddk_s1_pria; ?></td>
                            <td><?php echo $b->pddk_s2_pria; ?></td>
                            <td><?php echo $b->pddk_s3_pria; ?></td>
                            <td><?php echo $b->pddk_sd_wanita; ?></td>
                            <td><?php echo $b->pddk_smp_wanita; ?></td>
                            <td><?php echo $b->pddk_sma_wanita; ?></td>
                            <td><?php echo $b->pddk_s1_wanita; ?></td>
                            <td><?php echo $b->pddk_s2_wanita; ?></td>
                            <td><?php echo $b->pddk_s3_wanita; ?></td>
                            <td><?php echo $b->nikah_kantor; ?></td>
                            <td><?php echo $b->nikah_nonkantor; ?></td>
                            <td><?php echo $b->nikah_terlaksana; ?></td>
                            <td><?php echo $b->nikah_nonterlaksana; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_nikah" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="pddk_sd_pria" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="pddk_smp_pria" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="pddk_sma_pria" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="pddk_s1_pria" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="pddk_s2_pria" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="pddk_s3_pria" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="pddk_sd_wanita" readonly="" value="<?php echo $j; ?>"/>
<input type="hidden" name="pddk_smp_wanita" readonly="" value="<?php echo $k; ?>"/>
<input type="hidden" name="pddk_sma_wanita" readonly="" value="<?php echo $l; ?>"/>
<input type="hidden" name="pddk_s1_wanita" readonly="" value="<?php echo $m; ?>"/>
<input type="hidden" name="pddk_s2_wanita" readonly="" value="<?php echo $n; ?>"/>
<input type="hidden" name="pddk_s3_wanita" readonly="" value="<?php echo $o; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k, l, m;
        a = $('input[name="dt_nikah"]').val();
        b = $('input[name="pddk_sd_pria"]').val();
        c = $('input[name="pddk_smp_pria"]').val();
        d = $('input[name="pddk_sma_pria"]').val();
        e = $('input[name="pddk_s1_pria"]').val();
        f = $('input[name="pddk_s2_pria"]').val();
        g = $('input[name="pddk_s3_pria"]').val();
        h = $('input[name="pddk_sd_wanita"]').val();
        i = $('input[name="pddk_smp_wanita"]').val();
        j = $('input[name="pddk_sma_wanita"]').val();
        k = $('input[name="pddk_s1_wanita"]').val();
        l = $('input[name="pddk_s2_wanita"]').val();
        m = $('input[name="pddk_s3_wanita"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Peristiwa Nikah: " + numeral(a).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
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
            valueAxis.title.text = "Jumlah Peristiwa Nikah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_nikah";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Jumlah Peristiwa Nikah Provinsi {province_title}: [bold]{valueY}[/]";
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
                {"pendidikan": "SD", pria: b, wanita: h},
                {"pendidikan": "SMP", pria: c, wanita: i},
                {"pendidikan": "SMA", pria: d, wanita: j},
                {"pendidikan": "S1", pria: e, wanita: k},
                {"pendidikan": "S2", pria: f, wanita: l},
                {"pendidikan": "S3", pria: g, wanita: m}
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
            valueAxis.title.text = "Jumlah Data Pendidikan";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "pria";
            series.dataFields.categoryX = "pendidikan";
            series.tooltipText = "Jumlah Tingkat Pendidikan Pria {pendidikan}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.sequencedInterpolation = true;
            series2.dataFields.valueY = "wanita";
            series2.dataFields.categoryX = "pendidikan";
            series2.tooltipText = "Jumlah Tingkat Pendidikan Wanita {pendidikan}: [bold]{valueY}[/]";
            series2.columns.template.strokeWidth = 0;
            series2.tooltip.pointerOrientation = "vertical";
            series2.columns.template.column.cornerRadiusTopLeft = 10;
            series2.columns.template.column.cornerRadiusTopRight = 10;
            series2.columns.template.column.fillOpacity = 0.8;
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
            var chart = am4core.create("chartdiv_b", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "S D",
                    litres: g
                },
                {
                    country: "S M P",
                    litres: h
                },
                {
                    country: "S M A",
                    litres: i
                },
                {
                    country: "S1",
                    litres: j
                },
                {
                    country: "S2",
                    litres: k
                },
                {
                    country: "S3",
                    litres: l
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