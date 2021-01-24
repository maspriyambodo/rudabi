<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Sistem Informasi Penghulu</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
        <div class="clear" style="margin:5% 0px;"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-custom wave wave-animate-slow wave-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6"> 
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="far fa-building icon-3x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="<?php echo base_url('Simpenghulu/KUA/index/'); ?>" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"> Data KUA </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom wave wave-animate-slow wave-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6"> 
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="fas fa-user-friends icon-3x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"> Data Penghulu </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom wave wave-animate-slow wave-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6"> 
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="far fa-heart icon-3x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3"> Peristiwa Nikah </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    am4core.ready(function () {

        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.PieChart);

        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";

        chart.innerRadius = am4core.percent(30);

        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template
                .cursorOverStyle = [
                    {
                        "property": "cursor",
                        "value": "pointer"
                    }
                ];

        pieSeries.alignLabels = false;
        pieSeries.labels.template.bent = true;
        pieSeries.labels.template.radius = 3;
        pieSeries.labels.template.padding(0, 0, 0, 0);

        pieSeries.ticks.template.disabled = true;

        var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
        shadow.opacity = 0;

        var hoverState = pieSeries.slices.template.states.getKey("hover");

        var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
        hoverShadow.opacity = 0.7;
        hoverShadow.blur = 5;

        chart.legend = new am4charts.Legend();
        chart.data = [{
                "country": "KUA",
                "litres": 501.9
            }, {
                "country": "Penghulu",
                "litres": 165.8
            }, {
                "country": "Peristiwa Nikah",
                "litres": 139.9
            }];
    });
</script>