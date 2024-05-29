<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Task as ModelsTask;

class Task extends Component
{
    public $tasks;
    public $projectId;

    public $task_priority =[
        1 => ['color' => 'bg-red-500',    'text' => 'High'],
        2 => ['color' => 'bg-red-500',    'text' => 'High'],
        3 => ['color' => 'orange__bg', 'text' => 'Medium'],
        4 => ['color' => 'orange__bg', 'text' => 'Medium']
    ];



    public function mount()
    {
        $this->projectId = '';
        $this->tasks = [];
    }

    public function updatedProjectId()
    {
        $this->tasks = ModelsTask::where('project_id', $this->projectId)->orderBy('position', 'asc')->get();
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
        if ($this->projectId) {
            $this->tasks = ModelsTask::where('project_id', $this->projectId)->orderBy('position', 'asc')->get();
        }
    }

    public function destroy($task_id)
    {
        $task = ModelsTask::find($task_id);

        $project_id = $task->project_id;

        $task->delete();

        $tasks = ModelsTask::where('project_id', $project_id)->orderBy('position', 'asc')->get();

        foreach ($tasks as $index => $task) {
            $task->update(['position' => $index + 1]);
        }

        $this->refreshTasks();
    }


    public function render()
    {
        $projects = Project::all();

        $selected_project_id = $this->projectId;

        return view('livewire.task', [
            'projects' => $projects,
            'tasks' => $this->tasks,
            'selected_project_id' => $selected_project_id,
            'task_priority' => $this->task_priority,
        ])->layout('pages.task-assignment.index');
    }
}
