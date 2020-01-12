<div class="content-wrapper">
    <div class="container-fluid mt-3">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb bg">
        <li class="breadcrumb-item">
          <a class="fa fa-home"> Beranda</a>
        </li>
      </ol>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Grafik Tahun Kelulusan Alumni MIPA</div>
        <div class="card-body">
          <canvas id="chartTahun" width="100%" height="30"></canvas>
        </div>
       
      </div>

      <div class="row">

        <div class="col-lg-4">
            <!-- Example Pie Chart Card-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i> Pekerjaan Alumni
              </div>
              <div class="card-body">
                <canvas id="pieChart" width="100%" height="100"></canvas>
              </div>
          
        </div>

       

      </div>

</div>

<script>
var ctx = document.getElementById("chartTahun");
var label=[];
var isi=[];

<?php foreach($Tahun as $value): ?>
    label.push(<?php echo $value ?>)
<?php endforeach; ?>

<?php foreach($Count as $value): ?>
    isi.push(<?php echo $value ?>)
<?php endforeach; ?>

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: label,
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 20,
      pointBorderWidth: 2,
      data: isi,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?= max($Count) ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>

<script>
var ctx = document.getElementById("pieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Energi", "Kesehatan", "IT", "PNS", "Swasta", "Wirausaha", "Scientist"],
    datasets: [{
      data: [<?=$Pekerjaan['Energi']?>, <?=$Pekerjaan['Kesehatan']?>, <?=$Pekerjaan['IT']?>,<?=$Pekerjaan['PNS']?>,<?=$Pekerjaan['Swasta']?>, <?=$Pekerjaan['Wirausaha']?>, <?=$Pekerjaan['Scientist']?>],
      backgroundColor: ['#d3f4ff', '#b2dffb', '#e7a4e4', '#ffc55c', '#5f6caf', '#ffb677', '#ff8364'],
    }],
  },
});
</script>

<script>
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>

    