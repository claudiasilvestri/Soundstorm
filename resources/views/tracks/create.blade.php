 <x-layout>
        <div class="container-fluid p-5 bg-secondary-subtle text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="display-1 text-uppercase">
                        Inserisci il tuo brano
                    </h1>
                </div>
            </div>
        </div>
      
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <form class="rounded p-5 border" action="{{ route('track.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
      
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
      
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" name="cover" class="form-control" id="cover">
                            @error('cover')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
      
                        <div class="mb-3">
                            <label for="path" class="form-label">Brano</label>
                            <input type="file" name="path" class="form-control" id="path">
                            @error('path')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
      
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione del brano</label>
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
      
                        <button type="submit" class="btn btn-primary">Accedi</button>
                        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Torna alla home</a>
                    </form>
                </div>
            </div>
        </div>
      </x-layout>
      