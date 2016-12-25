<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Social</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if(Auth::check())
      <ul class="nav navbar-nav">
        <li><a href="#">Timeline</a></li>  
        <li><a href="#">Friends</a></li>      
      </ul>
      @endif

      @if(Auth::user())
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
       @endif

      <ul class="nav navbar-nav navbar-right">
      @if(Auth::user())
        <li><a href="#">Amr</a></li>    
        <li><a href="#">Update Profile</a></li>
        <li><a href="#">Sign out</a></li>
        @else
        <li><a href="{{ route('auth.signup') }}">Sign up</a></li>   
        <li><a href="{{ route('auth.signin') }}">Sign in</a></li> 
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>