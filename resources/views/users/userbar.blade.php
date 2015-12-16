<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><div class="shards-logo shards-image"></div></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @if( $authUser )
                <li><a href="#">Characters</a></li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Weapons</a></li>
                    <li><a href="#">Armour</a></li>
                    <li><a href="#">Consumables</a></li>
                    <li><a href="#">Items</a></li>
                    <!--<li role="separator" class="divider"></li>-->
                </ul>
            </li>
            <li><a href="#">Enemies</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="#">Help</a></li>-->
            @if( $authUser )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $authUser->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
            @else
                <li><a href="/register">Register</a></li>
                <li><a href="/login">Login</a></li>
            @endif

        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
