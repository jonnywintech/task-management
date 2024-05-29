<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $selected_project_id = $request->query('selected_project_id');

        $projects = Project::all();

        return view('pages.tasks.create', compact('projects', 'selected_project_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'project_id');

        $position = Task::where('project_id', $data['project_id'])->count() + 1;

        $data['position'] = $position;

        Task::create($data);

        return redirect()->back()->with('popup', 'Successfully created task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('pages.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->only('name');
        $task = Task::findOrFail($id);

        $task->update($name);

        return redirect()->route('tasks.index')->with('popup', 'Successfully updated task.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
