<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="display-1 text-uppercase">
                    Admin Dashboard
                </h1>
            </div>
        </div>
    </div>

    <x-dashboard-nav :usersCount="$usersCount" />

    <form action="{{ route('admin.dashboard.genres.store') }}" method="post" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="create-name" class="form-label">Crea un nuovo genere musicale</label>
            <input type="text" name="name" id="create-name" class="form-control" placeholder="Inserisci un genere">
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>

    @if(session('success'))
        <div class="container mt-3">
            <div class="row justify-content-center text-center">
                <div class="col-6 alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @error('name')
        <div class="container mt-3">
            <div class="row justify-content-center text-center">
                <div class="col-6 alert alert-danger">
                    {{ $message }}
                </div>
            </div>
        </div>
    @enderror

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title fs-5">Totale brani</p>
                        <p class="card-text fs-1">{{ $tracksCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-5">Totale dimensione brani</p>
                <p class="card-text fs-1">{{ $tracksSize }} MB</p>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-5">Brani inseriti settimana precedente</p>
                <p class="card-text fs-1">{{ $lastWeekTracks }}</p>
            </div>
        </div>
    </div>
    </x-layout>



