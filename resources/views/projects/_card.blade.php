<div class="card">
    <h3 class="text-xl font-normal py-3 border-solid border-l-4 border-blue-400 -ml-5 pl-4"><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
    <p class="text-gray-600">{{  Str::limit($project->description, 200) }}</p>
</div>
