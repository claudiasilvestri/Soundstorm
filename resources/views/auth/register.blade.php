
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
    <form action="{{route('register')}}" method="post">
    @csrf
    <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">register</h1>

    <div class="mb-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="name">
      <label for="floatingInput">username</label>
    </div>
    <div class=mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name="password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name="password_confirmation">
      <label for="floatingPassword"> Conferma Password</label>
    </div>

    <hr>

<div class="mb-3">
    <label for="mobile_number" class="form-label">Numero di cellulare</label>
    <input type="text" name="mobile_number" class="form-control" id="mobile_number">
    @error('mobile_number')
        <span class="small fst-italic text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3 d-flex justify-content-between">
    <div class="col-7">
        <label for="address" class="form-label">Residenza</label>
        <input type="text" name="address" class="form-control" id="address">
        @error('address')
            <span class="small fst-italic text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-4">
        <label for="zip_code" class="form-label">CAP</label>
        <input type="text" name="zip_code" class="form-control" id="zip_code">
        @error('zip_code')
            <span class="small fst-italic text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="mb-3 d-flex justify-content-between">
    <div class="col-7">
        <label for="city" class="form-label">Città</label>
        <input type="text" name="city" class="form-control" id="city">
        @error('city')
            <span class="small fst-italic text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-4">
        <label for="province" class="form-label">Provincia</label>
        <input type="text" name="province" class="form-control" id="province">
        @error('province')
            <span class="small fst-italic text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="mb-3 d-flex justify-content-between">
    <div class="col-5">
        <label for="region" class="form-label">Regione</label>
        <input type="text" name="region" class="form-control" id="region">
        @error('region')
            <span class="small fst-italic text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-5">
        <label for="country" class="form-label">Paese</label>
        <input type="text" name="country" class="form-control" id="country">
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

    