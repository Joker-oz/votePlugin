@extends('defaultone')
@include('_top')
@section('title', '直播界面')
@section('content')
<meta name="_token" content="{{ csrf_token() }}"/>
  <div class="main">
    <div class="mod-show-table">
      <canvas id="chart"></canvas>
    </div>
  </div>
  <div class="right">
    <!-- <img src="{{ $voteInfo->qr_link }}" alt=""> -->
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

  <script type="text/javascript"  runat = "server" >

  var test = [];
    var datass = [];


    <?php
     foreach ($voteInfo->candidate as $key => $value) {
         $voteInfo->num = $key;
         $voteInfo['vote'.$key] = $value->c_name;
         $voteInfo['score'.$key] = $value->c_score;
     }
     // dd($voteInfo);
     ?>
     if(<?php echo $voteInfo->num; ?> >= 0) {
       test.push("<?php echo $voteInfo->vote0;?>");
       datass.push("<?php  echo $voteInfo->score0;?>");

       if(<?php echo $voteInfo->num; ?> >= 1) {
         test.push("<?php echo $voteInfo->vote1;?>");
         datass.push("<?php echo $voteInfo->score1;?>");

         if(<?php echo $voteInfo->num; ?> >= 2) {
           test.push("<?php echo $voteInfo->vote2;?>");
           datass.push("<?php echo $voteInfo->score2;?>");

           if(<?php echo $voteInfo->num; ?> >= 3) {
             test.push("<?php echo $voteInfo->vote3;?>");
             datass.push("<?php echo $voteInfo->score3;?>");

             if(<?php echo $voteInfo->num; ?> >= 4) {
               test.push("<?php echo $voteInfo->vote4;?>");
               datass.push("<?php echo $voteInfo->score4;?>");

               if(<?php echo $voteInfo->num; ?> >= 5) {
                 test.push("<?php echo $voteInfo->vote5;?>");
                 datass.push("<?php echo $voteInfo->score5;?>");

                 if(<?php echo $voteInfo->num; ?> >= 6) {
                   test.push("<?php echo $voteInfo->vote6;?>");
                   datass.push("<?php echo $voteInfo->score6;?>");

                   if(<?php echo $voteInfo->num; ?> >= 7) {
                     test.push("<?php echo $voteInfo->vote7;?>");
                     datass.push("<?php echo $voteInfo->score7;?>");

                     if(<?php echo $voteInfo->num; ?> >= 8) {
                       test.push("<?php echo $voteInfo->vote8;?>");
                       datass.push("<?php echo $voteInfo->score8;?>");

                       if(<?php echo $voteInfo->num; ?> >= 9) {

                         test.push("<?php echo $voteInfo->vote9;?>");
                         datass.push("<?php echo $voteInfo->score9;?>");
                       }
                     }
                   }
                 }
               }
             }
           }
         }
       }
     }

    var data = {};
    var name = "datasets";
    var namaes = "labels";
    var nnn = "data";
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
    data[namaes] = test;
    // function displayProp(data){
    //         var msg ="";
    //         for(var name in data){
    //             msg += name+": "+ data[name]+"\r\n ";
    //         }
    //         alert(msg);
    //     }


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

  var interval = setInterval("longPolling()",3000);

  var times = 0;
   function longPolling() {
      if (times > 4) {
        clearInterval(interval);
      }
      times++;
       $.ajax({
         url: "/vote/{{$voteInfo->id}}/send/score",
         type:"get",
         dataType: "json",
         headers: {

           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

         },
         timeout: 50000,//5秒超时，可自定义设置
         error: function (XMLHttpRequest, textStatus, errorThrown) {
           if (textStatus == "timeout") { // 请求超时
             // longPolling(); // 递归调用
           } else { // 其他错误，如网络错误等
             // longPolling();
           }
         },
         success: function (data, textStatus) {
           voteInfo = data;

           var test = [];
           var datass = [];
           var data = {};
           var name = "datasets";
           var namaes = "labels";
           var nnn = "data";
           var dsfg = [{
             label: "Dataset #1",
             backgroundColor: "rgba(255,99,132,0.2)",
             borderColor: "rgba(255,99,132,1)",
             borderWidth: 2,
             hoverBackgroundColor: "rgba(255,99,132,0.4)",
             hoverBorderColor: "rgba(255,99,132,1)",
           }];
           for(var i = 0; i < voteInfo.length; i++)
           {
             test.push(voteInfo[i].c_name);
             datass.push(voteInfo[i].c_score);
           }
           dsfg[0].data = datass;
           data[name] = dsfg;
           data[namaes] = test;

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
           // if (textStatus == "success") { // 请求成功
           //     longPolling();
           // }
         }
       });


  }
  </script>
@stop
