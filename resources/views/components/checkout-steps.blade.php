@props(['step'])

<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-8">
        <div class="flex-1">
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-between">
                    {{-- Kosár --}}
                    <div class="flex flex-col items-center">
                        <div class="rounded-full w-8 h-8 flex items-center justify-center {{ $step >= 1 ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }}">1</div>
                        <span class="mt-2 text-sm font-medium {{ $step >= 1 ? 'text-blue-600' : 'text-gray-700' }}">Kosár</span>
                    </div>
                    {{-- Fizetés --}}
                    <div class="flex flex-col items-center">
                        <div class="rounded-full w-8 h-8 flex items-center justify-center {{ $step >= 2 ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }}">2</div>
                        <span class="mt-2 text-sm font-medium {{ $step >= 2 ? 'text-blue-600' : 'text-gray-700' }}">Fizetés</span>
                    </div>
                    {{-- Befejezés --}}
                    <div class="flex flex-col items-center">
                        <div class="rounded-full w-8 h-8 flex items-center justify-center {{ $step >= 3 ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }}">3</div>
                        <span class="mt-2 text-sm font-medium {{ $step >= 3 ? 'text-blue-600' : 'text-gray-700' }}">Befejezés</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
