{{-- 跳转后--}}
<header>
  <div class="container">
    <div class="head">
      <div class="mod-return">
        <a href="javascript:history.go(-1)">
          <button type="button" name="submit" class="log">
            <i class="fa fa-undo fa-3x" aria-hidden="true"></i>
          </button>
        </a>
      </div>
      <form action="{{ route('logout') }}"  method="POST" class="logout">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        <button type="submit" name="submit" class="log">
          <span>退出</span>
        </button>
      </form>
      <canvas id="line" width="6px" height="40px"></canvas>
    <div class="mod-make">
      <a href="{{ url('/vote/edit') }}">
        <button type="button" name="submit" class="log">
          <span>创建投票</span>
        </button>
      </a>
    </div>
  </div>
  </div>
</header>

<style media="screen">
  .mod-return{
      position: relative;
      float:left;
      left: 24px;
      top: 16px;
  }
  span{
    color: white;
    font-size: 15px;
  }
  body{
    margin: 0;
  }
  .container {
    position: relative;
    z-index: 1000;
    margin-bottom: 0;
    min-height: 40px;
    border: 0;
    top: 0;
    left: 0;
    right: 0;
  }
  .head {
    position: relative;
    height: 70px;
    background-color: #47575f;
  }
  #word{
    position: absolute;
    left: 90px;
    bottom: 26px;
    width: 300px;
    margin: 0;
  }
  #word span{
    font-family: 'Arial Negreta', 'Arial Normal', 'Arial';
    font-size: 20px;
    color: white;
    width: 500px;
  }
  .logout{
    position: relative;
    float: right;
    background-color: inherit;
    right: 55px;
    top: 26px;
  }
  .mod-make{
    position: relative;
    float: right;
    background-color: inherit;
    right: 95px;
    top: 26px;

  }
  .log {
    background-color: inherit;
    border: none;
    outline: inherit;
  }
  canvas{
    position: relative;
    float: right;
    right: 77px;
    top: 13px;
  }
</style>
<script type="text/javascript">
  var a = document.getElementById("line");
  var lin = a.getContext("2d");
  lin.beginPath();
  lin.moveTo(4, 6);
  lin.lineTo(20, 1000);
  lin.stroke();
</script>
