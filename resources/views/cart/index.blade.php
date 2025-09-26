@props(['cart'])
<x-layout>

    <x-heading>Kosár</x-heading>

    <div class="max-w-5xl mx-auto p-4">
        @if($cart->items->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 bg-white rounded-lg shadow">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Termék</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Nettó ár</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Bruttó ár</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Mennyiség</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Összeg</th>
                            <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Művelet</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($cart->items as $item)
                            @php
                                $netPrice = $item->price / 1.27; // nettó ár számítása 27% ÁFA levonásával
                            @endphp
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm font-medium text-gray-700">
                                    {{ $item->klima->name }}
                                    @if($item->with_install)
                                        <div class="text-xs text-green-600 font-semibold mt-1">Beszereléssel</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-right text-gray-700">
                                    {{ number_format($netPrice, 0, ',', ' ') }} Ft
                                </td>
                                <td class="px-4 py-3 text-sm text-right text-gray-700">
                                    {{ number_format($item->price, 0, ',', ' ') }} Ft
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-center space-x-2">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded px-2 py-1 text-sm">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Frissít</button>
                                    </form>
                                </td>
                                <td class="px-4 py-3 text-right font-semibold text-gray-800">
                                    {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ft
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                            Eltávolít
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @if($item->with_install)
                                <tr class="bg-green-50">
                                    <td class="px-4 py-2 text-sm text-green-700 font-medium">
                                        Beszerelés díja
                                    </td>
                                    <td></td>
                                    <td class="px-4 py-2 text-sm text-right text-green-700">
                                        {{ number_format($item->install_price, 0, ',', ' ') }} Ft
                                    </td>
                                    <td></td>
                                    <td class="px-4 py-2 text-sm text-right font-semibold text-green-700">
                                        {{ number_format($item->install_price * $item->quantity, 0, ',', ' ') }} Ft
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-between items-center">
				<h3 class="text-xl font-bold text-black/30">
					Összesen (Nettó): {{ number_format($cart->items->sum(fn($item) => (($item->price / 1.27) + ($item->install_price / 1.27)) * $item->quantity), 0, ',', ' ') }} Ft
				</h3>
                <h3 class="text-xl font-bold text-green-400">
                    Összesen(Bruttó): {{ number_format($cart->items->sum(fn($item) => ($item->price + $item->install_price) * $item->quantity), 0, ',', ' ') }} Ft
                </h3>
                <a href="" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg font-semibold">
                    Tovább a fizetéshez
                </a>
            </div>
        @else
            <p class="text-center text-gray-500 text-lg mt-10">A kosár üres 😔</p>
        @endif
    </div>

</x-layout>
