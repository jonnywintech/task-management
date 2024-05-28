<x-app-layout>
    <x-slot name="head">
        @livewireStyles
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Projects and correspnding tasks') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">

        <div class="container mx-auto px-4">
            <div class="relative shadow-md sm:rounded-lg p-2 my-8 grid grid-flow-col grid-cols-3 gap-4">
                <div class="col-span-2 grid grid-flow-col gap-4">
                    <div class="col-span-1 bg-red-800 p-2">
                        <h4 class="font-bold">Projects</h4>
                        @foreach ($projects as $project)
                            <div class="flex items-center gap-x-3 mb-1">
                                <button
                                @click="$dispatch('projectSelected', { projectId: '{{$project->id}}' })"
                                class="button px-2 py-1 bg-lime-200 rounded">{{$project->name}}</button>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-span-1 bg-orange-600 p-2">
                        <h4 class="font-bold">Assigned Tasks</h4>
                        <livewire:task />
                    </div>
                </div>
                <div class="col-span-1 bg-blue-600 p-2 overflow-auto">
                    <h4 class="font-bold">Unassigned Tasks</h4>
                    @foreach ($tasks_without_project as $task)
                        <div wire:key="{{$task->id}}"
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 sm:max-w-md mb-2">
                            <input type="text" name="{{ $task->id }}" id="unassigned_task_{{ $task->id }}"
                                value="{{ $task->name }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-pointer"
                                readonly>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <x-slot name="script">
            @livewireScripts
        </x-slot>
</x-app-layout>
