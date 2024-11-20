<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Profilo
                </h1>
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
                            <button type="submit" class="btn btn-sm btn-primary">Cambia</button>
                        </div>
                    </div>
                    @error('avatar')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </form>
            </div>

            <div class="col-12 col-md-4 p-3">
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Nome</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->name ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Email</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->email ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Residenza</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->address ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Città</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->city ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Provincia</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->province ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Regione</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->region ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Paese</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->country ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>CAP</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->zip_code ?? '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-3 fw-bold">
                        <p>Numero di cellulare</p>
                    </div>
                    <div class="col-12 col-sm-9">
                        <p>{{ $user->profile->mobile_number ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
@if(session('success'))
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-6 alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
