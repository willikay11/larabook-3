<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Larabook 3</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">{{ link_to_route('users_path', 'Browse Users') }}</li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Another action</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                <li class="dropdown">
                    
                    <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}"  alt="{{ $currentUser->username }}">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $currentUser->username }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{{ link_to_route('profile_path', 'My Profile', $currentUser->username) }}</li>
                        <li><a href="#">Another action</a></li>
                        <li role="separator" class="divider"></li>
                        <li>{{ link_to_route('logout_path', 'Logout') }}</li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                @else
                    <li> {{link_to_route('register_path', 'Register')}} </li>
                    <li> {{link_to_route('login_path', 'Login')}} </li>
                @endif
            </ul>
        </div>
    </div>
</nav>