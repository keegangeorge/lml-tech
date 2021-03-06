<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{

    public $addTasks = [];
    public $allTasks = [];

    public function mount()
    {
        $this->allTasks = Task::all();
        $this->addTasks = [
            ['title' => '', 'hazards' => '', 'riskLevel' => 'Low', 'controls' => '']
        ];
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
