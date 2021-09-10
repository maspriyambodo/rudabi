<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Nikah per Provinsi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv" class="count"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<script>
    window.onload = function () {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: true,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: true,
            onclick: null,
            showDuration: "300",
            hideDuration: "2000",
            timeOut: false,
            extendedTimeOut: "2000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        var dt_nikah = function () {
            var tmp = null;
            $.ajax({
                url: "<?php echo base_url('Applications/Simkah/Get_simkah'); ?>",
                async: true,
                type: 'GET',
                cache: true,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result) {
                    var i, arr, tot;
                    tot = 0;
                    for (i = 0; i < result.length; i++) {
                        arr = parseFloat(result[i].jumlah);
                        tot += arr;

                    }
                    document.getElementById('title_chartdiv').innerText = 'Total Data Nikah: ' + numeral(tot).format('0,0');
                    tmp = result;
                }
            });
            return tmp;
        }();
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = '<?php echo base_url('Applications/Simkah/Get_simkah'); ?>';
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "provinsi";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            let label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Data Nikah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "provinsi";
            series.tooltipText = "Jumlah Data Nikah {provinsi}: [bold]{valueY}[/]";
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
    };
    $(document).ready(function () {
        toastr.warning('checking new data');
        $.ajax({
            url: "<?php echo base_url('Applications/Simkah/Update_simkah'); ?>",
            async: true,
            type: 'GET',
            cache: true,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                toastr.success('success checking data!');
                document.getElementById('title_chartdiv').innerText = 0;
                var i, arr, tot;
                tot = 0;
                for (i = 0; i < result.length; i++) {
                    arr = parseFloat(result[i].jumlah);
                    tot += arr;
                }
                $('#title_chartdiv').attr('data-value', tot);

                am4core.ready(function () {
                    am4core.disposeAllCharts();
                    am4core.useTheme(am4themes_animated);
                    var chart = am4core.create("chartdiv", am4charts.XYChart);
                    chart.scrollbarX = new am4core.Scrollbar();
                    chart.data = result;
                    chart.exporting.menu = new am4core.ExportMenu();
                    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                    categoryAxis.title.fontWeight = 800;
                    categoryAxis.title.text = 'Daerah Tingkat Provinsi';
                    categoryAxis.dataFields.category = "provinsi";
                    categoryAxis.renderer.grid.template.location = 0;
                    categoryAxis.renderer.minGridDistance = 30;
                    categoryAxis.renderer.labels.template.horizontalCenter = "right";
                    categoryAxis.renderer.labels.template.verticalCenter = "middle";
                    categoryAxis.renderer.labels.template.rotation = 300;
                    categoryAxis.tooltip.disabled = true;
                    categoryAxis.renderer.minHeight = 110;
                    let label = categoryAxis.renderer.labels.template;
                    label.wrap = true;
                    label.maxWidth = 120;
                    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    valueAxis.renderer.minWidth = 50;
                    valueAxis.title.text = "Jumlah Data Nikah";
                    valueAxis.title.fontWeight = 800;
                    var series = chart.series.push(new am4charts.ColumnSeries());
                    series.sequencedInterpolation = true;
                    series.dataFields.valueY = "jumlah";
                    series.dataFields.categoryX = "provinsi";
                    series.tooltipText = "Jumlah Data Nikah {provinsi}: [bold]{valueY}[/]";
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
                animate_counter();
            },
            error: function () {
                toastr.error('error getting new data, please refresh this page!');
            }
        });
        function animate_counter() {
            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).data('value')
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text('Total Data Nikah: ' + numeral(now).format('0,0'));
                    }
                });
            });
        }
    });
</script>