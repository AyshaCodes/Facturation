<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
            <h1>Liste des clients</h1>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">tel</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
        @foreach ( $clients as $client)
    <tr>
      <th scope="row">{{ $client->id }}</th>
      <td>{{ $client->nom }}</td>
      <td>{{ $client->prenom}}</td>
      <td>{{ $client->tel }}</td>
    <td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-primary">Consulter</a>

        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Editer</a>

        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
    </div>
</td>
    </tr>
     @endforeach

  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
