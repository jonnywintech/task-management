<div class="container mx-auto px-4">
    <x-slot name="head">
        @vite('resources/js/livewire.js')
    </x-slot>
    <div class="p-8 pb-0 ps-0 relative">
        <a href="{{ route('tasks.create', ['selected_project_id'=> $selected_project_id]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 transition-all ">Create
            New Task</a>
    </div>
    @if (session('popup'))
            <x-popup :popup="session('popup')" class="mb-4" />
    @endif
    <div class="relative shadow-md sm:rounded-lg p-2 my-8 gap-4">
        <div class="col-span-2 flex flex-row flex-wrap gap-4">
            <div class="col-span-1 basis-64 p-2 border-r-2">
                <div>
                    <h4 class="font-bold p-2">Projects</h4>
                    <div class="row">
                        <div class="w-56">
                            <label for="projects" class="block mb-2 text-sm font-medium text-gray-900">Select a
                                Project</label>
                            <select id="projects" name="project_id" wire:model.live="projectId"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 w-56 overflow-hidden truncate ">
                                <option disabled selected value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option wire:key="project_{{ $project->id }}" value="{{ $project->id }}">
                                        {{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1 p-2 grow">
                <h4 class="font-bold p-2">Assigned Tasks</h4>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 cursor-default min-w-px-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Task Name</th>
                            <th scope="col" class="px-6 py-3">Position</th>
                            <th scope="col" class="px-6 py-3">Priority</th>
                            <th scope="col" class="px-6 py-3">Created At</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody wire:sortable="updateOrder" wire:sortable.update="updateOrder">
                        @foreach ($tasks as $task)
                        <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}"
                            class="odd:bg-white even:bg-gray-50 border-b">
                            <td wire:sortable.handle scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap max-w-56 text-wrap">
                                {{ $task->name }}
                            </td>
                            <td wire:sortable.handle class="px-6 py-4">{{ $task->position }}</td>
                            <td wire:sortable.handle
                            class="text-center text-white {{$task_priority[$task->position]['color'] ?? 'bg-green-500'}}">{{ $task_priority[$task->position]['text'] ?? 'Normal' }}</td>
                            <td wire:sortable.handle class="px-6 py-4">{{ $task->created_at }}</td>
                            <td class="px-6 py-4" wire:sortable.handle>
                                <div class="flex">
                                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                         class="font-medium text-white ms-1 px-2 py-1 ms-2 rounded bg-blue-500 cursor-pointer ">Edit</a>
                                    <button type="button" wire:click="destroy({{ $task->id }})"
                                        wire:confirm="Are you sure you want to delete this task?"class="font-medium text-white bg-red-500  px-2 py-1 ms-1 rounded cursor-pointer">delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
