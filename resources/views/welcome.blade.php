<x-layout>
    <style>
        .small {
            font-size: 1rem !important; 
        }
    </style>
    
    <div class="container mt-5">
        <div class="row">
            @foreach($track as $track)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card">
                        <div class="text-center">
                            <img 
                                width="250" 
                                class="p-3 rounded-pill" 
                                src="{{ $track->cover ? Storage::url($track->cover) : Storage::url('covers/default.jpg') }}" 
                                alt="{{ $track->title ?? 'Titolo non disponibile' }}"/>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $track->title ?? 'Titolo non disponibile' }}
                            </h5>
                            <p class="card-text small">
                                {{ $track->description ?? 'Nessuna descrizione disponibile' }}
                            </p>

                            <div class="mb-3">
                                <p class="fw-bold m-0">Generi:</p>
                                @if($track->genres->count())
                                    @foreach($track->genres as $genre)
                                        <a 
                                            href="{{ route('track.filterByGenre', ['genre' => $genre->id]) }}" 
                                            class="me-1 small">
                                            #{{ $genre->name }}
                                        </a>
                                    @endforeach
                                @else
                                    <span class="small">Genere sconosciuto</span>
                                @endif
                            </div>

                            <div>
                                <audio class="w-100" controls>
                                    <source 
                                        src="{{ $track->path ? Storage::url($track->path) : '#' }}" 
                                        type="audio/mpeg">
                                    Your browser does not support the audio tag.
                                </audio>
                            </div>
                        </div>

                        <div class="card-footer text-body-secondary small d-flex justify-content-between">
                            <div>
                                Inserito da: 
                                <a href="{{ route('track.filterByUser', ['user' => $track->user]) }}">
                                    {{ $track->user->name ?? 'Utente sconosciuto' }}
                                </a> - 
                                {{ $track->created_at ? $track->created_at->format('d/m/Y') : 'Data non disponibile' }}
                            </div>
                            <div class="text-center w-100">
                                <a href="{{ route('track.download', compact('track')) }}">
                                    <span class="special-word">Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>



