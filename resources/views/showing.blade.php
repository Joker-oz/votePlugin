<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live</title>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/showing.css">
    <link rel="stylesheet" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="top-Bar">
        <div class="top-nav-container clearfix">
            <a href="javascript:;" class="top-logo">
                <i class="fa fa-creative-commons"></i>
            </a>
            <a href="" class="title" id="none">
                Creat-Vote
            </a>
            <a href="{{ url('/index')}}" class="top-nav-list">首页</a>
            <span class="seg">|</span>
            <a href="{{ route('vote.edit')}}" class="top-nav-list">开始创建</a>
            <span class="seg">|</span>
            <a href="./跳转票数直播.html" class="top-nav-list">票数直播</a>
            <a href="" class="top-nav-list exit">
                退出
            </a>
            <span class="seg right">|</span>
            <a href="./用户登录界面.html" class="top-nav-list logIn">
                登录
            </a>
        </div>
    </div>
    <!--二维码区域-->
    <div class="QR-code">
        <img class="QR-img" src="/myImg/QRImg.jpg" alt="二维码">
    </div>


    <!--导航条-->
    <div id="main-content-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
            <li>票数直播</li>
            <span>/</span>
            <li>直播界面</li>
            <li class="return"><a href="./用户登录界面.html"><button type="button" class="btn btn-danger">返回</button></a></li>
        </ul>

        <!--画布区域-->
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <!--页面底部-->

    <!--<div id="footer">
        <div class="footer-container">
            <h4>免费创建你的投票活动</h4>
            <i class="fa fa-css3 fa-2x" aria-hidden="true"></i>
            <i class="fa fa-html5 fa-2x" aria-hidden="true"></i>
            <ul class="ending clearfix">
                <li><a href="">关于</a></li>
                <span class="ft-seg">·</span>
                <li><a href="">联系我们</a></li>
                <span class="ft-seg">·</span>
                <li><a href="">使用帮助与常见问题</a></li>
            </ul>
        </div>
    </div>-->
    <script src="/js/Chart.js"></script>
    <script src="/js/jquery.js"></script>
    <script type="text/javascript"  runat = "server" >
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($voteInfo['0']) ?>,
                datasets: [{
                    label: '{{$voteInfo['label']}}',
                    data: <?php echo json_encode($voteInfo['1']) ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });


   var interval =  setInterval("longPolling()", 3000);
   var times = "{{ $voteInfo['endTime'] }}";
   function longPolling() {

       $.ajax({
         url: "/vote/{{$voteInfo['id']}}/send/score",
         type:"get",
         dataType: "json",
         headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         },
         timeout: 50000,//5秒超时，可自定义设置
         error: function (XMLHttpRequest, textStatus, errorThrown) {
           if (textStatus == "timeout") { // 请求超时
             longPolling(); // 递归调用
           } else { // 其他错误，如网络错误等
             longPolling();
           }
         },
         success: function (data, textStatus) {


           voteInfo = data;
           endTime = data[0].nowTime;
            if ((new Date(endTime.replace(/-/g,"\/"))) > (new Date(times.replace(/-/g,"\/")))
                  || data[0].status == 0) {
              clearInterval(interval);
            }
           var da = [];
           for(var i = 0; i < voteInfo.length; i++)
           {
             da.push(voteInfo[i].c_score);
           }
           myChart.data['datasets'][0]['data'] = da;
           myChart.update();
         }
       });
     }
    </script>
</body>
</html>
