<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<div class="card">
    <div class="card-header">Détails de {{ $client->nom }}</div>
    <div class="card-body">
        <p><strong>Téléphone :</strong> {{ $client->tel }}</p>
        <hr>
        <h5>Historique des factures</h5>
        <ul>
            @foreach($client->factures as $f)
                <li>Facture #{{ $f->id }} du {{ $f->date }} - {{ $f->getTotalTTC() }} DH</li>
            @endforeach
        </ul>
    </div>
</div>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

