<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="w-64 bg-white sidebar">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 border-b border-gray-200">
                <span class="text-black text-lg font-semibold">Stagiaires</span>
            </div>

            <!-- Navigation Links -->
            <nav class="navside">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('Stagiaires') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Stagiaires') ? 'active' : '' }}">Stagiaires</a>
                <a href="{{ route('stagiaires.stage') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Stages') ? 'active' : '' }}">Stages</a>
                <a href="{{ route('absences.index') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('absences.index') ? 'active' : '' }}">Abscences</a>
                <a href="{{ route('Attestations') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Attestations') ? 'active' : '' }}">Attestations</a>
                <a href="{{ route('Etablissements') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Etablissements') ? 'active' : '' }}">Etablissements</a>
            </nav>
        </div>

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

                            <!-- Formulaire d'ajout d'un stage -->
                            <div class="container mx-auto mt-8">
                                <h1 class="text-3xl font-bold mb-4">Ajouter un stage</h1>
                                <form action="{{ route('stages.store') }}" method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="titre_sujet" class="block font-bold mb-2">Titre du sujet:</label>
                                        <input type="text" id="titre_sujet" name="titre_sujet" class="w-full px-4 py-2 border rounded-md" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="date_debut" class="block font-bold mb-2">Date de début:</label>
                                        <input type="date" id="date_debut" name="date_debut" class="w-full px-4 py-2 border rounded-md" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="date_fin" class="block font-bold mb-2">Date de fin:</label>
                                        <input type="date" id="date_fin" name="date_fin" class="w-full px-4 py-2 border rounded-md" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="statut" class="block font-bold mb-2">Statut:</label>
                                        <select id="statut" name="statut" class="w-full px-4 py-2 border rounded-md" required>
                                            <option value="En cours">En cours</option>
                                            <option value="Terminé">Terminé</option>
                                        </select>
                                    </div>

                                    <div class="flex justify-between">
                                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Ajouter</button>
                                        <button type="button" onclick="window.location='{{ route("stagiaires.stage") }}'" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-200">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
