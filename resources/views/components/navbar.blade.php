<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid d-flex justify-content-between align-items-center"> 
    
    <div class="d-flex flex-column align-items-start">
      <a class="navbar-brand text-primary" href="#" style="font-family: 'Helvetica Neue'; font-size: 2rem;"><strong>Soundstorm</strong></a>
      <p class="navbar-subtitle" style="font-family: 'Helvetica Neue', sans-serif; font-size: 1rem; color: #0d6efd; margin-top: 0; margin-bottom: 0;"><strong>La musica a portata di click!</strong></p>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> 
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









