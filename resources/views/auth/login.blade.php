<x-layout>
    <div class="text-center mt-5"> 
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-uppercase fs-1 fw-bold my-2" style="font-family: Arial, sans-serif; font-size: 80px">Accedi</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="rounded p-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        @error('email')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        @error('password')
                            <span class="small fst-italic text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger">Accedi</button>
                    <div class="mt-2">
                        <span>Non sei registrato?</span>
                        <a class="text-secondary" href="{{ route('register') }}">Clicca qui</a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-layout>

