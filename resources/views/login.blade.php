<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
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
            <!-- <a href="{{ route('index')}}" class="top-nav-list">首页</a> -->
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
    <!--登录主体-->
    <div id="logIn-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
            <li>登录</li>
        </ul>
        <div class="logIn-box">
            <div class="logIn-header">
                <h4>登录</h4>
            </div>
            <form id="form" action="{{ route('login.verify') }}" class="user-data" method="post">
                {{ csrf_field() }}
                <div class="input-box">
                    <span class="icon user-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                    <input type="text" name="username" placeholder="Please enter username">
                </div>
                <div class="input-box">
                    <span class="icon passicon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                    <input type="password" name="password" placeholder="Please enter your password">
                </div>
                
            </form>
            <div class="remember-box">
                <label>
                    <input type="checkbox">&nbsp;Remember Me
                </label>
                </div>
                <div class="login-button-box">
                    <button id="submit" type="submit">Login</button>
                </div>
        </div>
    </div>
    <!--登录主体结束-->

    <div id="footer">
        <div class="footer-container">
            <h4 class="ft-str">免费创建你的投票活动</h4>
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
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/login.js"></script>
</html>