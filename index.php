<?php
session_start();
if (empty($_SESSION['user'])) {
 exit(header("Location: login.php"));
}
?>

<!-- Header -->
<?php include 'header.php'?> 
<!-- End of Header -->


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="/php/delete_log" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Hapus Log</a>
  </div>

<!-- Content -->
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        vdafvafv
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        fvsdvasdvasdv
      </div>
    </div>
  </div>
</div>
<!-- End of Content -->
  

</div>
<!-- /.container-fluid -->


<!-- Footer -->
<?php include 'footer.php'; ?>
<!-- End of Footer -->


  <!-- Page level custom scripts -->
  <script type="text/javascript">
    window.onload = function(){
      updateChart();
      updateTable();
      updateArah();
    }

  

    function updateChart() {
      
        $.get("/air_monitoring/php/last_20.php?tipe=suhu", function(data){
            var data_last = JSON.parse(data);
            window.chartSuhu.data.labels = data_last.tanggal;
            window.chartSuhu.data.datasets[0].data = data_last.data;
            window.chartSuhu.update();
        });

        $.get("/air_monitoring/php/last_20.php?tipe=kelembaban", function(data){
            var data_last = JSON.parse(data);
            window.chartKelembaban.data.labels = data_last.tanggal;
            window.chartKelembaban.data.datasets[0].data = data_last.data;
            window.chartKelembaban.update();
        });
        setTimeout(updateChart, 500);
    }

    function updateTable() {
      
        $.post("/air_monitoring/php/last_row.php?tipe=suhu", {tipe: 'suhu'}, function(result){
          var obj = JSON.parse(result);
          if (obj.length == undefined) {
              $("#suhu_tgl").text(obj.tanggal);
              $("#suhu_jam").text(obj.jam);
              $("#suhu_data").text(obj.data);
          }  
        });
         $.post("/air_monitoring/php/last_row.php?tipe=kelembaban", {tipe: 'kelembaban'}, function(result){
          var obj = JSON.parse(result);
          if (obj.length == undefined) {
              $("#kelembaban_tgl").text(obj.tanggal);
              $("#kelembaban_jam").text(obj.jam);
              $("#kelembaban_data").text(obj.data);
          }  
        });
        setTimeout(updateTable, 500);
    }

   
   
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

     window.chartSuhu = new Chart(document.getElementById("chartSuhu"), {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          label: "Suhu (C)",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return '' + value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });


    window.chartKelembaban = new Chart(document.getElementById("chartKelembaban"), {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          label: "Kelembaban (%)",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return '' + value;
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + tooltipItem.yLabel;
            }
          }
        }
      }
    });

  </script>


