<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Usulan Triwulan Tahun <?php echo $param[0]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
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
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($data == false) {
            $hide = "hidden";
            $msgs = null;
        } else {
            $hide = null;
            $msgs = "hidden";
        }
        ?>
        <p <?php echo $msgs; ?>>{msg}</p>
        <div class="table-responsive" <?php echo $hide; ?>>
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah<br>data</th>
                        <th colspan="2">sertifikat</th>
                        <th rowspan="2">KUA</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">tanah<br>kosong</th>
                        <th rowspan="2">perluasan<br>bangunan</th>
                        <th rowspan="2">dipa</th>
                    </tr>
                    <tr>
                        <th>kemenag</th>
                        <th>balik<br>nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usulan = json_decode($data);
                    $totjum_data = 0;
                    $totsert_kemanag = 0;
                    $totsert_baliknama = 0;
                    $totjum_kua = 0;
                    $totluas_tanah = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    foreach ($usulan as $value) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                echo '<a href=' . base_url('Applications/Sekretariat/Usulan/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $value->usul_propinsi . '&c=' . $value->propinsi_nama))) . '>' . $value->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center jum_data">
                                <?php
                                $jum_data = str_replace(',', '', $value->jum_data);
                                $totjum_data += $jum_data;
                                echo number_format($jum_data);
                                ?>
                            </td>
                            <td class="text-center sert_kemanag">
                                <?php
                                $sert_kemanag = str_replace(',', '', $value->sert_kemanag);
                                $totsert_kemanag += $sert_kemanag;
                                echo number_format($sert_kemanag);
                                ?>
                            </td>
                            <td class="text-center sert_baliknama">
                                <?php
                                $sert_baliknama = str_replace(',', '', $value->sert_baliknama);
                                $totsert_baliknama += $sert_baliknama;
                                echo number_format($sert_baliknama);
                                ?>
                            </td>
                            <td class="text-center jum_kua">
                                <?php
                                $jum_kua = str_replace(',', '', $value->jum_kua);
                                $totjum_kua += $jum_data;
                                echo number_format($jum_kua);
                                ?>
                            </td>
                            <td class="text-center luas_tanah">
                                <?php
                                $luas_tanah = str_replace(',', '', $value->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo number_format($luas_tanah);
                                ?>
                            </td>
                            <td class="text-center tanah_kosong">
                                <?php
                                $tanah_kosong = str_replace(',', '', $value->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo number_format($tanah_kosong);
                                ?>
                            </td>
                            <td class="text-center perluasan_bangunan">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $value->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo number_format($perluasan_bangunan);
                                ?>
                            </td>
                            <td class="text-center nilai_dipa">
                                <?php
                                $dipa = str_replace(',', '', $value->nilai_dipa);
                                $totnilai_dipa += $dipa;
                                echo number_format($dipa);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?php echo number_format($totjum_data); ?></th>
                        <th><?php echo number_format($totsert_kemanag); ?></th>
                        <th><?php echo number_format($totsert_baliknama); ?></th>
                        <th><?php echo number_format($totjum_kua); ?></th>
                        <th><?php echo number_format($totluas_tanah); ?></th>
                        <th><?php echo number_format($tottanah_kosong); ?></th>
                        <th><?php echo number_format($totperluasan_bangunan); ?></th>
                        <th><?php echo number_format($totnilai_dipa); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="totjum_data" readonly="" value="<?php echo number_format($totjum_data); ?>"/>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "Applications/Sekretariat/Usulan/index?key=" + a;
    }
    window.onload = function () {
        var a = $('input[name=totjum_data]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Usulan: " + a;
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
    };
</script>
<script>
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
        valueAxis.renderer.minWidth = 50;
        valueAxis.title.text = "Jumlah Data Usulan";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "jum_data";
        series.dataFields.categoryX = "propinsi_nama";
        series.tooltipText = "Jumlah Data Provinsi {propinsi_nama}: [bold]{valueY}[/]";
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
</script>