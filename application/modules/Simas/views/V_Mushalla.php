<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data Mushalla Tahun <?php echo date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true">
    <div class="card-body" kt-hidden-height="423">
        <div id="mushalla_prov" style="width:100%;height:650px;"></div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="4">tipologi</th>
                    </tr>
                    <tr>
                        <th>perumahan</th>
                        <th>publik</th>
                        <th>perkantoran</th>
                        <th>pendidikan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
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
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: ""
            },
            columns: [
                {data: null},
                {data: null},
                {data: null},
                {data: null},
                {data: null},
                {data: null}
            ]
        });
    };
</script>
<script>
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("mushalla_prov", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();
        chart.dataSource.url = "https://simas.kemenag.go.id/dataseuneu/docs/simas/mushallaprovinsi?KEY=BOBA";

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.text = 'Daerah Tingkat Provinsi';
        categoryAxis.dataFields.category = "provinsi_name";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 100;
        valueAxis.title.text = "Jumlah Mushalla";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "total";
        series.dataFields.categoryX = "provinsi_name";
        series.tooltipText = "Total Mushalla \r\n Provinsi {provinsi_name}: [{categoryX}: bold]{valueY}[/]";
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
</script>