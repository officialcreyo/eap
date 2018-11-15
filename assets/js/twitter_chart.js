$(function() {
    $.ajax({

        url: '../assets/functions/chart_data.php',
        type: 'GET',
        success: function(data) {
            chartData = data;
            var chartProperties = {
                "xAxisName": "Date",
                "yAxisName": "Follower",
                "baseFontSize": "12",
                "yAxisMaxValue": "5000",
                "rotatevalues": "0",
                "theme": "zune",
                "labelStep": "3",
                "showValues": "1",
                "placeValuesInside": "0",
                "rotateValues": "0",
                "valueFont": "Arial",
                "valueFontColor": "#6699cc",
                "valueFontSize": "12",
                "valueFontBold": "1",
                "valueFontItalic": "0",
                "valueFontAlpha": "90"
            };

            apiChart = new FusionCharts({
                type: 'area2d',
                renderAt: 'chart-container',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": chartProperties,
                    "data": chartData
                }
            });
            apiChart.render();
        }
    });
});