<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Facture #{{ $facture->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { .no-print { display: none; } }
    </style>
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow border-0 p-4">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="text-primary fw-bold">FACTURE #{{ $facture->id }}</h2>
                    <p class="text-muted">Date d'émission : {{ $facture->date }}</p>
                </div>
                <div class="text-end">
                    <h5 class="fw-bold">Client :</h5>
                    <p class="mb-0">{{ $facture->client->nom }} {{ $facture->client->prenom }}</p>
                    <p>Tél : {{ $facture->client->tel }}</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Désignation</th>
                            <th class="text-center">Prix Unitaire</th>
                            <th class="text-center">Quantité</th>
                            <th class="text-end">Total HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facture->produits as $produit)
                        <tr>
                            <td>{{ $produit->libelle }}</td>
                            <td class="text-center">{{ number_format($produit->pivot->prix_unitaire, 2) }} DH</td>
                            <td class="text-center">{{ $produit->pivot->qte_facturee }}</td>
                            <td class="text-end">{{ number_format($produit->pivot->prix_unitaire * $produit->pivot->qte_facturee, 2) }} DH</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-end mt-4">
                <div class="col-md-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total Hors Taxes (HT)</span>
                            <strong>{{ number_format($facture->getTotalHT(), 2) }} DH</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>TVA (20%)</span>
                            <strong>{{ number_format($facture->getMontantTVA(), 2) }} DH</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-primary text-white">
                            <span class="h5 mb-0">Total TTC</span>
                            <strong class="h5 mb-0">{{ number_format($facture->getTotalTTC(), 2) }} DH</strong>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-5 d-flex gap-2 no-print">
                <a href="{{ route('factures.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <button onclick="window.print()" class="btn btn-success">Imprimer la facture (PDF)</button>
            </div>
        </div>
    </div>
</body>
</html>
