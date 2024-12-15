<x-layout>
    <div class="text-center">
        <div class="row justify-content-center">
            <div class="col-12">
            </div>
        </div>
    </div>

    <x-dashboard-nav :usersCount="$usersCount" />

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <table class="table striped border">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Iscritto dal</th>
                            <th scope="col">Ruolo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td> 
                            <td>{{ $user->email }}</td> 
                            <td>{{ $user->created_at->format('d/m/Y') }}</td> 
                            <td>{{ $user->isAdmin() ? 'Admin' : 'Utente base' }}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
