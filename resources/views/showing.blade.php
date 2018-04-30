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
            <!-- <a href="./跳转票数直播.html" class="top-nav-list">票数直播</a>
            <a href="" class="top-nav-list exit">
                退出
            </a>
            <span class="seg right">|</span>
            <a href="./用户登录界面.html" class="top-nav-list logIn">
                登录
            </a> -->
        </div>
    </div>
    <!--二维码区域-->
    <div class="QR-code">
        <img class="QR-img" src="{{$voteInfo['qr_link']}}" alt="二维码">
    </div>


    <!--导航条-->
    <div id="main-content-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
            <li>票数直播</li>
            <span>/</span>
            <li class="right">
                <form id="closes" action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="status" style="display:none;" value="0">
                    <button id="closeInterval" type="button" class="btn btn-danger">点击截止投票</button>
                </form>
            </li>
            <!-- <li>直播界面</li> -->
            <!-- <li class="return"><a href="./用户登录界面.html"><button type="button" class="btn btn-danger">返回</button></a></li> -->
        </ul>

        <!--画布区域-->
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>

         <!--页面底部-->
        <div id="countDown" class="deadLine" style="display:block;">
                <div class="showBar">
                    <span class="tipTxt">距截止还剩:</span>
                    <span class="mins Center"></span>
                    <span class="txtcolor">&nbsp;:&nbsp;分</span>
                    <span class="seconds Center"></span>
                    <span class="txtcolor">&nbsp;:&nbsp;秒</span>
                </div>
            </div>
            <div id="alertEnd" class="deadLine" style="display:none;">
                    <div class="showBar">
                        <span class="tipTxt ended">投票已截止</span>
                    </div>
                </div>
    </div>

    <script src="/js/Chart.js"></script>
    <script src="/js/jquery.js"></script>
    <script type="text/javascript"  runat = "server" >
    window.onload = function(){
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
     };


//倒计时函数 
    var timer = null;
     function countDown(){
        var curTime = new Date();
        var EndTime = new Date("{{ $voteInfo['endTime'] }}");
        var leftTime = (EndTime.getTime() - curTime.getTime());
        //console.log("毫秒数——leftTime = " + leftTime);
        if(leftTime <=0){
            $('#countDown').hide();
            $('#alertEnd').show();
            return false;
        }//以下情况是距离结束还剩有效时间！
        else{
            var leftSeconds = Math.floor(leftTime / 1000);
            //console.log("剩余秒数-leftSeconds = " + leftSeconds);
            var leftMins = Math.floor(leftSeconds / 60);
            //console.log("剩余分钟数-leftMins = " + leftMins);
            var S = leftSeconds;//当分钟数剩余为0 而秒数还有60秒以内时用
            var SS = leftSeconds;//当分钟数和秒数都有剩余时候用
            timer = setInterval(function(){
            if(leftMins == 0){
                $('.mins').html(leftMins);
                    if(S >= 0){
                        $('.seconds').html(S);
                        S -= 1;
                    }
                    else{
                        $('#countDown').hide();
                        $('#alertEnd').show();
                        clearInterval(timer);
                        return;
                    };
            }//第一种情况结束 分钟为0 秒数有剩余！
                else{
                    var newMins = Math.floor(SS / 60);
                    console.log(SS);
                    $('.mins').html(newMins);
                    var newS = SS % 60;
                    $('.seconds').html(newS);
                    SS--; 
                    SS == -1 && clearInterval(timer);
                };
            }/*定时器内执行的函数结束！*/,1000);//定时器结束！
        }//else情况结束！
    };
        countDown();//启动倒计时！
        $('#closeInterval').click(function(){
            clearInterval(timer);
            $('#closes').submit();
        });





};//onload函数结尾 整个JS文件结尾
    </script>
</body>
</html>
