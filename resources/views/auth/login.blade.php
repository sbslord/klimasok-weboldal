<x-layout>
	<x-heading>Belépés</x-heading>
	
	<!-- Session Status -->
	<x-auth-session-status class="mb-4" :status="session('status')" />
	
	<x-forms.form method="POST" action="/login">
		@csrf
		<x-forms.input label="Email" name="email" autocomplete="username" />
		<x-forms.input label="Jelszó" name="password" type="password" />
		
		<!-- Remember Me -->
		<div class="block mt-4">
			<label for="remember_me" class="inline-flex items-center">
				<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
				<span class="ms-2 text-sm text-gray-600">Emlékezz</span>
			</label>
		</div>
		@if ($errors->any())
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
				<ul class="list-disc list-inside">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<div class="flex items-center justify-end mt-4 space-x-4">
			@if (Route::has('password.request'))
				<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
					Elfelejtett jelszó?
				</a>
			@endif
			<x-forms.button>Belépés</x-forms.button>
		</div>
	</x-forms.form>
</x-layout>