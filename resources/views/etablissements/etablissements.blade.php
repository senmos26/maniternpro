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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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
                            <h1 class="text-3xl font-semibold mb-8">Liste des établissements</h1>

                            <div class="flex items-center justify-between mb-4">
                                <a href="#" class="bg-green-500 text-white py-2 px-4 rounded-md ml-auto">+ Ajouter nouveau stagiaire</a>
                            </div>

                            <div class="p-6">
                                <div class="container mx-auto mt-10">
                                    <div class="w-full mx-auto">
                                        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">


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
