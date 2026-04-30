<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Projet</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; background: #f4f4f9; }
        .card { background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h1 { color: #1f0d5c; text-align: center; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; color: #333; }
        input { width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 0.8rem; background: #1f0d5c; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; margin-top: 1rem; }
        button:hover { background: #3a1a9e; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Ajout des contacts</h1>
        @if(session('success'))
    <div style="padding: 10px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 1rem; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

        <form action="add_contact" method="post">
            @csrf <!-- Indispensable dans Laravel -->
            
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" required placeholder="Ex: Jean Dupont">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="Ex: jean@email.com">
            </div>

            <div class="form-group">
                <label>Téléphone</label>
                <input type="tel" name="telephone" required placeholder="Ex: 0612345678">
            </div>

<button type="submit" onclick="return confirm('Voulez-vous vraiment enregistrer ce contact ?')">
    Enregistrer le contact
</button>
        </form>
    </div>
</body>
</html>
