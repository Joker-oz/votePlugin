{{-- 登陆 --}}
<header>
  <div class="container">
    <div class="head">

  </div>
  </div>
</header>

<style media="screen">
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
