<x-layout> 
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">
                    Tutti i brani
                </h1>
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach($tracks as $track)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card">
                        <div class="text-center">
                            <img width="250" class="p-3 rounded-pill" 
                                 src="{{ Storage::url($track->cover) }}" 
                                 alt="{{ $track->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $track->title }}</h5>
                            <p class="card-text small">{{ $track->description }}</p>
                            <div class="mb-3">
                                <p class="fw-bold m-0">Generi:</p>
                                @if($track->genres->count())
                                    @foreach($track->genres as $genre)
                                        <a href="{{ route('track.filterByGenre', compact('genre')) }}" class="me-1 small fst-italic">#{{ $genre->name }}</a>
                                    @endforeach
                                @else
                                    <span class="small fst-italic">Genere sconosciuto</span>
                                @endif
                            </div>
                            <audio class="w-100" controls>
                                <source src="{{ Storage::url($track->path) }}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                        <div class="card-footer text-body-secondary small d-flex justify-content-between">
                            <div>
                                Inserito da: <a href="{{ route('track.filterByUser', ['user' => $track->user]) }}">{{ $track->user->name }}</a> - {{ $track->created_at->format('d/m/Y') }}
                            </div>
                            <div>
                                <a href="{{ route('track.download', compact('track')) }}">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>


