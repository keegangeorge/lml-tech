<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-10 py-14">
                {{-- <x-jet-welcome /> --}}
                <h2 class="text-lg font-bold mb-10">Welcome {{ Auth::user()->name }}</h2>

                <ul class="md:flex flex-row flex-wrap items-start">
                    <li><a href="{{ route('assessments.index') }}"
                            class="block  text-center m-1 transition-colors duration-150 p-3 font-bold text-white bg-blue-500 hover:bg-blue-600 rounded ">My
                            Assessments</a></li>
                    <li><a href="{{ route('assessments.create') }}"
                            class="block  text-center m-1 transition-colors duration-150 p-3 font-bold text-white bg-gray-400 hover:bg-gray-300 rounded ">New
                            Assessment</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
