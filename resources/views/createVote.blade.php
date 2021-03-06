<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creat-Vote</title>
    <link rel="stylesheet" href="/css/createVote.css">
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <!--Fontawesome Icon-->
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
            <!-- <span class="seg">|</span>
            <a href="{{ route('vote.edit')}}" class="top-nav-list">开始创建</a> -->
            <form id="toExit" action="{{ route('logout')}}" method="POST" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a href="javascript:;" id="exit" class="top-nav-list exit">退出</a>
            </form>
        </div>
    </div>
    <!--头部导航结束-->

    <!--候选人类型投票内容部分开始-->
    <div id="main-content-container">
        <ul class="info">
            <li><a href="{{ url('/index')}}" class="index">首页</a></li>
            <span>/</span>
            <li>创建投票</li>
        <li class="return"><a href="{{ route('index')}}"><button type="button" class="btn btn-danger">返回</button></a></li>
        </ul>
        <div id="main-wrapper">
            <div class="operate-bar-container clearfix">
                <div id="vote-of-man-item" style="display:none;">
                    <h2 class="strong">创建投票</h2>
                    <button class="btn btn-success vote-of-project" index="1">创建事物类投票</button>
                    <button class="btn btn-danger vote-of-man" index="1">创建人物类投票</button>
                    <h3>候选人投票基本设置</h3>
                <form id="vote-data-of-man" action="{{ route('vote.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="object" value="1">
                        <div class="item-group top-one">
                            <label class="control-label" for="inputTitle" style="padding:5px 0px;">投票标题</label>
                            <div class="control">
                            <input id="inputTitle" class="inputTitle" type="text" name="title" placeholder="请填入投票标题" required="required">
                            </div>
                        </div>
                        <h3>活动介绍</h3>
                        <h5 style="font-weight: 400;margin:10px 0px;">请在下方输入本次投票活动的主题内容：</h5>
                        <textarea id="act-content" class="txtarea" rows="15" cols="75" name="body" style="resize: none;font-size: 16px;margin-bottom: 20px;" required="required"></textarea>
                        <h2 style="margin-top:20px;">创建候选人</h2>
                        <h3>基本候选人设置</h3>
                        <!--添加候选人开始-->
                        <div class="candidate">
                            <button id="addCder" type="button" class="btn btn-danger mar-bottom">添加候选人</button>
                            <button id="num-addCder" type="button" class="btn btn-success mar-bottom" style="margin-left:20px;">批量添加候选人</button>
                            <div id="div-toggle" class="clearfix">
                                <label  class="cderNumber" for="cderNumber">批量增加候选人数</label>
                                <input id="cderNumber" type="number" class="num-add">
                                <button id="confirm" type="button" class="btn btn-primary">确定</button>
                            </div>
                            <div class="candidater-bar">
                                <table  id="target-tb" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <td>候选人姓名</td>
                                        <td>上传个性照</td>
                                        <td>文件名</td>
                                    </thead>
                                    <tr>
                                        <td>
                                            <input id="cname" class="txtarea height" type="text" name="c_name1" placeholder="请输入候选人姓名" required="required">
                                        </td>
                                        <td>
                                            <input id="file" type="file" name="file1" >
                                            <button id="submitPic" type="button" class="btn btn-warning submit-pic">上传本地图片</button>
                                        </td>
                                        <td>
                                            <input disabled id="first-show" type="text" class="showfile">
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <!--添加候选人结束-->

                        <!--投票截止日期-->

                        <div class="keeping-time-container">
                                <div class="setTime">
                                    <button type="button" class="btn btn-primary set-time">设置投票持续时间</button>
                                    <div class="set-main clearfix">
                                        <input type="number" name="inputEndTime" class="setted" placeholder="持续时间/Min">
                                        <span class="time-icon"><i class="fa fa-clock-o fa-2x color" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                        <!--投票截止日期结束-->

                        <button id="submit-of-man" type="submit" class="btn btn-success">创建投票</button>
                    </form>
                    <!--表单结束-->
                </div>
                <!--候选人类投票结束-->


                <!--事物类投票开始-->
                <div id="vote-of-project-item" style="display:block;">
                    <h2 class="strong">创建投票</h2>
                    <button class="btn btn-success vote-of-project" index="2">创建事物类投票</button>
                    <button class="btn btn-danger vote-of-man" index="2">创建人物类投票</button>
                    <h3>事物类投票基本设置</h3>
                    <form id="vote-data-of-project" method="post"action="{{route('vote.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="object" value="2">
                        <div class="item-group top-one">
                            <label class="control-label" for="inputTitle" style="padding:5px 0px;">投票标题</label>
                            <div class="control">
                            <input id="inputTitle" class="inputTitle" type="text" name="title" placeholder="请填入投票标题" required="required">
                            </div>
                        </div>
                         {{-- <div class="item-group">
                            <label class="control-label">投票类型</label>
                            <div class="control">
                                <input id="dan" class="pro-voteType" type="radio" name="pro-voteType" required="required" value="单选">
                                <label class="radio" for="dan">单选</label>
                                <input style="margin-left:8px!important;" id="duo" class="pro-voteType" type="radio" name="pro-voteType" required="required" value="多选">
                                <label class="radio" for="duo">多选</label>
                            </div>
                        </div> --}}

                        <h3>活动介绍</h3>
                        <h5 style="font-weight: 400;margin:10px 0px;">请在下方输入本次投票活动的主题内容：</h5>
                        <textarea id="act-content" class="txtarea" rows="15" cols="75" name="body" style="resize: none;font-size: 16px;margin-bottom: 20px;" required="required"></textarea>
                        <h3>投票选项</h3>
                        <div class="choice-container">
                            <div class="options">
                                <span class="add-num">1</span><input class="inputOption" type="text" name="c_name1" placeholder="请输入投票选项" required="required"><input id="another-file" type="file" name="file1"><button id="submitPic-of-pro" type="button" class="btn btn-warning pro-pic">上传相关图片</button><input disabled id="sc-show" type="text" class="pro-showfile">
                            </div>
                        </div>

                        <button type="button" id="addOpt" class="btn btn-primary btn-control" style="margin-left:0px;">添加投票项</button>
                        <!--其它投票选项-->
                        {{-- <div class="options">
                            <span class="add-num">其它</span>
                            <input id="xuantianBar" class="inputOption-else" type="text" name="options_else" placeholder="用于用户无满意选项时，可自定义输入内容">
                            <span class="xuantian">(选填)</span> --}}
                        {{-- </div> --}}

                        <!--添加投票项结束-->



                        <!--投票截止日期开始-->

                        <div class="keeping-time-container pro-setTime">
                                <div class="setTime">
                                    <button type="button" class="btn btn-danger set-time">设置投票持续时间</button>
                                    <div class="set-main clearfix">
                                        <input type="number" name="inputEndTime" class="setted" placeholder="持续时间/Min">
                                        <span class="time-icon"><i class="fa fa-clock-o fa-2x color" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>


                        <!--投票截止日期结束-->
                        <button id="submit-of-project" type="submit" class="btn btn-success btn-control">创建投票</button>
                    </form>
                    <!--表单结束-->
                </div>
                <!--事物类投票结束-->
            </div>
            <!--主体内容右侧的列表-->
            <div id="right-side-container">
                <h3 class="vote-demo" style="font-weight:bold;">最近投票历史记录</h3>
                <ul class="demo">
                  @foreach($voteInfos as $voteInfo)
                    <li><a href="{{route('vote.show',$voteInfo->id)}}">{{$voteInfo->title}}</a></li>
                    @endforeach
                    <!-- <li><a href="">雀巢脆脆鲨休闲零食</a></li>
                    <li><a href="">卫龙休闲辣条</a></li>
                    <li><a href="">三只松鼠干脆面串</a></li>
                    <li><a href="">良品铺子麻花</a></li>
                    <li><a href="">熊九九糖水黄桃水果罐头</a></li>
                    <li><a href="">卧龙手工锅巴</a></li>
                    <li><a href="">Orion好丽友薯片</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="footer-container">
            <h4>创建你的投票活动ForFree</h4>
            <i class="fa fa-css3 fa-2x" aria-hidden="true"></i>
            <i class="fa fa-html5 fa-2x" aria-hidden="true"></i>
            {{-- <ul class="ending clearfix">
                <li><a href="">关于</a></li>
                <span class="ft-seg">·</span>
                <li><a href="">联系我们</a></li>
                <span class="ft-seg">·</span>
                <li><a href="">使用帮助与常见问题</a></li>
            </ul> --}}
        </div>
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/createVote.js"></script>
</body>
</html>
