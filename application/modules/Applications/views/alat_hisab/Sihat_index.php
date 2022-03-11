<?php
$a = json_decode($data);
$c = 0; //jum_teropong
$d = 0; //jum_theodolit
$e = 0; //jum_mizwala
$f = 0; //jum_gps
$g = 0; //jum_kompas
$h = 0; //jum_rubu
$i = 0; //jum_binoculer
$j = 0; //jum_kalkulator
$k = 0; //jum_altimeter
$l = 0; //jum_gawanglokasi
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Alat Hisab Rukyat</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Jumlah Alat Hisab Rukyat
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
            sumber data: <a href="https://sihat.kemenag.go.id/v2/index.php/login" target="new">sihat</a>
        </div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Alat Bantu Hisab Rukyat
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
                        <th>teropong</th>
                        <th>altimeter</th>
                        <th>theodolit</th>
                        <th>mizwala</th>
                        <th>gps</th>
                        <th>kompas</th>
                        <th>rubu</th>
                        <th>binoculer</th>
                        <th>kalkulator</th>
                        <th>gawang<br>lokasi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_teropong; //jum_teropong
                        $d += $b->jum_theodolit; //jum_theodolit
                        $e += $b->jum_mizwala; //jum_mizwala
                        $f += $b->jum_gps; //jum_gps
                        $g += $b->jum_kompas; //jum_kompas
                        $h += $b->jum_rubu; //jum_rubu
                        $i += $b->jum_binoculer; //jum_binoculer
                        $j += $b->jum_kalkulator; //jum_kalkulator
                        $k += $b->jum_altimeter; //jum_altimeter
                        $l += $b->jum_gawanglokasi; //jum_gawanglokasi
                        ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo '<a href="' . base_url('Applications/Binsyar/Sihat/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->alat_provinsi . '&b=' . $b->province_title))) . '" title="Detail Provinsi ' . $b->province_title . '">' . $b->province_title . '</a>'; ?></td>
                            <td><?php echo $b->jum_teropong; ?></td>
                            <td><?php echo $b->jum_altimeter; ?></td>
                            <td><?php echo $b->jum_theodolit; ?></td>
                            <td><?php echo $b->jum_mizwala; ?></td>
                            <td><?php echo $b->jum_gps; ?></td>
                            <td><?php echo $b->jum_kompas; ?></td>
                            <td><?php echo $b->jum_rubu; ?></td>
                            <td><?php echo $b->jum_binoculer; ?></td>
                            <td><?php echo $b->jum_kalkulator; ?></td>
                            <td><?php echo $b->jum_gawanglokasi; ?></td>
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
                        <th><?php echo number_format($l); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="https://sihat.kemenag.go.id/v2/index.php/login" target="new">sihat</a>
        </div>
    </div>
</div>
<input type="hidden" name="jum_teropong" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="jum_theodolit" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="jum_mizwala" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="jum_gps" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="jum_kompas" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="jum_rubu" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="jum_binoculer" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="jum_kalkulator" readonly="" value="<?php echo $j; ?>"/>
<input type="hidden" name="jum_altimeter" readonly="" value="<?php echo $k; ?>"/>
<input type="hidden" name="jum_gawanglokasi" readonly="" value="<?php echo $l; ?>"/>
<input type="hidden" name="tot_al" readonly="" value="<?php echo $c + $d + $e + $f + $g + $h + $i + $j + $k + $l; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k;
        a = $('input[name="jum_teropong"]').val();
        b = $('input[name="jum_theodolit"]').val();
        c = $('input[name="jum_mizwala"]').val();
        d = $('input[name="jum_gps"]').val();
        e = $('input[name="jum_kompas"]').val();
        f = $('input[name="jum_rubu"]').val();
        g = $('input[name="jum_binoculer"]').val();
        h = $('input[name="jum_kalkulator"]').val();
        i = $('input[name="jum_altimeter"]').val();
        j = $('input[name="jum_gawanglokasi"]').val();
        k = $('input[name="tot_al"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Alat Bantu Hisab Rukyat: " + numeral(k).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = [
                {
                    "alat": "Kompas",
                    "jumlah": e
                },
                {
                    "alat": "Kalkulator",
                    "jumlah": h
                },
                {
                    "alat": "GPS",
                    "jumlah": d
                },
                {
                    "alat": "Theodolit",
                    "jumlah": b
                },
                {
                    "alat": "Mizwala",
                    "jumlah": c
                },
                {
                    "alat": "Teropong",
                    "jumlah": a
                },
                {
                    "alat": "Gawang Lokasi",
                    "jumlah": j
                },
                {
                    "alat": "Rubu",
                    "jumlah": f
                },
                {
                    "alat": "Binoculer",
                    "jumlah": g
                },
                {
                    "alat": "Altimeter",
                    "jumlah": i
                }
            ];
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Alat Bantu Hisab Rukyat';
            categoryAxis.dataFields.category = "alat";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Alat Hisab Rukyat";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "alat";
            series.tooltipText = "Jumlah {alat}: [bold]{valueY}[/]";
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
            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "{valueY}";
            valueLabel.label.fontSize = 10;
            valueLabel.label.verticalCenter = "top";
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
