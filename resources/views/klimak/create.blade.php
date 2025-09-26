@props(['brands'])
<x-layout>
	<x-heading>Új Klíma Hozzáadása</x-heading>

	<x-forms.form method="POST" action="/klima" enctype="multipart/form-data" class="border rounded-lg p-6 shadow hover:shadow-lg transition">
		<input type="hidden" name="featured" value="0">
		<x-forms.checkbox label="Kiemelt" name="featured" value="1" />
		<x-forms.select label="Márka" name="brand_id">
			@foreach($brands as $brand)
				<option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
					{{ $brand->name }}
				</option>
			@endforeach
		</x-forms.select>

		<x-forms.input label="Név" name="name" autocomplete="off" />

		<x-forms.file label="Kép" name="image" />

		<x-forms.input label="Ár" name="price" type="number" />
		
		<x-forms.textarea label="Leírás" name="description" />
		
		<x-forms.input label="Hűtőteljesítmény (kW)" name="cooling_capacity" type="number" step="0.1" />
		<x-forms.input label="Fűtőteljesítmény (kW)" name="heating_capacity" type="number" step="0.1" />

		<x-forms.input label="SEER" name="seer" type="number" step="0.1" />
		<x-forms.input label="SCOP" name="scop" type="number" step="0.1" />

		<x-forms.input label="Zajszint (dB)" name="noise_level" type="number" />
		<x-forms.input label="Garancia (év)" name="warranty_years" type="number" />

		<x-forms.input label="Hűtési működési tartomány minimum (°C)" name="cooling_min_temp" type="number" />
		<x-forms.input label="Hűtési működési tartomány maximum (°C)" name="cooling_max_temp" type="number" />
		<x-forms.input label="Fűtési működési tartomány minimum (°C)" name="heating_min_temp" type="number" />
		<x-forms.input label="Fűtési működési tartomány maximum (°C)" name="heating_max_temp" type="number" />

		<input type="hidden" name="wifi_enabled" value="0">
		<x-forms.checkbox label="Wifi támogatás" name="wifi_enabled" value="1" />
		<x-forms.input label="Hűtőközeg típusa" name="refrigerant_type" />
		
		<input type="hidden" name="extra_filter" value="0">
		<x-forms.checkbox label="Extra szűrő" name="extra_filter" value="1" />

		<input type="hidden" name="h_tarifa" value="0">
		<x-forms.checkbox label="H tarifa támogatás" name="h_tarifa" value="1" />
		
		<input type="hidden" name="in_stock" value="0">
		<x-forms.checkbox label="Raktáron" name="in_stock" value="1" />

		<x-forms.divider />

		@if ($errors->any())
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
				<ul class="list-disc list-inside">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="flex items-center justify-end mt-2 space-x-4">
			<x-forms.button>Klíma Hozzáadása</x-forms.button>
		</div>
	</x-forms.form>
</x-layout>
