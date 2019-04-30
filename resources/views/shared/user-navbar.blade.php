<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Blog:Thirty</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>
            </ul>
        <!-- /.navbar-collapse -->
            <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
                @if(Auth::user())
                    @if(Auth::user()->isAdmin())
                        <li><a href="/admin">Admin</a></li>
                    @endif
                    <li><a href="/logout"><i class="fa fa-user fa-fw"></i> Log Out</a></li>
                @else
                    <li><a href="/register"><i class="fa fa-gear fa-fw"></i> Register</a></li>
                    <li><a href="/login"><i class="fa fa-user fa-fw"></i> Log In</a></li>
                @endif
                </ul>
            </ul>
        </div>
    </div>
</nav>