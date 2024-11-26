<x-layout>
<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>
@if(session('success'))
<div class="container mt-3">
<div class="row justify-content-center text-center">
  <div class="col-6 alert alert-success">
    {{ session ('success)')}}
  </div>
</div>
</div>
@endif
<div class="container my-5 pt-5 border-top">
    <div class="row mb-5">
        <h2>Gli ultimi brani inseriti</h2>
    </div>
    <div class="row justify-content-center">
        @foreach($tracks as $track)
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="text-center">
                    <img width="300" class="p-3 rounded-pill" src="{{ Storage::url($track->cover ?? 'covers/default.jpg') }}" alt="{{ $track->title }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $track->title }}</h5>
                    <p class="card-text small">{{ $track->description ?? 'Nessuna descrizione disponibile' }}</p>
                    <div>
                        <audio class="w-100" controls>
                            <source src="{{ Storage::url($track->path) }}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>
                </div>
                <div class="card-footer text-body-secondary small">
                    Inserito da: <a href="{{route('track.filterByUser',['user'=>$track->user])}}"> {{$track->user->name }}</a> 
                    <br>
                    {{ $track->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-layout>