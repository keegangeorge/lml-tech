<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{

    public $addTasks = [];
    public $allTasks = [];
    public $hasTasks;

    public function mount($hasTasks = null)
    {
        // ! TODO: setup finding of current task based on assessment id and add it to the view for the edit path.
        $this->allTasks = Task::where('assessment_id', 3)->get();
        // $this->addTasks = ?

        if (!is_null($hasTasks)) {
            $this->allTasks = Task::all();
            $this->addTasks = [
                ['title' => '', 'hazards' => '', 'riskLevel' => 'Low', 'controls' => '']
            ];
        }
    }

    public function addTask()
    {
        $this->addTasks[] =  ['title' => '', 'hazards' => '', 'riskLevel' => 'Low', 'controls' => ''];
    }

    public function removeTask($index)
    {
        unset($this->addTasks[$index]);
        $this->addTasks = array_values($this->addTasks);
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
