<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
       @include('navbar')

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Contenu principal -->
            <div class="h-full bg-white p-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container mx-auto px-4 py-8">
                            <!-- Messages de succès ou d'erreur -->
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Succès !</strong>
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Erreur !</strong>
                                    <span class="block sm:inline">{{ session('error') }}</span>
                                </div>
                            @endif
                            <div class="flex items-center justify-between mb-4">
                                <a href="{{route('etablissements.create')}}" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau Etablissement</a>
                            </div>

                            <!-- Liste des établissements -->

                                <!-- Première colonne - Liste des établissements -->
                                <div class="p-4">
                                    <h2 class="text-xl font-bold mb-4">Liste des établissements</h2>
                                    <table class="w-full border-collapse border border-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="border border-gray-200 px-4 py-2">Nom</th>
                                            <th class="border border-gray-200 px-4 py-2">Adresse</th>
                                            <th class="border border-gray-200 px-4 py-2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Boucle pour afficher les établissements -->
                                        @foreach($etablissements as $etablissement)
                                            <tr>
                                                <td class="border border-gray-200 px-4 py-2">{{ $etablissement->nom }}</td>
                                                <td class="border border-gray-200 px-4 py-2">{{ $etablissement->adresse }}</td>
                                                <td class="border border-gray-200 px-4 py-2 flex items-center">
                                                    <form action="{{ route('etablissements.destroy', $etablissement->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet établissement ?')" class="inline-flex items-center">
                                                            <img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="action-icon" width="20">
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('etablissements.edit', $etablissement->id) }}" method="GET">
                                                        <button type="submit" class="inline-flex items-center ml-2">
                                                            <img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="action-icon" width="20">
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Deuxième colonne - Formulaire d'ajout et de modification d'établissement -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
