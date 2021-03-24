<?php
$rekap = json_decode($data);
$tot = $rekap[0]->jumlah + $rekap[1]->jumlah;
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Input KUA
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv">Total Data KUA: <?php echo number_format($tot); ?></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title text-uppercase">
            detail rekap data kua
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>status</th>
                        <th>jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($rekap as $value) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?php echo $value->kategori; ?></td>
                            <td><?php echo number_format($value->jumlah); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3" style="border-bottom: solid 1px #ecf0f3;">Total Data KUA: <?php echo number_format($tot); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.PieChart);
            chart.data = <?php echo $data; ?>;
            chart.innerRadius = am4core.percent(50);
            chart.exporting.menu = new am4core.ExportMenu();
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "jumlah";
            pieSeries.dataFields.category = "kategori";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

        });
    };
</script>