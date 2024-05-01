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
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Succès !</strong>
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 1.697l-2.651-2.651-2.651 2.651a1.2 1.2 0 0 1-1.697-1.697l2.651-2.651-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 2.651 2.651-2.651a1.2 1.2 0 1 1 1.697 1.697l-2.651 2.651 2.651 2.651z"/></svg>
                                    </span>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Erreur !</strong>
                                    <span class="block sm:inline">{{ session('error') }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 1.697l-2.651-2.651-2.651 2.651a1.2 1.2 0 0 1-1.697-1.697l2.651-2.651-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 2.651 2.651 2.651a1.2 1.2 0 1 1 1.697 1.697l-2.651 2.651 2.651 2.651z"/></svg>
                                    </span>
                                </div>
                            @endif
                            <h1 class="text-3xl font-semibold mb-8">Liste des Absences</h1>

                            <div class="flex items-center justify-between mb-4">
                                <form action="{{ route('filterabs') }}" method="post" class="flex items-center">
                                    @csrf
                                    <input type="text" name="keyword" placeholder="Entrer un mot clé" class="py-2 px-4 rounded-md border border-gray-400">
                                    <button type="submit" class="bg-gray-700 text-white py-2 px-4 rounded-md ml-2"><img src="{{ asset('icon/search.png') }}" class="h-6 w-6" alt="Search"></button>
                                </form>
                                <a href="{{ route('stagiaires.create') }}" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau stagiaire</a>
                            </div>

                            <!-- Absences Table -->
                            <div class="container mx-auto p-8">
                                <h1 class="text-3xl font-bold mb-8">Liste des Absences</h1>
                                <a href="{{ route('absences.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md inline-block mb-4">+ Ajouter une nouvelle absence</a>
                                <table class="w-full border-collapse border border-gray-200">
                                    <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-200 px-4 py-2">Stagiaire</th>
                                        <th class="border border-gray-200 px-4 py-2">Date début d'absence</th>
                                        <th class="border border-gray-200 px-4 py-2">Date fin d'absence</th>
                                        <th class="border border-gray-200 px-4 py-2">Justification</th>
                                        <th class="border border-gray-200 px-4 py-2">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($absences as $absence)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-2">{{ $absence->stagiaire?->nom ?? 'Non spécifié' }}      {{$absence->stagiaire?->prenom?? 'Non spécifié'}}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $absence->date_debut }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $absence->date_fin }}</td>
                                            <td class="border border-gray-200 px-4 py-2">{{ $absence->justification }}</td>
                                            <td class="border border-gray-200 px-4 py-2 ">
                                                <form method="post" action="{{ route('absences.destroy', $absence->id) }}" class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette absence ?')" class="mr-2">
                                                        <img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="w-6 h-6">
                                                    </button>
                                                </form>
                                                <form action="{{ route('absences.edit', $absence->id) }}" method="get">
                                                    <button type="submit">
                                                        <img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="w-6 h-6">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Absences Table -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
