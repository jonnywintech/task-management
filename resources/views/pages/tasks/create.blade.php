<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Create Task') }}
        </h2>
        @if (session('popup'))
            <x-popup :popup="session('popup')" class="mb-4" />
        @endif
    </x-slot>
    <div class="container mx-auto p-4">

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Task</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Fill out nessesary data to create new task.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name"
                                class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 sm:max-w-md">
                                <input type="text" name="name" id="name" required minlength="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="test_task">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <div class="w-56">
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an
                                    option</label>
                                <select id="countries" name="project_id" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected disabled value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            @if($project->id == $selected_project_id)
                                            selected
                                            @endif
                                            >{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>



    </div>
    <script>
        function dragAndDrop() {
            return {
                handleDragOver(event) {
                    event.preventDefault();
                },
                handleDrop(event) {
                    event.preventDefault();
                    const files = event.dataTransfer.files;
                    this.handleFiles({
                        target: {
                            files
                        }
                    });
                },
                handleFiles(event) {
                    const files = event.target.files;
                    console.log('Files:', files);
                }
            }
        }
    </script>
</x-app-layout>
