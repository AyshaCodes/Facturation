<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Nouveau produit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produits.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="libelle" class="form-label">Libellé</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}" required>
                                @error('libelle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix</label>
                                <input type="number" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" step="0.01" value="{{ old('prix') }}" required>
                                @error('prix') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="qte" class="form-label">Quantité</label>
                                <input type="number" class="form-control @error('qte') is-invalid @enderror" id="qte" name="qte" value="{{ old('qte') }}" required>
                                @error('qte') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">Ajouter</button>
                                <a href="{{ route('produits.index') }}" class="btn btn-secondary flex-grow-1">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
