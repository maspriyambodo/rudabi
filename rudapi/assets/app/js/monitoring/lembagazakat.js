var LembagaZakat = {
    FirstLoad: true,
    GetData: function() {
        var url = BASE_URL + "landing/monitoring/lembagazakat/getdata";
        var param = {};
        var self = this;
        App.IsLoading(true);
        ajaxPost(url, param, 
            function(data) { self.PopulateData(data); }, 
            function(err){}
        );
    },
    PopulateData: function(data) {
        $('#t-total-laz').text(number_format(data.total, 0, ',', '.'));
        $('#t-total-muzakki').text(number_format(data.total_muzakki, 0, ',', '.'));
        $('#t-total-mustahik').text(number_format(data.total_mustahik, 0, ',', '.'));
        this.Chart(data.data_summary);
        this.DataRekap(data.data_table);
        App.IsLoading(false);
    },
    Chart: function(data) {
        var options = {
        series: [{
            name: 'Lembaga Zakat',
            data: data.total
        },{
            name: 'Muzakki',
            data: data.total_muzakki
        },{
            name: 'Mustahik',
            data: data.total_mustahik
        }],
        chart: {
            height: 560,
            type: 'bar',
            stacked: false
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
            text: 'Statistik Lembaga Zakat Per Provinsi'
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
            categories: data.provinsi,
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

        var chart = new ApexCharts(document.querySelector("#chart-laz"), options);
        chart.render();
    },
    DataRekap: function(data) {
        ShowElmLoader(true);
        var table = $('#tbl-laz-rekap');
        var tbody = table.find('tbody');
        var tfoot = table.find('tfoot');
        $(tbody).empty();
        $(tfoot).empty();
        var no = 1;
        var totalcols = [0,0,0];
        $.each(data, function(i, v){
            tbody.append($('<tr>')
                .append($('<td>').addClass('fixed-side text-right').text(no))
                .append($('<td>').addClass('fixed-side').text(v.provinsi))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.total), 0, ',', '.')))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.total_muzakki), 0, ',', '.')))
                .append($('<td>').addClass('text-right text-value').text(number_format(parseInt(v.total_mustahik), 0, ',', '.')))
            );  
            totalcols[0] += parseInt(v.total);
            totalcols[1] += parseInt(v.total_muzakki);
            totalcols[2] += parseInt(v.total_mustahik);
            no++;
        });
        tfoot.append($('<tr>')
            .append($('<th>').addClass('fixed-side text-right').text(''))
            .append($('<th>').addClass('fixed-side').text('Total Data'))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[0]), 0, ',', '.')))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[1]), 0, ',', '.')))
            .append($('<th>').addClass('text-right text-value').text(number_format(parseInt(totalcols[2]), 0, ',', '.')))
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