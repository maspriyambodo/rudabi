<input type="hidden" name="tokentxt" value="<?php echo Enkrip(sys_parameter('epa_token')['param_value']); ?>"/>
<input type="hidden" name="prov_idtxt" value="<?php echo Post_get('id'); ?>"/>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Jumlah Penyuluh Agama
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="minimize">
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
<div class="clearfix my-4"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Report Details
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="minimize">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">#</th>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">kua</th>
                        <th colspan="2">penyuluh</th>
                        <th rowspan="2">total</th>
                    </tr>
                    <tr>
                        <th>pns</th>
                        <th>non-pns</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr class="text-uppercase"><th colspan="2">total</th><th></th><th></th><th></th><th></th></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right">
            sumber data: <a href="https://epa.kemenag.go.id" target="new">e-PA</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var tokentxt = $('input[name="tokentxt"]').val();
        dt_table(tokentxt);
    });
    var dt_penyuluh = function () {
        var tmp = null;
        var tokentxt = $('input[name="tokentxt"]').val();
        var prov_idtxt = $('input[name="prov_idtxt"]').val();
        $.ajax({
            url: "api/e-pa/penyuluh/lists?token=" + tokentxt + '&prov_id=' + prov_idtxt,
            async: false,
            type: 'GET',
            cache: true,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                tmp = result.data;
            }
        });
        return tmp;
    }();
    function chartdiv(penyuluh_dt) {
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.colors.step = 2;
            chart.scrollbarX = new am4core.Scrollbar();
            chart.exporting.menu = new am4core.ExportMenu();
            chart.data = penyuluh_dt;
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "nama_wilayah";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 12;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 30;
            categoryAxis.title.text = 'Daerah Tingkat KABUPATEN/KOTA';
            categoryAxis.title.fontWeight = 800;
            let label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Penyuluh Agama";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "total";
            series.dataFields.categoryX = "nama_wilayah";
            series.tooltipText = "Total {categoryX}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            chart.cursor = new am4charts.XYCursor();
        });
    }
    function dt_table(tokentxt) {
        var prov_idtxt = $('input[name="prov_idtxt"]').val();
        $('#table').dataTable({
            "serverSide": true,
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
                {extend: 'excelHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ],
            "ajax": {
                "url": "api/e-pa/penyuluh/lists?token=" + tokentxt + '&prov_id=' + prov_idtxt,
                "type": "GET"
            },
            columns: [
                {
                    data: 'norut',
                    className: 'text-center',
                    "searchable": false
                },
                {
                    "data": 'nama_wilayah'
                },
                {
                    data: 'jumlah_kua',
                    className: 'text-center',
                    "render": function (data) {
                        return numeral(data).format('0,0');
                    }
                },
                {
                    data: 'jumlah_pns',
                    className: 'text-center',
                    "render": function (data) {
                        return numeral(data).format('0,0');
                    }
                },
                {
                    data: 'jumlah_nonpns',
                    className: 'text-center',
                    "render": function (data) {
                        return numeral(data).format('0,0');
                    }
                },
                {
                    data: 'total',
                    className: 'text-center',
                    "render": function (data) {
                        return numeral(data).format('0,0');
                    }
                }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();
                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };
                total = api
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                total2 = api
                        .column(3)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                total3 = api
                        .column(4)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                total4 = api
                        .column(5)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                document.getElementById('title_chartdiv').innerHTML = 'TOTAL PENYULUH AGAMA: ' + numeral(total4).format('0,0');
                $(api.column(2).footer()).html(
                        numeral(total).format('0,0')
                        );
                $(api.column(3).footer()).html(
                        numeral(total2).format('0,0')
                        );
                $(api.column(4).footer()).html(
                        numeral(total3).format('0,0')
                        );
                $(api.column(5).footer()).html(
                        numeral(total4).format('0,0')
                        );
            }
        });
        chartdiv(dt_penyuluh);
    }
</script>