<form action="{{ isset($etablissement) ? route('etablissements.update', $etablissement->id) : route('etablissements.store') }}" method="POST">
    @csrf
    @isset($etablissement)
        @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="nom" class="block text-gray-700 font-bold mb-2">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez le nom de l'établissement" class="form-input" value="{{ isset($etablissement) ? $etablissement->nom : '' }}">
    </div>
    <div class="mb-4">
        <label for="adresse" class="block text-gray-700 font-bold mb-2">Adresse :</label>
        <input type="text" id="adresse" name="adresse" placeholder="Entrez l'adresse de l'établissement" class="form-input" value="{{ isset($etablissement) ? $etablissement->adresse : '' }}">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($etablissement) ? 'Modifier' : 'Ajouter' }}
    </button>
</form>
