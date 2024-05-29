<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-lvh flex flex-col justify-center align-items-center gap-5 flex-wrap">
        <h1 class="text-center text-6xl">Choose some of options to begin</h1>
        <h2 class="text-center text-4xl">Create new <a href="{{route('projects.index')}}" class="text-blue-600 hover:text-blue-700 hover:underline">Project</a> or <a href="{{route('tasks.index')}}" class="text-blue-600 hover:text-blue-700 hover:underline">Task</a> to continue</h2>
    </div>
</x-app-layout>
