<?php
$a = json_decode($data);
$c = 0; // jumlah_majelis
$d = 0; // pengurus_laki
$e = 0; // pengurus_perempuan
$f = 0; // jumlah_pengurus
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Majelis Taklim per Provinsi
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
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Jenis Kelamin Pengurus Majelis Taklim
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
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Majelis Taklim
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
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            jumlah
                        </th>
                        <th colspan="2">
                            pengurus
                        </th>
                    </tr>
                    <tr>
                        <th>
                            majelis
                        </th>
                        <th>
                            pengurus
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jumlah_majelis; // jumlah_majelis
                        $d += $b->pengurus_laki; // pengurus_laki
                        $e += $b->pengurus_perempuan; // pengurus_perempuan
                        $f += $b->jumlah_pengurus; // jumlah_pengurus
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo '<a href="' . base_url('Applications/PAI/Majelis/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))) . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jumlah_majelis); ?></td>
                            <td><?php echo number_format($b->jumlah_pengurus); ?></td>
                            <td><?php echo number_format($b->pengurus_laki); ?></td>
                            <td><?php echo number_format($b->pengurus_perempuan); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
                        <th><?php echo number_format($c); ?></th>
                        <th><?php echo number_format($f); ?></th>
                        <th><?php echo number_format($d); ?></th>
                        <th><?php echo number_format($e); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jumlah_majelis" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="pengurus_laki" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="pengurus_perempuan" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="jumlah_pengurus" readonly="" value="<?php echo $f; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d;
        a = $('input[name="jumlah_majelis"]').val();
        b = $('input[name="pengurus_laki"]').val();
        c = $('input[name="pengurus_perempuan"]').val();
        d = $('input[name="jumlah_pengurus"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Majelis Taklim: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv_a').innerText = "Total Pengurus Majelis Taklim: " + numeral(d).format('0,0');
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
            valueAxis.title.text = "Daerah Tingkat Provinsi";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah_majelis";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Majelis Taklim Provinsi {province_title}: [bold]{valueY}[/]";
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
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Pengurus Pria",
                    litres: b
                },
                {
                    country: "Pengurus Wanita",
                    litres: c
                }
            ];

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
    };
</script>