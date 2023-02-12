<?php
//koneksi
include "koneksi.php";

//untuk mengambil nilai pencapaian aktual
$sql_aktual="select * from data";
$query_aktual=mysqli_query($koneksi,$sql_aktual);

//untuk mengambil nilai pencapaian perkiraan
$sql_perkiraan="select * from data";
$query_perkiraan=mysqli_query($koneksi,$sql_perkiraan);

//untuk mengambil bulan dari januari sampai juni
$sql_label="select * from data";
$query_label=mysqli_query($koneksi,$sql_label);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chart</title>
    <script src="chart/Chart.min.js"></script>
</head>
<body>
    <div class="t">
    <center><h3 style="padding:10px">Chart Data Aktual dan Perkiraan</h3></center>
        <canvas id="kotaChart"></canvas>
    </div>
    <script>
	

var kotaCanvas = document.getElementById("kotaChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontColor = "black";
Chart.defaults.global.defaultFontSize = 12;

var dataFirst = {
    label: "Aktual",
    data: [<?php foreach($query_aktual as $key){  echo  '"'.$key['aktual'].'",';}?> ],
    lineTension: 0.3,
    fill: false,
    borderColor: 'red',
    backgroundColor: 'transparent',
    pointBorderColor: 'red',
    pointBackgroundColor: 'red',
    pointRadius: 5,
    pointHoverRadius: 7,
    pointHitRadius: 7,
    pointBorderWidth: 2,
    pointStyle: 'rect'
  };

var dataSecond = {
    label: "Perkiraan",
    data: [<?php foreach($query_perkiraan as $key){  echo  '"'.$key['f'].'",';}?> ],
    lineTension: 0.3,
    fill: false,
    borderColor: 'blue',
    backgroundColor: 'transparent',
    pointBorderColor: 'blue',
    pointBackgroundColor: 'blue',
    pointRadius: 5,
    pointHoverRadius: 7,
    pointHitRadius: 7,
    pointBorderWidth: 2,
    pointStyle: 'cross'
  };


var kotaData = {
  labels:  [<?php foreach($query_label as $key){  echo  '"'.$key['bulan'].'",';}?> ] ,
  datasets: [dataFirst, dataSecond]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  },
  scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true,
                 userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
             }
         }],
         xAxes: [{
        ticks: {
          autoSkip: false,
          maxRotation: 90,
          minRotation: 0,
        }
      }]
         
     },

    
};

var lineChart = new Chart(kotaCanvas, {
  type: 'line',
  data: kotaData,
  options: chartOptions
});

    </script>
</body>
</html>