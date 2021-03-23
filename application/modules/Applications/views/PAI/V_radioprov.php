<?php
$a = json_decode($data);
$c = 0; // jum_radio
$d = 0; // milik_sekolah
$e = 0; // milik_wakaf
$f = 0; // milik_yayasan
$g = 0; // milik_pemerintah
$h = 0; // luas_tanah
$i = 0; // luas_bangunan
$j = 0; // pengurus_laki
$k = 0; // pengurus_perempuan
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Radio_Islam/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            Radio Islam Status Tanah
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
            Radio Islam Pengurus
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv_b"></u></b>
        </div>
        <div id="chartdiv_b" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Radio Islam
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
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="4">status milik</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                        <th colspan="2">pengurus</th>
                    </tr>
                    <tr>
                        <th>sekolah</th>
                        <th>wakaf</th>
                        <th>yayasan</th>
                        <th>pemerintah</th>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_radio; // jum_radio
                        $d += $b->milik_sekolah; // milik_sekolah
                        $e += $b->milik_wakaf; // milik_wakaf
                        $f += $b->milik_yayasan; // milik_yayasan
                        $g += $b->milik_pemerintah; // milik_pemerintah
                        $h += $b->luas_tanah; // luas_tanah
                        $i += $b->luas_bangunan; // luas_bangunan
                        $j += $b->pengurus_laki; // pengurus_laki
                        $k += $b->pengurus_perempuan; // pengurus_perempuan
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Radio_Islam/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $b->city_id . '&d=' . $b->city_title))) . '" title="Detail ' . $b->city_title . '">' . $b->city_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_radio); ?></td>
                            <td><?php echo number_format($b->milik_sekolah); ?></td>
                            <td><?php echo number_format($b->milik_wakaf); ?></td>
                            <td><?php echo number_format($b->milik_yayasan); ?></td>
                            <td><?php echo number_format($b->milik_pemerintah); ?></td>
                            <td><?php echo number_format($b->luas_tanah); ?></td>
                            <td><?php echo number_format($b->luas_bangunan); ?></td>
                            <td><?php echo number_format($b->pengurus_laki); ?></td>
                            <td><?php echo number_format($b->pengurus_perempuan); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <td><?php echo number_format($c); ?></td>
                        <td><?php echo number_format($d); ?></td>
                        <td><?php echo number_format($e); ?></td>
                        <td><?php echo number_format($f); ?></td>
                        <td><?php echo number_format($g); ?></td>
                        <td><?php echo number_format($h); ?></td>
                        <td><?php echo number_format($i); ?></td>
                        <td><?php echo number_format($j); ?></td>
                        <td><?php echo number_format($k); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum_radio" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="milik_sekolah" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="milik_wakaf" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="milik_yayasan" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="milik_pemerintah" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="luas_tanah" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="luas_bangunan" readonly="" value="<?php echo $i; ?>"/>
<input type="hidden" name="pengurus_laki" readonly="" value="<?php echo $j; ?>"/>
<input type="hidden" name="pengurus_perempuan" readonly="" value="<?php echo $k; ?>"/>
<input type="hidden" name="tanah" readonly="" value="<?php echo $d + $e + $f + $g; ?>"/>
<input type="hidden" name="pengurus" readonly="" value="<?php echo $j + $k; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k;
        a = $('input[name="jum_radio"]').val();
        b = $('input[name="milik_sekolah"]').val();
        c = $('input[name="milik_wakaf"]').val();
        d = $('input[name="milik_yayasan"]').val();
        e = $('input[name="milik_pemerintah"]').val();
        f = $('input[name="luas_tanah"]').val();
        g = $('input[name="luas_bangunan"]').val();
        h = $('input[name="pengurus_laki"]').val();
        i = $('input[name="pengurus_perempuan"]').val();
        j = $('input[name="tanah"]').val();
        k = $('input[name="pengurus"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Radio Islam: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv').innerText = "Total Data Status Tanah: " + numeral(j).format('0,0');
        document.getElementById('title_chartdiv').innerText = "Total Data Pengurus: " + numeral(k).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
            categoryAxis.dataFields.category = "city_title";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Radio Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_radio";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Jumlah Data {city_title}: [bold]{valueY}[/]";
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
            var chart = am4core.create("chartdiv_a", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = [
                {"kategori": "Milik Sekolah", "jumlah": b},
                {"kategori": "Milik Wakaf", "jumlah": c},
                {"kategori": "Milik Yayasan", "jumlah": d},
                {"kategori": "Milik Pemerintah", "jumlah": e}
            ];
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Kategori Status Tanah';
            categoryAxis.dataFields.category = "kategori";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Radio Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "kategori";
            series.tooltipText = "Jumlah {kategori}: [bold]{valueY}[/]";
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
            var b = am4core.create("chartdiv_b", am4charts.PieChart3D);
            b.hiddenState.properties.opacity = 0;
            b.legend = new am4charts.Legend();
            b.data = [
                {country: "Pengurus Laki-Laki", litres: h},
                {country: "Pengurus Perempuan", litres: i}
            ];
            var a = b.series.push(new am4charts.PieSeries3D());
            a.dataFields.value = "litres";
            a.dataFields.category = "country";
        });
        $("table").dataTable({
            ServerSide: true,
            order: [[0, "asc"]],
            paging: false,
            ordering: true,
            info: true,
            processing: false,
            deferRender: true,
            scrollCollapse: true,
            scrollX: true,
            scrollY: "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {extend: "print", footer: true},
                {extend: "copyHtml5", footer: true},
                {extend: "excelHtml5", footer: true},
                {extend: "csvHtml5", footer: true},
                {extend: "pdfHtml5", footer: true}
            ]
        });
    };
</script>