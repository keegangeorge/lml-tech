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
                
                <ul>
                    <li><a href="{{ route('assessments.index') }}" class="transition-colors duration-150 p-3 font-bold text-white bg-indigo-400 hover:bg-indigo-300 rounded ">My Assessments</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
