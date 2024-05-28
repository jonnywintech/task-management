<div class="container mx-auto px-4">
    <div class="relative shadow-md sm:rounded-lg p-2 my-8 grid grid-flow-col grid-cols-3 gap-4">
        <div class="col-span-2 grid grid-flow-col gap-4">
            <div class="col-span-1 shadow">
                <h4 class="font-bold p-2">Projects</h4>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Project Name
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="odd:bg-white even:bg-gray-50 0 border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-blue-700 cursor-pointer"
                                    wire:click="handleClick({{ $project->id }})" title="{{ $project->description }}">
                                    {{ $project->name }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-span-1 p-2">
                <h4 class="font-bold p-2">Assigned Tasks</h4>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Task Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Position
                            </th>
                            <th scope="col" class="px-6 py-3">
                                priority
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody wire:sortable="updateOrder">
                        @foreach ($tasks as $task)
                            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}"
                                class="odd:bg-white even:bg-gray-50 0 border-b ">
                                <th wire:sortable.handle scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    title="{{ $task->description }}">
                                    {{ $task->name }}
                                </th>
                                <td wire:sortable.handle class="px-6 py-4">
                                    {{ $task->position }}
                                </td>
                                <td wire:sortable.handle
                                    class="px-6 py-4
                                @if ($task->priority === 'normal') bg-green-500 text-white capitalize
                                @elseif($task->priority === 'high')
                                    bg-red-500 text-white capitalize
                                @elseif($task->priority === 'medium')
                                    bg-yellow-300 text-black capitalize @endif
                                ">
                                    {{ $task->priority }}
                                </td>

                                <td class="px-6 py-4" wire:sortable.handle>
                                    <a href="#" class="font-medium text-blue-600 me-1 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-blue-600 ms-1 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1 p-2 overflow-auto">
            <h4 class="font-bold p-2">Unassigned Tasks</h4>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Task Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            priority
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks_without_project as $task)
                        <tr class="odd:bg-white even:bg-gray-50 0 border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                title="{{ $task->description }}">
                                {{ $task->name }}
                            </th>
                            <td
                                class="px-6 py-4
                            @if ($task->priority === 'normal')
                                bg-green-500 text-white capitalize
                            @elseif($task->priority === 'high')
                                bg-red-500 text-white capitalize
                            @elseif($task->priority === 'medium')
                                bg-yellow-300 text-black capitalize
                            @endif
                            ">
                                {{ $task->priority }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 ms-1 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
