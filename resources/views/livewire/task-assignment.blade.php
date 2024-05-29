<div class="container mx-auto px-4">
    <x-slot name="head">
        @vite('resources/js/livewire.js')
    </x-slot>

    <div class="relative shadow-md sm:rounded-lg p-2 my-8 grid grid-flow-col grid-cols-3 gap-4">
        <div class="col-span-2 grid grid-flow-col gap-4">
            <div class="col-span-1 shadow">
                <h4 class="font-bold p-2">Projects</h4>
                <div class="col-span-full">
                    <div class="w-56">
                        <label for="projects" class="block mb-2 text-sm font-medium text-gray-900">Select a Project</label>
                        <select id="projects" name="project_id" wire:model.live="projectId"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option disabled selected value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option wire:key="project_{{ $project->id }}" value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-span-1 p-2">
                <h4 class="font-bold p-2">Assigned Tasks</h4>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 cursor-default">
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
                                <th wire:sortable.handle scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    title="{{ $task->description }}">
                                    {{ $task->name }}
                                </th>
                                <td wire:sortable.handle class="px-6 py-4">{{ $task->position }}</td>
                                <td wire:sortable.handle class="px-6 py-4 {{ $task->priority == 'normal' ? 'bg-green-500 text-white capitalize' : ($task->priority == 'high' ? 'bg-red-500 text-white capitalize' : 'bg-yellow-300 text-black capitalize') }}">
                                    {{ $task->priority }}
                                </td>
                                <td wire:sortable.handle class="px-6 py-4">{{ $task->created_at }}</td>
                                <td class="px-6 py-4" wire:sortable.handle>

                                  <div class="flex">
                                    <a href="{{route('tasks.edit',['task'=>$task->id])}}" class="font-medium text-white ms-1 px-2 py-1 ms-2 rounded bg-blue-500 hover:underline cursor-pointer ">Edit</a>
                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="font-medium bg-red-600 rounded text-white px-2 py-1 ms-2 hover:scale-105 transition-all cursor-pointer"
                                            onclick="confirm('Are you shure you want to delete project?')">Delete</button>
                                    </form>
                                    <span wire:click="unassignProject({{$task->id}})" class="font-medium text-white bg-orange-500  px-2 py-1 ms-1 rounded hover:underline cursor-pointer">Unassign</span>

                                  </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1 p-2 overflow-auto">
            <h4 class="font-bold p-2">Unassigned Tasks</h4>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Task Name</th>
                        <th scope="col" class="px-6 py-3">Priority</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks_without_project as $task)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                title="{{ $task->description }}">
                                {{ $task->name }}
                            </th>
                            <td class="px-6 py-4 {{ $task->priority == 'normal' ? 'bg-green-500 text-white capitalize' : ($task->priority == 'high' ? 'bg-red-500 text-white capitalize' : 'bg-yellow-300 text-black capitalize') }}">
                                {{ $task->priority }}
                            </td>
                            <td class="px-6 py-4">
                                <span wire:click="assignProject({{$task->id}})" class="font-medium text-white bg-green-500 px-3 py-2 rounded ms-1 hover:underline cursor-pointer">Assign</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
