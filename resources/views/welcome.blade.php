<form class="" action="{{ route('vote.store')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <!-- 这是vote模型需要的数据 -->
  <input type="text" name="title" value="这是一个很长的标题">
  <input type="text" name="object" value="1 or 2">
  @for ($i = 0; $i < 2; $i++)
  <!-- 这是候选者资料   1  -->
  <input type="text" name="c_name{{$i}}" value="">
    <!-- 这是候选者图片 -->
  <input type="file" name="file{{$i}}" value="">
  <!-- 候选者资料需要数据结束 -->
  @endfor

  投票时长（分钟）：
  <input type="text" name="inputEndTime" value="0">
  <input type="submit" name="" value="发布">
</form>



<br>

<form class="" action="{{ route('login.verify') }}" method="post">
  {{ csrf_field() }}
  <input type="text" name="account" value="123">
  <input type="password" name="password" value="qwerty">
  <input type="submit" name="" value="提交">
</form>

<br>
<form class="" action="{{ route('logout') }}" method="post">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <input type="submit" name="" value="提交">
</form>
<br>

@if(\Cache::has('vote'))
  {{ \Cache::get('vote') }}
@endif
