
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
                                                <h3 class="text-lg font-semibold">MODIFIER UN BUREAU</h3>
                                            </div>
                                            <form action="{{ route('bureau.update', $bureau->id) }}" method="POST" class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="libelle" class="block text-gray-700 font-bold mb-2">Libellé du bureau:</label>
                                                    <input type="text" id="libelle" name="libelle" value="{{ $bureau->libelle }}" class="form-input w-full">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="service_id" class="block text-gray-700 font-bold mb-2">Service:</label>
                                                    <select id="service_id" name="service_id" class="form-select w-full">
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" {{ $bureau->service->id === $service->id ? 'selected' : '' }}>
                                                                {{ $service->libelle }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="flex justify-between">
                                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
                                                    <button type="button" onclick="window.location='{{ route("stagiaires.bureau") }}'" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</button>
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

