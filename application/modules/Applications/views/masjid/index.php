<?php
$a = json_decode($data);
$c = 0; //dt_masjid
$d = 0; //dt_tanah
$e = 0; //dt_bangunan
$f = 0; //dt_jamaah
$g = 0; //dt_pengurus
$h = 0; //dt_imam
$i = 0; //dt_khatib
$j = 0; //dt_muazin
$k = 0; //dt_remaja
$t = 0; //dt_wakaf
$u = 0; //dt_shm
$v = 0; //dt_girik
$w = 0; //dt_bmn
$x = 0; //dt_sewa
$y = 0; //dt_hibah
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Masjid per Provinsi
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
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="https://simas.kemenag.go.id" target="new">simas</a>
        </div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail data Masjid
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
                        <th>jumlah masjid</th>
                        <th>luas tanah</th>
                        <th>luas bangunan</th>
                        <th>jamaah</th>
                        <th>pengurus</th>
                        <th>imam</th>
                        <th>khatib</th>
                        <th>muazin</th>
                        <th>remaja</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->dt_masjid); //dt_masjid
                        $d += str_replace(',', '', $b->dt_tanah); //dt_tanah
                        $e += str_replace(',', '', $b->dt_bangunan); //dt_bangunan
                        $f += str_replace(',', '', $b->dt_jamaah); //dt_jamaah
                        $g += str_replace(',', '', $b->dt_pengurus); //dt_pengurus
                        $h += str_replace(',', '', $b->dt_imam); //dt_imam
                        $i += str_replace(',', '', $b->dt_khatib); //dt_khatib
                        $j += str_replace(',', '', $b->dt_muazin); //dt_muazin
                        $k += str_replace(',', '', $b->dt_remaja); //dt_remaja
                        $t += $b->dt_wakaf; //dt_wakaf
                        $u += $b->dt_shm; //dt_shm
                        $v += $b->dt_girik; //dt_girik
                        $w += $b->dt_bmn; //dt_bmn
                        $x += $b->dt_sewa; //dt_sewa
                        $y += $b->dt_hibah; //dt_hibah
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php echo '<a href="' . base_url('Applications/Binsyar/Simas/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->provinsi_id . '&b=' . $b->provinsi_name))) . '" title="Detail Provinsi ' . $b->provinsi_name . '">' . $b->provinsi_name . '</a>'; ?>
                            </td>
                            <td><?php echo number_format($b->dt_masjid); ?></td>
                            <td><?php echo number_format($b->dt_tanah); ?></td>
                            <td><?php echo number_format($b->dt_bangunan); ?></td>
                            <td><?php echo number_format($b->dt_jamaah); ?></td>
                            <td><?php echo number_format($b->dt_pengurus); ?></td>
                            <td><?php echo number_format($b->dt_imam); ?></td>
                            <td><?php echo number_format($b->dt_khatib); ?></td>
                            <td><?php echo number_format($b->dt_muazin); ?></td>
                            <td><?php echo number_format($b->dt_remaja); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>Total</th>
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
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="https://simas.kemenag.go.id" target="new">simas</a>
        </div>
    </div>
</div>
<input type="hidden" name="dt_masjid" readonly="" value="<?php echo number_format($c); ?>"/>
<script>
    window.onload = function () {
        var dt_masjid = $('input[name="dt_masjid"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Masjid: " + dt_masjid;
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "provinsi_name";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Masjid";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_masjid";
            series.dataFields.categoryX = "provinsi_name";
            series.tooltipText = "Jumlah Masjid Provinsi {provinsi_name}: [bold]{valueY}[/]";
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