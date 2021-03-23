<?php $approved = json_decode($data); ?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Sekretariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[1]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Kategori Data Approved
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv_a"></u></b>
        </div>
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Detail Data Approved Usulan
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>kota/kabupaten</th>
                        <th>jumlah<br>data</th>
                        <th>luas<br>tanah</th>
                        <th>penghapusan<br>gedung</th>
                        <th>tanah<br>kosong</th>
                        <th>perluasan<br>bangunan</th>
                        <th>dipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totjum_kabkot = 0;
                    $totluas_tanah = 0;
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    foreach ($approved as $approved) {
                        ?>
                        <tr>
                            <td>
                                <?php echo '<a href="' . base_url('Applications/Sekretariat/Approved/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $approved->usul_kabupaten . '&e=' . $approved->kab_nama . ''))) . '">' . $approved->kab_nama . '</a>'; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $totjum_kabkot += $approved->jum_kabkot;
                                echo $approved->jum_kabkot;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace([',', '.'], ['', ''], $approved->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo $approved->luas_tanah;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace([',', '.'], ['', ''], $approved->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo $approved->penghapusan_gedung;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace([',', '.'], ['', ''], $approved->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo $approved->tanah_kosong;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace([',', '.'], ['', ''], $approved->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo $approved->perluasan_bangunan;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace([',', '.'], ['', ''], $approved->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo $approved->nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
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
<input type="hidden" name="totjum_kabkot" readonly="" value="<?php echo $totjum_kabkot; ?>"/>
<input type="hidden" name="penghapusan_gedung" readonly="" value="<?php echo $totpenghapusan_gedung; ?>"/>
<input type="hidden" name="tanah_kosong" readonly="" value="<?php echo $tottanah_kosong; ?>"/>
<input type="hidden" name="perluasan_bangunan" readonly="" value="<?php echo $totperluasan_bangunan; ?>"/>
<input type="hidden" name="kategori" readonly="" value="<?php echo $totperluasan_bangunan + $totpenghapusan_gedung + $tottanah_kosong; ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e;
        a = $('input[name=totjum_kabkot]').val();
        b = $('input[name=penghapusan_gedung]').val();
        c = $('input[name=tanah_kosong]').val();
        d = $('input[name=perluasan_bangunan]').val();
        e = $('input[name=kategori]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Approved: " + numeral(a).format('0,0');
        document.getElementById('title_chartdiv_a').innerText = "Total Data Kategori: " + numeral(e).format('0,0');
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Kota / Kabupaten';
            categoryAxis.dataFields.category = "kab_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Data Input Triwulan";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_kabkot";
            series.dataFields.categoryX = "kab_nama";
            series.tooltipText = "Jumlah Data Approved {categoryX}: [bold]{valueY}[/]";
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {country: "Penghapusan Gedung", litres: b},
                {country: "Tanah Kosong", litres: c},
                {country: "Perluasan Bangunan", litres: d}
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";
        });
    };
</script>