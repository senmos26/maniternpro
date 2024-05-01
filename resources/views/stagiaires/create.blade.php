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
                            <h1 class="text-3xl font-semibold mb-8">Ajout du stagiaire</h1>

                            <div class="flex items-center justify-between mb-4">
                                <a href="#" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau stagiaire</a>
                            </div>

                            <div class="p-6">
                                <div class="container mx-auto mt-10">
                                    <div class="w-full mx-auto">
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                                            <form action="{{ route('stagiaires.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf <!-- Ajouter le jeton CSRF -->

                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                    <div>
                                                        <label for="nom" class="block text-gray-700 font-bold mb-2">Nom :</label>
                                                        <input type="text" id="nom" name="nom" placeholder="Entrez le nom" value="{{ old('nom', $stagiaire->nom) }}" class="form-input">
                                                        @error('nom')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="prenom" class="block text-gray-700 font-bold mb-2">Prénom :</label>
                                                        <input type="text" id="prenom" name="prenom" placeholder="Entrez le prénom" value="{{ old('prenom', $stagiaire->prenom) }}" class="form-input">
                                                        @error('prenom')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="cin" class="block text-gray-700 font-bold mb-2">CIN :</label>
                                                        <input type="text" id="cin" name="cin" placeholder="Entrez le CIN" value="{{ old('cin', $stagiaire->cin) }}" class="form-input">
                                                        @error('cin')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="email" class="block text-gray-700 font-bold mb-2">Email :</label>
                                                        <input type="email" id="email" name="email" placeholder="Entrez l'email" value="{{ old('email', $stagiaire->email) }}" class="form-input">
                                                        @error('email')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="telephone" class="block text-gray-700 font-bold mb-2">Téléphone :</label>
                                                        <input type="tel" id="tel" name="tel" placeholder="Entrez le numéro de téléphone" value="{{ old('tel', $stagiaire->tel) }}" class="form-input">
                                                        @error('tel')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="stage" class="block text-gray-700 font-bold mb-2">Stage :</label>
                                                        <select class="form-select small-select @error('stage_id') is-invalid @enderror" id="stage" name="stage_id">
                                                            <option value="">Sélectionnez le stage</option>
                                                            @foreach($stages as $stage)
                                                                <option value="{{$stage->id}}" {{ old('stage_id', $stagiaire->stage_id) == $stage->id ? 'selected' : '' }}>{{$stage->titre_sujet}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('stage_id')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="etablissement" class="block text-gray-700 font-bold mb-2">Établissement :</label>
                                                        <select class="form-select small-select @error('etablissement_id') is-invalid @enderror" id="etablissement" name="etablissement_id">
                                                            <option value="">Sélectionnez l'établissement</option>
                                                            @foreach($etablissements as $etablissement)
                                                                <option value="{{$etablissement->id}}" {{ old('etablissement_id', $stagiaire->etablissement_id) == $etablissement->id ? 'selected' : '' }}>{{$etablissement->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('etablissement_id')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="bureau" class="block text-gray-700 font-bold mb-2">Bureau :</label>
                                                        <select class="form-select small-select @error('bureau_id') is-invalid @enderror" id="bureau" name="bureau_id">
                                                            <option value="">Sélectionnez le bureau</option>
                                                            @foreach($bureaus as $bureau)
                                                                <option value="{{$bureau->id}}" {{ old('bureau_id', $stagiaire->bureau_id) == $bureau->id ? 'selected' : '' }}>{{$bureau->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('bureau_id')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="cv" class="block text-gray-700 font-bold mb-2">CV :</label>
                                                    <input type="file" id="cv" name="cv" class="form-input">
                                                    @error('cv')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- Ajouter les autres champs ici -->
                                                <div class="flex items-center justify-center">
                                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">+Ajouter</button>
                                                    <a href="{{ route('Stagiaires') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded m-2">Annuler</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" onclick="window.location='{{ route("Stagiaires") }}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Retour</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
