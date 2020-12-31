(function($) {
    $(document).ready(function(){
        $( ".fn_date" ).datepicker();
        $( ".fn_date_schedule" ).datepicker({
            dateFormat: 'yy-mm-dd',
        });


        $('body').on('click', ".fn_chart_x_button", renderChart);


   
	    function renderChart(){

	    	var x_data = $('.fn_chart_x_date').val().split(';');
		    //var y_data = y_data_raw.split(';');
		    var user_count = $('.fn_chart_x_count').val().split(';').map(function(item) {
		        return parseInt(item);
		    });
		    var user_data = $('.fn_chart_x_users').val().split(';').map(function(item) {
		        return parseInt(item);
		    });


			Highcharts.chart('chart_container', {
			    chart: {
			        zoomType: 'xy'
			    },
			    title: {
			        text: 'Статистика использования по дням'
			    },
			    xAxis: [{
			        categories: x_data,
			        crosshair: true
			    }],
			    yAxis: [{ // Primary yAxis
			        labels: {
			            format: '{value}',
			            style: {
			                color: '222'
			            }
			        },
			        title: {
			            text: 'Пользователи',
			            style: {
			                color: '333'
			            }
			        },
			        opposite: true

			    }, { // Secondary yAxis
			        gridLineWidth: 0,
			        title: {
			            text: 'Rainfall',
			            style: {
			                color: '333'
			            }
			        },
			        labels: {
			            format: '{value} mm',
			            style: {
			                color: '333'
			            }
			        }

			    }, { // Tertiary yAxis
			        gridLineWidth: 0,
			        title: {
			            text: 'Кол-во',
			            style: {
			                color: '333'
			            }
			        },
			        labels: {
			            format: '{value}',
			            style: {
			                color: '333'
			            }
			        },
			        opposite: true
			    }],
			    tooltip: {
			        shared: true
			    },
			    legend: {
			        layout: 'vertical',
			        align: 'left',
			        x: 80,
			        verticalAlign: 'top',
			        y: 55,
			        floating: true,
			        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			    },
			    series: [
			    {
			        name: 'Запросы',
			        type: 'spline',
			        yAxis: 2,
			        data: user_count,
			        marker: {
			            enabled: false
			        },
			        dashStyle: 'shortdot',
			        tooltip: {
			            valueSuffix: ''
			        }

			    }, {
			        name: 'Пользователи',
			        type: 'spline',
			        data: user_data,
			        tooltip: {
			            valueSuffix: ''
			        }
			    }]
			});
	    }









    });
}(jQuery));