<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Projects and correspnding users') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-4">

        <form method="POST" action="{{route('projects.store')}}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Project</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Fill out nessesary data to create new project.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="project_name"
                                class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="project_name" id="project_name"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 ps-2 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 placeholder:ps-1"
                                        placeholder="test_project">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="about"
                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about project.</p>
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
</x-app-layout>
