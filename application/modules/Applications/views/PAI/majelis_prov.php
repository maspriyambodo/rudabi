<?php
$a = json_decode($data);
$c = 0; //jum_majelis
$d = 0; //jum_papan
$e = 0; //jum_lemari
$f = 0; //jum_meja
$g = 0; //jum_alas
$h = 0; //jum_komputer
$i = 0; //jum_plang
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/PAI/Majelis/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
            Data Fasilitas Majelis Taklim
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
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">majelis</th>
                        <th colspan="6">fasilitas majelis taklim</th>
                    </tr>
                    <tr>
                        <th>papan</th>
                        <th>lemari</th>
                        <th>meja</th>
                        <th>alas</th>
                        <th>komputer</th>
                        <th>plang</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_majelis; //jum_majelis
                        $d += $b->jum_papan; //jum_papan
                        $e += $b->jum_lemari; //jum_lemari
                        $f += $b->jum_meja; //jum_meja
                        $g += $b->jum_alas; //jum_alas
                        $h += $b->jum_komputer; //jum_komputer
                        $i += $b->jum_plang; //jum_plang
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Majelis/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $b->city_id . '&d=' . $b->city_title))) . '">' . $b->city_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_majelis); ?></td>
                            <td><?php echo number_format($b->jum_papan); ?></td>
                            <td><?php echo number_format($b->jum_lemari); ?></td>
                            <td><?php echo number_format($b->jum_meja); ?></td>
                            <td><?php echo number_format($b->jum_alas); ?></td>
                            <td><?php echo number_format($b->jum_komputer); ?></td>
                            <td><?php echo number_format($b->jum_plang); ?></td>
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
                        <th><?php echo number_format($h); ?></th>
                        <th><?php echo number_format($i); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum_majelis" readonly="" value="<?php echo $c; ?>"/>
<input type="hidden" name="jum_papan" readonly="" value="<?php echo $d; ?>"/>
<input type="hidden" name="jum_lemari" readonly="" value="<?php echo $e; ?>"/>
<input type="hidden" name="jum_meja" readonly="" value="<?php echo $f; ?>"/>
<input type="hidden" name="jum_alas" readonly="" value="<?php echo $g; ?>"/>
<input type="hidden" name="jum_komputer" readonly="" value="<?php echo $h; ?>"/>
<input type="hidden" name="jum_plang" readonly="" value="<?php echo $i; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g;
        a = $('input[name="jum_majelis"]').val();
        b = $('input[name="jum_papan"]').val();
        c = $('input[name="jum_lemari"]').val();
        d = $('input[name="jum_meja"]').val();
        e = $('input[name="jum_alas"]').val();
        f = $('input[name="jum_komputer"]').val();
        g = $('input[name="jum_plang"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Majelim Taklim: " + numeral(a).format('0,0');
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
            valueAxis.title.text = "Jumlah Majelis Taklim";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_majelis";
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
                {"kategori": "Papan", "jumlah": b},
                {"kategori": "Lemari", "jumlah": c},
                {"kategori": "Meja", "jumlah": d},
                {"kategori": "Alas", "jumlah": e},
                {"kategori": "Komputer", "jumlah": f},
                {"kategori": "Plang", "jumlah": g}
            ];
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Fasilitas Majelis Taklim';
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
            valueAxis.title.text = "Jumlah Fasilitas";
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