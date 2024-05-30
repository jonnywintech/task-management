<x-app-layout>
    <div class="h-lvh bg-zinc-200 flex flex-col justify-center align-items-center gap-5 flex-wrap">
        @auth

            <h1 class="text-center text-6xl">Choose some of options to begin</h1>
            <h2 class="text-center text-4xl">Create new <a href="{{ route('projects.index') }}"
                    class="text-blue-600 hover:text-blue-700 hover:underline">Project</a> or <a
                    href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-700 hover:underline">Task</a> to
                continue</h2>
        @else
            <h1 class="text-center text-6xl">Welcome to mini task application</h1>
            <h2 class="text-center text-4xl">Please <a href="{{ route('login') }}"
                    class="text-blue-600 hover:text-blue-700 hover:underline">login</a> or <a href="{{ route('register') }}"
                    class="text-blue-600 hover:text-blue-700 hover:underline">Register</a> to continue</h2>
        @endauth
    </div>
</x-app-layout>
