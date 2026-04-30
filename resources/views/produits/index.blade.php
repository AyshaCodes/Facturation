<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Catalogue Produits</title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Catalogue des produits</h1>
            <a href="{{ route('produits.create') }}" class="btn btn-primary btn-sm">Nouveau Produit</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#ID</th>
                            <th>Libellé</th>
                            <th>Prix Unitaire</th>
                            <th>Stock (Qté)</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td class="fw-bold">{{ $produit->libelle }}</td>
                                <td>{{ number_format($produit->prix, 2) }} DH</td>
                                <td>
                                    @if($produit->qte <= 5)
                                        <span class="badge bg-danger">Alerte : {{ $produit->qte }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $produit->qte }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-info btn-sm text-white">Modifier</a>

                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit du catalogue ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Aucun produit disponible dans le catalogue.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('factures.index') }}" class="btn btn-outline-secondary btn-sm">Voir les Factures</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
