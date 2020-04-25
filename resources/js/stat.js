require('./bootstrap');
const $ = require('jquery');
var Chart = require('chart.js');

// chart.js
$(document).ready(function () {

		var id = $('#id').val();

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/stats',
        method: "GET",
        data: {
            id: id
        },
        success: function (data, state) {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Giorno", "Settimana", "Mese"],
                    datasets: [{
                        label: "Visite",
                        data: [data.day, data.week, data.month],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        },
        error: function (request, state, error) {
            console.log(error);
        }
    });
});