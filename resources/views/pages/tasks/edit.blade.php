<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Edititing Task') }}
        </h2>
        @if (session('popup'))
            <x-popup :popup="session('popup')" class="mb-4" />
        @endif
    </x-slot>
    <div class="container mx-auto p-4">

        <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
            @csrf
            @method('put')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Task</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Fill out nessesary data to update Task.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 sm:max-w-md">
                                    <input type="text" name="name" id="name" required
                                        value="{{ $task->name }}" minlength="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <input type="hidden" name="project_id" value="{{$task->project_id}}">
                                </div>
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
