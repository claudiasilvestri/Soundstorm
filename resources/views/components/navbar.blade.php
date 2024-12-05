<nav class="navbar navbar-expand-lg bg-orange">
  <div class="container-fluid">
    <a class="navbar-brand text-primary" href="#" style="font-family: 'Helvetica Neue'; font-size: 2rem;"><strong>Soundstorm</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ms-3">
          <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
        </li>
        @auth
        <li class="nav-item dropdown ms-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.page') }}">Profilo</a></li>
            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Esci</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
              @csrf
            </form>
          </ul>
        </li>
        @else
        <li class="nav-item dropdown ms-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto Guest
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
          </ul>
        </li>
        @endauth
        <li class="nav-item ms-3">
          <a class="nav-link" href="{{ route('track.index') }}">Tutti i brani</a>
        </li>
      </ul>
    </div>
  </div>
</nav>






