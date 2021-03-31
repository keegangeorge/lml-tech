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
        $this->allTasks = Task::where('assessment_id', 4)->get();
        foreach ($this->allTasks as $i => $task) {
            //     // $this->addTasks = ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls];

            //     // echo $task;

            //     // $this->addTasks = [];
            // echo "This is the index " . $i;
            // echo "Here is the task " . $task;

            // $this->addTasks = [
            //     // ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls],
            //     ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls]
            // ];

            $this->addTasks[] = ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls];
            // $this->addTasks = [
            // ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls],
            // ['title' => $task->title, 'hazards' => $task->hazards, 'riskLevel' => $task->riskLevel, 'controls' => $task->controls]
            // ];
        }


        // $this->addTasks = ?

        // if (!is_null($hasTasks)) {
        //     $this->allTasks = Task::all();
        //     $this->addTasks = [
        //         ['title' => '', 'hazards' => '', 'riskLevel' => 'Low', 'controls' => '']
        //     ];
        // }
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
