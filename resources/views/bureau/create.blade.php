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
                                                <h3 class="text-lg font-semibold">AJOUTER UNE BUREAU</h3>
                                            </div>
                                            <form action="{{ route('bureau.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
                                                @csrf

                                                <label for="libelle" class="block font-bold mb-2">Libellé du bureau:</label>
                                                <input type="text" id="libelle" name="libelle" required class="w-full px-4 py-2 border rounded-lg mb-4">

                                                <label for="service_id" class="block font-bold mb-2">Service:</label>
                                                <select id="service_id" name="service_id" required class="w-full px-4 py-2 border rounded-lg mb-4">
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->libelle }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="flex justify-between">
                                                    <button type="submit" class="w-48 px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 me-2">Ajouter</button>
                                                    <button type="button" onclick="window.location='{{ route("stagiaires.bureau") }}'" class="w-48 px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600">Annuler</button>
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
