<x-app-layout>


    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        @include('navbar')

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Your main content goes here -->
            <div class="h-full bg-white p-6">

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">

                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="">
                                    <p class="text-3xl md:text-4xl font-semibold">Gérer vos stages</p><br>
                                    <p class="text-3xl md:text-4xl font-semibold">avec manitern</p><br>
                                    <p class="text-3xl md:text-4xl font-semibold">dans une application de gestion de stages.</p>
                                </div>

                                <div class="p-4">
                                    <canvas id="myChart" style="width:100%;max-width:600px;height: 98%"></canvas>

                                    <script>
                                        var xValues = ["Stagiaires", "Etablissements", "Attestations", "U", "Argentina"];
                                        var yValues = [55, 49, 44, 24, 15];
                                        var barColors = [
                                            "#b91d47",
                                            "#00aba9",
                                            "#2b5797",
                                            "#e8c3b9",
                                            "#1e7145"
                                        ];

                                        new Chart("myChart", {
                                            type: "pie",
                                            data: {
                                                labels: xValues,
                                                datasets: [{
                                                    backgroundColor: barColors,
                                                    data: yValues
                                                }]
                                            },

                                        });
                                    </script>

                                </div>
                            </div>
                            <div class="col-span-2 pt-5">
                                <div class="grid grid-cols-3 gap-4">
                                    <!-- Première ligne -->
                                    <a class="ok  bg-gray-200" href="{{route("Stages")}}">
                                        <div class="m-4">
                                            <p class="text-4xl font-semibold">Stages</p>
                                            <p class="text-6xl mt-2 chiffre">{{$nbrsta}}</p>
                                        </div>
                                    </a>
                                    <a class="ok  bg-gray-200" href="{{route("absences.index")}}">
                                        <div class="m-4">
                                            <p class="text-4xl font-semibold">Abscences</p>
                                            <p class="text-6xl mt-2 chiffre">{{$nbrabs}}</p>
                                        </div>
                                    </a>
                                    <a class="ok  bg-gray-200" href="{{route("Attestations")}}" >
                                        <div class="m-4">
                                            <p class="text-4xl font-semibold">Attestations</p>
                                            <p class="text-6xl mt-2 chiffre">{{$nbrattes}}</p>
                                        </div>
                                    </a>
                                    <a class="ok  bg-gray-200" href="{{route('Etablissements')}}">
                                        <div class="m-4">
                                            <p class="text-4xl font-semibold">Etablissements</p>
                                            <p class="text-6xl mt-2 chiffre">{{$nbrets}}</p>
                                        </div>
                                    </a>
                                    <a  class="ok  bg-gray-200" href="{{route('Stagiaires')}}">
                                        <div class="m-4">
                                            <p class="text-4xl font-semibold">Stagiaires</p>
                                            <p class="text-6xl mt-2 chiffre">{{$nbrsta}}</p>
                                        </div>
                                    </a>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
