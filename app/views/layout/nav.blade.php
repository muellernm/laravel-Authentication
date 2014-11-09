<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
        <span class="icon-bar"></span><span class="icon-bar"></span>
      </button>
      <a href="{{URL::route('home')}}" class="navbar-brand">
        <span>Auth<strong>App</strong></span>
      </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{URL::route('home')}}">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-center">
          <li><a href="{{URL::route('user_list')}}">List</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="fa fa-sign-in"></span>  Login</a></li>
      </ul>
    </div>
  </div>
</div>

