<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        @include('navbar')

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Your main content goes here -->
            <div class="h-full bg-white p-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container mx-auto px-4 py-8">
                            <h1 class="text-3xl font-semibold mb-8">Liste des Stagiaires</h1>

                            <div class="flex items-center justify-between mb-4">
                                <a href="#" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau stagiaire</a>
                            </div>

                            <div class="container mx-auto p-6">
                                <h1 class="text-xl font-semibold mb-4">Détails du Stagiaire</h1>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-3"><strong>CIN :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->cin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Nom :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->nom }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Prénom :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Email :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Téléphone :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->tel }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Établissement :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->etablissement->nom }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Stage :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->stage->titre_sujet }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-3"><strong>Bureau :</strong></td>
                                        <td class="px-6 py-3">{{ $stagiaire->bureau->libelle }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="button" onclick="window.location='{{ route('stagiaires.edit', $stagiaire->id) }}'" class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded mt-4">Modifier</button>
                                <form   style="display: inline;"  action="{{ route('stagiaires.destroy', $stagiaire->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4"  onclick="return confirm('Etes vous sûr de vouloir supprimer?')">Supprimer</button>

                                </form>|

                                @if($stagiaire->cv)
                                    <a href="{{ Storage::url($stagiaire->cv->url) }}" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Voir le CV</a>
                                @endif

                                <button type="button" onclick="window.location='{{ route("Stagiaires") }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Retour</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
