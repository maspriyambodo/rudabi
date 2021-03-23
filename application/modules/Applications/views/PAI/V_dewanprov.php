<?php
$a = json_decode($data);
$c = 0; // jum_dewan
$d = 0; // jum_perempuan
$e = 0; // jum_pria
$f = 0; // status_kawin
$g = 0; // status_belum_kawin
$h = 0; // pend_smp
$i = 0; // pend_sma
$j = 0; // pend_pesantren
$k = 0; // pend_diploma1
$l = 0; // pend_diploma2
$m = 0; // pend_diploma3
$n = 0; // pend_s1
$o = 0; // pend_s2
$p = 0; // pend_s3
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                <a href="<?php echo base_url('Applications/PAI/Dewan/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
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
            Detail Data Dewan Hakim
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
                        <th rowspan="2">jumlah<br>dewan</th>
                        <th colspan="2">jenis kelamin</th>
                        <th colspan="2">status nikah</th>
                        <th colspan="9">pendidikan</th>
                    </tr>
                    <tr>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                        <th>kawin</th>
                        <th>belum</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>pesantren</th>
                        <th>DI</th>
                        <th>dii</th>
                        <th>diii</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_dewan; // jum_dewan
                        $d += $b->jum_perempuan; // jum_perempuan
                        $e += $b->jum_pria; // jum_pria
                        $f += $b->status_kawin; // status_kawin
                        $g += $b->status_belum_kawin; // status_belum_kawin
                        $h += $b->pend_smp; // pend_smp
                        $i += $b->pend_sma; // pend_sma
                        $j += $b->pend_pesantren; // pend_pesantren
                        $k += $b->pend_diploma1; // pend_diploma1
                        $l += $b->pend_diploma2; // pend_diploma2
                        $m += $b->pend_diploma3; // pend_diploma3
                        $n += $b->pend_s1; // pend_s1
                        $o += $b->pend_s2; // pend_s2
                        $p += $b->pend_s3; // pend_s3
                        ?>
                        <tr>
                            <td style="text-align: left !important;"><?php echo '<a href="' . base_url('Applications/PAI/Dewan/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $b->city_id . '&d=' . $b->city_title))) . '" title="Detail ' . $b->city_title . '">' . $b->city_title . '</a>'; ?></td>
                            <td><?php echo number_format($b->jum_dewan); ?></td>
                            <td><?php echo number_format($b->jum_pria); ?></td>
                            <td><?php echo number_format($b->jum_perempuan); ?></td>
                            <td><?php echo number_format($b->status_kawin); ?></td>
                            <td><?php echo number_format($b->status_belum_kawin); ?></td>
                            <td><?php echo number_format($b->pend_smp); ?></td>
                            <td><?php echo number_format($b->pend_sma); ?></td>
                            <td><?php echo number_format($b->pend_pesantren); ?></td>
                            <td><?php echo number_format($b->pend_diploma1); ?></td>
                            <td><?php echo number_format($b->pend_diploma2); ?></td>
                            <td><?php echo number_format($b->pend_diploma3); ?></td>
                            <td><?php echo number_format($b->pend_s1); ?></td>
                            <td><?php echo number_format($b->pend_s2); ?></td>
                            <td><?php echo number_format($b->pend_s3); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
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
                        <th><?php echo number_format($m); ?></th>
                        <th><?php echo number_format($n); ?></th>
                        <th><?php echo number_format($o); ?></th>
                        <th><?php echo number_format($p); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>        
    </div>
</div>
<input type="hidden" name="jum_dewan" readonly="" value="<?php echo $c; ?>"/>
<script>
    window.onload = function () {
        var a;
        a = $('input[name="jum_dewan"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Dewan Hakim: " + numeral(a).format('0,0');
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
            valueAxis.title.text = "Jumlah Dewan Hakim";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_dewan";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Jumlah Dewan Hakim {city_title}: [bold]{valueY}[/]";
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