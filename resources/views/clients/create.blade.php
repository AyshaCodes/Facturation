<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Nouveau Client</title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Ajouter un nouveau client</h4>
                    </div>
                    <div class="card-body">
                        {{-- Affichage des erreurs de validation globales si nécessaire --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" id="nom"
                                    class="form-control @error('nom') is-invalid @enderror"
                                    value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" name="prenom" id="prenom"
                                    class="form-control @error('prenom') is-invalid @enderror"
                                    value="{{ old('prenom') }}" required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tel" class="form-label">Téléphone</label>
                                <input type="text" name="tel" id="tel"
                                    class="form-control @error('tel') is-invalid @enderror"
                                    value="{{ old('tel') }}" required>
                                @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-success">Enregistrer le client</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
