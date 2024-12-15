<div class="card d-flex flex-column">
    <div class="text-center">
        <img width="300" class="p-3 rounded-pill" src="{{ Storage::url($track->cover) }}" alt="{{ $track->title }}">
    </div>
    <div class="card-body flex-grow-1">
        <h5 class="card-title">{{ $track->title }}</h5>
        <p class="card-text small">{{ $track->description }}</p>
        <div class="mb-3">
            <p class="fw-bold m-0">Generi:</p>
            @if($track->genres->count())
                @foreach($track->genres as $genre)
                    <span class="me-1 small fst-italic">{{ $genre->name }}</span>
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
    <div class="card-footer text-body-secondary small">
        Inserito da: <a href="{{ route('track.filterByUser', ['user' => $track->user->id]) }}">{{ $track->user->name }}</a> - {{ $track->created_at->format('d/m/Y') }}
    </div>
</div>
