<?php
$a = json_decode($data);
$c = 0; //target_wilayah
$d = 0; //jum_catin
$e = 0; //hadir_pasutri
$f = 0; //nonhadir_pasutri
$g = 0; //hadir_bimwin_suami
$h = 0; //hadir_bimwin_istri 
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Bimwin/Catin/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            Data Hadir Pasutri
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
            Detail Data Catin
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
                        <th>provinsi</th>
                        <th>target</th>
                        <th>realisasi</th>
                        <th>hadir pasutri</th>
                        <th>tidak<br>hadir pasutri</th>
                        <th>hadir<br>bimwin suami</th>
                        <th>tidak hadir<br>bimwin istri</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->target_kabkot); //target_kabkot
                        $d += str_replace(',', '', $b->jum_catin); //jum_catin
                        $e += str_replace(',', '', $b->hadir_pasutri); //hadir_pasutri
                        $f += str_replace(',', '', $b->nonhadir_pasutri); //nonhadir_pasutri
                        $g += str_replace(',', '', $b->hadir_suami); //hadir_suami
                        $h += str_replace(',', '', $b->hadir_istri); //hadir_bimwin_istri
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php echo '<a href="' . base_url('Applications/Bimwin/Catin/Detail?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&c=' . $param[1] . '&d=' . $param[2] . '&e=' . $b->kabkot . '&f=' . $b->nama_lokasi))) . '" title="Detail ' . $b->nama_lokasi . '">' . $b->nama_lokasi . '</a>'; ?>
                            </td>
                            <td><?php echo number_format($b->target_kabkot); ?></td>
                            <td><?php echo number_format($b->jum_catin); ?></td>
                            <td><?php echo number_format($b->hadir_pasutri); ?></td>
                            <td><?php echo number_format($b->nonhadir_pasutri); ?></td>
                            <td><?php echo number_format($b->hadir_suami); ?></td>
                            <td><?php echo number_format($b->hadir_istri); ?></td>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="target_wilayah" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="jum_catin" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="hadir_pasutri" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="nonhadir_pasutri" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="hadir_bimwin_suami" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="hadir_bimwin_istri" readonly="" value="<?php echo $h; ?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var a, b, c, d, e, f;
        a = $('input[name="jum_catin"]').val();
        b = numeral(a).format('0,0');
        c = $('input[name="hadir_pasutri"]').val();
        d = $('input[name="nonhadir_pasutri"]').val();
        e = parseFloat(c) + parseFloat(d);
        f = numeral(e).format('0,0');
        document.getElementById('title_chartdiv').innerText = "Total Realisasi Catin: " + b;
        document.getElementById('title_chartdiv_a').innerText = "Total Data Catin: " + f;
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "nama_lokasi";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Target Catin";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "target_kabkot";
            series.dataFields.categoryX = "nama_lokasi";
            series.tooltipText = "Jumlah Target {nama_lokasi}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "jum_catin";
            series2.dataFields.categoryX = "nama_lokasi";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Realisasi Catin {categoryX} : [bold]{valueY}[/]";

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
                    country: "Hadir Pasutri",
                    litres: numeral(c).format('0,0')
                },
                {
                    country: "Tidak Hadir Pasutri",
                    litres: numeral(d).format('0,0')
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