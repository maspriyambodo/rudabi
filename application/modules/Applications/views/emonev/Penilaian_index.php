<?php
$tahun = json_decode($data);
$tot = 0;
foreach ($tahun as $value) {
    $tot += $value->jum;
}
?>
<input type="hidden" name="tot" value="<?php echo number_format($tot); ?>"/>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Penilaian Data KUA per Tahun
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
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Penilaian KUA
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
                        <th>no</th>
                        <th>tahun penilaian</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($tahun as $dt_tahun) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>Tahun <?php echo $dt_tahun->tahun; ?></td>
                            <td><?php echo number_format($dt_tahun->jum); ?></td>
                            <td>
                                <a href="<?php echo base_url('Applications/Emonev/Penilaian/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $dt_tahun->tahun))); ?>" class="btn btn-icon btn-success btn-xs" title="Detail Penilaian Tahun <?php echo $dt_tahun->tahun; ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3" style="border-bottom:1px solid #ecf0f3;">total data penilaian kua: <?php echo number_format($tot); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total data penilaian KUA " + $('input[name=tot]').val();
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.paddingRight = 20;
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.title.fontWeight = 800;
            dateAxis.title.text = 'Tahun Penilaian';
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.axisFills.template.disabled = true;
            dateAxis.renderer.ticks.template.disabled = true;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Jumlah Data";
            valueAxis.title.fontWeight = 800;
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.minWidth = 35;
            valueAxis.renderer.axisFills.template.disabled = true;
            valueAxis.renderer.ticks.template.disabled = true;
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "tahun";
            series.dataFields.valueY = "jum";
            series.strokeWidth = 2;
            series.tooltipText = "Penilaian Tahun: {tahun}, Jumlah: [bold]{valueY}[/] data";
            series.propertyFields.stroke = "color";
            series.tooltip.background.cornerRadius = 20;
            series.tooltip.background.strokeOpacity = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.tooltip.label.minWidth = 40;
            series.tooltip.label.minHeight = 40;
            series.tooltip.label.textAlign = "middle";
            series.tooltip.label.textValign = "middle";
            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.circle.strokeWidth = 2;
            bullet.circle.radius = 4;
            bullet.circle.fill = am4core.color("#fff");

            var bullethover = bullet.states.create("hover");
            bullethover.properties.scale = 1.3;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panXY";
            chart.cursor.xAxis = dateAxis;
            chart.cursor.snapToSeries = series;
            chart.cursor = new am4charts.XYCursor();
            var scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX = scrollbarX;
            dateAxis.keepSelection = true;
        });
    };
</script>