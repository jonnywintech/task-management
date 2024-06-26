<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('List of all projects') }}
        </h2>
        @if (session('popup'))
        <x-popup :popup="session('popup')" class="mb-4" />
        @endif
    </x-slot>
    <div class="container mx-auto px-4">
        <div class="p-8 ps-0">
            <a href="{{ route('projects.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 transition-all ">Create
                New Project</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Project Name</th>
                        <th scope="col" class="px-6 py-3">Number of Tasks</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects->items() as $project)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $project->name }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap w-60">
                                {{ $project->tasks()->count() }}
                            </td>
                            <td class="px-6 py-4 w-60 ">
                                <form class="inline" action="{{ route('projects.edit', ['project' => $project->id]) }}"
                                    method="get">
                                    @csrf
                                    <button
                                        class="font-medium bg-blue-600 rounded text-white px-4 py-2 ms-2 hover:scale-105 transition-all  cursor-pointer">Edit</button>
                                </form>
                                <form class="inline" action="{{ route('projects.destroy', ['project' => $project->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="font-medium bg-red-600 rounded text-white px-4 py-2 ms-2 hover:scale-105 transition-all cursor-pointer"
                                        onclick="confirm('Are you shure you want to delete project?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-5">
            {{ $projects->links()}}
        </div>
    </div>
</x-app-layout>
