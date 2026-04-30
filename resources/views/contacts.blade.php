<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Gestion de Contacts</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .contact-card { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .form-group { margin-bottom: 10px; }
        label { display: block; }
    </style>
</head>
<body>

    <h1>Gestionnaire de Contacts</h1>

    <section>
        <h2>Ajouter un contact</h2>
        
        @if(session('success'))
            <div style="color: green; font-weight: bold;">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf 
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" value="{{ old('nom') }}">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}">
            </div>

            <button type="submit">Enregistrer</button>
        </form>
    </section>

    <hr>

    <section>
        <h2>Liste des contacts</h2>
        @if($contacts->isEmpty()) <p>Aucun contact pour le moment.</p>
        @else
            @foreach($contacts as $contact)
                <div class="contact-card">
                    <strong>{{ $contact->nom }}</strong><br>
                    Email : {{ $contact->email }} <br>
                    Tél : {{ $contact->telephone }} <br>

                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" 
                          onsubmit="return confirm('Es-tu sûre de vouloir supprimer ce contact ?');">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" style="color: red;">Supprimer</button>
                    </form>
                </div>
            @endforeach
        @endif
    </section>

</body>
</html>