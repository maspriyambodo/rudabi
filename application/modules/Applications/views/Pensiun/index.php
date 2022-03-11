<?php
$pensiun = json_decode($data);
$golongan = json_decode($gol);
$ia = 0;
$ib = 0;
$ic = 0;
$id = 0;
$iia = 0;
$iib = 0;
$iic = 0;
$iid = 0;
$iiia = 0;
$iiib = 0;
$iiic = 0;
$iiid = 0;
$iva = 0;
$ivb = 0;
$ivc = 0;
$ivd = 0;
$ive = 0;
$tanpa_golongan = 0;
$b = 0;
$d = 0;
$f = 0;
$h = 0;
$j = 0;
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Pegawai Per Golongan
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
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://sicakep.kemenag.go.id/" target="new">sicakep</a>
        </div>
    </div>
</div>
<div class="clear" style="margin:5%"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Pegawai
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
                        <th colspan="5">golongan i</th>
                        <th colspan="5">golongan ii</th>
                        <th colspan="5">golongan iii</th>
                        <th colspan="6">golongan iv</th>
                        <th rowspan="2">tanpa<br>golongan</th>
                        <th rowspan="2">total</th>
                    </tr>
                    <tr>
                        <th>i/a</th>
                        <th>i/b</th>
                        <th>i/c</th>
                        <th>i/d</th>
                        <th></th>
                        <th>ii/a</th>
                        <th>ii/b</th>
                        <th>ii/c</th>
                        <th>ii/d</th>
                        <th></th>
                        <th>iii/a</th>
                        <th>iii/b</th>
                        <th>iii/c</th>
                        <th>iii/d</th>
                        <th></th>
                        <th>iv/a</th>
                        <th>iv/b</th>
                        <th>iv/c</th>
                        <th>iv/d</th>
                        <th>iv/e</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pensiun as $pensiun_r) { ?>
                        <tr>
                            <td>
                                <?php
                                echo '<a href="' . base_url('Applications/Sekretariat/Pensiun/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $pensiun_r->peg_provinsi . '&b=' . $pensiun_r->propinsi_nama))) . '" title="Detail Provinsi ' . $pensiun_r->propinsi_nama . '">' . $pensiun_r->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ia += $pensiun_r->Ia;
                                echo $pensiun_r->Ia;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ib += $pensiun_r->Ib;
                                echo $pensiun_r->Ib;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ic += $pensiun_r->Ic;
                                echo $pensiun_r->Ic;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $id += $pensiun_r->Id;
                                echo $pensiun_r->Id;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $a = $pensiun_r->Ia + $pensiun_r->Ib + $pensiun_r->Ic + $pensiun_r->Ic;
                                $b += $a;
                                echo '<b>' . $a . '</b>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iia += $pensiun_r->IIa;
                                echo $pensiun_r->IIa;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iib += $pensiun_r->IIb;
                                echo $pensiun_r->IIb;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iic += $pensiun_r->IIc;
                                echo $pensiun_r->IIc;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iid += $pensiun_r->IId;
                                echo $pensiun_r->IId;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $c = $pensiun_r->IIa + $pensiun_r->IIb + $pensiun_r->IIc + $pensiun_r->IId;
                                $d += $c;
                                echo '<b>' . $c . '</b>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iiia += $pensiun_r->IIIa;
                                echo $pensiun_r->IIIa;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iiib += $pensiun_r->IIIb;
                                echo $pensiun_r->IIIb;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iiic += $pensiun_r->IIIc;
                                echo $pensiun_r->IIIc;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iiid += $pensiun_r->IIId;
                                echo $pensiun_r->IIId;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $e = $pensiun_r->IIIa + $pensiun_r->IIIb + $pensiun_r->IIIc + $pensiun_r->IIId;
                                $f += $e;
                                echo '<b>' . $e . '</b>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $iva += $pensiun_r->IVa;
                                echo $pensiun_r->IVa;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ivb += $pensiun_r->IVb;
                                echo $pensiun_r->IVb;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ivc += $pensiun_r->IVc;
                                echo $pensiun_r->IVc;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ivd += $pensiun_r->IVd;
                                echo $pensiun_r->IVd;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $ive += $pensiun_r->IVe;
                                echo $pensiun_r->IVe;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $g = $pensiun_r->IVa + $pensiun_r->IVb + $pensiun_r->IVc + $pensiun_r->IVd + $pensiun_r->IVe;
                                $h += $g;
                                echo '<b>' . $g . '</b>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanpa_golongan += $pensiun_r->tanpa_golongan;
                                echo $pensiun_r->tanpa_golongan;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $i = $a + $c + $e + $g;
                                $j += $i;
                                echo $i;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class = "text-center text-uppercase">
                    <tr>
                        <td>jumlah</td>
                        <td><?php echo $ia ?></td>
                        <td><?php echo $ib ?></td>
                        <td><?php echo $ic ?></td>
                        <td><?php echo $id ?></td>
                        <td><?php echo '<b>' . $b . '</b>' ?></td>
                        <td><?php echo $iia ?></td>
                        <td><?php echo $iib ?></td>
                        <td><?php echo $iic ?></td>
                        <td><?php echo $iid ?></td>
                        <td><?php echo '<b>' . $d . '</b>' ?></td>
                        <td><?php echo $iiia ?></td>
                        <td><?php echo $iiib ?></td>
                        <td><?php echo $iiic ?></td>
                        <td><?php echo $iiid ?></td>
                        <td><?php echo '<b>' . $f . '</b>' ?></td>
                        <td><?php echo $iva ?></td>
                        <td><?php echo $ivb ?></td>
                        <td><?php echo $ivc ?></td>
                        <td><?php echo $ivd ?></td>
                        <td><?php echo $ive ?></td>
                        <td><?php echo '<b>' . $h . '</b>' ?></td>
                        <td><?php echo $tanpa_golongan ?></td>
                        <td><?php echo '<b>' . $j . '</b>' ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://sicakep.kemenag.go.id/" target="new">sicakep</a>
        </div>
    </div>
</div>
<?php
$totgol1 = $ia + $ib + $ic + $id;
$totgol2 = $iia + $iib + $iic + $iid;
$totgol3 = $iiia + $iiib + $iiic + $iiid;
$totgol4 = $iva + $ivb + $ivc + $ivd + $ive;
$total = $totgol1 + $totgol2 + $totgol3 + $totgol4 + $tanpa_golongan;
echo '<input type="hidden" name="totgol1" value="' . $totgol1 . '"/>';
echo '<input type="hidden" name="totgol2" value="' . $totgol2 . '"/>';
echo '<input type="hidden" name="totgol3" value="' . $totgol3 . '"/>';
echo '<input type="hidden" name="totgol4" value="' . $totgol4 . '"/>';
echo '<input type="hidden" name="non_gol" value="' . $tanpa_golongan . '"/>';
echo '<input type="hidden" name="total" value="' . $total . '"/>';
?>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data Pegawai: " + $('input[name="total"]').val();
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
            var data = [
                {
                    "country": "Dummy",
                    "disabled": true,
                    "litres": 1000,
                    "color": am4core.color("#dadada"),
                    "opacity": 0.3,
                    "strokeDasharray": "4,4"
                },
                {
                    "country": "Golongan I",
                    "litres": $('input[name=totgol1]').val()
                },
                {
                    "country": "Golongan II",
                    "litres": $('input[name=totgol2]').val()
                },
                {
                    "country": "Golongan III",
                    "litres": $('input[name=totgol3]').val()
                },
                {
                    "country": "Golongan IV",
                    "litres": $('input[name=totgol4]').val()
                },
                {
                    "country": "Tanpa Golongan",
                    "litres": $('input[name=non_gol]').val()
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
    };
</script>