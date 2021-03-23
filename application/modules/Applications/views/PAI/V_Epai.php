<?php
$a = json_decode($data);
$c = 0; // jumlah_kabkot
$d = 0; // jumlah_penyuluh
$e = 0; // jumlah_penyuluh_online
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Penyuluh per Provinsi
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
            Penyuluh Agama Islam
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
            Detail Data Penyuluh Agama Islam
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
                        <th rowspan="2">
                            no
                        </th>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            penyuluh agama islam
                        </th>
                    </tr>
                    <tr>
                        <th>
                            non-online
                        </th>
                        <th>
                            online
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jumlah_kabkot; // jumlah_kabkot
                        $d += $b->jumlah_penyuluh; // jumlah_penyuluh
                        $e += $b->jumlah_penyuluh_online; // jumlah_penyuluh_online
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td style="text-align: left !important;">
                                <?php echo '<a href="' . base_url('Applications/PAI/Epai/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->provinsi_kode .'&b=' . $b->provinsi_nama))) . '" title="Detail Provinsi ' . $b->provinsi_nama . '">' . $b->provinsi_nama . '</a>'; ?>
                            </td>
                            <td>
                                <?php echo number_format($b->jumlah_penyuluh); ?>
                            </td>
                            <td><?php echo number_format($b->jumlah_penyuluh_online); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="text-center text-uppercase">
                        <th colspan="2">total</th>
                        <th><?php echo number_format($d); ?></th>
                        <th><?php echo number_format($e); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jumlah_penyuluh" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="jumlah_penyuluh_online" readonly="" value="<?php echo $e; ?>"/>
<script>
    window.onload = function () {
        var aa, bb;
        aa = $('input[name="jumlah_penyuluh"]').val();
        bb = $('input[name="jumlah_penyuluh_online"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "provinsi_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Penyuluh Agama Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah_penyuluh";
            series.dataFields.categoryX = "provinsi_nama";
            series.tooltipText = "Jumlah Penyuluh non-online {provinsi_nama}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.sequencedInterpolation = true;
            series2.dataFields.valueY = "jumlah_penyuluh_online";
            series2.dataFields.categoryX = "provinsi_nama";
            series2.tooltipText = "Jumlah Penyuluh Online {provinsi_nama}: [bold]{valueY}[/]";
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
            am4core.useTheme(am4themes_animated);
            var b = am4core.create("chartdiv_a", am4charts.PieChart3D);
            b.hiddenState.properties.opacity = 0;
            b.legend = new am4charts.Legend();
            b.data = [
                {country: "Penyuluh non-online", litres: aa},
                {country: "Penyuluh Online", litres: bb}
            ];
            var a = b.series.push(new am4charts.PieSeries3D());
            a.dataFields.value = "litres";
            a.dataFields.category = "country";
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