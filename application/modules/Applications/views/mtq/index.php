<?php
$a = json_decode($data);
$c = 0; 
?>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data MTQ per Provinsi
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
        <div id="chartdiv" class="chartdivs animate__animated animate__fadeIn"></div>
    </div>
</div>

<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Peserta MTQ
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
                        <th>Propinsi</th>
                        <th>Jumlah Peserta</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->total); 
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?php echo '<a href="' . base_url('Applications/Mtq/propinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->prov_id . '&b=' . $b->prov_nama))) . '" title="Detail Provinsi ' . $b->prov_nama . '">' . $b->prov_nama . '</a>'; ?>
                            </td>
                            <td><?php echo number_format($b->total); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>Total</th>
                        <th><?php echo number_format($c); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jumlah" readonly="" value="<?php echo number_format($c); ?>"/>

<script>
    $(document).ready(function () {
        
        var dt_nikah = function () {
            var tmp = null;
            $.ajax({
                url: "<?php echo base_url('Applications/Mtq/Get_mtq1'); ?>",
                async: false,
                type: 'GET',
                cache: true,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    var i, arr, tot;
                    tot = 0;
                    for (i = 0; i < result.length; i++) {
                        arr = parseFloat(result[i].total);
                        tot += arr; 
                    }
                    document.getElementById('title_chartdiv').innerText = 'Total Data MTQ: ' + numeral(tot).format('0,0');
                    tmp = obj;
                }
            });
            return tmp;
        }();
        
        $.ajax({
            url: "<?php echo base_url('Applications/Mtq/Get_mtq1/'); ?>",
            async: false,
            type: 'GET',
            cache: true,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                var data1 = JSON.stringify(result.data);
                var obj = jQuery.parseJSON(data1);
                var i, arr, tot;
                tot = 0;
                for (i = 0; i < obj.length; i++) {
                    arr = parseFloat(obj[i].value);
                    tot += arr;
                }
                document.getElementById('title_chartdiv').innerHTML = tot;
            }
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = '<?php echo base_url('Applications/Mtq/Get_mtq1'); ?>';
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "prov_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Data MTQ";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "total";
            series.dataFields.categoryX = "prov_nama";
            series.tooltipText = "Jumlah MTQ Provinsi {prov_nama}: [bold]{valueY}[/]";
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
    });
</script>
<script>
    window.onload = function () {
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