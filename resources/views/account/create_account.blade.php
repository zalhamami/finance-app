<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('account.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input class="block mt-1 w-full" type="text" name="name" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="notes" :value="__('Notes')" />
                            <x-input class="block mt-1 w-full" type="text" name="notes" required />
                        </div>
                        <x-button class="mt-4">
                            {{ __('Save') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
