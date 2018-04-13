



<br>

<form class="" action="{{ route('login.verify') }}" method="post">
  {{ csrf_field() }}
  <input type="text" name="account" value="123">
  <input type="password" name="password" value="qwerty">
  <input type="submit" name="" value="提交">
</form>
