<x-layout>
    <div class="container my-5";>
        <div class="row justify-content-around">
            <div class="col-12 col-md-4">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3" style="margin-top: 80px;">
                        <label for="new_genre" class="form-label">Crea un nuovo genere musicale</label>
                        <input type="text" name="name" id="new_genre" class="form-control" placeholder="Inserisci un genere">
                    </div>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </form>
            </div>
            <div class="col-12 col-md-6" style="margin-top: 80px;">
                <table class="table table-striped border">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Genere</th>
                            <th scope="col">Modifica nome genere</th>
                            <th scope="col">Elimina</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($genres as $genre)
                        <tr>
                            <td>{{ $genre->name }}</td> 
                            <td class="border-start">
                                <form action="{{ route('admin.dashboard.genres.update', $genre->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex align-items-center">
                                        <input type="text" name="name" id="update_genre_{{ $genre->id }}" class="form-control me-3" placeholder="Nuovo nome">
                                        <button type="submit" class="btn btn-sm btn-primary">Modifica</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.dashboard.genres.destroy', $genre->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
