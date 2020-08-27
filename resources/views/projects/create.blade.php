@extends('layouts.app')

@section('content')
   <div>
       <form action="{{ route('projects.store') }}" method="post">
       @csrf
       <!-- title input   -->
           <div class="form-group">
               <label for="title">title:</label>
               <input type="text" id="title" class="form-control" name="title">
           </div>

           <!-- description input   -->
           <div class="form-group">
               <label for="description">description:</label>
               <textarea type="text" id="description" class="form-control" name="description"></textarea>
           </div>

           <div class="form-group">
               <button type="submit" class="btn btn-info text-white">submit</button>
               <a class="btn btn-success" href="{{ route('projects.index')  }}">Cancel</a>
           </div>
       </form>
   </div>
@endsection
