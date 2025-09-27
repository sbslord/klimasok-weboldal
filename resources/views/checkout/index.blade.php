@props(['cart'])
@php
    $netto = $cart->items->sum(fn($item) => ($item->price + $item->install_price) * $item->quantity / 1.27);
    $brutto = $cart->items->sum(fn($item) => ($item->price + $item->install_price) * $item->quantity);
@endphp

<x-layout>
    <div class="max-w-6xl mx-auto p-6 space-y-8">

        {{-- Cím --}}
        <h1 class="text-3xl font-bold text-gray-800">Fizetés</h1>
		
		<x-checkout-steps :step="2" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- Kosár előnézet --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Kosár előnézet</h2>
                <div class="divide-y divide-gray-200">
                    @foreach($cart->items as $item)
                        <div class="py-3 flex justify-between items-center">
                            <div>
                                <span class="font-medium">{{ $item->klima->name }}</span>
                                @if($item->with_install)
                                    <div class="text-xs text-green-600">Beszereléssel</div>
                                @endif
                            </div>
                            <div class="text-right">
                                <span>{{ number_format(($item->price + $item->install_price) * $item->quantity, 0, ',', ' ') }} Ft</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 border-t border-gray-200 pt-4 space-y-2">
                    <div class="flex justify-between text-gray-700">
                        <span>Nettó összesen:</span>
                        <span class="font-medium">{{ number_format($netto, 0, ',', ' ') }} Ft</span>
                    </div>
                    <div class="flex justify-between text-gray-800 font-bold">
                        <span>Bruttó összesen:</span>
                        <span>{{ number_format($brutto, 0, ',', ' ') }} Ft</span>
                    </div>
                </div>
            </div>

            {{-- Vásárlói adatok és fizetés --}}
            <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6 bg-white rounded-lg shadow p-6">
                @csrf
				@if ($errors->any())
					<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
						<strong>Hiba történt:</strong>
						<ul class="list-disc list-inside">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <h2 class="text-xl font-semibold">Személyes adatok</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Név</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Cím</label>
                    <input type="text" name="address" value="{{ old('address') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <h2 class="text-xl font-semibold">Fizetési mód</h2>
				<div class="space-y-2">
					<label class="flex items-center">
						<input type="radio" name="payment_method" value="card" class="form-radio text-blue-500"
							{{ old('payment_method') == 'card' ? 'checked' : '' }}>
						<span class="ml-2">Bankkártya</span>
					</label>
					<label class="flex items-center">
						<input type="radio" name="payment_method" value="paypal" class="form-radio text-blue-500"
							{{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
						<span class="ml-2">PayPal</span>
					</label>
					<label class="flex items-center">
						<input type="radio" name="payment_method" value="cod" class="form-radio text-blue-500"
							{{ old('payment_method') == 'cod' ? 'checked' : '' }}>
						<span class="ml-2">Utánvét</span>
					</label>
				</div>


                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition">
                        Fizetés indítása
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-layout>

