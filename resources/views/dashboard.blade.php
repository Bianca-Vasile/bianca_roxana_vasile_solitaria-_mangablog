<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Benvenuta nel Manga Blog, Bianca!</h3>
                <a href="{{ route('authors.index') }}" class="text-red-600 underline">→ Vai alla lista degli autori</a>
            </div>
        </div>
    </div>
</x-app-layout>
