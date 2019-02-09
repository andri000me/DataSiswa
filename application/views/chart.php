<section class="content-header">
  <h1>
    Chart
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
    <li class="active">Charts</li>
  </ol>
</section>
<br>
<div class="col-md-4 col-xs-12">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Gender Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <canvas id="chart-area"></canvas>
    </div>
  </div>
</div>

<div class="col-md-4 col-xs-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Tahun Kelahiran Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <canvas id="canvas"></canvas>
    </div>
  </div>
</div>

<div class="col-md-4 col-xs-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Kota Asal Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <canvas id="canvas2"></canvas>
    </div>
  </div>
</div>

<script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  var doughnutData = [
      {
        value: <?php echo $jeniskelaminl ?>,
        color:"#F7464A",
        highlight: "#cd2529",
        label: "Laki-laki "
      },
      {
        value: <?php echo $jeniskelaminp ?>,
        color: "#FDB45C",
        highlight: "#d58d36",
        label: "Perempuan "
      }
    ];

    var barChartData = {
      labels : [<?php foreach ($tahun as $t) {
        echo "'$t->tahun',";
      } ?>],
      datasets : [
        {
          fillColor           : 'rgba(60,141,188,1)',
          strokeColor         : 'rgba(60,141,188,1)',
          pointColor          : 'rgba(60,141,188,1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data : [<?php foreach ($tahun as $t) {
            echo "$t->jumlah,";
          } ?>]
        }
      ]

    }

    var barChartData2 = {
      labels : [<?php foreach ($kota as $t) {
        echo "'$t->kotaa',";
      } ?>],
      datasets : [
        {
          fillColor           : 'rgba(0,100,0,1)',
          strokeColor         : 'rgba(0,100,0,1)',
          pointColor          : 'rgba(0,100,0,1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(0,100,0,1)',
          data : [<?php foreach ($kota as $t) {
            echo "$t->jumlah,";
          } ?>]
        }
      ]

    }

    window.onload = function(){
      var ctx = document.getElementById("chart-area").getContext("2d");
      window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});

      var ctz = document.getElementById("canvas").getContext("2d");
      window.myBar = new Chart(ctz).Bar(barChartData, {responsive : true});

      var ctz = document.getElementById("canvas2").getContext("2d");
      window.myBar = new Chart(ctz).Bar(barChartData2, {responsive : true});
    };
</script>
