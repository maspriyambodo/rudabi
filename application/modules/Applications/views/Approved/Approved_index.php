<?php
if ($msg == false) {
    $hide = "hidden";
    $msgs = null;
} else {
    $hide = null;
    $msgs = "hidden";
}
?>
<div class="card card-custom" data-card="true" id="kt_card_1" <?php echo $msgs; ?>>
    <div class="card-header">
        <div class="card-title">
            Data Approved per Provinsi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b id="title_chartdiv"></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;" <?php echo $msgs; ?>></div>
<div class="card card-custom" data-card="true" id="kt_card_1" <?php echo $msgs; ?>>
    <div class="card-header">
        <div class="card-title">
            Data Status Bangunan
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
<div class="clear" style="margin:5% 0px;" <?php echo $msgs; ?>></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-2 col-form-label">Pilih Tahun</label>
            <div class="col-4">
                <select name="tahun" class="form-control form-control-solid" onchange="Tahun()">
                    <?php
                    $usul_tahun = json_decode($pertahun);
                    foreach ($usul_tahun as $usul_tahun) {
                        if ($usul_tahun->usul_tahun == $param[0]) {
                            $selected = 'selected=""';
                        } else {
                            $selected = null;
                        }
                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $usul_tahun->usul_tahun)) . '" ' . $selected . '>' . $usul_tahun->usul_tahun . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr>
        <p>{msg}</p>
        <div class="table-responsive" <?php echo $msgs; ?>>
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>jumlah<br>data</th>
                        <th>luas tanah</th>
                        <th>penghapusan<br>gedung</th>
                        <th>tanah<br>kosong</th>
                        <th>perluasan<br>bangunan</th>
                        <th>dipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $approved = json_decode($data);
                    $totjum_kabkot = 0;
                    $totluas_tanah = 0;
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    if (empty($approved)) {
                        $approved = [];
                    }
                    foreach ($approved as $approved) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $approved->propinsi_nama . '&b=' . $param[0] . '&c=' . $approved->usul_propinsi));
                                echo '<a href=' . base_url('Applications/Sekretariat/Approved/Provinsi?key=' . $url) . '>' . $approved->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $totjum_kabkot += $approved->jum_kabkot;
                                echo $approved->jum_kabkot;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace(',', '', $approved->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo $approved->luas_tanah;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace(',', '', $approved->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo $approved->penghapusan_gedung;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace(',', '', $approved->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo $approved->tanah_kosong;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $approved->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo $approved->perluasan_bangunan;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace(',', '', $approved->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo $approved->nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>
                            jumlah
                        </th>
                        <th><?php echo number_format($totjum_kabkot); ?></th>
                        <th><?php echo number_format($totluas_tanah); ?></th>
                        <th><?php echo number_format($totpenghapusan_gedung); ?></th>
                        <th><?php echo number_format($tottanah_kosong); ?></th>
                        <th><?php echo number_format($totperluasan_bangunan); ?></th>
                        <th><?php echo number_format($totnilai_dipa); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "Sekertariat/Approved/index?key=" + a;
    }
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data Approved " + <?php echo $totjum_kabkot; ?>;
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
            valueAxis.title.text = "Jumlah Data Approved Usulan";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_kabkot";
            series.dataFields.categoryX = "propinsi_nama";
            series.clustered = false;
            series.tooltipText = "Jumlah Approved Usulan {categoryX}: [bold]{valueY}[/]";
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    "country": "Penghapusan Gedung",
                    "litres": <?php echo $totpenghapusan_gedung; ?>
                },
                {
                    "country": "Tanah Kosong",
                    "litres": <?php echo $tottanah_kosong; ?>
                },
                {
                    "country": "Perluasan Bangunan",
                    "litres": <?php echo $totperluasan_bangunan; ?>
                }
            ];

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
    };
</script>