<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assessments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 md:p-10">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="p-2 m-4 bg-gray-100 rounded ml-0 min-w-full text-gray-800">
                                <a href="{{ route('assessments.index') }}"><i
                                        class="fas p-4 bg-gray-300 rounded-full mr-2 fa-arrow-left"></i>
                                    Back
                                    to assessments</a>
                            </div>
                            {{-- Main Info --}}
                            <ul
                                class="bg-blue-50  rounded-lg p-5 md:p-2  pb-5 mb-5 flex md:justify-evenly md:items-center flex-wrap flex-col md:flex-row">
                                {{-- Assessment Date --}}
                                <li class="mt-5 md:mb-5 text-2xl font-bold text-blue-500">
                                    <span class="text-gray-400 text-sm font-light uppercase block mb-2">Assessment
                                        Date</span>
                                    {{ date('D F d, Y', strtotime($assessment->date)) }}
                                </li>

                                {{-- Technician --}}
                                <li class="mt-5 md:mb-5 text-2xl font-bold text-blue-500">
                                    <span
                                        class="text-gray-400 text-sm font-light uppercase block mb-2">Technician</span>
                                    {{ $assessment->technicianName() }}
                                </li>
                                {{-- Supervisor --}}
                                <li class="mt-5 md:mb-5 text-2xl font-bold text-blue-500">
                                    <span
                                        class="text-gray-400 text-sm font-light uppercase block mb-2">Supervisor</span>
                                    {{ $assessment->supervisor }}
                                </li>

                                {{-- Weather Conditions --}}
                                <li class="mt-5 md:mb-5 text-2xl font-bold text-blue-500">
                                    <span class="text-gray-400 text-sm font-light uppercase block mb-2">Weather
                                        Conditions</span>
                                    @switch($assessment->weatherConditions)
                                        @case('Sunny')
                                        <i class="fas fa-sun mr-2"></i>
                                        @break

                                        @case('Partially Cloudy')
                                        <i class="fas fa-cloud-sun mr-2"></i>
                                        @break

                                        @case('Cloudy')
                                        <i class="fas fa-cloud mr-2"></i>
                                        @break

                                        @case('Rain')
                                        <i class="fas fa-cloud-rain mr-2"></i>
                                        @break

                                        @case('Snow')
                                        <i class="fas fa-snowflake mr-2"></i>
                                        @break

                                        @case('Stormy')
                                        <i class="fas fa-cloud-showers-heavy mr-2"></i>
                                        @break

                                        @case('Fog')
                                        <i class="fas fa-smog mr-2"></i>
                                        @break

                                        @case('Hurricanes')
                                        <i class="fas fa-wind mr-2"></i>
                                        @break

                                        @default
                                        <i class="fas fa-info-circle mr-2"></i>
                                    @endswitch
                                    {{ $assessment->weatherConditions }}


                                </li>

                                {{-- Work Type --}}
                                <li class="mt-5 md:mb-5 text-2xl font-bold text-blue-500">
                                    <span class="text-gray-400 text-sm font-light uppercase block mb-2">Work Type</span>
                                    {{ $assessment->workType }}
                                </li>
                            </ul>

                            {{-- Checklists --}}
                            <div class="flex flex-wrap justify-start items-center">
                                {{-- Required PPE --}}
                                <div class="bg-gray-50 rounded-lg p-5 md:mr-5">
                                    <ul>
                                        <h2 class="text-2xl font-bold mb-5">Pre Work Checklist</h2>
                                        @foreach ($assessment->findPreWorkChecklist() as $checklistItem)

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->ppeInspected ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                PPE Inspected
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->preUseInspections ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Pre-use Inspections Completed
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->jobSafety ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Trained on Safe Job Procedure
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->visualInspections ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Visual Inspections of Areas Completed
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->updatedAssessment ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Updated <abbr title="Field Level Hazard Assessment">FLHA</abbr> for
                                                Visited Sites
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->toolCondition ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Tools in good working conditions
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $checklistItem->controlZones ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Control Zones in Place as Required
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                                {{-- Pre Work Checklist --}}
                                <div class="bg-gray-50 w-full md:w-max rounded-lg mt-5 md:mt-0 p-5">
                                    <ul>
                                        <h2 class="text-2xl font-bold mb-5">Required <abbr
                                                title="Personal Protective Equipment">PPE</abbr></h2>
                                        @foreach ($assessment->findPPE() as $ppe)
                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->boots ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Steel Toe Boots
                                            </li>
                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->vest ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Hi-Vis Vest
                                            </li>
                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->hat ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Hard Hat
                                            </li>
                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->glasses ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Safety Glasses
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->gloves ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Safety Gloves
                                            </li>

                                            <li class="text-lg text-gray-500 mb-2"><i
                                                    class="mr-2 fas {{ $ppe->harness ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-500' }}"></i>
                                                Safety Harness &amp; Lanyard
                                            </li>


                                            <li class="ml-8 text-lg text-gray-500 mb-2">Other: {{ $ppe->other }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-5 ">
                                <h2 class="text-2xl font-bold mb-5">Tasks</h2>
                                @foreach ($assessment->findTasks() as $taskItem)
                                    <div class="flex flex-wrap justify-start items-center">
                                        @if (!is_null($taskItem->title))
                                            <ul class="w-screen md:w-auto m-2 rounded-lg p-5 bg-gray-50 text-gray-500">
                                                <li class="my-3 text-xl text-black"><strong>
                                                        {{ $taskItem->title }}</strong>
                                                </li>
                                                <li class="my-3"><strong>Hazards:</strong>
                                                    {{ $taskItem->hazards }}</li>
                                                <li class="my-3"><strong>Risk Level:</strong> <span
                                                        class="px-3 py-1 @if ($taskItem->riskLevel
                                                        == 'Low') {{ 'bg-yellow-100
                                                    text-yellow-600' }}
                                                    @elseif ($taskItem->riskLevel
                                                        == 'Moderate')
                                                        {{ 'bg-yellow-500 bg-opacity-20
                                                        text-yellow-900' }}
                                                    @elseif ($taskItem->riskLevel == 'High')
                                                        {{ 'bg-red-100 text-red-600' }} @endif
                                                        rounded-lg">{{ $taskItem->riskLevel }}</span>
                                                </li>
                                                <li class="my-3"><strong>Controls:</strong>
                                                    {{ $taskItem->controls }}
                                                </li>
                                            </ul>
                                        @else
                                    </div>
                                    <span class="text-gray-400">No Tasks have been
                                        created for this assessment</span>
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
