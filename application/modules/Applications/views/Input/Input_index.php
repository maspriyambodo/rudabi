<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-2 col-form-label">Pilih Tahun</label>
            <div class="col-4">
                <select name="tahun" class="form-control form-control-solid" onchange="Tahun(this.value)">
                    <?php
                    $usul_tahun = json_decode($pertahun);
                    foreach ($usul_tahun as $usul_tahun) {
                        if ($usul_tahun->usul_tahun == $param[0]) {
                            $selected = 'selected=""';
                        } else {
                            $selected = null;
                        }
                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($usul_tahun->usul_tahun)) . '" ' . $selected . '>' . $usul_tahun->usul_tahun . '</option>';
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
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://e-sbsn.kemenag.go.id/" target="new">e-sbsn</a>
        </div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Status Data Input Triwulan
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
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://e-sbsn.kemenag.go.id/" target="new">e-sbsn</a>
        </div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
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
                        <th rowspan="2">jumlah<br>kua</th>
                        <th rowspan="2">luas<br>tanah</th>
                        <th rowspan="2">penghapusan<br>gedung</th>
                        <th rowspan="2">tanah<br>kosong</th>
                        <th rowspan="2">perluasan<br>bangunan</th>
                        <th rowspan="2">dipa</th>
                        <th colspan="2">status</th>
                    </tr>
                    <tr>
                        <th>pending</th>
                        <th>approve</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $input = json_decode($data);
                    $totjum_kabkot = 0;
                    $totjum_kua = 0;
                    $totluas_tanah = 0;
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    $totstatus_pending = 0;
                    $totstatus_req_approve = 0;
                    foreach ($input as $input) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                echo '<a href=' . base_url('Applications/Sekretariat/Input/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $input->usul_propinsi . '&c=' . $input->propinsi_nama))) . '>' . $input->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kabkot = str_replace(',', '', $input->jum_kabkot);
                                $totjum_kabkot += $jum_kabkot;
                                echo number_format($jum_kabkot);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kua = str_replace(',', '', $input->jum_kua);
                                $totjum_kua += $jum_kua;
                                echo number_format($jum_kua);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace(',', '', $input->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo number_format($luas_tanah);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace(',', '', $input->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo number_format($penghapusan_gedung);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace(',', '', $input->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo number_format($tanah_kosong);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $input->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo number_format($perluasan_bangunan);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace(',', '', $input->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo number_format($nilai_dipa);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $status_pending = str_replace(',', '', $input->status_pending);
                                $totstatus_pending += $status_pending;
                                echo number_format($status_pending);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $status_req_approve = str_replace(',', '', $input->status_req_approve);
                                $totstatus_req_approve += $status_req_approve;
                                echo number_format($status_req_approve);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?php echo number_format($totjum_kabkot); ?></th>
                        <th><?php echo number_format($totjum_kua); ?></th>
                        <th><?php echo number_format($totluas_tanah); ?></th>
                        <th><?php echo number_format($totpenghapusan_gedung); ?></th>
                        <th><?php echo number_format($tottanah_kosong); ?></th>
                        <th><?php echo number_format($totperluasan_bangunan); ?></th>
                        <th><?php echo number_format($totnilai_dipa); ?></th>
                        <th><?php echo number_format($totstatus_pending); ?></th>
                        <th><?php echo number_format($totstatus_req_approve); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="http://e-sbsn.kemenag.go.id/" target="new">e-sbsn</a>
        </div>
    </div>
</div>
<input type="hidden" name="totjum_kabkot" readonly="" value="<?php echo $totjum_kabkot; ?>"/>
<script>
    function Tahun(val) {
        return window.location.href = "Applications/Sekretariat/Input/index?key=" + val;
    }
    window.onload = function () {
        var a = $('input[name="totjum_kabkot"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Input: " + a;
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
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Data Input Triwulan";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_kabkot";
            series.dataFields.categoryX = "propinsi_nama";
            series.tooltipText = "Jumlah Input Triwulan {categoryX}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.sequencedInterpolation = true;
            series2.dataFields.valueY = "status_pending";
            series2.dataFields.categoryX = "propinsi_nama";
            series2.tooltipText = "Status Pending {categoryX} : [bold]{valueY}[/]";
            series2.columns.template.strokeWidth = 0;
            series2.tooltip.pointerOrientation = "vertical";
            series2.columns.template.column.cornerRadiusTopLeft = 10;
            series2.columns.template.column.cornerRadiusTopRight = 10;
            series2.columns.template.column.fillOpacity = 0.8;
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
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Status Pending",
                    litres: <?php echo $totstatus_pending; ?>
                },
                {
                    country: "Status Approved",
                    litres: <?php echo $totstatus_req_approve; ?>
                }
            ];

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
    };
</script>