<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Transaction') }}
            </h2>
            <a href="{{ route('transaction.create') }}">
                <x-button>
                    {{ __('Create Transaction') }}
                </x-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Account Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Nominal</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td align="center">{{ $transaction->id }}</td>
                                <td align="center">{{ $transaction->account->name }}</td>
                                <td align="center">{{ $transaction->description }}</td>
                                <td align="center">{{ $transaction->type }}</td>
                                <td align="center">{{ $transaction->nominal }}</td>
                                <td align="center">{{ $transaction->created_at }}</td>
                                <td align="center">
                                    <a href="{{ route('transaction.edit', ['id' => $transaction->id]) }}">
                                        <x-button class="ml-2 bg-yellow-500">
                                            {{ __('Edit') }}
                                        </x-button>
                                    </a>
                                    <a href="{{ route('transaction.destroy', ['id' => $transaction->id]) }}">
                                        <x-button class="ml-2 bg-red-500">
                                            {{ __('Delete') }}
                                        </x-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
