
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote for Live</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
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
        <form action="{{ route('logout')}}" method="POST" >
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="submit" class="top-nav-list exit" name="" id="" value="退出"> 
        </form>
            
            @if(!Auth::check())
                <span class="seg right">|</span>
                <a href="{{ route('login')}}" class="top-nav-list logIn">
                    登录
                </a>
            @endif
           
        </div>
    </div>
    <!--头部导航结束-->
    <!--票数图表开始-->

    <div id="main-content-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
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
                        @foreach($votes as $vote)
                            <tr>
                            <td class="pro-name">{{$vote->title}}</td>
                            <td> {{$vote->created_at}} —— {{$vote->updated_at}}</td>
                            @if( $vote->status == 0)
                                <td>已结束</td>
                            @else
                                <td>进行中</td>
                            @endif
                             
                            <td><a href="{{ route('vote.show',$vote->id) }}"><button type="button" class="btn btn-warning">点击查看</button></a></td>
                            </tr>
                        @endforeach
                        
                    </table>
                    {{ $votes->links() }}
                    
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
                <li><a href="#">关于</a></li>
                <span class="ft-seg">·</span>
                <li><a href="#">联系我们</a></li>
                <span class="ft-seg">·</span>
                <li><a href="#">使用帮助与常见问题</a></li>
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