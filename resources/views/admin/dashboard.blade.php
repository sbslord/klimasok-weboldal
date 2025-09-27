<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Üdv az Admin Panelben!</h1>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('klimak.index') }}" class="bg-blue-500 text-white p-4 rounded-lg hover:bg-blue-600">Klímák kezelése</a>
                    <a href="{{ route('brands.index') }}" class="bg-green-500 text-white p-4 rounded-lg hover:bg-green-600">Márkák kezelése</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
