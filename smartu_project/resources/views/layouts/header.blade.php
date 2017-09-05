<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">{{ __("header.toggle_nav") }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('index') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-home fa-fw" aria-hidden="true"></i> {{ __("header.home") }}</a>
                </li>
                <li class="{{ Route::currentRouteNamed('projects.index') ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}"><i class="fa fa-paperclip fa-fw" aria-hidden="true"></i> {{ __("header.projects") }}</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="{{ Route::currentRouteNamed('register') ? 'active' : '' }}"><a href="{{ route('register') }}">{{ __("header.register") }}</a></li>
                    <li class="{{ Route::currentRouteNamed('login') ? 'active' : '' }}"><a href="{{ route('login') }}">{{ __("header.login") }}</a></li>
                @else
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" class="hidden-xs profile-image img-circle img-responsive">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('profile') }}"><i class="fa fa-user-circle fa-fw" aria-hidden="true"></i> {{ __("header.profile") }}</a></li>
                        <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> {{ __("header.logout") }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </li>
                    </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="text-uppercase dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ config('app.locale') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach (config('app.locales') as $lang => $language)
                            @if ($lang != app()->getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">
                                        {{ $language }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
