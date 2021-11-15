<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('transaction.store') }}">
                        @csrf
                        <div>
                            <x-label for="account_id" :value="__('Account')" />
                            <select name="account_id" class="block mt-1 w-full" required>
                                @foreach($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input class="block mt-1 w-full" type="text" name="description" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="type" :value="__('Type')" />
                            <select name="type" class="block mt-1 w-full" required>
                                <option value="debit">Debit</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="nominal" :value="__('Nominal')" />
                            <x-input class="block mt-1 w-full" type="number" name="nominal" required />
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
