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
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <strong class="font-bold">Succès !</strong>
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 1.697l-2.651-2.651-2.651 2.651a1.2 1.2 0 0 1-1.697-1.697l2.651-2.651-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 2.651 2.651-2.651a1.2 1.2 0 1 1 1.697 1.697l-2.651 2.651 2.651 2.651z"/></svg>
        </span>
                                </div>
                            @endif

                            <h1 class="text-3xl font-semibold mb-8">Liste des Attestations</h1>

                                <table class="w-full">
                                    <thead class="">
                                    <tr >
                                        <th class="py-2 px-4 active">Nom du Stagiaire</th>
                                        <th class="py-2 px-4 active">Titre du Stage</th>
                                        <th class="py-2 px-4 active">Bureau</th>
                                        <th class="py-2 px-4 active">Établissement</th>
                                        <th class="py-2 px-4 active">Service</th>
                                        <th class="py-2 px-4 active">Statut</th>
                                        <th class="py-2 px-4 active">Imprimer<br>l'attestation</th>
                                        <th class="py-2 px-4 active">Date de Prise</th>
                                        <th class="py-2 px-4 active">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attestations as $attestation)
                                        <tr class="tr odd:bg-white odd:dark:bg-white-200 even:bg-gray-50 even:dark:bg-gray-200 border-b-gray-500 dark:border-gray-700">
                                            <td class="py-2 px-4 text-center">{{ $attestation->stagiaire->nom }} {{ $attestation->stagiaire->prenom }}</td>
                                            <td class="py-2 px-4 text-center">{{ $attestation->stage->titre_sujet }}</td>
                                            <td class="py-2 px-4 text-center">{{ $attestation->bureau->libelle }}</td>
                                            <td class="py-2 px-4 text-center">{{ $etablissements[$attestation->stagiaire->id] }}</td>
                                            <td class="py-2 px-4 text-center">{{ $attestation->service->libelle }}</td>
                                            <td class="py-2 px-4 text-center">
                                                <form action="{{ route('update_attestation_statut', $attestation->id) }}" method="POST">
                                                    @csrf
                                                    <input type="radio" name="statut" value="remis" {{ $attestation->statut == 'remis' ? 'checked' : '' }}> Remis
                                                    <input type="radio" name="statut" value="nonremis" {{ $attestation->statut == 'nonremis' ? 'checked' : '' }}> Non remis
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Enregistrer
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="flex justify-center">
                                                <a href="{{route('generate',['id'=>$attestation->id])}}">
                                                    <img src="{{ asset('icon/impression.png') }}" alt="Imprimer" class="h-6 w-6 ic">
                                                </a>
                                            </td>
                                            <td class="py-2 px-4 text-center">{{ $attestation->date_prise }}</td>
                                            <td>
                                                <form  method="post" style="display: inline;"  action="{{ route('attestations.destroy', $attestation->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-reset"><img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="h-6 w-6 ic" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"></button>
                                                </form>|
                                            </td>
                                        </tr>
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
