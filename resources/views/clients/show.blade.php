@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Détails de {{ $client->nom }} {{ $client->prenom }}</h2>
                <p class="mt-1 text-sm text-gray-600">Informations complètes du client</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Informations personnelles</h3>
                        <dl class="space-y-2">
                            <div class="flex justify-between py-2 border-b">
                                <dt class="text-sm font-medium text-gray-500">ID</dt>
                                <dd class="text-sm text-gray-900">{{ $client->id }}</dd>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <dt class="text-sm font-medium text-gray-500">Nom</dt>
                                <dd class="text-sm text-gray-900">{{ $client->nom }}</dd>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <dt class="text-sm font-medium text-gray-500">Prénom</dt>
                                <dd class="text-sm text-gray-900">{{ $client->prenom }}</dd>
                            </div>
                            <div class="flex justify-between py-2">
                                <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                                <dd class="text-sm text-gray-900">{{ $client->tel }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-3">Historique des factures</h3>
                    @if($client->factures && $client->factures->count() > 0)
                        <div class="space-y-2">
                            @foreach($client->factures as $facture)
                                <div class="bg-gray-50 p-3 rounded border">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Facture #{{ $facture->id }}</p>
                                            <p class="text-xs text-gray-500">Du {{ $facture->date ?? 'N/A' }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold text-blue-600">
                                                {{ number_format($facture->getTotalTTC(), 2) }} DH
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Aucune facture trouvée pour ce client.</p>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('clients.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Retour à la liste
                </a>
                <div class="space-x-2">
                    <a href="{{ route('clients.edit', $client) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

