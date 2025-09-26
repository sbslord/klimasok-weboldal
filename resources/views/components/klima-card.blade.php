@props(['klima'])

<!-- Card -->
<div class="bg-white rounded-lg shadow p-6 border border-transparent hover:border-blue-400/50 group transition-colors duration-300">
	<img src="{{ $klima->image_url }}" alt="klíma" class="mb-5 w-80 h-60 object-contain rounded-xl shadow-lg">
	<h3 class="font-semibold">{{ $klima->name }}</h3>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 000-5.656M17.657 12a7 7 0 000-10M12 12H8l-4 4V4l4 4h4a4 4 0 014 4 4 4 0 01-4 4z" />
		</svg>

		{{ $klima->noise_level }} DB, SEER: {{ $klima->seer }}, SCOP: {{ $klima->scop }}
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg class="w-5 h-5 text-cyan-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
		<path d="M12 2L15 8H9L12 2zM4 22V12h16v10H4z"/>
		</svg>
		Hűtésben: {{ $klima->cooling_energy_class }} (
			{{ $klima->cooling_capacity }}kW
			@if(isset($klima->cooling_min_temp) || isset($klima->cooling_max_temp))
				@isset($klima->cooling_min_temp)
					,min: {{ $klima->cooling_min_temp }} °C
				@endisset
				@isset($klima->cooling_max_temp)
					,max: {{ $klima->cooling_max_temp }} °C
				@endisset
			@endif
		)
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600 mb-5">
		<svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
		<path d="M10 2L12 8H8L10 2zM4 18V10h12v8H4z"/>
		</svg>
		Fűtésben: {{ $klima->heating_energy_class }} (
		{{ $klima->heating_capacity }}kW
			@if(isset($klima->heating_min_temp) || isset($klima->heating_max_temp))
				@isset($klima->heating_min_temp)
					,min: {{ $klima->heating_min_temp }} °C
				@endisset
				@isset($klima->heating_max_temp)
					,max: {{ $klima->heating_max_temp }} °C
				@endisset
			@endif
		)
	</p>
	<p>
		@isset($klima->wifi_enabled)
			<span class="p-2 bg-blue-500/15 rounded-xl">WIFI</span>
		@endisset
		@isset($klima->h_tarifa)
			<span class="p-2 bg-blue-500/15 rounded-xl">H Tarifa</span>
		@endisset
		@isset($klima->refrigerant_type)
			<span class="p-2 bg-blue-500/15 rounded-xl">{{ $klima->refrigerant_type }}</span>
		@endisset
		@isset($klima->extra_filter)
			<span class="p-2 bg-blue-500/15 rounded-xl">{{ $klima->extra_filter }}</span>
		@endisset
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
		</svg>
		({{ $klima->warranty_years }}év garancia)
	</p>
	<p class="flex items-center mt-2 text-sm">
		@if($klima->in_stock)
			<span class="px-2 py-1 text-sm font-semibold text-green-800 bg-green-100 rounded">Raktáron</span>
		@else
			<span class="px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded">Rendelésre</span>
		@endif
	</p>
	<div class="mt-4 flex items-center justify-between">
		<div class="text-lg font-bold">{{ $klima->price }} Ft</div>
		<form action="{{ route('cart.add', $klima->id) }}" method="POST">
			@csrf
			<button type="submit" class="flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
						  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h13M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
				</svg>
				Kosárba
			</button>
		</form>
	</div>
</div>