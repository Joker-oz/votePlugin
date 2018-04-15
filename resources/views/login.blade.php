@extends('default')
@section('title', 'login')
@section('content')
<div class="gra-md-form">
  <form method="post" action="{{url('')}}/login">
    {{ csrf_field() }}
    <table border="1" cellspacing="0" width="400" height="100">
      <tr>
        <td id="three"></td>
        <td id="four">&nbsp&nbsp&nbsp&nbsp</td>
      </tr>
      <tr>
        <td id="one">&nbsp&nbsp&nbsp&nbsp</td>
        <td id="two"><input name="account" type="text" placeholder="username" border-style="none" id="inputuser" style="outline: none"></td>
      </tr>
      <tr>
        <td id="three"></td>
        <td id="four">&nbsp&nbsp&nbsp&nbsp</td>
      </tr>
      <tr>
        <td id="three"></td>
        <td id="four">&nbsp&nbsp&nbsp&nbsp</td>
      </tr>
      <tr>
        <td id="one"></td>
        <td id="two"><input name="password" type="PassWord" placeholder="password" border-style="none" id="passwordinput" style="outline: none"></td>
      </tr>
    </table>
    <input type="submit" name="" value=登陆 id="button">
  </form>
</div>
</div>
</form>
</div>
@stop
<style media="screen">
  table {
    position: relative;
    left: 36%;
    top: -15%;
    border: solid 0px rgba(54, 130, 180, 1);
  }

  td {
    border: 0;
    border-right: 0;
  }

  #one {
    border-bottom: 1.2px solid #4f94c3;
  }

  #two {
    border-left: 1.2px solid #4f94c3;
    border-bottom: 1.2px solid #4f94c3;
  }

  #four {
    border-left: 1.2px solid #4f94c3;
  }

  .gra-md {
    position: relative;
    height: inherit;
    width: inherit;
  }

  .gra-md-fir-tit {
    position: relative;
    top: 75px;
    left: 0;
    text-align: center;
  }

  #first {
    font-size: 32px;
    font-family: "Microsoft YaHei";
    color: #3987BB;
    font-weight: 700;
    font-style: normal;
  }

  .gra-md-sec-tit {
    position: relative;
    top: 87px;
    left: 0;
    text-align: center;
  }

  #second {
    font-size: 24px;
    font-family: "Microsoft YaHei";
    color: #3987BB;
    font-weight: 700;
    font-style: normal;
  }

  .gra-md-form {
    position: relative;
    top: 230px;
    left: 0;
    text-align: center;
  }

  .gra-md-form form {
    height: 200px;
  }

  #inputuser {
    width: 350px;
    top: 30px;
    font-size: 18px;
    border-width: 0px;
    background-color: transparent;
    font-family: "Microsoft YaHei"
  }

  #passwordinput {
    width: 350px;
    top: 80px;
    font-size: 18px;
    border-width: 0px;
    background-color: transparent;
    font-family: "Microsoft YaHei"
  }

  #button {
    position: relative;
    top: 46px;
    border-width: 0px;
    width: 140px;
    height: 40px;
    background: inherit;
    background-color: rgba(22, 155, 213, 1);
    border: none;
    border-radius: 5px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
  }
</style>
