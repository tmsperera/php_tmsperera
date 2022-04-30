<x-app-layout>
    <x-slot name="title">
        <a href="{{ route('sales-representatives.index') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sales Representatives</h2>
        </a>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('sales-representatives.create') }}">
                <span class="bg-blue-500 text-blue-50 px-3 py-2">Add Sales Representatives</span>
            </a>
        </div>
    </div>
</x-app-layout>
