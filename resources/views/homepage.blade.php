<div class="blade">
<div class="choose">
  @foreach ($votes as $votes)
    <li>
      <span id="title">
        <a href="{{ route('vote.show', $votes->id)  }}" style="color: black">
          {{ $votes->title }}
        </a>
      </span>
        <form class="mod-dieth" action="{{url('')}}/vote/over" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="vId" value="{{$votes->id}}">
          <input type="submit" name="" value="结束" class="button medium square red">
        </form>
    </li>
    @endforeach
</div>
</div>
<style media="screen">
a{
  text-decoration: blink ;
}
a:link {
  color: black;
}
  .blade {
    position: relative;
  }
  li {
    height: 39px;
    list-style: none;
    border-bottom: 2px solid white;
  }
  li #title{
    position: relative;
    font-size: 27px;
    color: black;
    font-family: Micsorft YAHEI;
    font-style: normal;
    left: 57px;
  }
  .mod-dieth {
    position: relative;
    /* float: right; */
    width: 13%;
    bottom: 30px;
    left: 87%;
  }
  #out {
    display: inline-block;
    background-color: red;
    border: none;
    border-radius: 10px;
    left: 20px;
    top: 2px;
  }
  #out>#end {
    color: white;
    font-style: normal;
    font-weight: 700;
  }
  .button {
    background-color: #999;
    background-image: -webkit-linear-gradient(hsla(0,0%,100%,.05), hsla(0,0%,0%,.1));
    background-image: -moz-linear-gradient(hsla(0,0%,100%,.05), hsla(0,0%,0%,.1));
    background-image: -ms-linear-gradient(hsla(0,0%,100%,.05), hsla(0,0%,0%,.1));
    background-image: -o-linear-gradient(hsla(0,0%,100%,.05), hsla(0,0%,0%,.1));
    border: none;
    border-radius: .5em;
    cursor: pointer;
    display: inline-block;
    font-family: sans-serif;
    font-size: 1em;
    font-weight: bold;
    padding: 1px 24px 5px;
    position: relative;
    text-decoration: none;
  }
  .button:hover {
      outline: none;
  }
  .button:hover,
  .button:focus {
      box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.2),
                  inset 0 2px 0 hsla(0,0%,100%,.1),
                  inset 0 1.2em 0 hsla(0,0%,100%,.1),
                  inset 0 -.2em 0 hsla(0,0%,100%,.1),
                  inset 0 -.25em 0 hsla(0,0%,0%,.25),
                  inset 0 0 0 3em hsla(0,0%,100%,.2),
                  0 .25em .25em hsla(0,0%,0%,.05);
  }
  .button:active {
      box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.2),
                  inset 0 2px 0 hsla(0,0%,100%,.1),
                  inset 0 1.2em 0 hsla(0,0%,100%,.1),
                  inset 0 0 0 3em hsla(0,0%,100%,.2),
                  inset 0 .25em .5em hsla(0,0%,0%,.05),
                  0 -1px 1px hsla(0,0%,0%,.1),
                  0 1px 1px hsla(0,0%,100%,.25);
      margin-top: .25em;
      outline: none;
      padding-bottom: .5em;
  }
  .medium {
      font-size: 1em;
  }
  .square {
      border-radius: .25em;
  }
  .red {
      background-color: #ff6c6f;
  }

</style>