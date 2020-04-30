require('./bootstrap');
const $ = require('jquery');
var Chart = require('chart.js');

// chart.js
$(document).ready(function () {

        // id del flat
        var id = $('#id').val();
        
        // mese selezionato dall'utente
        var month;

        // chiamata per le visits appena carica la pagina
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/api/stats',
            method: "GET",
            data: {
                id: id,
                month: ''
            },
            success: function (data, state) {
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: data.days,
                        datasets: [{
                            label: "Visite",
                            data: data.stats,
                            backgroundColor: "#ff385c",
                            borderColor: "#ff385c",
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

        // quando cambi mese parte la chiamata per le visits
        $(document).on('change', $('#month'), function() {
            month = $('#month').val();
            console.log(month);

            $.ajax({
                url: window.location.protocol + '//' + window.location.host + '/api/stats',
                method: "GET",
                data: {
                    id: id,
                    month: month
                  },
                success: function(data, state) {
                  console.log(data);
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: "line",
                      data: {
                          labels: data.days,
                          datasets: [{
                              label: "Visite",
                              data: data.stats,
                              backgroundColor: "#ff385c",
                              borderColor: "#ff385c",
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
                error: function(request, state, error) {
                  console.log(error);
                }
              });
        });



    //chiamata per messaggi
    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/api/stats/messages',
        method: "GET",
        data: {
            id: id
        },
        success: function (data, state) {
            var ctx = document.getElementById('myMessage').getContext('2d');
            var myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Giorno", "Settimana", "Mese"],
                    datasets: [{
                        label: "Messaggi Ricevuti",
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