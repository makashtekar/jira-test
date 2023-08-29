<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('task.create', compact('project'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request, Project $project)
    {

        $task = new Task($request->only(['title','description','deadline', 'priority']));
        $project->tasks()->save($task);
        return Redirect::route('project.index', $project->id)->with('status', 'task-saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('task.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, String $id)
    {
        $t = Task::findOrFail($id);
        $t->update($request->only(['title','description','deadline', 'priority','status']));
        return Redirect::route('project.show', $t->project->id)->with('status', 'task-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $t = auth()->user()->tasks()->find($id);

        if($t){
            $t->delete();
        }

        return Redirect::route('task.index')->with('status', 'task-deleted');
    }
}
