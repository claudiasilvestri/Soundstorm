<x-layout>
    <div class="container-fluid p-5 text-center mt-5">
        <div class="row justify-content-center">
            <h1 class="text-uppercase fs-1 fw-bold my-2" style="font-family: Arial, sans-serif;">Profilo</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-4 p-5 text-center">
                <img class="img-fluid" 
                     src="{{ $user->profile->avatar ? asset('storage/' . $user->profile->avatar) : '/media/avatar.jpg' }}" 
                     alt="Avatar utente">
                
                <form class="mt-5" action="{{ route('profile.setAvatar', compact('user')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-9">
                            <input type="file" class="form-control" name="avatar" id="avatar">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-sm btn-danger">Cambia</button>
                        </div>
                    </div>
                    @error('avatar')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </form>
            </div>
            <div class="col-12 col-md-4 p-3">
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Nome</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->name ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Email</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->email ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Residenza</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->address ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Città</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->city ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Provincia</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->province ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Regione</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->region ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Paese</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->country ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>CAP</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->zip_code ?? '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Numero di cellulare</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->mobile_number ?? '' }}</p>
                    </div>
                </div>
                <a class="btn btn-danger" href="{{ route('profile.edit', compact('user')) }}">Aggiorna</a>
            </div>            
        </div>
    </div>

    <div class="container">
        <a class="btn btn-primary" href="{{ route('track.create') }}">Inserisci Brano</a>
    </div>    

    @if(session('success'))
        <div class="container mt-3">
            <div class="row text-center">
                <div class="col-6 alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="container my-5 pt-5 border-top">
        <div class="row">
            <h2>I miei brani</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($user->tracks as $track)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <div class="text-center">
                            <img width="300" class="p-3 rounded-pill" src="{{ Storage::url($track->cover) }}" alt="{{ $track->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $track->title }}</h5>
                            <p class="card-text small">{{ $track->description }}</p>
                            <div>
                                <audio class="w-100" controls>
                                    <source src="{{ Storage::url($track->path) }}" type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>
                        </div>
                        <div class="card-footer text-body-secondary small">
                            @if($track->genres->count())
                                @foreach($track->genres as $genre)
                                    <span class="me-1 small fst-italic">#{{ $genre->name }}</span>
                                @endforeach
                            @else
                                <span class="small fst-italic">Genere sconosciuto</span>
                            @endif
                        </div>
                        <div class="card-header text-body-secondary small text-center">
                            <a href="{{ route('track.edit', compact('track')) }}" class="btn btn-sm btn-primary me-5">Modifica</a>
                            <form class="d-inline" method="POST" action="{{ route('track.destroy', compact('track')) }}" onclick="return confirm('Sicuro di voler cancellare questo brano?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

