<?php
$a = json_decode($data);
$c = 0; //dt_wakaf
$d = 0; //dt_luas
$e = 0; //dt_sertifikat
$f = 0; //dt_luas_sertifikat
$g = 0; //dt_nonsertifikat
$h = 0; //dt_luas_nonsertifikat
$i = 0; //pengguna_masjid
$j = 0; //pengguna_musholla
$k = 0; //pengguna_sekolah
$l = 0; //pengguna_pesantren
$m = 0; //pengguna_makam
$n = 0; //pengguna_sosial
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Tanah Wakaf
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
            Data Penggunaan Tanah Wakaf
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
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Wakaf
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
                        <th rowspan="2">jumlah<br>data</th>
                        <th rowspan="2">luas (Ha)</th>
                        <th colspan="2">Sudah Sertifikat</th>
                        <th colspan="2">Belum Sertifikat</th>
                        <th colspan="6">data penggunaan tanah wakaf</th>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>luas (Ha)</th>
                        <th>Jumlah</th>
                        <th>luas (Ha)</th>
                        <th>masjid</th>
                        <th>mushalla</th>
                        <th>sekolah</th>
                        <th>pesantren</th>
                        <th>makam</th>
                        <th>sosial</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->dt_wakaf); //dt_wakaf
                        $d += $b->dt_luas; //dt_luas
                        $e += str_replace(',', '', $b->dt_sertifikat); //dt_sertifikat
                        $f += $b->dt_luas_sertifikat; //dt_luas_sertifikat
                        $g += str_replace(',', '', $b->dt_nonsertifikat); //dt_nonsertifikat
                        $h += $b->dt_luas_nonsertifikat; //dt_luas_nonsertifikat
                        $i += str_replace(',', '', $b->pengguna_masjid); //pengguna_masjid
                        $j += str_replace(',', '', $b->pengguna_musholla); //pengguna_musholla
                        $k += str_replace(',', '', $b->pengguna_sekolah); //pengguna_sekolah
                        $l += str_replace(',', '', $b->pengguna_pesantren); //pengguna_pesantren
                        $m += str_replace(',', '', $b->pengguna_makam); //pengguna_makam
                        $n += str_replace(',', '', $b->pengguna_sosial); //pengguna_sosial
                        ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo '<a href="' . base_url('Applications/Siwak/Wakaf/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->Lokasi_Prop . '&b=' . $b->lokasi_nama))) . '" title="Detail Provinsi ' . $b->lokasi_nama . '">' . $b->lokasi_nama . '</a>' ?></td>
                            <td><?php echo $b->dt_wakaf; ?></td>
                            <td><?php echo number_format($b->dt_luas / 10000, 2, ',', '.'); ?></td>
                            <td><?php echo str_replace(',', '.', number_format($b->dt_sertifikat)); ?></td>
                            <td><?php echo number_format($b->dt_luas_sertifikat / 10000, 2, ',', '.'); ?></td>
                            <td><?php echo $b->dt_nonsertifikat; ?></td>
                            <td><?php echo number_format($b->dt_luas_nonsertifikat / 10000, 2, ',', '.'); ?></td>
                            <td><?php echo $b->pengguna_masjid; ?></td>
                            <td><?php echo $b->pengguna_musholla; ?></td>
                            <td><?php echo $b->pengguna_sekolah; ?></td>
                            <td><?php echo $b->pengguna_pesantren; ?></td>
                            <td><?php echo $b->pengguna_makam; ?></td>
                            <td><?php echo $b->pengguna_sosial; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
                        <th><?php echo number_format($c); ?></th>
                        <th><?php echo number_format($d / 10000, 2, ',', '.'); ?></th>
                        <th><?php echo number_format($e); ?></th>
                        <th><?php echo number_format($f / 10000, 2, ',', '.'); ?></th>
                        <th><?php echo number_format($g); ?></th>
                        <th><?php echo number_format($h / 10000, 2, ',', '.'); ?></th>
                        <th><?php echo number_format($i); ?></th>
                        <th><?php echo number_format($j); ?></th>
                        <th><?php echo number_format($k); ?></th>
                        <th><?php echo number_format($l); ?></th>
                        <th><?php echo number_format($m); ?></th>
                        <th><?php echo number_format($n); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_wakaf" readonly="" value="<?php echo number_format($c); ?>"/>
<input type="hidden" name="dt_luas" readonly="" value="<?php echo number_format($d / 10000, 2, ',', '.'); ?>"/>
<input type="hidden" name="dt_sertifikat" readonly="" value="<?php echo number_format($e); ?>"/>
<input type="hidden" name="dt_luas_sertifikat" readonly="" value="<?php echo number_format($f); ?>"/>
<input type="hidden" name="dt_nonsertifikat" readonly="" value="<?php echo number_format($g); ?>"/>
<input type="hidden" name="dt_luas_nonsertifikat" readonly="" value="<?php echo number_format($h); ?>"/>
<input type="hidden" name="pengguna_masjid" readonly="" value="<?php echo number_format($i); ?>"/>
<input type="hidden" name="pengguna_musholla" readonly="" value="<?php echo number_format($j); ?>"/>
<input type="hidden" name="pengguna_sekolah" readonly="" value="<?php echo number_format($k); ?>"/>
<input type="hidden" name="pengguna_pesantren" readonly="" value="<?php echo number_format($l); ?>"/>
<input type="hidden" name="pengguna_makam" readonly="" value="<?php echo number_format($m); ?>"/>
<input type="hidden" name="pengguna_sosial" readonly="" value="<?php echo number_format($n); ?>"/>
<input type="hidden" name="pengguna_tot" readonly="" value="<?php echo $i + $j + $k + $l + $m + $n; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k, l, m;
        a = $('input[name="dt_wakaf"]').val();
        b = $('input[name="dt_luas"]').val();
        c = $('input[name="dt_sertifikat"]').val();
        d = $('input[name="dt_luas_sertifikat"]').val();
        e = $('input[name="dt_nonsertifikat"]').val();
        f = $('input[name="dt_luas_nonsertifikat"]').val();
        g = $('input[name="pengguna_masjid"]').val();
        h = $('input[name="pengguna_musholla"]').val();
        i = $('input[name="pengguna_sekolah"]').val();
        j = $('input[name="pengguna_pesantren"]').val();
        k = $('input[name="pengguna_makam"]').val();
        l = $('input[name="pengguna_sosial"]').val();
        m = $('input[name="pengguna_tot"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Tanah Wakaf: " + a;
        document.getElementById('title_chartdiv_a').innerText = "Total Data Penggunaan Tanah: " +  numeral(m).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "lokasi_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Tanah Wakaf";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_wakaf";
            series.dataFields.categoryX = "lokasi_nama";
            series.tooltipText = "Jumlah Data Provinsi {lokasi_nama}: [bold]{valueY}[/]";
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
            var bb = am4core.create("chartdiv_a", am4charts.PieChart3D);
            bb.hiddenState.properties.opacity = 0;
            bb.legend = new am4charts.Legend();
            bb.data = [
                {country: "Masjid", litres: g},
                {country: "Mushalla", litres: h},
                {country: "Sekolah", litres: i},
                {country: "Pesantren", litres: j},
                {country: "Makam", litres: k},
                {country: "Sosial", litres: l}
            ];
            var aa = bb.series.push(new am4charts.PieSeries3D());
            aa.dataFields.value = "litres";
            aa.dataFields.category = "country";
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