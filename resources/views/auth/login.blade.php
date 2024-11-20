
<x-layout>
<main class="form-signin w-100 m-auto">
<form action="{{route('login')}}" method="post">
    @csrf
    <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">register</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="email">
      <label for="floatingInput">Email address</label>
    </div>
   
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name="password">
      <label for="floatingPassword">Password</label>
    </div>

  
    <button class="btn btn-primary w-100 py-2" type="submit">Accedi</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
  </form>
</main>
</x-layout>