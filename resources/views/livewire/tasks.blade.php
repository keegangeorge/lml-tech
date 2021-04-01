{{-- Tasks --}}
<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Tasks</h3>
            <p class="mt-1 text-sm text-gray-600">
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            @foreach ($addTasks as $index => $addTask)
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="p-5 rounded-lg bg-gray-100 grid grid-cols-4 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Task Title
                                @error('title')
                                    <br>
                                    <small class="text-red-600">{{ $errors->first('title') }}
                                    </small>

                                @enderror
                            </label>

                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="addTasks[{{ $index }}][title]"
                                    wire:model="addTasks.{{ $index }}.title"
                                    class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full  rounded-md sm:text-sm border-gray-300 @error('title') border-red-600 @enderror">

                            </div>

                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="hazards" class="block text-sm font-medium text-gray-700">
                                Hazards
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="addTasks[{{ $index }}][hazards]"
                                    wire:model="addTasks.{{ $index }}.hazards"
                                    class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full  rounded-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="riskLevel" class="block text-sm font-medium text-gray-700">Risk
                                Level</label>
                            <select name="addTasks[{{ $index }}][riskLevel]"
                                wire:model="addTasks.{{ $index }}.riskLevel" autocomplete="riskLevel"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option>Low</option>
                                <option>Moderate</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="controls" class="block text-sm font-medium text-gray-700">
                                Controls
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="addTasks[{{ $index }}][controls]"
                                    wire:model="addTasks.{{ $index }}.controls"
                                    class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full  rounded-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                        <button class="transition-colors
                                hover:bg-red-500 hover:text-white text-gray-500 rounded px-3 py-2 bg-gray-200"
                            wire:click.prevent="removeTask({{ $index }})">Remove
                            Task</button>

                    </div>

                </div>
            @endforeach
            <button wire:click.prevent="addTask" class="m-6 px-5 py-2 rounded text-white bg-gray-400">+ Add
                Another Task</button>
        </div>
    </div>

</div>
{{-- End Tasks --}}
