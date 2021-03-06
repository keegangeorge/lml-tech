<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-10 py-14">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                {{-- <h1>{{ $a->date }}</h1> --}}
                                {{-- <a href="">{{ $a->id }}</a> --}}
                                {{-- {{ $a->id }} --}}
                                {{-- <h1>{{ $a->id }}</h1> --}}
                                <ul class="p-5 text-gray-800">
                                    <li><strong class="text-indigo-500">Assessment#: </strong>{{ $assessment->id }}</li>
                                    <li><strong class="text-indigo-500">Date: </strong>{{ $assessment->date }}</li>
                                    <li><strong class="text-indigo-500">Technician: </strong>{{ $assessment->technicianName() }}</li>
                                    <li><strong class="text-indigo-500">Weather Conditions: </strong>{{ $assessment->weatherConditions }}</li>
                                    <li><strong class="text-indigo-500">Supervisor: </strong>{{ $assessment->supervisor }}</li>
                                    <li><strong class="text-indigo-500">Work Type: </strong>{{ $assessment->workType }}</li>
                                    <strong>Pre Work Checklist:</strong>

                                    @foreach($assessment->findPreWorkChecklist() as $checklistItem)
                                    <li>PPE Inspected: {{ $checklistItem->ppeInspected  ? 'Yes' : 'No' }}</li>
                                    <li>Pre-use Inspections Completed: {{ $checklistItem->preUseInspections  ? 'Yes' : 'No' }}</li>
                                    <li>Trained on Safe Job Procedure: {{ $checklistItem->jobSafety  ? 'Yes' : 'No' }}</li>
                                    <li>Visual Inspections of Areas Completed:  {{ $checklistItem->visualInspections  ? 'Yes' : 'No' }}</li>
                                    <li>Field Level Hazard Assessment Updated for each site visited: {{ $checklistItem->updatedAssessment  ? 'Yes' : 'No' }}</li>
                                    <li>Tools in good working conditions: {{ $checklistItem->toolCondition  ? 'Yes' : 'No' }}</li>
                                    <li>Control Zones in Place as Required: {{ $checklistItem->controlZones  ? 'Yes' : 'No' }}</li>
                                    @endforeach

                                    <strong>Required PPE:</strong>
                                    @foreach($assessment->findPPE() as $ppe)
                                        <li>Steel Toe Boots: {{ $ppe->boots ? 'Yes' : 'No' }}</li>
                                        <li>Hi-Vis Vest: {{ $ppe->vest ? 'Yes' : 'No' }}</li>
                                        <li>Hard Hat: {{ $ppe->hat ? 'Yes' : 'No' }}</li>
                                        <li>Safety Glasses: {{ $ppe->glasses ? 'Yes' : 'No' }}</li>
                                        <li>Safety Gloves: {{ $ppe->gloves ? 'Yes' : 'No' }}</li>
                                        <li>Safety Harness + Lanyard: {{ $ppe->harness ? 'Yes' : 'No' }}</li>
                                        <li>Other: {{ $ppe->other }}</li>
                                    @endforeach

                                    <li> <strong class="text-indigo-500">Tasks:</strong>
                                        @foreach ($assessment->findTasks() as $taskItem)
                                        <ul class="mb-2 rounded p-3 bg-gray-100 text-gray-400">
                                            <li>Title: {{ $taskItem->title }}</li>
                                            <li>Hazards: {{ $taskItem->hazards }}</li>
                                            <li>Risk Level: {{ $taskItem->riskLevel }}</li>
                                            <li>Controls: {{ $taskItem->controls }}</li>
                                        </ul>
                                        @endforeach
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
