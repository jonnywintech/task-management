<div class="container w-full h-full">
    @foreach ($tasks as $task)
        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 sm:max-w-md mb-2">
            <input type="text" name="{{ $task->id }}" id="task_{{ $task->id }}" value="{{ $task->name }}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 cursor-pointer"
                readonly>
        </div>
    @endforeach
</div>
