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
                            <div>
                                <h1 class="text-2xl font-bold mb-5">My Assessments</h1>
                                <a class="text-center inline m-5 ml-0 mt-10 p-3 text-white bg-blue-500 hover:bg-blue-600 rounded"
                                    href="{{ route('assessments.create') }}">New Assessment</a>
                            </div>


                            <section class="flex items-center justify-center">
                                <div class="container">
                                    <table
                                        class="mt-10 w-full flex flex-row flex-no-wrap sm:bg-blue rounded-lg overflow-hidden sm:shadow-lg my-5">
                                        <thead class="text-white">
                                            @foreach ($assessments as $assessment)
                                                <tr
                                                    class="bg-blue-500 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-5 sm:mb-0">
                                                    <th class="p-3 text-left">Date</th>

                                                    @if (Auth::user()->isAdmin == 1)
                                                        <th class="p-3 text-left">Technician</th>
                                                    @endif

                                                    <th class="p-3 text-left">Supervisor</th>
                                                    <th class="p-3 text-left">Weather</th>
                                                    <th class="p-3 text-left">Work Type</th>
                                                    <th class="p-3 text-left">View</th>
                                                    <th class="p-3 text-left">Edit</th>
                                                    <th class="p-3 text-left">Delete</th>
                                                </tr>
                                            @endforeach
                                        </thead>
                                        <tbody class="flex-1 sm:flex-none">
                                            @foreach ($assessments as $assessment)
                                                <tr class="flex flex-col flex-no wrap sm:table-row mb-5 sm:mb-0">
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        {{ $assessment->date }}</td>

                                                    @if (Auth::user()->isAdmin == 1)
                                                        <td
                                                            class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                            {{ $assessment->technicianName() }}
                                                        </td>
                                                    @endif

                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        {{ $assessment->supervisor }}</td>
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        {{ $assessment->weatherConditions }}</td>
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        {{ $assessment->workType }}</td>
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        <a class="bg-gray-300 p-2 px-4 rounded transition-colors hover:bg-gray-400"
                                                            href="{{ route('assessments.show', $assessment) }}">View</a>
                                                    </td>
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        <a class="bg-yellow-300 p-2 px-5 rounded transition-colors hover:bg-yellow-400"
                                                            href="{{ route('assessments.edit', $assessment) }}">Edit</a>
                                                    </td>
                                                    <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                                        <form
                                                            action="{{ route('assessments.destroy', $assessment->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="bg-red-400 p-2 px-3 rounded transition-colors hover:bg-red-500"
                                                                onclick="return confirm('Are you sure you would like to delete this assessment?')"
                                                                title="delete" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                            <div class="m-5 p-5">
                                {{ $assessments->links() }}
                            </div>


                            <style>
                                html,
                                body {
                                    height: 100%;
                                }

                                @media (min-width: 640px) {
                                    table {
                                        display: inline-table !important;
                                    }

                                    thead tr:not(:first-child) {
                                        display: none;
                                    }
                                }

                                td:not(:last-child) {
                                    border-bottom: 0;
                                }

                                th:not(:last-child) {
                                    border-bottom: 2px solid rgba(0, 0, 0, .1);
                                }

                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
