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

                            <!-- Liste des services -->
                            <div class="container mx-auto mt-5">
                                <div class="flex justify-center">
                                    <div class="w-full sm:w-2/3 lg:w-1/2 xl:w-1/3">
                                        <div class="bg-white shadow-md rounded-lg p-8">
                                            <a href="{{ route('services.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md mb-4 inline-block">+ Ajouter nouveau service</a>
                                            <h1 class="text-3xl font-semibold mb-8">Liste des Services</h1>


                                            <table class="w-full">
                                                <thead>
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{ $service->libelle }}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex">

                                                                <a href="{{ route('services.edit', $service->id) }}" class="ml-2"><img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="h-6 w-6"></a>
                                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="focus:outline-none" onclick="return confirm('Etes vous sûr de vouloir supprimer?')">
                                                                        <img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="h-6 w-6">
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$services->links()}}
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
