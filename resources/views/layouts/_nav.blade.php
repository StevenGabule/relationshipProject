<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Browse
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a class="dropdown-item" href="/threads">All Threads</a>
            <a class="dropdown-item" href="/threads?popular=1">Popular Threads</a>
            <a class="dropdown-item" href="/threads?unanswered=1">Unanswered Threads</a>
            @if(Auth::check())
              <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">My Thread</a>
            @endif
          </div>
        </li>
        {{--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Channel
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($channels as $channel)
              <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
            @endforeach
          </div>
        </li>--}}
        @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="/threads/create">New Thread</a>
          </li>
        @endif
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="#">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="#">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
{{--              <a href="{{ route('profile', Auth::user()) }}" class="dropdown-item">My Profile</a>--}}
              <a href="#" class="dropdown-item">My Profile</a>
              <a class="dropdown-item" href=""
                 onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="" method="POST"
                    style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
