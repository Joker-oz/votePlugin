<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta charset="utf-8">
    <script src="/js/chart.js"></script>
    <script src="/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/font/font-awesome.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <title>@yield('title', '投票系统')</title>
  </head>
  <body>
    @include('_head')
    <div class="mid">
      @include('_main')
    </div>
  </body>
</html>
<style media="screen">
  *{
    -webkit-box-sizing: border-box;
  }
  .mid{
    min-height: calc(100vh - 70px);
    width: 100%;
    background-color: rgba(198, 222, 238, 1);
  }
</style>
