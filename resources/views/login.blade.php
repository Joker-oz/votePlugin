<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--
    <div id="top-Bar">
        <div class="top-nav-container clearfix">
            <a href="javascript:;" class="top-logo">
                <i class="fa fa-creative-commons"></i>
            </a>
            <a href="" class="title" id="none">
                Creat-Vote
            </a>
            <a href="" class="top-nav-list">首页</a>
            <a href="" class="top-nav-list">首页</a>
            <span class="seg">|</span>
            <a href=" route('vote.edit')" class="top-nav-list">开始创建</a>
            <a href="" class="top-nav-list exit">
                退出
            </a>
            <span class="seg right">|</span>
            <a href="./用户登录界面.html" class="top-nav-list logIn">
                登录
            </a>     
        </div>
    </div>
    -->
    <!--登录主体-->
    <div id="logIn-container">
        <!--<ul class="info">
            <li><a href="url('/index')" class="index">首页</a></li>
            <span>/</span>
            <li>登录</li>
        </ul>
        -->
        <div class="logIn-box">
            <div class="logIn-header">
                <h4>LOGIN</h4>
            </div>
            <form id="form" action="{{ route('login.verify') }}" class="user-data" method="post">
                {{ csrf_field() }}
                <div class="input-box">
                    <span class="icon user-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                    <input type="text" name="username" placeholder="用户名">
                </div>
                <div class="input-box">
                    <span class="icon passicon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                    <input type="password" name="password" placeholder="密码">
                </div>
                
            </form>
            <div class="remember-box">
                <label>
                    <input type="checkbox" value="是">&nbsp;记住密码
                </label>
                </div>
                <div class="login-button-box">
                    <button id="submit" type="submit">点击登录</button>
                </div>
        </div>
    </div>
    <!--登录主体结束-->

    <div id="footer">
        <div class="footer-container">
            <h4 class="ft-str">创建你的投票活动ForFree</h4>
            <i class="fa fa-css3 fa-2x" aria-hidden="true"></i>
            <i class="fa fa-html5 fa-2x" aria-hidden="true"></i>
        </div>
    </div>
</body>
<script src="/js/jquery.js"></script>
<script src="/css/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/login.js"></script>
</html>