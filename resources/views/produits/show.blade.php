<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Détail du produit</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="text-muted">Libellé</h5>
                            <p class="h5">{{ $produit->libelle }}</p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-muted">Prix</h5>
                            <p class="h5"><span class="badge bg-success">{{ $produit->prix }} DH</span></p>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-muted">Quantité en stock</h5>
                            <p class="h5">{{ $produit->qte }} unités</p>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary flex-grow-1">Modifier</a>
                            <a href="{{ route('produits.index') }}" class="btn btn-secondary flex-grow-1">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
