@extends('defaultone')
@include('_top')
@section('title', '直播界面')
@section('content')
  <div class="main">
    <div class="mod-show-table">
      <canvas id="my_chart"></canvas>
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
  $.get('/vote/{{$voteInfo->id}}/showing',function (data, status) {
    var test = [for (var i = 0; i < $voteInfo->candidate[$voteInfo->c_name]->c_name.length; i++) {
                result.push("{{ $voteInfo->candidate[$voteInfo->c_name]->c_name }}")
                }
               ];

    var data = {};
    var name = "datasets";
    var namaes = "labels";
    var nnn = "data";
    var datass = [
                  {{ $voteInfo->candidate[0]->c_score}},
                  {{ $voteInfo->candidate[1]->c_score}},
                  {{ $voteInfo->candidate[0]->c_score}}
                 ];
    var dsfg = [{
                label: "Dataset #1",
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }];

    dsfg[0].data = datass;
    data[name] = dsfg;
    data[namaes] = test
  var ctx = document.getElementById("my_chart").getContext("2d");
        var my_chart = new Chart(ctx,{
          type: 'pie',
          data: {
            labels: [
              "首页文章列表",
              "分类文章列表",
              "文章详情",
              "关于我",
            ],
            datasets: [{
              data: data,
              backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.purple,
                window.chartColors.green,
              ],
            }]
          },
          options: {
            responsive: true,
          }
        });
  });
  </script>
@stop
