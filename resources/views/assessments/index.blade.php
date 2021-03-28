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
                            <a class="text-center m-5 p-3 text-white bg-indigo-300 hover:bg-indigo-400 rounded"
                                href="{{ route('assessments.create') }}">New Assessment</a>
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        ID
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Technician
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Supervisor
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking">
                                                        Weather
                                                    </th>
                                                    <th scope="col"
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Work Type
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @forelse($assessments as $assessment)
                                                    <tr>
                                                        <td class="px-4 py-4 text-gray-500">
                                                            {{ $assessment->id }}
                                                        </td>
                                                        <td class="px-6 py-4 text-gray-500">
                                                            {{ $assessment->technicianName() }}
                                                        </td>
                                                        <td class="px-6 py-4 text-gray-500">
                                                            {{ $assessment->date }}
                                                        </td>
                                                        <td class="px-6 py-4 text-gray-500">
                                                            {{ $assessment->supervisor }}
                                                        </td>
                                                        <td class="px-6 py-4 text-gray-500">
                                                            {{ $assessment->weatherConditions }}
                                                        </td>
                                                        <td class="px-6 py-4 text-gray-500">{{ $assessment->workType }}
                                                        </td>
                                                        <td>
                                                            <a class="p-2 bg-gray-200 font-bold text-gray-400  text-sm text-center uppercase rounded transition-colors hover:bg-gray-400 hover:text-white"
                                                                href="{{ route('assessments.show', $assessment) }}">View</a>
                                                            <a class="p-1 font-bold text-gray-400  text-sm text-center uppercase rounded transition-colors hover:text-gray-200"
                                                                href="{{ route('assessments.edit', $assessment) }}">Edit</a>
                                                            <a class="p-1 font-bold text-gray-400  text-sm text-center uppercase rounded transition-colors hover:text-gray-200"
                                                                href="{{ route('assessments.destroy', $assessment) }}">Delete</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    No Assessments Yet.
                                                @endforelse

                                                <!-- More items... -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
