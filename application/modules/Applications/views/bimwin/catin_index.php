<?php
$a = json_decode($data);
$c = 0; //target_pusat
$d = 0; //jumlah_catin
$e = 0; //hadir_suami
$f = 0; //nonhadir_istri
$g = 0; //hadir_suami_bimwin
$h = 0; //hadir_istri_bimwin
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Tahun Target Catin
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
                        <th rowspan="2">tahun<br>target</th>
                        <th rowspan="2">jumlah<br>target</th>
                        <th rowspan="2">jumlah<br>peserta</th>
                        <th rowspan="2">hadir peserta<br>catin suami</th>
                        <th rowspan="2">tidak hadir<br>catin istri</th>
                        <th colspan="2">jumlah hadir catin bimwin</th>
                    </tr>
                    <tr>
                        <th>suami</th>
                        <th>istri</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->target_pusat); //target_pusat
                        $d += str_replace(',', '', $b->jumlah_catin); //jumlah_catin
                        $e += str_replace(',', '', $b->hadir_suami); //hadir_suami
                        $f += str_replace(',', '', $b->nonhadir_istri); //nonhadir_istri
                        $g += str_replace(',', '', $b->hadir_suami_bimwin); //hadir_suami_bimwin
                        $h += str_replace(',', '', $b->hadir_istri_bimwin); //hadir_istri_bimwin
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php
                                echo '<a href="' . base_url('Applications/Bimwin/Catin/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->tahun_target_wilayah))) . '" title="Target Catin Tahun ' . $b->tahun_target_wilayah . '">' . $b->tahun_target_wilayah . '</a>';
                                ?>
                            </td>
                            <td><?php echo $b->target_pusat; ?></td>
                            <td><?php echo $b->jumlah_catin; ?></td>
                            <td><?php echo $b->hadir_suami; ?></td>
                            <td><?php echo $b->nonhadir_istri; ?></td>
                            <td><?php echo $b->hadir_suami_bimwin; ?></td>
                            <td><?php echo $b->hadir_istri_bimwin; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
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
<script>
    window.onload = function () {
        var a, b, c, d, e, f;
        a = $('input[name="target_pusat"]').val();
        b = $('input[name="jumlah_catin"]').val();
        c = $('input[name="hadir_suami"]').val();
        d = $('input[name="nonhadir_istri"]').val();
        e = $('input[name="hadir_suami_bimwin"]').val();
        f = $('input[name="hadir_istri_bimwin"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create('chartdiv', am4charts.XYChart);
            chart.colors.step = 2;
            chart.exporting.menu = new am4core.ExportMenu();
            chart.legend = new am4charts.Legend();
            chart.legend.position = 'top';
            chart.legend.paddingBottom = 20;
            chart.legend.labels.template.maxWidth = 95;

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            xAxis.dataFields.category = 'tahun_target_wilayah';
            xAxis.renderer.cellStartLocation = 0.1;
            xAxis.renderer.cellEndLocation = 0.9;
            xAxis.renderer.grid.template.location = 0;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueY = value;
                series.dataFields.categoryX = 'tahun_target_wilayah';
                series.name = name;

                series.events.on("hidden", arrangeColumns);
                series.events.on("shown", arrangeColumns);

                var bullet = series.bullets.push(new am4charts.LabelBullet());
                bullet.interactionsEnabled = false;
                bullet.dy = 30;
                bullet.label.text = '{valueY}';
                bullet.label.fill = am4core.color('#ffffff');

                return series;
            }

            chart.data = <?php echo $data; ?>;


            createSeries('target_pusat', 'Target Catin');
            createSeries('jumlah_catin', 'Realisasi Catin');

            function arrangeColumns() {

                var series = chart.series.getIndex(0);

                var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                if (series.dataItems.length > 1) {
                    var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                    var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                    var delta = ((x1 - x0) / chart.series.length) * w;
                    if (am4core.isNumber(delta)) {
                        var middle = chart.series.length / 2;

                        var newIndex = 0;
                        chart.series.each(function (series) {
                            if (!series.isHidden && !series.isHiding) {
                                series.dummyData = newIndex;
                                newIndex++;
                            } else {
                                series.dummyData = chart.series.indexOf(series);
                            }
                        });
                        var visibleCount = newIndex;
                        var newMiddle = visibleCount / 2;

                        chart.series.each(function (series) {
                            var trueIndex = chart.series.indexOf(series);
                            var newIndex = series.dummyData;

                            var dx = (newIndex - trueIndex + middle - newMiddle) * delta;

                            series.animate({property: "dx", to: dx}, series.interpolationDuration, series.interpolationEasing);
                            series.bulletsContainer.animate({property: "dx", to: dx}, series.interpolationDuration, series.interpolationEasing);
                        });
                    }
                }
            }

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