<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item mr-1">
          <a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
          <a class="btn btn-primary btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
      @endif
      @else

       <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="{{ auth()->user()->profile->profile_img }}" class="user-image img-circle elevation-2" alt="User Image">
      <span class="d-none d-md-inline"> {{ Auth::user()->name }} </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="{{ auth()->user()->profile->profile_img }}" class="img-circle elevation-2" alt="User Image">
        <p>
            {{ Auth::user()->name }}  - Web Developer
          <small>Member since Nov. 2012</small>
        </p>
      </li>

      <!-- Menu Footer-->
      <li class="user-footer">
        <a href="/profil" class="btn btn-default btn-flat">Profile</a>
        <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right"> {{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
      </li>
    </ul>
  </li>
      @endguest
    </ul>
  </nav>
  <!-- /.navbar -->
