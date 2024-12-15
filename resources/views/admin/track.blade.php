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
            <div class="col-12 col-md-12">
                <table class="table table-striped border w-100">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Titolo</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Inserita il</th>
                            <th scope="col">Inserita da</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tracks as $track)
                            <tr>
                                <td>{{ $track->title }}</td>
                                <td>{{ $track->description }}</td>
                                <td>{{ $track->created_at->format('d/m/Y') }}</td>
                                <td>{{ $track->user->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

  
  
  

  