<div class="w-64 bg-white sidebar">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <span class="text-black text-lg font-semibold">Stagiaires</span>
    </div>

    <!-- Navigation Links -->
    <nav class="navside">
        <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('dashboard',) ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('Stagiaires') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Stagiaires','stagiaires.create') ? 'active' : '' }}">Stagiaires</a>
        <a href="{{ route('Stages') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Stages','stages.create') ? 'active' : '' }}">Stages</a>
        <a href="{{ route('absences.index') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('absences.index') ? 'active' : '' }}">Abscences</a>
        <a href="{{ route('Attestations') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Attestations') ? 'active' : '' }}">Attestations</a>
        <a href="{{ route('Etablissements') }}" class="block py-2 px-4 text-gray-400 ahov {{ request()->routeIs('Etablissements') ? 'active' : '' }}">Etablissements</a>
    </nav>
</div>

