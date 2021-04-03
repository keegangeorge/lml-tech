<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Task;


class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::orderBy('date', 'DESC')->paginate(10);

        return view('assessments.index', ['assessments' => $assessments]);
    }

    public function create()
    {
        return view('assessments.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $this->validateAssessment();

        $assessment = new Assessment();

        $assessment->user_id = auth()->user()->id;
        $assessment->date = request('date');
        $assessment->supervisor = request('supervisor');
        $assessment->weatherConditions = request('weatherConditions');
        $assessment->workType = request('workType');

        $assessment->save();


        $assessment->preWorkChecklist()->create([
            'ppeInspected' => request('ppeInspected') ? 1 : 0, 'preUseInspections' => request('preUseInspections') ? 1 : 0,
            'jobSafety' => request('jobSafety') ? 1 : 0,
            'visualInspections' => request('visualInspections') ? 1 : 0,
            'updatedAssessment' => request('updatedAssessment') ? 1 : 0,
            'toolCondition' => request('toolCondition') ? 1 : 0,
            'controlZones' => request('controlZones') ? 1 : 0
        ]);

        $assessment->ppe()->create([
            'boots' => request('boots') ? 1 : 0,
            'vest' => request('vest') ? 1 : 0,
            'hat' => request('hat') ? 1 : 0,
            'glasses' => request('glasses') ? 1 : 0,
            'gloves' => request('gloves') ? 1 : 0,
            'harness' => request('harness') ? 1 : 0,
            'other' => request('otherPPE')
        ]);

        foreach ($request->addTasks as $task) {
            $assessment->tasks()->create([
                'title' => $task['title'],
                'hazards' => $task['hazards'],
                'riskLevel' => $task['riskLevel'],
                'controls' => $task['controls'],
            ]);
        }

        return redirect(route('assessments.index'));
    }

    public function show(Assessment $assessment)
    {
        // $assessment = Assessment::find($id);
        return view('assessments.show', ['assessment' => $assessment]);
        // return view('assessments.show', ['assessment' => $assessment]);
    }

    public function edit(Assessment $assessment)
    {
        return view('assessments.edit', ['assessment' => $assessment]);
        // return view('assessments.edit', compact('assessment'));
    }

    public function update(Assessment $assessment)
    {

        $assessment->user_id = auth()->user()->id;

        $assessment->date = request('date');
        $assessment->supervisor = request('supervisor');
        $assessment->weatherConditions = request('weatherConditions');
        $assessment->workType = request('workType');

        $assessment->update();


        $assessment->preWorkChecklist()->update([
            'ppeInspected' => request('ppeInspected') ? 1 : 0, 'preUseInspections' => request('preUseInspections') ? 1 : 0,
            'jobSafety' => request('jobSafety') ? 1 : 0,
            'visualInspections' => request('visualInspections') ? 1 : 0,
            'updatedAssessment' => request('updatedAssessment') ? 1 : 0,
            'toolCondition' => request('toolCondition') ? 1 : 0,
            'controlZones' => request('controlZones') ? 1 : 0
        ]);

        $assessment->ppe()->update([
            'boots' => request('boots') ? 1 : 0,
            'vest' => request('vest') ? 1 : 0,
            'hat' => request('hat') ? 1 : 0,
            'glasses' => request('glasses') ? 1 : 0,
            'gloves' => request('gloves') ? 1 : 0,
            'harness' => request('harness') ? 1 : 0,
            'other' => request('otherPPE')
        ]);


        // foreach (request()->addTasks as $task) {
        //     $assessment->tasks()->update([
        //         'title' => $task['title'],
        //         'hazards' => $task['hazards'],
        //         'riskLevel' => $task['riskLevel'],
        //         'controls' => $task['controls']
        //     ]);
        // }

        // foreach (request()->addTasks as $task) {
        //     Task::where('id', 22)->update([
        //         'title' => $task['title'],
        //         'hazards' => $task['hazards'],
        //         'riskLevel' => $task['riskLevel'],
        //         'controls' => $task['controls']
        //     ]);
        // }

        // foreach (request()->addTasks as $task) {
        //     // dump($assessment->tasks()->pluck('id'));

        //     foreach ($assessment->tasks()->pluck('id') as $t) {
        //         // dump($t);

        //         Task::where('id', $t)->update([
        //             'title' => $task['title'],
        //             'hazards' => $task['hazards'],
        //             'riskLevel' => $task['riskLevel'],
        //             'controls' => $task['controls']
        //         ]);
        //     }
        // }
        // die();
        // 
        return redirect($assessment->path())->with('success', 'Assessment updated successfully');
    }

    public function destroy(Assessment $assessment)
    {
        $assessment->delete();

        return redirect()->route('assessments.index')
            ->with('success', 'Project deleted successfully');
    }

    protected function validateAssessment()
    {
        return request()->validate([
            'date' => 'required',
            'supervisor' => 'required',
            'weatherConditions' => 'required',
            'workType' => 'required',
        ]);
    }
}
