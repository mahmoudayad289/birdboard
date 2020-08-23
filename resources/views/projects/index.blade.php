<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>

    @forelse($projects as $project)
       <article>
           <h3><a href="{{ $project->path() }}">{{ $project->title }}</a></h3>
           <p>{{  $project->description }}</p>
       </article>
    @empty
        <p>NO records</p>
    @endforelse
    </body>
</html>
