<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        // 'date' => 'datetime:d-M-Y',
    ];

    public function path()
    {
        return route('assessments.show', $this);
    }


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTaskItem($title, $hazards, $riskLevel, $controls)
    {

        // short form:
        // $this->tasks()->create(['assessment_id' => $this->id, ])

        Task::create([
            'assessment_id' => $this->id,
            'title' => $title,
            'hazards' => $hazards,
            'riskLevel' => $riskLevel,
            'controls' => $controls,
        ]);
    }

    public function preWorkChecklist()
    {
        return $this->hasOne(PreWorkChecklist::class);
    }

    public function ppe()
    {
        return $this->hasOne(RequiredPPE::class);
    }

    public function technician()
    {
        // ? TODO: change to user's name?
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technicianName()
    {
        return User::find($this->user_id)->name;
    }

    public function findTasks()
    {
        $task = $this->tasks()->pluck('id');
        // $friends->push($this->id);

        return Task::whereIn('id', $task)
            ->orWhere('id', $this->id)
            ->latest()->get();
    }

    public function findPreWorkChecklist()
    {
        $work = $this->preWorkChecklist()->pluck('id');

        return  PreWorkChecklist::whereIn('id', $work)
            ->orWhere('id', $this->id)
            ->latest()->get();
    }

    public function findPPE()
    {
        $ppe = $this->ppe()->pluck('id');

        return RequiredPPE::whereIn('id', $ppe)
            ->orWhere('id', $this->id)
            ->latest()->get();
    }
}
