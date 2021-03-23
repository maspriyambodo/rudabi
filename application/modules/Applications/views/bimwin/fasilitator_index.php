<?php
$a = json_decode($data);
$c = 0; //dt_fasilitator
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Kegiatan Fasilitator
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
            Detail Data Fasilitator
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>jenis<br>kegiatan</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_fasilitator; //dt_fasilitator 
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>    
                            </td>
                            <td><?php echo $b->jenis_kegiatan; ?></td>
                            <td><?php echo $b->dt_fasilitator; ?></td>
                            <?php
                            if (!isset($b->id_j_kegiatan)) {
                                echo '<td><button type="button" class="btn btn-icon btn-info btn-xs" title="Data tidak valid"><i class="fas fa-info-circle"></i></button></td>';
                            } elseif ($b->id_j_kegiatan == 0) {
                                echo '<td><button type="button" class="btn btn-icon btn-info btn-xs" title="Data tidak valid"><i class="fas fa-info-circle"></i></button></td>';
                            } else {
                                echo '<td><a href="' . base_url('Applications/Bimwin/Fasilitator/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->id_j_kegiatan . '&b=' . $b->jenis_kegiatan))) . '" title="" class="btn btn-icon btn-default btn-xs"><i class="fas fa-eye"></i></a></td>';
                            }
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">total data kegiatan fasilitator <?php echo number_format($c); ?></th>
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
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?php echo $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Jenis Kegiatan';
            categoryAxis.dataFields.category = "jenis_kegiatan";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 50;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Fasilitator";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_fasilitator";
            series.dataFields.categoryX = "jenis_kegiatan";
            series.tooltipText = "Jumlah {jenis_kegiatan}: [bold]{valueY}[/]";
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
            valueLabel.label.fontSize = 20;
            valueLabel.label.verticalCenter = "top";
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