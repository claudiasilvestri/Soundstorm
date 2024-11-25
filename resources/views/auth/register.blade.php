<x-layout>
    <main class="form-signin w-100 m-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="rounded p-5 border" action="{{ route('register') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Registrati</h1>

            {{-- Nome --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il tuo nome">
                @error('name')
                    <span class="small fst-italic text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Indirizzo Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                @error('email')
                    <span class="small fst-italic text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Inserisci una password">
                @error('password')
                    <span class="small fst-italic text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Conferma Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Conferma la tua password">
            </div>

            <hr>

            {{-- Numero di cellulare --}}
            <div class="mb-3">
                <label for="mobile_number" class="form-label">Numero di cellulare</label>
                <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Inserisci il tuo numero di cellulare">
                @error('mobile_number')
                    <span class="small fst-italic text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Indirizzo, CAP --}}
            <div class="mb-3 d-flex justify-content-between">
                <div class="col-7">
                    <label for="address" class="form-label">Residenza</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Inserisci la tua residenza">
                    @error('address')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="zip_code" class="form-label">CAP</label>
                    <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Inserisci il CAP">
                    @error('zip_code')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Città, Provincia --}}
            <div class="mb-3 d-flex justify-content-between">
                <div class="col-7">
                    <label for="city" class="form-label">Città</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Inserisci la tua città">
                    @error('city')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="province" class="form-label">Provincia</label>
                    <input type="text" name="province" class="form-control" id="province" placeholder="Inserisci la tua provincia">
                    @error('province')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Regione, Paese --}}
            <div class="mb-3 d-flex justify-content-between">
                <div class="col-5">
                    <label for="region" class="form-label">Regione</label>
                    <input type="text" name="region" class="form-control" id="region" placeholder="Inserisci la tua regione">
                    @error('region')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-5">
                    <label for="country" class="form-label">Paese</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="Inserisci il tuo paese">
                    @error('country')
                        <span class="small fst-italic text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrati</button>

            <div class="mt-2">
                <span>Sei già registrato?</span>
                <a class="text-secondary" href="{{ route('login') }}">Clicca qui</a>
            </div>
        </form>
    </main>
</x-layout>


    