@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Nouvelle facture</h2>
                <p class="mt-1 text-sm text-gray-600">Remplissez les informations ci-dessous pour créer une nouvelle facture.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('factures.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" id="date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div>
                        <label for="client_id" class="block text-sm font-medium text-gray-700">Client</label>
                        <select name="client_id" id="client_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">-- Choisir un client --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Sélection des produits</h3>
                    
                    <div id="produits-container" class="space-y-3">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end produit-ligne">
                            <div class="md:col-span-7">
                                <label class="block text-sm font-medium text-gray-700">Produit</label>
                                <select name="produits[0][id]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                    <option value="">-- Choisir un produit --</option>
                                    @foreach ($produits as $produit)
                                        <option value="{{ $produit->id }}">{{ $produit->libelle }} ({{ number_format($produit->prix, 2) }} DH)</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">Quantité</label>
                                <input type="number" name="produits[0][qte]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="1" required placeholder="Qté">
                            </div>
                            <div class="md:col-span-2">
                                <button type="button" class="mt-1 w-full bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded disabled:opacity-50" disabled>X</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mt-4 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="ajouterLigne()">
                        + Ajouter un autre produit
                    </button>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('factures.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Annuler
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Générer la facture
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let ligneIndex = 1;

    function ajouterLigne() {
        const container = document.getElementById('produits-container');
        const nouvelleLigne = document.createElement('div');
        nouvelleLigne.className = 'grid grid-cols-1 md:grid-cols-12 gap-3 items-end produit-ligne';

        nouvelleLigne.innerHTML = `
            <div class="md:col-span-7">
                <label class="block text-sm font-medium text-gray-700">Produit</label>
                <select name="produits[${ligneIndex}][id]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    <option value="">-- Choisir un produit --</option>
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->libelle }} ({{ number_format($produit->prix, 2) }} DH)</option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-3">
                <label class="block text-sm font-medium text-gray-700">Quantité</label>
                <input type="number" name="produits[${ligneIndex}][qte]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" min="1" required placeholder="Qté">
            </div>
            <div class="md:col-span-2">
                <button type="button" class="mt-1 w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="this.parentElement.parentElement.remove()">X</button>
            </div>
        `;

        container.appendChild(nouvelleLigne);
        ligneIndex++;
    }
</script>
@endsection
