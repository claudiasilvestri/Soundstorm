<x-layout>
    <div class="text-center" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-6">
            </div>
        </div>
    </div>
    <x-dashboard-nav :usersCount="$usersCount" />

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

    <div class="row justify-content-center">
        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <p class="card-title fs-5">TOTALE BRANI</p>
                    <p class="card-text fs-1">{{ $tracksCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <p class="card-title fs-5">TOTALE DIMENSIONE BRANI</p>
                    <p class="card-text fs-1">{{ $tracksSize }} MB</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <p class="card-title fs-5">BRANI INSERITI SETTIMANA PRECEDENTE</p>
                    <p class="card-text fs-1">{{ $lastWeekTracks }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>













