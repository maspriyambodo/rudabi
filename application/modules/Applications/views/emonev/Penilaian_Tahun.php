<?php
$taun = json_decode($data);
$a = 0;
$b = 0;
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$g = 0;
$h = 0;
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0;
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Applications/Emonev/Penilaian/index'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Penilaian Tahun <?php echo $param[0] ?>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" style="width:100%;">
            <thead class="text-center text-uppercase">
                <tr>
                    <th>no</th>
                    <th>provinsi</th>
                    <th>kode<br>provinsi</th>
                    <th>data<br>penilai</th>
                    <th>data<br>validasi</th>
                    <th>data<br>non-validasi</th>
                    <th>data<br>penghulu</th>
                    <th>data<br>pegawai</th>
                    <th>data<br>penduduk</th>
                    <th>data<br>muslim</th>
                    <th>data<br>nikah</th>
                    <th>data<br>luas tanah</th>
                    <th>performa 1</th>
                    <th>performa 2</th>
                    <th>performa 3</th>
                    <th>performa 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($taun as $value) {
                    $a += $value->dt_penilai;
                    $b += $value->dt_validasi;
                    $c += $value->dt_nonvalidasi;
                    $d += $value->dt_penghulu;
                    $e += $value->dt_pegawai;
                    $f += $value->dt_penduduk;
                    $g += $value->dt_muslim;
                    $h += $value->dt_nikah;
                    $i += $value->dt_luastanah;
                    $j += $value->dt_performa1;
                    $k += $value->dt_performa2;
                    $l += $value->dt_performa3;
                    $m += $value->dt_performa4;
                    ?>
                    <tr>
                        <td class="text-center">
                            <?php
                            static $id = 1;
                            echo $id++;
                            ?>
                        </td>
                        <td>
                            <?php echo '<a href="' . base_url('Applications/Emonev/Penilaian/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $value->kodekua . '&c=' . $value->propinsi))) . '">' . $value->propinsi . '</a>' ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->kodekua; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_penilai; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_validasi; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_nonvalidasi; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_penghulu; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_pegawai; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_penduduk; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_muslim; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_nikah; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $value->dt_luastanah; ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($value->dt_performa1); ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($value->dt_performa2); ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($value->dt_performa3); ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($value->dt_performa4); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot class="text-center text-uppercase">
                <tr>
                    <th colspan="3">jumlah</th>
                    <th><?php echo $a; ?></th>
                    <th><?php echo $b; ?></th>
                    <th><?php echo $c; ?></th>
                    <th><?php echo $d; ?></th>
                    <th><?php echo $e; ?></th>
                    <th><?php echo $f; ?></th>
                    <th><?php echo $g; ?></th>
                    <th><?php echo $h; ?></th>
                    <th><?php echo $i; ?></th>
                    <th><?php echo number_format($j); ?></th>
                    <th><?php echo number_format($k); ?></th>
                    <th><?php echo number_format($l); ?></th>
                    <th><?php echo number_format($m); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<input type="hidden" name="dt_penilai" readonly="" value="<?php echo number_format($a); ?>"/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data Tahun <?php echo $param[0]; ?>: " + $('input[name="dt_penilai"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Data Validasi",
                    litres: <?php echo $b; ?>
                },
                {
                    country: "Data Non-Validasi",
                    litres: <?php echo $c; ?>
                }
            ];

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
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
    };
</script>