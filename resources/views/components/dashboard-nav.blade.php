<nav class="navbar navbar-expand-lg text-uppercase">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}" style="font-weight: bold; color: #0d6efd;">Dati</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('admin.dashboard.users') }}" style="font-weight: bold; color: #0d6efd;">Utenti</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('admin.dashboard.tracks') }}" style="font-weight: bold; color: #0d6efd;">Brani</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ route('admin.dashboard.genres') }}" style="font-weight: bold; color: #0d6efd;">Generi</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Totale utenti</p>
                        <p class="card-text fs-1">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


