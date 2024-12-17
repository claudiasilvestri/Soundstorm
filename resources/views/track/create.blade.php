<x-layout>
    <div class= text-center">
        <div class="row justify-content-center">
            <div class="col-12">
            <h1 class="text-uppercase fs-1 fw-bold my-4 text-center" style="font-family: Arial, sans-serif;">INSERISCI IL TUO BRANO</h1>
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

                    <div class="mb-3">
                        <label for="" class="form-label">Generi</label>
                        <div>
                            @foreach($genres as $genre)
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="btn-check" id="btn-check-{{ $genre->id }}" autocomplete="off">
                                <label class="btn btn-outline-dark my-1 text-capitalize" for="btn-check-{{ $genre->id }}">{{ $genre->name }}</label>
                            @endforeach
                        </div>
                        @error('genres')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-danger">Crea</button>
                    <a href="{{ route('welcome') }}" class="btn btn-primary">Torna alla home</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>
