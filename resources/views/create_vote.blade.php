@extends('defaultone')
@include('_top')
@section('title', '人物')
@section('content')
<div class="main">
<div class="middle">
	<div class="choose"><button class="choose" id="choose1" ><span class="choose" id="choose1">人物投票</span></button>
	<a href="{{url('')}}/vote/add/">
	<button class="choose" id="choose2"><span class="choose" id="choose2">作品投票</span></button>
  </a>
	</div>
	<br>
    <form method="post" enctype="multipart/form-data" action="{{ route('vote.store')}}" class="mod-pic">
      {{ csrf_field() }}
      <div class="title">
        <input type="text" name="title" value="" placeholder="标题" id="tit">
        <input type="hidden" name="object" value="2">
				<span id="person">最少输入2个人</span>
        <label id="timeout">结束时间:(min)</label>
        <input type="text" name="inputEndTime" value="0" id="time" placeholder="结束时间">
      </div>
				<br>
  @for ($i=0; $i < 10; $i++)
    <label id="name">姓名：</label>
			<input type="text" name="c_name{{$i}}" id="title" placeholder="请输入人名..." >
      <input type="file" name="file{{$i}}" value="" id="image">
      <hr>
  @endfor
  <button type="submit" id="sub">
        <span>提交</span>
    </button>
</form>
</div>
</div>
@stop
<style>
#person {
	color: black;
	right: 245px;
	/* top: 150px; */
	font-size: 15px;
	font-style: normal;
	font-weight: 700;
	position: relative;
	}
.title #tit {
	left: 128px;
	position: relative;
	border-radius: 5px;
	border: 0;
	height: 33px;
	width: 207px;
}
#timeout {
	position: relative;
	left: 129px;
	top: -6px;
	font-size: 13px;
}
#time{
	top: -5px;
	left: 132px;
	position: relative;
  width: 53px;
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
#sub {
 position: fixed;
 top: 93%;
 left: 62%;
 height: 40px;
 width: 11%;
 border-radius: 5px;
 background: inherit;
 border: none;
 background-color: rgba(180, 211, 233, 1);
}
#sub span {
  font-weight: 700;
  font-style: normal;
  color: #30719c;
  font-family: "Microsoft YaHei";
  font-size: 15px;
}
.title {
  position: relative;
  text-align: center;
}
.mod-pic {
  height: 100%;
}
#name {
  position: relative;
  top: 0px;
  left: 53px;
}
#image {
  border: 1px solid;
  border-color: rgba(157, 198, 225, 1);
  position: relative;
  left: 38%;
  top: 22%;
}
p#header{
  	padding-left: 10%;
  }
span#col{
	background-color: #64A5D0;
	padding: 3% 1% 1% 0%;
	border-radius: 10px;
}
span#bulletin{
	color: #64A5D0;
	font-size: 200%;
	font-family: 'Arial Negreta', 'Arial Normal', 'Arial';
    font-weight: 700;
    font-style: normal
}
span.choose{
	font-family: 'Arial Negreta', 'Arial Normal', 'Arial';
    font-weight: 700;
    font-style: normal;
    font-size: 16px;
    color: rgba(221, 235, 244, 1);
}
span.choose#choose2{
	color: #64A5D0;
}


button.choose{
	border: 1px solid transparent;
	background-color: rgba(221, 235, 244, 1);
	border-top-left-radius: 7px;
	border-top-right-radius: 7px;
	height: 8%;
	width: 15%;
	position: absolute;
	top: -8%;

}
button.choose#choose2{
	left: 15%;
}
button.choose#choose1{
	background-color: #64A5D0;
}
input#title{
  height: 26px;
  border: 1px solid;
  border-color: rgba(157, 198, 225, 1);
  position: relative;
  left: 7%;
  top: 7.5%;
}
a#file{
	position: absolute;
	left: 13%;
	top: 63%;
	background-color: rgba(54, 130, 180, 1);
	width: 18%;
	height: 6%;
	border-radius: 5px;
}
a#file:hover{
	cursor: default;
}
input#file{
	opacity: 0;
	position: absolute;
	width: 100%;
	height: 100%;
}
span#file{
	font-size: 120%;
	font-weight: bold;
	position: absolute;
	top: 10%;
	left: 20%;
	color: #fff;
}

</style>
