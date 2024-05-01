<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        @include('navbar')

        <!-- Main Content -->
        <div class="flex flex-col flex-1 items-center justify-center">
            <div class="w-full sm:max-w-md">
                <div class="bg-white shadow-md rounded-md overflow-hidden">
                    <div class="bg-green-500 text-white py-4 px-6">
                        <h3 class="text-center font-semibold text-lg">AJOUTER UNE ABSENCE</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('absences.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="stagiaire" class="block text-gray-700 font-bold mb-2">Stagiaire :</label>
                                <input class="form-input @error('stagiaire') border-red-500 @enderror" list="stagiaires" id="stagiaire" name="stagiaire_id" placeholder="Sélectionez le stagiaire">
                                <datalist id="stagiaires">
                                    @foreach($stagiaires as $stagiaire)
                                        <option value="{{$stagiaire->id}}">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
                                    @endforeach
                                </datalist>
                                @error('stagiaire')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <label for="date_debut" class="block text-gray-700 font-bold mb-2">Date de début :</label>
                                <input type="date" class="form-input @error('date_debut') border-red-500 @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
                                @error('date_debut')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="date_fin" class="block text-gray-700 font-bold mb-2">Date de fin :</label>
                                <input type="date" class="form-input @error('date_fin') border-red-500 @enderror" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
                                @error('date_fin')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="justification" class="block text-gray-700 font-bold mb-2">Justification :</label>
                                <textarea class="form-textarea @error('justification') border-red-500 @enderror" id="justification" name="justification" rows="3">{{ old('justification') }}</textarea>
                                @error('justification')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Ajouter</button>
                                <a href="{{ route('absences.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
