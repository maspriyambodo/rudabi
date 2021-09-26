var Penghulu = {
    FirstLoad: true,
    GetData: function() {
        var url = BASE_URL + "landing/monitoring/penghulu/getdata";
        var param = {};
        var self = this;
        App.IsLoading(true);
        ajaxPost(url, param, 
            function(data) { self.PopulateData(data); }, 
            function(err){}
        );
    },
    PopulateData: function(data) {
        $('#t-total-penghulu').text(number_format(data.total, 0, ',', '.'));
        $('#t-total-penghulu-muda').text(number_format(data.total_muda, 0, ',', '.'));
        $('#t-total-penghulu-madya').text(number_format(data.total_madya, 0, ',', '.'));
        $('#t-total-penghulu-pertama').text(number_format(data.total_pertama, 0, ',', '.'));
        this.ChartProvinsi(data.chart_provinsi);
        this.ChartPangkat(data.chart_pangkat);
        this.ChartPendidikan(data.chart_pendidikan);
        this.DataRekap(data.data_table);
        App.IsLoading(false);
    },
    ChartProvinsi: function(data) {
        var options = {
        series: [{
            name: 'Gol. Muda',
            type: 'column',
            data: data.total_muda
        },{
            name: 'Gol. Madya',
            type: 'column',
            data: data.total_madya
        },{
            name: 'Gol. Pertama',
            type: 'column',
            data: data.total_pertama
        },{
            name: 'Total',
            type: 'line',
            data: data.total
        }],
        chart: {
            height: 460,
            type: 'line',
            stacked: true
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                rangeBarOverlap: false,
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
            text: 'Statistik Data Penghulu Per Provinsi'
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
                text: 'Total Data',
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

        var chart = new ApexCharts(document.querySelector("#chart-penghulu"), options);
        chart.render();
    },
    ChartPendidikan: function(data) {
        var options = {
            series: data.data,
            labels: data.kategori,
            chart: {
            width: 380,
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
            text: 'Statistik Data Penghulu Per Pendidikan Terakhir'
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
  
        var chart = new ApexCharts(document.querySelector("#chart-penghulu-pendidikan"), options);
        chart.render();
    },
    ChartPangkat: function(data) {
        var options = {
            series: data.data,
            chart: {
            width: 380,
            type: 'pie',
            legend: {
                position: 'bottom'
            },
          },
          title: {
              text: 'Statistik Data Penghulu Berdasarkan Pangkat'
          },
          labels: data.kategori,
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
  
        var chart = new ApexCharts(document.querySelector("#chart-penghulu-pangkat"), options);
        chart.render();
    },
    DataRekap: function(data) {
        ShowElmLoader(true);
        var table = $('#tbl-penghulu-rekap');
        var tbody = table.find('tbody');
        var tfoot = table.find('tfoot');
        $(tbody).empty();
        $(tfoot).empty();
        var no = 1;
        var totalcols = [0,0,0,0];
        $.each(data, function(i, v){
            tbody.append($('<tr>')
                .append($('<td>').addClass('fixed-side text-right').text(no))
                .append($('<td>').addClass('fixed-side').text(v.provinsi))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.dt_penghulu), 0, ',', '.')))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.dt_pertama), 0, ',', '.')))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.dt_madya), 0, ',', '.')))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.dt_muda), 0, ',', '.')))
            );  
            totalcols[0] += parseInt(v.dt_penghulu);
            totalcols[1] += parseInt(v.dt_pertama);
            totalcols[2] += parseInt(v.dt_madya);
            totalcols[3] += parseInt(v.dt_muda);
            no++;
        });
        tfoot.append($('<tr>')
            .append($('<th>').addClass('fixed-side text-right').text(''))
            .append($('<th>').addClass('fixed-side').text('Total Data'))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[0]), 0, ',', '.')))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[1]), 0, ',', '.')))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[2]), 0, ',', '.')))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[3]), 0, ',', '.')))
        );  
        ShowElmLoader(false);
    },
    Init: function() {
        var $self = this;
        if($self.FirstLoad) {
            $self.FirstLoad = false;
            $self.GetData();
        }
    }
};