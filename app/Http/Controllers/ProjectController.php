<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = auth()->user()->projects;

        return view('project.index',['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {

        $p = new Project($request->only(['title']));
        auth()->user()->Projects()->save($p);

        return Redirect::route('project.create')->with('status', 'project-saved');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $project->load('tasks');
//        dd($project->tasks->first()->title);
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        return view('project.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $p = Project::findOrFail($id);
        $p->update($request->only('title'));
        return Redirect::route('project.edit', $id)->with('status', 'project-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $p = auth()->user()->projects()->find($id);

        if($p){
            $p->delete();
        }

        return Redirect::route('project.index')->with('status', 'project-deleted');

    }
}
