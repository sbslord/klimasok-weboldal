@props(['klimak', 'brands'])
<x-layout>
	<div class="flex justify-center p-5">
		<form method="GET" action="{{ route('klima.index') }}" class="border rounded-lg p-4 shadow-lg space-y-4 bg-white">
			<div class="flex flex-wrap gap-4 items-end">
				<!-- Név -->
				<div class="flex flex-col">
					<label class="font-medium text-sm text-gray-600">Név</label>
					<input type="text" name="search" value="{{ request('search') }}" class="border rounded px-3 py-2 w-48">
				</div>

				<!-- Márka -->
				<div class="flex flex-col">
					<label class="font-medium text-sm text-gray-600">Márka</label>
					<select name="brand_id" class="border rounded px-3 py-2">
						<option value="">Összes</option>
						@foreach($brands as $brand)
							<option value="{{ $brand->id }}" @if(request('brand_id') == $brand->id) selected @endif>{{ $brand->name }}</option>
						@endforeach
					</select>
				</div>

				<!-- Ár -->
				<div class="flex flex-col">
					<label class="font-medium text-sm text-gray-600">Min Ár</label>
					<input type="number" name="price_min" value="{{ request('price_min') }}" class="border rounded px-3 py-2 w-24">
				</div>
				<div class="flex flex-col">
					<label class="font-medium text-sm text-gray-600">Max Ár</label>
					<input type="number" name="price_max" value="{{ request('price_max') }}" class="border rounded px-3 py-2 w-24">
				</div>

				<!-- Keresés gomb -->
				<div class="flex items-center space-x-2">
					<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Keresés</button>
					<button type="button" id="toggleAdvanced" class="text-sm text-gray-500 hover:underline">További szűrők</button>
				</div>
			</div>

			<!-- Összezárható panel -->
			<div id="advancedFilters" class="hidden border-t pt-4 space-y-4">
				<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
					<div>
						<label class="font-medium text-sm text-gray-600">Hűtőteljesítmény Min (kW)</label>
						<input type="number" step="0.1" name="cooling_capacity_min" value="{{ request('cooling_capacity_min') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">Hűtőteljesítmény Max (kW)</label>
						<input type="number" step="0.1" name="cooling_capacity_max" value="{{ request('cooling_capacity_max') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">Fűtőteljesítmény Min (kW)</label>
						<input type="number" step="0.1" name="heating_capacity_min" value="{{ request('heating_capacity_min') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">Fűtőteljesítmény Max (kW)</label>
						<input type="number" step="0.1" name="heating_capacity_max" value="{{ request('heating_capacity_max') }}" class="border rounded px-3 py-2 w-full">
					</div>
					
					<div>
						<label class="font-medium text-sm text-gray-600">SEER</label>
						<input type="number" step="0.1" name="seer" value="{{ request('seer') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">SCOP</label>
						<input type="number" step="0.1" name="scop" value="{{ request('scop') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">Zajszint (dB)</label>
						<input type="number" name="noise_level" value="{{ request('noise_level') }}" class="border rounded px-3 py-2 w-full">
					</div>
					<div>
						<label class="font-medium text-sm text-gray-600">Garancia (év)</label>
						<input type="number" name="warranty_years" value="{{ request('warranty_years') }}" class="border rounded px-3 py-2 w-full">
					</div>

					<div>
						<label class="font-medium text-sm text-gray-600">Hűtőközeg típusa</label>
						<input type="text" name="refrigerant_type" value="{{ request('refrigerant_type') }}" class="border rounded px-3 py-2 w-full">
					</div>

					<div class="flex flex-col space-y-2">
						<label class="font-medium text-sm text-gray-600">Szűrő típusok</label>
						<label class="flex items-center space-x-2">
							<input type="checkbox" name="extra_filter" value="1" @if(request('extra_filter')) checked @endif>
							<span>Extra szűrő</span>
						</label>
						<label class="flex items-center space-x-2">
							<input type="checkbox" name="wifi_enabled" value="1" @if(request('wifi_enabled')) checked @endif>
							<span>Wifi</span>
						</label>
						<label class="flex items-center space-x-2">
							<input type="checkbox" name="h_tarifa" value="1" @if(request('h_tarifa')) checked @endif>
							<span>H tarifa</span>
						</label>
						<label class="flex items-center space-x-2">
							<input type="checkbox" name="in_stock" value="1" @if(request('in_stock')) checked @endif>
							<span>Raktáron</span>
						</label>
						<label class="flex items-center space-x-2">
							<input type="checkbox" name="featured" value="1" @if(request('featured')) checked @endif>
							<span>Kiemelt</span>
						</label>
					</div>
				</div>
			</div>
		</form>
	</div>

<script>
    document.getElementById('toggleAdvanced').addEventListener('click', function () {
        document.getElementById('advancedFilters').classList.toggle('hidden');
    });
</script>



	<!-- PRODUCTS / CARDS -->
	<section id="products" class="max-w-6xl mx-auto px-6 py-12">
		<h2 class="text-2xl font-bold">Klímák</h2>
		<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
			@foreach($klimak as $klima)
				<x-klima-card :klima="$klima" />
			@endforeach		
		</div>
		<div class="mt-5">
			{{ $klimak->links() }}
		</div>
	</section>
</x-layout>