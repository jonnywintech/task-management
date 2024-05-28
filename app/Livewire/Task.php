<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Task as ModelsTask;

class Task extends Component
{

    public $tasks = [];
    public $project_id;

    protected $listeners = ['handleClick', 'refreshTasks'];

    public function handleClick($project_id)
    {
        $this->project_id = $project_id;
        $this->tasks = ModelsTask::where('project_id', $project_id)->orderBy('position', 'asc')->get();
    }

    public function updateOrder($list)
    {
        foreach ($list as $task) {
            ModelsTask::find($task['value'])->update(['position' => $task['order']]);
        }
        $this->refreshTasks();
    }

    public function refreshTasks()
    {
        if ($this->project_id) {
            $this->tasks = ModelsTask::where('project_id', $this->project_id)->orderBy('position', 'asc')->get();
        }
    }

    public function render()
    {
        $tasks_without_project = ModelsTask::where('project_id', null)->get();
        $projects = Project::all();

        return view('livewire.task', [
            'projects' => $projects,
            'tasks_without_project' => $tasks_without_project,
            'tasks' => $this->tasks,
        ])->layout('pages.task-assignment.index');
    }
}
