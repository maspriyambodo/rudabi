<?php
$a = json_decode($data);
$c = 0; //dt_penghulu
$u = 0; //dt_sma
$v = 0; //dt_s1
$w = 0; //dt_s2
$x = 0; //dt_s3
$a1 = 0; //dt_pertama
$a2 = 0; //dt_madya
$a3 = 0; //dt_muda
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Penghulu Per provinsi
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
        <div class="text-center">
            <b><u id="title_chartdiv_a"></u></b>
        </div>
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Penghulu
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" role="grid" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr role="row">
                        <th rowspan="2">no</th>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah<br>penghulu</th>
                        <th colspan="3">golongan</th>
                        <th colspan="4">pendidikan</th>
                    </tr>
                    <tr>
                        <th>pertama</th>
                        <th>madya</th>
                        <th>muda</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_penghulu; //dt_penghulu
                        $u += $b->dt_sma; //dt_sma
                        $v += $b->dt_s1; //dt_s1
                        $w += $b->dt_s2; //dt_s2
                        $x += $b->dt_s3; //dt_s3
                        $a1 += $b->dt_pertama; //dt_pertama
                        $a2 += $b->dt_madya; //dt_madya
                        $a3 += $b->dt_muda; //dt_muda
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td style="text-align:left !important;">
                                <?php
                                echo '<a href="' . base_url('Applications/Simpenghulu/Penghulu/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->city_province . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>';
                                ?>
                            </td>
                            <td><?php echo number_format($b->dt_penghulu); ?></td>
                            <td><?php echo number_format($b->dt_pertama); ?></td>
                            <td><?php echo number_format($b->dt_madya); ?></td>
                            <td><?php echo number_format($b->dt_muda); ?></td>
                            <td><?php echo number_format($b->dt_sma); ?></td>
                            <td><?php echo number_format($b->dt_s1); ?></td>
                            <td><?php echo number_format($b->dt_s2); ?></td>
                            <td><?php echo number_format($b->dt_s3); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="2">jumlah</th>
                        <th><?php echo number_format($c); ?></th>
                        <th><?php echo number_format($u); ?></th>
                        <th><?php echo number_format($v); ?></th>
                        <th><?php echo number_format($w); ?></th>
                        <th><?php echo number_format($x); ?></th>
                        <th><?php echo number_format($a1); ?></th>
                        <th><?php echo number_format($a2); ?></th>
                        <th><?php echo number_format($a3); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_penghulu" readonly="" value="<?php echo number_format($c); ?>"/>
<input type="hidden" name="dt_pertama" readonly="" value="<?php echo $a1; ?>"/>
<input type="hidden" name="dt_madya" readonly="" value="<?php echo $a2; ?>"/>
<input type="hidden" name="dt_muda" readonly="" value="<?php echo $a3; ?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var a, b, c, d;
        a = $('input[name=dt_muda]').val();
        b = $('input[name=dt_madya]').val();
        c = $('input[name=dt_pertama]').val();
        d = parseFloat(a) + parseFloat(b) + parseFloat(c);
        document.getElementById('title_chartdiv').innerText = "Total Data Penghulu: " + $('input[name="dt_penghulu"]').val();
        document.getElementById('title_chartdiv_a').innerText = "Total Data Golongan: " + numeral(d).format('0,0');
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
            valueAxis.title.text = "Jumlah Penghulu";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_penghulu";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Penghulu Provinsi {province_title}: [bold]{valueY}[/]";
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
                    country: " Ahli Muda",
                    litres: $('input[name=dt_muda]').val()
                },
                {
                    country: "Ahli Madya",
                    litres: $('input[name=dt_madya]').val()
                },
                {
                    country: " Ahli Pertama",
                    litres: $('input[name=dt_muda]').val()
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