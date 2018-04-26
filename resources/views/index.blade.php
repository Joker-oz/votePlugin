<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote for Live</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/0ce41ada9d.js"></script>
</head>
<body>
    <!--头部导航开始-->
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
    <!--头部导航结束-->
    <!--票数图表开始-->

    <div id="main-content-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
            <li class="return"><a href="{{ url('/index')}}"><button type="button" class="btn btn-danger">返回</button></a></li>
        </ul>
        <div id="main-wrapper">
            <div class="operate-bar-container clearfix">
                <div id="vote-list">
                    <table id="target-tb" class="table table-hover table-striped table-bordered">
                        <thead>
                            <td>投票项目名</td>
                            <td>活动日期</td>
                            <td>投票活动状态</td>
                            <td>票数图表</td>
                        </thead>
                        <tr>
                            <td class="pro-name">《定格时光》摄影大赛</td>
                            <td>2018.4.22——2018.5.10</td>
                            <td>正在进行</td>
                            <td><a href="./票数动态变化.html"><button type="button" class="btn btn-warning">点击查看</button></a></td>
                        </tr>
                        <tr>
                            <td class="pro-name">《优舞明星》人气选拔</td>
                            <td>2018.4.22——2018.5.10</td>
                            <td>已结束</td>
                            <td><button type="button" class="btn btn-warning">点击查看</button></td>
                        </tr>
                    </table>
                </div>
            </div>
             <!--画布区域-->
        </div>
    </div>


    <!--票数图表结束-->


    <!--页面足底部-->
    <div id="footer">
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
    </div>
    <!--页面足底部分结束-->
    <script src="/js/Chart.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>