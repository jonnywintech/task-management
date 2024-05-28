<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{

    public $project_id = '';


    protected $listeners = ['projectSelected'];
    #[On('projectSelected.{project.id}')]
    public function projectSelected($projectId)
    {
        info('Project selected triggered');
        $this->project_id = $projectId;
        info($this->project_id);
    }


    public function render()
    {
        return view('livewire.task', [
            'tasks' => ModelsTask::where('project_id', $this->project_id)->orderBy('position', 'asc')->get()
        ])->layout('layouts.app');
    }
}
