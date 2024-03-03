@extends('keuangan.layouts.master')
@section('content')
<style>
    .chart {
        background-color: #ffffff; 
        padding: 20px; /* Add padding as needed */
        border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle box shadow */
    }
</style>
<div class="topbar">
    <div class="toggle">
        <i class='bx bx-menu'></i>
        <div class="col">
            <p>Dashboard</p>
        </div>
    </div>
    <div class="notifikasi">
        <div class="col">
            <i class='bx bx-bell'></i>
        </div>
        <div class="col">
            <div class="user">
                <img src="{{ asset('storage/foto/' . $data->finance->foto) }}" alt="">
            </div>
        </div>
    </div>
</div>

<br>

<div class="cardBox">
    <div class="card" style="background-color: #ffffff;">
        <div>
            <div class="cardName">Total Transaksi Masuk</div>
            <div class="numbers">Rp 19.000.000,00</div>
            <div class="detail"> Lihat detail</div>
        </div>
        <div>
        <!-- <i class='bx bx-money'></i> -->
        </div>
    </div>

    <div class="card" style="background-color: #ffffff;">
        <div>
            <div class="cardName">Total Transaksi Keluar</div>
            <div class="numbers">Rp 4.500.000,00</div>
            <div class="detail"> Lihat detail</div>
        </div>
    </div>

    <div class="card" style="background-color: #ffffff;">
        <div>
            <div class="cardName">Total Saldo Perusahaan</div>
            <div class="numbers">Rp. 14.500.000,00</div>
        </div>
    </div>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.0/dist/apexcharts.min.js"></script>
<div style=" padding: 0 20px 30px;">
    <div class="chart">
        <div id="mixed"></div>
    </div>
</div>
<div style="display: flex; padding: 0 20px 40px;">
    <div style="width: 50%; margin-right: 30px;" class="chart">
        <div id="pie"></div>
    </div>

    <div style="width: 50%;" class="chart">
        <div id="line"></div>
    </div>
</div>
<script>
    fetch('/finance/dashboard/mixed')
        .then(response => response.json())
        .then(data => {
            jumlahBookingData = data.jumlah_booking;
            // Check data
            console.log('Jumlah Booking:', jumlahBookingData);

            var options = {
                series: [{
                    name: 'Jumlah Booking per bulan',
                    type: 'column',
                    data: jumlahBookingData // Use the fetched data here
                }, {
                    name: 'Jumlah Pemasukan per Bulan',
                    type: 'line',
                    data: [3700000, 2200000, 3000000, 4000000, 5000000, 2500000, 3000000, 6500000, 1500000, 3500000, 2200000, 1600000]
                }, {
                    name: 'Jumlah Pengeluaran per Bulan',
                    type: 'line',
                    data: [1500000, 1500000, 2000000, 2500000, 3000000, 3500000, 1750000, 2500000, 500000, 2500000, 2000000, 1000000]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    zoom: false,
                    toolbar: {
                        tools: {
                            download: false
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '30%',
                        roundedCorners: true,
                        borderRadius: 15
                    }
                },
                stroke: {
                    width: [0, 4, 4]
                },
                title: {
                    text: 'Traffic Sources'
                },
                dataLabels: {
                    enabled: false,
                    enabledOnSeries: [1, 2]
                },
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                colors: ['#3FC1C0', '#04A6C2', '#99E2B4'],
                xaxis: {
                    type: 'category'
                },
                yaxis: [{
                    title: {
                        // text: 'Website Blog',
                    },
                }, {
                    opposite: true,
                    title: {
                        // text: 'Social Media'
                    },
                    min: 0,
                    max: 10000000,
                    tickAmount: 5
                }, {
                    opposite: false, // Set to false for 'Jumlah Pengeluaran per Bulan'
                    title: {
                        // text: 'Jumlah Pengeluaran per Bulan'
                    },
                    min: 0,
                    max: 10000000,
                    tickAmount: 5,
                    show: false
                }],
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                }
            };

            var chart = new ApexCharts(document.querySelector("#mixed"), options);
            chart.render();
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>
<script>
    // Fetch data from the Laravel route
    fetch('/finance/dashboard/pie')
        .then(response => response.json())
        .then(data => {
            // Your data for the pie chart
            var pieChartData = {
                series: data.data,
                labels: data.labels.map(label => label.toString())
            };

            // Custom colors for the pie slices
            var customColors = ['#6EBC43', '#86C861', '#9ED480', '#B6DF9F', '#CEEABF', '#E7F5DF'];

            // Configuration options for the pie chart
            var chartOptions = {
                labels: pieChartData.labels,
                series: pieChartData.series,
                chart: {
                    type: 'pie',
                },
                legend: {
                    position: 'right',
                    fontSize: '14px',
                    offsetY: 60,
                    // formatter: function(seriesName, opts) {
                    //     return [seriesName, "[ ", opts.w.globals.series[opts.seriesIndex], " ]"]
                    // },   
                    labels: {
                        colors: '#000000',
                        useSeriesColors: false
                    },
                    markers: {
                        width: 14,
                        height: 14,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 0,
                        customHTML: undefined,
                        onClick: undefined,
                    },
                    onItemClick: {
                        toggleDataSeries: true
                    },
                    onItemHover: {
                        highlightDataSeries: true
                    },
                },
                plotOptions: {
                    pie: {
                        expandOnClick: false,
                        customScale: 1,
                        offsetX: 0,
                        offsetY: 0,
                        dataLabels: {
                            offset: -20, 
                            minAngleToShowLabel: 10,
                        }
                    }
                },
                // Set custom colors for the pie slices
                colors: customColors,
            };

            // Create a new pie chart instance
            var pieChart = new ApexCharts(document.getElementById('pie'), chartOptions);

            // Render the chart
            pieChart.render();
        })
        .catch(error => console.error('Error fetching chart data:', error));
</script>

<script>
    fetch('/finance/dashboard/line')
        .then(response => response.json())
        .then(data => {
            pesananSelesaiData = data.pesanan_selesai;
            pesananDibatalkanData = data.pesanan_dibatalkan;
            //cek data
            console.log('Pesanan Selesai Data:', pesananSelesaiData);
            console.log('Pesanan Dibatalkan Data:', pesananDibatalkanData);

            var options = {
            series: [
                {
                    name: "Pesanan Selesai",
                    data: pesananSelesaiData
                },
                {
                    name: "Pesanan Dibatalkan",
                    data: pesananDibatalkanData
                }
            ],
            colors: ['#85B804', '#ED5554'],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    tools: {
                        download: false 
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yaxis: {
                tickAmount: 5, 
                labels: {
                formatter: function (value) {
                    return value.toFixed(0); // 
                }
                },
                axisTicks: {
                    show: true,  // Set to false if you don't want axis ticks
                },
                min: 0,  // Set the minimum value for the Y-axis
                max: 250,  // Set the maximum value for the Y-axis
                tickPlacement: 'on',  // Set tick placement, 'on' means ticks will be displayed on the data points
                forceNiceScale: false, // Set to false to use your specified tick values
                ticks: [0, 50, 100, 150, 200, 250], // Specify your custom tick values
            },
            legend: {
                show: true,
                position: 'bottom', 
                horizontalAlign: 'center',
                floating: false,
                offsetY: 0,
                offsetX: 0
            },
            stroke: {
                curve: 'smooth', // Set the curve to smooth for the line chart
            }
        };

        var chart = new ApexCharts(document.querySelector("#line"), options);
        chart.render();

        })
</script>

@endsection