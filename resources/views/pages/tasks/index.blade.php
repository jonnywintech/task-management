<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 bold leading-tight">
            {{ __('Projects and correspnding tasks') }}
        </h2>
        @if (session('popup'))
            <x-popup :popup="session('popup')" class="mb-4" />
        @endif
    </x-slot>
    <div class="container mx-auto px-4">
        @livewire('task')
    </div>
</x-app-layout>
