<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Jumlah Satker per Provinsi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="fas fa-chevron-down"></i>
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
            Data Nama &amp; Kode Satker
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv_b" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Satker per Provinsi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah satker</th>
                        <th colspan="2">nama satker</th>
                        <th colspan="2">kode satker</th>
                    </tr>
                    <tr>
                        <th>valid</th>
                        <th>invalid</th>
                        <th>valid</th>
                        <th>invalid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mpsdvm = json_decode($data);
                    $totjum_kab = 0;
                    $totada_nama_satker = 0;
                    $totnon_nama_satker = 0;
                    $totada_kd_satker = 0;
                    $totnon_kd_satker = 0;
                    foreach ($mpsdvm as $value) {
                        ?>
                        <tr>
                            <td>
                                <a href="<?php echo base_url('Applications/Sekretariat/Satker/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $value->kab_propinsi_id . '&b=' . $value->propinsi_nama)) . ''); ?>"><?php echo $value->propinsi_nama ?></a>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kab = str_replace(',', '', $value->jum_kab);
                                $totjum_kab += $jum_kab;
                                echo number_format($jum_kab);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ada_nama_satker = str_replace(',', '', $value->ada_nama_satker);
                                $totada_nama_satker += $ada_nama_satker;
                                echo number_format($ada_nama_satker);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $non_nama_satker = str_replace(',', '', $value->non_nama_satker);
                                $totnon_nama_satker += $non_nama_satker;
                                echo number_format($non_nama_satker);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ada_kd_satker = str_replace(',', '', $value->ada_kd_satker);
                                $totada_kd_satker += $ada_kd_satker;
                                echo number_format($ada_kd_satker);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $non_kd_satker = str_replace(',', '', $value->non_kd_satker);
                                $totnon_kd_satker += $non_kd_satker;
                                echo number_format($non_kd_satker);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?php echo number_format($totjum_kab); ?></th>
                        <th><?php echo number_format($totada_nama_satker); ?></th>
                        <th><?php echo number_format($totnon_nama_satker); ?></th>
                        <th><?php echo number_format($totada_kd_satker); ?></th>
                        <th><?php echo number_format($totnon_kd_satker); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input name="jum_kab" type="hidden" readonly="" value="<?php echo $totjum_kab; ?>"/>
<input name="ada_nama_satker" type="hidden" readonly="" value="<?php echo $totada_nama_satker; ?>"/>
<input name="non_nama_satker" type="hidden" readonly="" value="<?php echo $totnon_nama_satker; ?>"/>
<input name="ada_kd_satker" type="hidden" readonly="" value="<?php echo $totada_kd_satker; ?>"/>
<input name="non_kd_satker" type="hidden" readonly="" value="<?php echo $totnon_kd_satker; ?>"/>
<script>
    window.onload = function () {
        var a;
        a = $('input[name=jum_kab]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Satker: " + numeral(a).format('0,0');
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
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
            var data = [{
                    "country": "Dummy",
                    "disabled": true,
                    "litres": $('input[name=jum_kab]').val(),
                    "color": am4core.color("#dadada"),
                    "opacity": 0.3,
                    "strokeDasharray": "4,4"
                },
                {
                    "country": "Nama Satker Valid",
                    "litres": $('input[name=ada_nama_satker]').val()

                },
                {
                    "country": "Nama Satker Invalid",
                    "litres": $('input[name=non_nama_satker]').val()

                },
                {
                    "country": "Kode Satker Valid",
                    "litres": $('input[name=ada_kd_satker]').val()

                },
                {
                    "country": "Kode Satker Invalid",
                    "litres": $('input[name=non_kd_satker]').val()

                }
            ];
            var container = am4core.create("chartdiv_b", am4core.Container);
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
            chart1.exporting.menu = new am4core.ExportMenu();

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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "propinsi_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah Satker";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_kab";
            series.dataFields.categoryX = "propinsi_nama";
            series.clustered = false;
            series.tooltipText = "Jumlah Satker di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "{valueY}";
            valueLabel.label.fontSize = 10;
            valueLabel.label.verticalCenter = "top";
            chart.cursor = new am4charts.XYCursor();
            categoryAxis.sortBySeries = series;
        });
    };
</script>