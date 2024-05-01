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
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-400    ahov {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('Stagiaires') }}" class="block py-2 px-4 text-gray-400   ahov {{ request()->routeIs('Stagiaires') ? 'active' : '' }}">Stagiaires</a>
                <a href="{{ route('stagiaires.stage') }}" class="block py-2 px-4 text-gray-400    ahov {{ request()->routeIs('stagiaires.stage') ? 'active' : '' }}">Stages</a>
                <a href="{{ route('absences.index') }}" class="block py-2 px-4 text-gray-400   ahov {{ request()->routeIs('absences.index') ? 'active' : '' }}">Abscences</a>
                <a href="{{ route('Attestations') }}" class="block py-2 px-4 text-gray-400    ahov {{ request()->routeIs('Attestations') ? 'active' : '' }}">Attestations</a>
                <a href="{{ route('Etablissements') }}" class="block py-2 px-4 text-gray-400   ahov {{ request()->routeIs('Etablissements') ? 'active' : '' }}">Etablissements</a>
            </nav>
        </div>

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
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 1.697l-2.651-2.651-2.651 2.651a1.2 1.2 0 0 1-1.697-1.697l2.651-2.651-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 2.651 2.651-2.651a1.2 1.2 0 1 1 1.697 1.697l-2.651 2.651 2.651 2.651z"/></svg>
        </span>
                                    </div>
                                @endif
                            <h1 class="text-3xl font-semibold mb-8">Liste des Stagiaires</h1>

                            <div class="flex items-center justify-between mb-4">

                                <form action="{{route('filtersta')}}" method="post" class="flex items-center">
                                    @csrf
                                    <input type="text" name="keyword" placeholder="Entrer un mot clé" class="py-2 px-4 rounded-md border border-gray-400">
                                    <button type="submit" class="bg-gray-700 text-white py-2 px-4 rounded-md ml-2"><img src="{{ asset('icon/search.png') }}" class="h-6 w-6" alt="Search"></button>
                                </form>

                                <a href="{{route('stagiaires.create')}}" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau stagiaire</a>
                            </div>

                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-200">CIN</th>
                                    <th class="py-2 px-4 bg-gray-200">Nom</th>
                                    <th class="py-2 px-4 bg-gray-200">Prénom</th>
                                    <th class="py-2 px-4 bg-gray-200">Établissement</th>
                                    <th class="py-2 px-4 bg-gray-200">Stage</th>
                                    <th class="py-2 px-4 bg-gray-200">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stagiaires as $stagiaire)
                                    <tr class="tr">
                                        <td class="py-2 px-4 text-center">{{ $stagiaire->cin }}</td>
                                        <td class="py-2 px-4 text-center">{{ $stagiaire->nom }}</td>
                                        <td class="py-2 px-4 text-center">{{ $stagiaire->prenom }}</td>
                                        <td class="py-2 px-4 text-center">{{ $stagiaire->etablissement->nom }}</td>
                                        <td class="py-2 px-4 text-center">{{ $stagiaire->stage->titre_sujet }}</td>
                                        <td class="py-2 px-4 flex items-center justify-between">
                                            <a href="{{ route('stagiaires.edit', $stagiaire->id) }}"><img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="h-6 w-6 ic"></a>
                                            <a href="{{ route('stagiaires.detail', $stagiaire->id) }}"><img src="{{ asset('icon/side-menu.png') }}" alt="Détails" class="h-6 w-6 ic"></a>

                                            <form  method="post" style="display: inline;"  action="{{ route('stagiaires.destroy', $stagiaire->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-reset"><img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="h-6 w-6 ic" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"></button>
                                            </form>|
                                        </td>
                                    </tr>
                                    <script>

                                    </script>
                                @endforeach
                                </tbody>
                            </table>



                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
