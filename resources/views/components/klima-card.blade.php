@props(['klima'])
@php
	$h_tarifa = "";
	if($klima->h_tarifa){
		$h_tarifa = ", H tarifa";
	}
@endphp
<!-- Card -->
<div class="bg-white rounded-lg shadow p-6 border border-transparent hover:border-blue-400/50 group transition-colors duration-300">
	<img src="{{ $klima->getImageUrlAttribute() }}" alt="klíma" class="mb-5 w-80 h-60 object-contain rounded-xl shadow-lg">
	<h3 class="font-semibold">{{ $klima->name }}</h3>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 000-5.656M17.657 12a7 7 0 000-10M12 12H8l-4 4V4l4 4h4a4 4 0 014 4 4 4 0 01-4 4z" />
		</svg>

		{{ $klima->noise_level }} DB
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg class="w-5 h-5 text-cyan-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
		<path d="M12 2L15 8H9L12 2zM4 22V12h16v10H4z"/>
		</svg>
		Hűtésben: {{ $klima->cooling_energy_class }} ({{ $klima->cooling_capacity }}kW)
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
		<path d="M10 2L12 8H8L10 2zM4 18V10h12v8H4z"/>
		</svg>
		Fűtésben: {{ $klima->heating_energy_class }} ({{ $klima->heating_capacity }}kW, {{ $klima->heating_min_temp }} C fok {{ $h_tarifa }})
	</p>
	<p>
		@isset($klima->wifi_enabled)
			WIFI
		@endisset
		@isset($klima->refrigerant_type)
			, {{ $klima->refrigerant_type }}
		@endisset
		@isset($klima->extra_filter)
			, {{ $klima->extra_filter }}
		@endisset
	</p>
	<p class="flex items-center mt-2 text-sm text-gray-600">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
		</svg>
		({{ $klima->warranty_years }}év garancia)
	</p>
	<div class="mt-4 flex items-center justify-between">
		<div class="text-lg font-bold">{{ $klima->price }} Ft</div>
		<a class="px-3 py-2 bg-primary text-white rounded" href="/kapcsolat">Ajánlat</a>
	</div>
</div>