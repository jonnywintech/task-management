<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Task as ModelsTask;

class Task extends Component
{
    public $tasks = [];
    public $projectId;

    public $task_priority = [];

    public function mount()
    {
        $this->projectId = '';
        $this->tasks = [];

        $this->task_priority = [
            1 => ['color' => 'bg-red-500 text-white', 'text' => 'High'],
            2 => ['color' => 'bg-red-500 text-white', 'text' => 'High'],
            3 => ['color' => 'bg-orange-500 text-white', 'text' => 'Medium'],
            4 => ['color' => 'bg-orange-500 text-white', 'text' => 'Medium'],
        ];
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

    public function assignProject($taskId)
    {
        if (is_null($this->projectId)) {
            return;
        }
        $position = count($this->tasks) + 1;
        ModelsTask::find($taskId)->update(['project_id' => $this->projectId, 'position' => $position]);
        $this->refreshTasks();
    }

    public function unassignProject($taskId)
    {
        ModelsTask::find($taskId)->update(['project_id' => null, 'position' => null]);
        $this->refreshTasks();
    }

    public function destroy($task_id)
    {
        $task = ModelsTask::find($task_id);

        $task->delete();

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
