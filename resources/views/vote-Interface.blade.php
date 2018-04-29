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
       	<p class="myself text-adapt">寻出最美笑容</p>
    </div>
    <div class="items-container">
    	<form id="user-vote" action="" method="POST">
    	<div class="items clearfix">
    		<div class="item-group">
    			<div class="pic">
    				<a href=""><img src="me.jpg"></a>
    			</div>
    			<div class="no-and-name">
    				<ul class="clearfix">
    					<li><span>No.1</span></li>
    					<li class="c_name">《小仙女》</li>
    				</ul>
    			</div>
    			<div class="click">
    				<input class="radio" type="radio" name="this" value="1">
    			</div>
    		</div>
    		<div class="item-group">
    			<div class="pic">
    				<a href=""><img src="me.jpg"></a>
				</div>
				<div class="no-and-name">
    				<ul class="clearfix">
    					<li><span>No.1</span></li>
    					<li class="c_name">《小仙女》</li>
    				</ul>
    			</div>
    			<div class="click">
    				<input class="radio" type="radio" name="this" value="2">
    			</div>
    		</div>
    		<div class="item-group">
    			<div class="pic">
    				<a href=""><img src="me.jpg"></a>
				</div>
				<div class="no-and-name">
    				<ul class="clearfix">
    					<li><span>No.1</span></li>
    					<li class="c_name">《小仙女》</li>
    				</ul>
    			</div>
    			<div class="click">
    				<input class="radio" type="radio" name="this" value="3">
    			</div>
    		</div>
    			<div class="item-group">
    			<div class="pic">
    				<a href=""><img src="me.jpg"></a>
    			</div>
    			<div class="no-and-name">
    				<ul class="clearfix">
    					<li><span>No.1</span></li>
    					<li class="c_name">《小仙女》</li>
    				</ul>
    			</div>
    			<div class="click">
    				<input class="radio" type="radio" name="this" value="4">
    			</div>
    		</div>
    	</div>
    	<div class="submit">
    		<button id="submit" class="btn btn-danger">点击投票</button>
    	</div>
    </form>
    </div>
    <div id="footer-container">
        <div class="footer">
            <h4>免费创建你的投票活动forFree</h4>
            <div class="icon-container">
	            <i class="fa fa-css3 fa-2x" aria-hidden="true"></i>
	            <i class="fa fa-html5 fa-2x" aria-hidden="true"></i>
        	</div>
        </div>
    </div>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>