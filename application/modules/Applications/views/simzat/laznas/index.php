<?php
$b = json_decode($data);
?>

<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Laznas
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Website</th>
                        <th>Muzakki</th>
                        <th>Mustahik</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>No. Handphone</th>
                        <th>No. Telepon</th>
                        <th>Verified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($b as $key => $c) {
                        $d += $c->name;
                        $e += $c->alamat;
                        $f += $c->website;
                        $g += $c->muzakki;
                        $h += $c->mustahik;
                        $i += $c->lat;
                        $j += $c->lng;
                        $k += $c->no_hp;
                        $l += $c->no_telp;
                        $m += $c->verified;
                        ?>
                        <tr>
                            <td><?php echo $c->name; ?></td>
                            <td><?php echo $c->alamat; ?></td>
                            <td><?php echo $c->website; ?></td>
                            <td><?php echo $c->muzakki; ?></td>
                            <td><?php echo $c->mustahik; ?></td>
                            <td><?php echo $c->lat; ?></td>
                            <td><?php echo $c->lng; ?></td>
                            <td><?php echo $c->no_hp; ?></td>
                            <td><?php echo $c->no_telp; ?></td>
                            <td><?php echo $c->verified; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <!-- <tfoot class="text-center text-uppercase">
                    <tr>
                        <td>total</td>
                        <td><?php //echo number_format($d); ?></td>
                    </tr>
                </tfoot> -->
            </table>
        </div>
    </div>
</div>

<script>
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