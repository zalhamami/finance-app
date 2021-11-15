<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Account') }}
            </h2>

            <a href="{{ route('account.create') }}">
                <x-button>
                    {{ __('Create Account') }}
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
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td align="center">{{ $account->id }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->created_at }}</td>
                                    <td align="center">
                                        <a href="{{ route('account.edit', ['id' => $account->id]) }}">
                                            <x-button class="bg-yellow-500">
                                                {{ __('Edit') }}
                                            </x-button>
                                        </a>
                                        <a href="{{ route('account.destroy', ['id' => $account->id]) }}">
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
