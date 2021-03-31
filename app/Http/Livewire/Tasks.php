<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{

    public $addTasks = [];
    public $allTasks = [];
    public $hasTasks;
    public $assessmentId;

    public function mount($hasTasks = null)
    {
        echo $hasTasks;
        if (is_null($hasTasks)) {
            $this->allTasks = Task::all();
            $this->addTasks = [
                ['title' => '', 'hazards' => '', 'riskLevel' => 'Low', 'controls' => '']
            ];
            // If Edit Form:
        } elseif (!is_null($hasTasks)) {
            $this->allTasks = Task::where('assessment_id', $hasTasks)->get();
            foreach ($this->allTasks as $task) {
                $this->addTasks[] = ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls];
            }
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
