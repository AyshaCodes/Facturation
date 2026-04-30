<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des factures</title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Liste des factures</h1>
            {{-- Correction du texte du bouton --}}
            <a href="{{ route('factures.create') }}" class="btn btn-success btn-sm">Nouvelle Facture</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#ID</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factures as $facture)
                            <tr>
                                <td>{{ $facture->id }}</td>
                                <td class="fw-bold">{{ $facture->date }}</td>
                                <td>
                                    {{-- Affichage du nom et prénom du client lié [cite: 35] --}}
                                    <span class="badge bg-info text-dark">
                                        {{ $facture->client->nom ?? 'N/A' }} {{ $facture->client->prenom ?? '' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Lien vers le détail de la facture [cite: 45] --}}
                                        <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-warning btn-sm">Consulter</a>

                                        {{-- Formulaire de suppression --}}
                                        <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" onsubmit="return confirm('Supprimer cette facture ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-secondary btn-sm">Retour à l'accueil</a>
        </div>
    </div>

</body>
</html>
