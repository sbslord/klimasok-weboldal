@props(['klima'])

<!-- Klima Card -->
<div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-2xl hover:border-blue-300 group transition-all duration-300 relative">

    <!-- Energiaosztály szalagok -->
    <div class="absolute top-4 left-0 flex flex-col gap-2 z-10">
        <!-- Hűtés -->
        <div class="relative flex items-center gap-1 pl-3 pr-6 py-1 text-white text-xs font-bold shadow rounded-r bg-green-600">
            <!-- Snowflake ikon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-cyan-100">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 3v18m0-18L9 6m3-3l3 3M12 21l-3-3m3 3l3-3M3 12h18m-18 0l3-3m-3 3l3 3m15-3l-3-3m3 3l-3 3"/>
            </svg>
            Hűtés: {{ $klima->cooling_energy_class }}
        </div>
        <!-- Fűtés -->
        <div class="relative flex items-center gap-1 pl-3 pr-6 py-1 text-white text-xs font-bold shadow rounded-r bg-red-600">
            <!-- Flame ikon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-orange-100">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 3c2.25 2.25 3.75 4.75 3.75 7.5a6.75 6.75 0 01-13.5 0C2.25 7.75 3.75 5.25 6 3c0 2.25 3 3.75 6 3.75S18 5.25 18 3c2.25 2.25 3.75 4.75 3.75 7.5a9.75 9.75 0 11-19.5 0C2.25 7.75 3.75 5.25 6 3z"/>
            </svg>
            Fűtés: {{ $klima->heating_energy_class }}
        </div>
    </div>

    <!-- Kép -->
    <div class="relative">
        <img src="{{ $klima->image_url }}" alt="klíma" class="mb-5 w-full h-60 object-contain rounded-xl">
        
        <!-- Készlet -->
        @if($klima->in_stock)
            <span class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow">
                Raktáron
            </span>
        @else
            <span class="absolute top-2 right-2 bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow">
                Rendelésre
            </span>
        @endif
    </div>

    <!-- Név -->
    <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
        {{ $klima->name }}
    </h3>

    <!-- Zaj, SEER, SCOP -->
    <p class="flex items-center mt-2 text-sm text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M14.828 14.828a4 4 0 000-5.656M17.657 12a7 7 0 000-10M12 12H8l-4 4V4l4 4h4a4 4 0 014 4 4 4 0 01-4 4z"/>
        </svg>
        {{ $klima->noise_level }} dB | SEER: {{ $klima->seer }} | SCOP: {{ $klima->scop }}
    </p>

    <!-- Teljesítmények -->
    <div class="mt-3 text-sm text-gray-600 space-y-1">
        <p class="flex items-center">
            <svg class="w-5 h-5 text-cyan-500 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L15 8H9L12 2zM4 22V12h16v10H4z"/></svg>
            Hűtés: {{ $klima->cooling_capacity }} kW
            @if($klima->cooling_min_temp || $klima->cooling_max_temp)
                <span class="ml-1 text-xs text-gray-500">
                    ({{ $klima->cooling_min_temp ?? '?' }}°C – {{ $klima->cooling_max_temp ?? '?' }}°C)
                </span>
            @endif
        </p>
        <p class="flex items-center">
            <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2L12 8H8L10 2zM4 18V10h12v8H4z"/></svg>
            Fűtés: {{ $klima->heating_capacity }} kW
            @if($klima->heating_min_temp || $klima->heating_max_temp)
                <span class="ml-1 text-xs text-gray-500">
                    ({{ $klima->heating_min_temp ?? '?' }}°C – {{ $klima->heating_max_temp ?? '?' }}°C)
                </span>
            @endif
        </p>
    </div>

    <!-- Extrák -->
    <div class="mt-3 flex flex-wrap gap-2 text-xs">
        @if($klima->wifi_enabled)
            <span class="flex items-center gap-1 px-2 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 18a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0-10a9 9 0 016.364 2.636l-1.414 1.414A7 7 0 005 12a7 7 0 0011.95 4.95l1.414 1.414A9 9 0 1112 8z"/>
                </svg>
                WiFi
            </span>
        @endif
        @if($klima->h_tarifa)
            <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded-full font-medium">H tarifa</span>
        @endif
        @if($klima->refrigerant_type)
            <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full font-medium">{{ $klima->refrigerant_type }}</span>
        @endif
        @if($klima->extra_filter)
            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full font-medium">Extra szűrő</span>
        @endif
    </div>

    <!-- Garancia -->
    <p class="mt-3 text-sm text-gray-600 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ $klima->warranty_years }} év garancia
    </p>

    <!-- Ár + Kosár + Beszerelés -->
	<div class="mt-6 flex flex-col items-center gap-3">
		<!-- Ár -->
		<div class="text-2xl font-extrabold text-blue-400 flex items-baseline gap-1">
			<span>{{ number_format($klima->price, 0, ',', ' ') }}</span>
			<span class="text-lg text-red-500/35">Ft</span>
		</div>

		<!-- Gombok -->
		<div class="flex gap-4">
			<!-- Kosárba gomb -->
			<form action="{{ route('cart.add', $klima->id) }}" method="POST">
				@csrf
				<button type="submit" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow text-sm">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h13M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
					</svg>
					Kosárba
				</button>
			</form>

			<!-- Kosárba beszereléssel gomb -->
			<form action="{{ route('cart.add_with_install', $klima->id) }}" method="POST">
				@csrf
				<button type="submit" class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow text-sm">
					+ Beszereléssel
				</button>
			</form>
		</div>
	</div>
</div>
