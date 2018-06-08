$(document).ready(function(){
    chart('', 0);
    // biểu đồ user theo tháng
    function chart(year, quater) {
        $.ajax({
            url: '/admin/chart',
            method: 'GET',
            data: {'year': year, 'quater': quater},
            success: function (response) {
                console.log(response);
                Highcharts.chart('container', {
                    title: {
                        text: 'Total chart'
                    },
                    chart: {
                        marginBottom: 80
                    },
                    xAxis: {
                        categories: response.categories
                    },
                
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -2
                        },
                        title: {
                            text: 'Value'
                        }
                    },
                
                    series: [
                        {
                            name: 'User',
                            data: response.users
                        },
                        {
                            name: 'Movie',
                            data: response.movies
                        },
                        {
                            name: 'Cinema',
                            data: response.cinemas
                        }
                    ]
                });
            }
        });
    }

    $(document).on('click', '.view', function () {
        var year = $('.year').val();
        var quater = $('.quater').val();
        chart(year, quater);
    });
})