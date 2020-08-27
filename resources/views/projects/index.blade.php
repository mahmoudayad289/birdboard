
    @extends('layouts.app')

    @section('content')
        <div>
            <header class="flex my-5">
                <h3 class="text-gray-600 text-lg ">My Projects</h3>
                <a class="ml-auto blue-button" href="{{ route('projects.create') }}">New Project</a>
            </header>

            <main class="grid  sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @forelse($projects as $project)
                    @include('projects._card')
                @empty
                    <p>No records</p>
                @endforelse
            </main>
        </div>
    @endsection
