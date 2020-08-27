<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
       $projects =  auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(Request $request)
    {

       $request->validate([
           'title' => 'required',
           'description' => 'required',
        ]);


        $request->user()->projects()->create($request->all());

        return redirect()->route('projects.index');
    }


    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->user)) {
            abort(403);
        }
        return view('projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        //
    }


    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy(Project $project)
    {
        //
    }
}
