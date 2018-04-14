@extends('defaultone')
@include('_top')
@section('title', '直播界面')
@section('content')
  <div class="main">
    <div class="mod-show-table">
      <canvas id="chart"></canvas>
    </div>
  </div>
  <div class="right">
    <img src="{{ $voteInfo->qr_link }}" alt="">
  </div>
  <style media="screen">
  .right{
    position: fixed;
    right: 59px;
    top: 15%;
    width: 193px;
    height: 193px;
    background-color: rgba(221, 235, 244, 1);
  }
  .right>img {
    width: 100%;
    height: 100%;
  }
  .main{
    border-width: 0px;
    position: fixed;
    left: 360px;
    /* margin-left: 25%; */
    /* margin-right: 30%; */
    top: 19%;
    height: 80%;
    width: 50%;
    background: inherit;
    background-color: rgba(221, 235, 244, 1);
    border: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
  }
  .mod-show-table{
    position: relative;
    height: 100%;
    width: 100%;
  }
  </style>
  <script type="text/javascript">
  $.get('/vote/{{ $voteInfo->id }}/showing',function (data, status) {
  var data;
  var candidate;
  var databa;
  @foreach ($voteInfo->candidate as $key => $value) use(var candidate, var databa)
  candidate[$key] = $value->c_name;
  databa[$key] = $value->c_score;
  @endforeach
    data['label'] = candidate;
    data['data'] = databa;
    data = {
    datasets: [{
      label: "Dataset #1",
      backgroundColor: "rgba(255,99,132,0.2)",
      borderColor: "rgba(255,99,132,1)",
      borderWidth: 2,
      hoverBackgroundColor: "rgba(255,99,132,0.4)",
      hoverBorderColor: "rgba(255,99,132,1)",
    }]
  };


  var options = {
    maintainAspectRatio: false,
    scales: {
      yAxes: [{
        stacked: true,
        gridLines: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      }],
      xAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  };

  Chart.Bar('chart', {
    options: options,
    data: data
  });
});
  </script>
@stop
