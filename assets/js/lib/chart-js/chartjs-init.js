( function ( $ ) {
    "use strict";

    //Team chart
    var ctx = document.getElementById( "team-chart" );
    ctx.height = 100;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "09.06.2018", "10.06.2018", "11.06.2018", "12.06.2018", "13.06.2018", "14.06.2018", "15.06.2018" ],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                data: [ 2340, 2350, 2360, 2391, 2394, 2398, 2432 ],
                label: "Follower",
                backgroundColor: 'rgba(0,103,255,.15)',
                borderColor: 'rgba(0,103,255,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(0,103,255,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                position: 'top',
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },


            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Follower'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );


} )( jQuery );