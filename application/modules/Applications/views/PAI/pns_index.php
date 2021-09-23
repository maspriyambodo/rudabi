<?php
$a = json_decode($data);
$c = 0; //dt_pns
$d = 0; //dt_laki
$e = 0; //dt_perempuan
$f = 0; //dt_kawin
$g = 0; //dt_blmkawin
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Penyuluh PNS
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
            Data Jenis Kelamin &amp; Status Kawin
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
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Penyuluh Agama Islam
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
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">jenis kelamin</th>
                        <th colspan="2">status kawin</th>
                    </tr>
                    <tr>
                        <th>laki</th>
                        <th>perempuan</th>
                        <th>kawin</th>
                        <th>belum</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_pns; //dt_pns
                        $d += $b->dt_laki; //dt_laki
                        $e += $b->dt_perempuan; //dt_perempuan
                        $f += $b->dt_kawin; //dt_kawin
                        $g += $b->dt_blmkawin; //dt_blmkawin
                        ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Pns/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->penyuluh_pns_provinsi . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->dt_pns); ?></td>
                            <td><?php echo number_format($b->dt_laki); ?></td>
                            <td><?php echo number_format($b->dt_perempuan); ?></td>
                            <td><?php echo number_format($b->dt_kawin); ?></td>
                            <td><?php echo number_format($b->dt_blmkawin); ?></td>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_pns" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="dt_laki" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="dt_perempuan" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="dt_kawin" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="dt_blmkawin" readonly="" value="<?php echo $g; ?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var a, b, c, d, e;
        a = $('input[name="dt_pns"]').val();
        b = $('input[name="dt_laki"]').val();
        c = $('input[name="dt_perempuan"]').val();
        d = $('input[name="dt_kawin"]').val();
        e = $('input[name="dt_blmkawin"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Penyuluh PNS: " + numeral(a).format('0,0');
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
            valueAxis.title.text = "Jumlah Penyuluh PNS";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_pns";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Penyuluh PNS {province_title}: [bold]{valueY}[/]";
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
            var data = [{
                    "country": "Dummy",
                    "disabled": true,
                    "litres": a,
                    "color": am4core.color("#dadada"),
                    "opacity": 0.3,
                    "strokeDasharray": "4,4"
                }, {
                    "country": "Laki-Laki",
                    "litres": b
                }, {
                    "country": "Perempuan",
                    "litres": c
                },
                {
                    "country": "Kawin",
                    "litres": d
                }, {
                    "country": "Belum Kawin",
                    "litres": e
                }
            ];
            var container = am4core.create("chartdiv_a", am4core.Container);
            container.width = am4core.percent(100);
            container.height = am4core.percent(100);
            container.layout = "horizontal";

            container.events.on("maxsizechanged", function () {
                chart1.zIndex = 0;
                separatorLine.zIndex = 1;
                dragText.zIndex = 2;
                chart2.zIndex = 3;
            });

            var chart1 = container.createChild(am4charts.PieChart);
            chart1.fontSize = 11;
            chart1.hiddenState.properties.opacity = 0;
            chart1.data = data;
            chart1.radius = am4core.percent(70);
            chart1.innerRadius = am4core.percent(40);
            chart1.zIndex = 1;

            var series1 = chart1.series.push(new am4charts.PieSeries());
            series1.dataFields.value = "litres";
            series1.dataFields.category = "country";
            series1.colors.step = 2;
            series1.alignLabels = false;
            series1.labels.template.bent = true;
            series1.labels.template.radius = 3;
            series1.labels.template.padding(0, 0, 0, 0);

            var sliceTemplate1 = series1.slices.template;
            sliceTemplate1.cornerRadius = 5;
            sliceTemplate1.draggable = true;
            sliceTemplate1.inert = true;
            sliceTemplate1.propertyFields.fill = "color";
            sliceTemplate1.propertyFields.fillOpacity = "opacity";
            sliceTemplate1.propertyFields.stroke = "color";
            sliceTemplate1.propertyFields.strokeDasharray = "strokeDasharray";
            sliceTemplate1.strokeWidth = 1;
            sliceTemplate1.strokeOpacity = 1;

            var zIndex = 5;

            sliceTemplate1.events.on("down", function (event) {
                event.target.toFront();
                var series = event.target.dataItem.component;
                series.chart.zIndex = zIndex++;
            });

            series1.ticks.template.disabled = true;

            sliceTemplate1.states.getKey("active").properties.shiftRadius = 0;

            sliceTemplate1.events.on("dragstop", function (event) {
                handleDragStop(event);
            });
            var separatorLine = container.createChild(am4core.Line);
            separatorLine.x1 = 0;
            separatorLine.y2 = 300;
            separatorLine.strokeWidth = 3;
            separatorLine.stroke = am4core.color("#dadada");
            separatorLine.valign = "middle";
            separatorLine.strokeDasharray = "5,5";

            var dragText = container.createChild(am4core.Label);
            dragText.text = "Drag slices over the line";
            dragText.rotation = 90;
            dragText.valign = "middle";
            dragText.align = "center";
            dragText.paddingBottom = 5;
            var chart2 = container.createChild(am4charts.PieChart);
            chart2.hiddenState.properties.opacity = 0;
            chart2.fontSize = 11;
            chart2.radius = am4core.percent(70);
            chart2.data = data;
            chart2.innerRadius = am4core.percent(40);
            chart2.zIndex = 1;

            var series2 = chart2.series.push(new am4charts.PieSeries());
            series2.dataFields.value = "litres";
            series2.dataFields.category = "country";
            series2.colors.step = 2;

            series2.alignLabels = false;
            series2.labels.template.bent = true;
            series2.labels.template.radius = 3;
            series2.labels.template.padding(0, 0, 0, 0);
            series2.labels.template.propertyFields.disabled = "disabled";

            var sliceTemplate2 = series2.slices.template;
            sliceTemplate2.copyFrom(sliceTemplate1);

            series2.ticks.template.disabled = true;

            function handleDragStop(event) {
                var targetSlice = event.target;
                var dataItem1;
                var dataItem2;
                var slice1;
                var slice2;

                if (series1.slices.indexOf(targetSlice) != -1) {
                    slice1 = targetSlice;
                    slice2 = series2.dataItems.getIndex(targetSlice.dataItem.index).slice;
                } else if (series2.slices.indexOf(targetSlice) != -1) {
                    slice1 = series1.dataItems.getIndex(targetSlice.dataItem.index).slice;
                    slice2 = targetSlice;
                }


                dataItem1 = slice1.dataItem;
                dataItem2 = slice2.dataItem;

                var series1Center = am4core.utils.spritePointToSvg({x: 0, y: 0}, series1.slicesContainer);
                var series2Center = am4core.utils.spritePointToSvg({x: 0, y: 0}, series2.slicesContainer);

                var series1CenterConverted = am4core.utils.svgPointToSprite(series1Center, series2.slicesContainer);
                var series2CenterConverted = am4core.utils.svgPointToSprite(series2Center, series1.slicesContainer);
                var targetSlicePoint = am4core.utils.spritePointToSvg({x: targetSlice.tooltipX, y: targetSlice.tooltipY}, targetSlice);

                if (targetSlice == slice1) {
                    if (targetSlicePoint.x > container.pixelWidth / 2) {
                        var value = dataItem1.value;

                        dataItem1.hide();

                        var animation = slice1.animate([{property: "x", to: series2CenterConverted.x}, {property: "y", to: series2CenterConverted.y}], 400);
                        animation.events.on("animationprogress", function (event) {
                            slice1.hideTooltip();
                        });

                        slice2.x = 0;
                        slice2.y = 0;

                        dataItem2.show();
                    } else {
                        slice1.animate([{property: "x", to: 0}, {property: "y", to: 0}], 400);
                    }
                }
                if (targetSlice == slice2) {
                    if (targetSlicePoint.x < container.pixelWidth / 2) {

                        var value = dataItem2.value;

                        dataItem2.hide();

                        var animation = slice2.animate([{property: "x", to: series1CenterConverted.x}, {property: "y", to: series1CenterConverted.y}], 400);
                        animation.events.on("animationprogress", function (event) {
                            slice2.hideTooltip();
                        });

                        slice1.x = 0;
                        slice1.y = 0;
                        dataItem1.show();
                    } else {
                        slice2.animate([{property: "x", to: 0}, {property: "y", to: 0}], 400);
                    }
                }

                toggleDummySlice(series1);
                toggleDummySlice(series2);

                series1.hideTooltip();
                series2.hideTooltip();
            }

            function toggleDummySlice(series) {
                var show = true;
                for (var i = 1; i < series.dataItems.length; i++) {
                    var dataItem = series.dataItems.getIndex(i);
                    if (dataItem.slice.visible && !dataItem.slice.isHiding) {
                        show = false;
                    }
                }

                var dummySlice = series.dataItems.getIndex(0);
                if (show) {
                    dummySlice.show();
                } else {
                    dummySlice.hide();
                }
            }

            series2.events.on("datavalidated", function () {

                var dummyDataItem = series2.dataItems.getIndex(0);
                dummyDataItem.show(0);
                dummyDataItem.slice.draggable = false;
                dummyDataItem.slice.tooltipText = undefined;

                for (var i = 1; i < series2.dataItems.length; i++) {
                    series2.dataItems.getIndex(i).hide(0);
                }
            });

            series1.events.on("datavalidated", function () {
                var dummyDataItem = series1.dataItems.getIndex(0);
                dummyDataItem.hide(0);
                dummyDataItem.slice.draggable = false;
                dummyDataItem.slice.tooltipText = undefined;
            });

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