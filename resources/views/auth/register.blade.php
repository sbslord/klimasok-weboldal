<x-layout>
	<x-heading>Regisztráció</x-heading>

	<x-forms.form method="POST" action="/register" class="border rounded-lg p-6 shadow hover:shadow-lg transition">
		<x-forms.input label="Név" name="name" autocomplete="name" />
		<x-forms.input label="Email" name="email" autocomplete="username" />
		<x-forms.input label="Telefonszám" name="phone" placeholder="+36301234567" />
		<x-forms.input label="Jelszó" name="password" type="password" />
		<x-forms.input label="Jelszó Ismétlés" name="password_confirmation" type="password" />
		
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
			<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
				{{ __('Már regisztrálva vagy?') }}
			</a>

			<x-forms.button>Regisztráció</x-forms.button>
		</div>
	</x-forms.form>
</x-layout>
