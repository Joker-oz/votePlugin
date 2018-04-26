<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live</title>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/showing.css">
    <script src="https://use.fontawesome.com/0ce41ada9d.js"></script>
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
        <img class="QR-img" src="/myImg/二维码.jpg" alt="二维码">
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
    <script src="/js/showing.js"></script>
</body>
</html>