@extends('layouts.app')

@section('content')

    <header class="flex my-5">
        <p class="text-gray-600 text-lg ">
            <a href="{{ route('projects.index') }}">My Projects</a> / {{ $project->title }}</p>
        <a class="ml-auto blue-button" href="{{ route('projects.create') }}">New Project</a>
    </header>

    <main>
        <div class="grid grid-cols-3 gap-6 my-5">

            <div class="col-span-2">
                <!-- start task -->
                <div class="mb-6">
                    <h2 class="text-gray-600 text-lg mb-3">Tasks</h2>

                    <div class="card my-2">lorem you</div>
                    <div class="card my-2">lorem you</div>
                    <div class="card my-2">lorem you</div>
                </div>

                <!-- start generate note -->
                <div>
                    <h2 class="text-gray-600 text-lg mb-3 ">General note</h2>
                    <textarea class="w-full card  my-2 h-40"></textarea>
                </div>
            </div>


            <div class="col-span-1 ">
                @include('projects._card')
                <a href="{{ route('projects.index') }}">Go Back</a>
            </div>
        </div>
    </main>
@endsection

