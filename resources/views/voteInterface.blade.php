<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote-Interface</title>
    <link rel="stylesheet" type="text/css" href="/css/vote-Inface.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="top-title-container">
       	<p class="myself text-adapt">{{$voteInfo->title}}</p>
    </div>
    <div class="items-container">
      	<form id="user-vote" action="{{route('vote.addSore')}}" method="POST">
          {{csrf_field()}}
          @foreach($voteInfo->candidate as $key =>$item)
            <div class="items clearfix">
          		<div class="item-group">
          			<div class="pic">
          				<a href="javascript:;"><img src="{{$item->c_img}}"></a>
          			</div>
          			<div class="no-and-name">
          				<ul class="clearfix">
							<li class="left">No.{{$key + 1}}</li>
							<li class="control"><input class="radio" type="radio" name="c_id" value="{{$item->c_id}}"></li>
							<li class="c_name right">{{$item->c_name}}</li>
          				</ul>
          			</div>
          		</div>
      		  </div>
            @endforeach
    </div>
        	<div class="submit">
        		<button id="submit" class="btn btn-danger">点击投票</button>
        	</div>
      </form>
    <div id="footer-container">
        <div class="footer">
            <h4>创建你的投票活动forFree</h4>
            <div class="icon-container">
	            <i class="fa fa-css3" aria-hidden="true"></i>
	            <i class="fa fa-html5" aria-hidden="true"></i>
        	</div>
        </div>
    </div>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
