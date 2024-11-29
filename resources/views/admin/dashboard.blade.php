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

    <x-dashboard-nav />

    <form action="{{ route('admin.dashboard.genres.store') }}" method="post">
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
</x-layout>
