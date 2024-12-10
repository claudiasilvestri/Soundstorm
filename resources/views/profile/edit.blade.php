<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-uppercase">Aggiorna profilo</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                
                <form class="rounded p-5 border" action="{{ route('profile.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT') 

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                        @error('name')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                        @error('email')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Numero di cellulare</label>
                        <input type="text" name="mobile_number" class="form-control" id="mobile_number" value="{{ $user->profile->mobile_number }}">
                        @error('mobile_number')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="col-7">
                            <label for="address" class="form-label">Residenza</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $user->profile->address }}">
                            @error('address')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="zip_code" class="form-label">CAP</label>
                            <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{ $user->profile->zip_code }}">
                            @error('zip_code')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="col-7">
                            <label for="city" class="form-label">Città</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ $user->profile->city }}">
                            @error('city')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="province" class="form-label">Provincia</label>
                            <input type="text" name="province" class="form-control" id="province" value="{{ $user->profile->province }}">
                            @error('province')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="col-5">
                            <label for="region" class="form-label">Regione</label>
                            <input type="text" name="region" class="form-control" id="region" value="{{ $user->profile->region }}">
                            @error('region')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-5">
                            <label for="country" class="form-label">Paese</label>
                            <input type="text" name="country" class="form-control" id="country" value="{{ $user->profile->country }}">
                            @error('country')
                                <span class="small fst-italic text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Aggiorna profilo</button>
                    <a href="{{ route('profile.page') }}" class="btn btn-outline-primary">Torna indietro</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>
