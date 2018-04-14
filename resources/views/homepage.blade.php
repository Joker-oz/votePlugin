<div class="blade">
<div class="choose">
  @foreach ($votes as $vote)
    <li id="ll">
      <span id="title">
        <a href="{{ route('vote.show', $vote->id)  }}" style="color: black">
          {{ $vote->title }}
        </a>
      </span>
      @if ($vote->status == 1)
        <form class="mod-dieth" action="{{url('')}}/vote/over" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="vId" value="{{$vote->id}}">
          <input type="submit" name="" value="结束" class="button medium square red" onclick="custom_close()">
        </form>
      @else
        <span id="endding">已结束</span>
      @endif
    </li>
    @endforeach
</div>

</div>
{{ $votes->links() }}
<style media="screen">
#endding{
  position: relative;
  float: right;
  right: 29px;
  color: red;
  font-size: 22px;
  font-family: Micsorft-YAHEI;
  font-weight: 700;
}
ul {
  position: relative;
  width: 100%;
  top: 134px;
  text-align: center;

}

ul> {
  width: 45rem;
}


ul>li {
  list-style: none;
  display: inline;
  padding-left: 0px;
}

/* ul> li {
  counter-increment: pagination;
} */
ul> li:hover a {
  color: #fdfdfd;
  background-color: #1d1f20;
  border: solid 1px #1d1f20;
}
ul> li.active a {
  color: #fdfdfd;
  background-color: #1d1f20;
  border: solid 1px #1d1f20;
}

ul> li:first-child a:after {
  content: "<";
}

/* ul> li:nth-child(2) {
  counter-reset: pagination;
} */

ul> li:last-child a:after {
  content: ">";
}
ul> li a {
  border: solid 1px #d6d6d6;
  border-radius: 0.2rem;
  color: #7d7d7d;
  text-decoration: none;
  text-transform: uppercase;
  display: inline-block;
  text-align: center;
  padding: 0.5rem 0.9rem;
}
/* ul> li a:after {
  content: " " counter(pagination) " ";
} */

ul> li a {
  display: none;
}
ul> li:first-child a {
  display: inline-block;
}
ul> li:first-child a:after {
  content: "<";
}
ul> li:nth-child(2) a {
  display: inline-block;
}
ul> li:nth-child(3) a {
  display: inline-block;
}
ul> li:nth-child(4) a {
  display: inline-block;
}
ul> li:nth-child(5) a {
  display: inline-block;
}
ul> li:nth-child(6) a {
  display: inline-block;
}
ul> li:nth-child(7) a {
  display: inline-block;
}
ul> li:nth-child(8) a {
  display: inline-block;
}
ul> li:last-child a {
  display: inline-block;
}
ul> li:last-child a:after {
  content: ">";
}
ul> li:nth-last-child(2) a {
  display: inline-block;
}
ul> li:nth-last-child(3) {
  display: inline-block;
}
ul> li:nth-last-child(3):after {
  padding: 0 1rem;
  content: "...";
}
a{
  text-decoration: blink ;
}
a:link {
  color: black;
}
  .blade {
    position: relative;
  }
  #ll {
    height: 39px;
    list-style: none;
    border-bottom: 2px solid white;
  }
  #ll #title{
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
<script type="text/javascript">
  function custom_close() {
    if(confirm("您确定要结束吗？")){
      window.opener=null;
      window.open('','_self');
      window.close
    }
    else {
    }
  }
</script>
