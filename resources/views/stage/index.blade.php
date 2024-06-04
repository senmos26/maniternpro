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
                            <div class="flex items-center justify-between mb-4 mt-4">
                                <a href="{{route('stages.create')}}" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter un stage</a>
                            </div>

                            <!-- Liste des établissements -->

                            <!-- Première colonne - Liste des établissements -->
                            <div class="overflow-x-auto">
                                <table id="stagiaireTable" class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stage</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date début</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date fin</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut du stage</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($stages as $stage)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $stage->titre_sujet }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $stage->date_debut }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $stage->date_fin }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $stage->statut }}</td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex">
                                                    <form action="{{ route('stages.destroy', $stage->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none focus:underline" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"><img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="h-6 w-6"></button>
                                                    </form>
                                                    <a href="{{ route('stages.edit', $stage->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-2"><img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="h-6 w-6"></a>
                                                </div>

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
