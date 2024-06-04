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

                            <!-- Liste des établissements -->
                            <div class="container mx-auto mt-5">
                                <div class="flex justify-center">
                                    <div class="w-full sm:w-2/3 lg:w-1/2 xl:w-1/3">
                                        <div class="bg-white shadow-md rounded-lg p-8">
                                            <div class="bg-green-500 text-white text-center py-2 px-4 mb-6 rounded-lg">
                                                <h3 class="text-lg font-semibold">MODIFIER UNE ETABLISSEMENT</h3>
                                            </div>
                                            <form action="{{ route('etablissements.update', $etablissement->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom :</label>
                                                    <input type="text" id="nom" name="nom" placeholder="Entrez le nom de l'établissement" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('nom') border-red-500 @enderror" value="{{ old('nom', $etablissement->nom) }}">
                                                    @error('nom')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse :</label>
                                                    <input type="text" id="adresse" name="adresse" placeholder="Entrez l'adresse de l'établissement" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('adresse') border-red-500 @enderror" value="{{ old('adresse', $etablissement->adresse) }}">
                                                    @error('adresse')
                                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="submit" class="inline-flex items-center px-6 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 disabled:opacity-25 transition">Modifier</button>
                                                    <a href="{{ route('Etablissements') }}" class="ml-4 inline-flex items-center px-6 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Annuler</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
