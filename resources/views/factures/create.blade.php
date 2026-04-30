<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Nouvelle facture</title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">Nouvelle facture</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('factures.store') }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nom du client</label>
                                    <select name="client_id" class="form-select" required>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mb-3">Sélection des produits</h5>

                            <div id="produits-container">
                                <div class="row g-2 mb-2 align-items-end produit-ligne">
                                    <div class="col-md-7">
                                        <label class="form-label">Produit</label>
                                        <select name="produits[0][id]" class="form-select" required>
                                            <option value="">-- Choisir un produit --</option>
                                            @foreach ($produits as $produit)
                                                <option value="{{ $produit->id }}">{{ $produit->libelle }} ({{ number_format($produit->prix, 2) }} DH)</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Quantité</label>
                                        <input type="number" name="produits[0][qte]" class="form-control" min="1" required placeholder="Qté">
                                    </div>
                                    <div class="col-md-2">
                                        {{-- Bouton pour supprimer la ligne --}}
                                        <button type="button" class="btn btn-outline-danger w-100 disabled">X</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-sm btn-secondary mt-3" onclick="ajouterLigne()">+ Ajouter un autre produit</button>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary btn-lg">Générer la facture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let ligneIndex = 1;

        function ajouterLigne() {
            const container = document.getElementById('produits-container');
            const nouvelleLigne = document.createElement('div');
            nouvelleLigne.className = 'row g-2 mb-2 align-items-end produit-ligne';

            nouvelleLigne.innerHTML = `
                <div class="col-md-7">
                    <select name="produits[${ligneIndex}][id]" class="form-select" required>
                        <option value="">-- Choisir un produit --</option>
                        @foreach ($produits as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->libelle }} ({{ number_format($produit->prix, 2) }} DH)</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="produits[${ligneIndex}][qte]" class="form-control" min="1" required placeholder="Qté">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100" onclick="this.parentElement.parentElement.remove()">X</button>
                </div>
            `;

            container.appendChild(nouvelleLigne);
            ligneIndex++;
        }
    </script>

</body>
</html>
