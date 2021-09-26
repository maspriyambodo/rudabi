var Masjid = {
    Total: ko.observable(0),
    TotalBaru: ko.observable(0),
    FirstLoad: true,
    GetData: function() {
        var url = BASE_URL + "landing/monitoring/simas/gettotalmasjid";
        var param = {};
        var self = this;
        App.IsLoading(true);
        ajaxPost(url, param, 
            function(data) { self.PopulateData(data); }, 
            function(err){}
        );
        self.GetDataRekap();
    },
    PopulateData: function(data) {
        var graph_prov = data.graph_prov;
        var graph_tipo = data.graph_tipo;
        this.Chart1(graph_prov);
        this.Chart2(graph_tipo);
        var self = this;
        self.Total(data.total);
        self.TotalBaru(data.total_baru);
        setTimeout(function(){
            $('#t-total-masjid').text(number_format(data.total, 0, ',', '.'));
            $('#t-total-masjid-baru').text(number_format(data.total_baru, 0, ',', '.'));
        }, 500);
        App.IsLoading(false);
    },
    Chart1: function(data) {
        var options = {
        series: [{
            name: 'Total Masjid',
            data: data.data
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                dataLabels: {
                    position: "top",
                    hideOverflowingLabels: true,
                    orientation: 'vertical'
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return number_format(val, 0, ',', '.')
            },
            style: {
                fontSize: '7pt',
                fontWeight: '400',
                colors: ['#000000']
            },
            offsetY: 10,
        },
        stroke: {
            width: 1
        },
        title: {
            text: 'Statistik Masjid Per Provinsi'
        },
        grid: {
            row: {
                colors: ['#fff', '#f2f2f2']
            }
        },
        xaxis: {
            labels: {
                rotate: -45,
                style: {
                    color: ['#000000'],
                    fontSize: '7pt',
                    fontWeight: 400,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
            categories: data.kategori,
            tickPlacement: 'on'
        },
        yaxis: {
            title: {
                text: 'Provinsi',
            },
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "horizontal",
                shadeIntensity: 0.25,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.85,
                opacityTo: 0.85,
                stops: [50, 0, 100]
            },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-masjid-1"), options);
        chart.render();
    },
    Chart2: function(data) {
        var options = {
            series: data.data,
            labels: data.kategori,
            chart: {
                width: '100%',
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 270
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
            },
            legend: {
                formatter: function(val, opts) {
                    return val + " - " + number_format(opts.w.globals.series[opts.seriesIndex], 0, ',', '.')
                }
            },
            title: {
                text: 'Statistik Masjid Berdasarkan Tipologi'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                    width: 200
                    },
                    legend: {
                    position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-masjid-2"), options);
        chart.render();
    },
    GetDataRekap: function() {
        ShowElmLoader(true);
        $.ajax({
            url: BASE_URL + 'landing/monitoring/simas/getmasjidrekap',
            data: {},
            method: 'POST',
            success: function(data) {
              var dt = data.data;
              var table = $('#tbl-masjid-rekap');
              var tbody = table.find('tbody');
              $(tbody).empty();
              var tfoot = table.find('tfoot');
              $(tfoot).empty();
              var no = 1;
              var totalcols = [0,0,0,0,0,0,0,0,0,0];
              $.each(dt, function(i, v){
                var totalperrow = 0;
                var tr = $('<tr>');
                tr.append($('<td align="right">').addClass('fixed-side text-right').text(no));
                tr.append($('<td>').addClass('fixed-side').text(v.name));
                var masjid = v.masjid;
                for(var i=1;i<=8;i++) {
                    var total = 0;
                    if(masjid[i]!=undefined) {
                        total = masjid[i];
                    }
                    tr.append($('<td align="right">').addClass('text-right').text(number_format(total, 0, ',', '.')));
                    totalperrow += total;
                    totalcols[i-1] += total;
                }
                if(masjid['999999']!=undefined) {
                    total = masjid['999999'];
                }
                tr.append($('<td align="right">').addClass('text-right').text(number_format(total, 0, ',', '.')));
                totalperrow += total;
                totalcols[8] += total;
                tr.append($('<td align="right">').addClass('text-right').text(number_format(totalperrow, 0, ',', '.')));
                totalcols[9] += totalperrow;
                tbody.append(tr);
                no++;
              });
              var tr = $('<tr>');
              tr.append($('<th align="right">').addClass('fixed-side').text(''));
              tr.append($('<th>').addClass('fixed-side').text('Total Data'));
              $.each(totalcols, function(i, v){
                tr.append($('<th align="right">').addClass('text-right').text(number_format(v, 0, ',', '.')));
              });
              tfoot.append(tr);
              ShowElmLoader(false);
            }
        });
    },
    GetSDM: function() {
        ShowElmLoader(true);
        $.ajax({
            url: BASE_URL + 'landing/monitoring/simas/getsdm',
            data: {},
            method: 'POST',
            success: function(data) {
              var dt = data.data;
              var table = $('#tbl-masjid-sdm');
              var tbody = table.find('tbody');
              $(tbody).empty();
              var no = 1;
              $.each(dt, function(i, v){
                tbody.append($('<tr>')
                  .append($('<td>').addClass('fixed-side text-right').text(no))
                  .append($('<td>').addClass('fixed-side').text(v.provinsi_name))
                  .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.jumlah_pengurus), 0, ',', '.')))
                  .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.jumlah_imam), 0, ',', '.')))
                  .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.jumlah_khatib), 0, ',', '.')))
                  .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.jumlah_muazin), 0, ',', '.')))
                  .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.jumlah_remaja), 0, ',', '.')))
                );  
                no++;
              });
              ShowElmLoader(false);
            }
        });
    },
    GetSarpras: function() {
        ShowElmLoader(true);
        $.ajax({
            url: BASE_URL + 'landing/monitoring/simas/getsarpras',
            data: {},
            method: 'POST',
            success: function(data) {
              var dt = data.data;
              var table = $('#tbl-masjid-sarpras');
              var tbody = table.find('tbody');
              $(tbody).empty();
              var no = 1;
              $.each(dt, function(i, v){
                var tr = $('<tr>');
                tr.append($('<td>').addClass('fixed-side text-right').text(no))
                tr.append($('<td>').addClass('fixed-side').text(v.name))
                var keg = v.keg;
                for(var i=1;i<=24;i++) {
                    var total = 0;
                    if(keg[i]!=undefined) {
                        total = keg[i];
                    }
                    tr.append($('<td>').addClass('text-right text-value').text(
                        number_format(parseInt(total), 0, ',', '.')
                    ));
                }
                // total = 0;
                // if(keg['999999']!=undefined) {
                //     total = keg['999999'];
                // }
                // tr.append($('<td>').addClass('text-right text-value').text(
                //     number_format(parseInt(total), 0, ',', '.')
                // ));
                tbody.append(tr);  
                no++;
              });
              ShowElmLoader(false);
            }
        });
    },
    Init: function() {
        var $self = this;

        setTimeout(function(){
            $($('#tab-nav-masjid').find('.nav.nav-tabs').children('.nav-item')[0]).addClass('active');
            $('#tab-masjid-data').addClass('active');
        }, 500);

        if($self.FirstLoad) {
            $self.FirstLoad = false;
            $self.GetData();
        }
    }
};