@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-2xl font-bold text-blue-600">FACTURE #{{ $facture->id }}</h2>
                        <p class="text-gray-600 mt-1">Date d'émission : {{ $facture->date }}</p>
                    </div>
                    <div class="text-right">
                        <h3 class="text-lg font-bold text-purple-600">Client :</h3>
                        <p class="text-gray-900 font-medium">{{ $facture->client->nom }} {{ $facture->client->prenom }}</p>
                        <p class="text-gray-700">Tél : {{ $facture->client->tel }}</p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto mb-6">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Désignation</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Prix Unitaire</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total HT</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($facture->produits as $produit)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $produit->libelle }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-center">{{ number_format($produit->pivot->prix_unitaire, 2) }} DH</td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-center">{{ $produit->pivot->qte_facturee }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-right">{{ number_format($produit->pivot->prix_unitaire * $produit->pivot->qte_facturee, 2) }} DH</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mb-6">
                <div class="w-full md:w-1/3">
                    <div class="space-y-2">
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-700">Total Hors Taxes (HT)</span>
                            <span class="font-semibold text-gray-900">{{ number_format($facture->getTotalHT(), 2) }} DH</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="text-gray-700">TVA (20%)</span>
                            <span class="font-semibold text-gray-900">{{ number_format($facture->getMontantTVA(), 2) }} DH</span>
                        </div>
                        <div class="flex justify-between py-3 bg-blue-600 text-white rounded px-4">
                            <span class="text-lg font-semibold">Total TTC</span>
                            <span class="text-lg font-bold">{{ number_format($facture->getTotalTTC(), 2) }} DH</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 no-print">
                <a href="{{ route('factures.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Retour à la liste
                </a>
                <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Imprimer la facture
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@media print { 
    .no-print { display: none !important; }
    body { print-color-adjust: exact; -webkit-print-color-adjust: exact; }
}
</style>
@endsection
