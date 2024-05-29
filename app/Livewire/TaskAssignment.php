<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\Project;
use Livewire\Component;

class TaskAssignment extends Component
{
    public $tasks = [];
    public $projectId;

    public function mount()
    {
        $this->projectId = '';
        $this->tasks = [];
    }

    public function updatedProjectId(){
        $this->tasks = Task::where('project_id', $this->projectId)->orderBy('position', 'asc')->get();
    }

    public function updateOrder($list)
    {
        foreach ($list as $task) {
            Task::find($task['value'])->update(['position' => $task['order']]);
        }
        $this->refreshTasks();
    }

    public function refreshTasks()
    {
        if ($this->projectId) {
            $this->tasks = Task::where('project_id', $this->projectId)->orderBy('position', 'asc')->get();
        }
    }

    public function assignProject($taskId)
    {
        if(is_null($this->projectId)){
            return;
        }
        $position = count($this->tasks) + 1;
        Task::find($taskId)->update(['project_id' => $this->projectId, 'position' => $position]);
        $this->refreshTasks();
    }

    public function unassignProject($taskId)
    {
        Task::find($taskId)->update(['project_id' => null, 'position' => null]);
        $this->refreshTasks();
    }

    public function render()
    {
        $tasks_without_project = Task::where('project_id', null)->get();
        $projects = Project::all();

        return view('livewire.task-assignment', [
            'projects' => $projects,
            'tasks_without_project' => $tasks_without_project,
            'tasks' => $this->tasks,
        ])->layout('pages.task-assignment.index');
    }
}
