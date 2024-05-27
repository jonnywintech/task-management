<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Projects and correspnding tasks') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">

        <div class="relative shadow-md sm:rounded-lg p-2 my-8 grid grid-flow-col grid-cols-3 gap-4">
        <form action="" class="col-span-2 grid grid-flow-col gap-4">

            <div class="col-span-1 bg-red-800">
                <h4 class="font-bold">Projects</h4>

            </div>

            <div class="col-span-1 bg-orange-600">
                <h4 class="font-bold">Asigned Tasks</h4>
            </div>
        </form>
            <div class="col-span-1 bg-blue-600">
                <h4 class="font-bold">Unasigned Tasks</h4>
            </div>
        </div>


    </div>
</x-app-layout>
