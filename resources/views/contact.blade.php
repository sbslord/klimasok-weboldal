@props(['user'])
<x-layout>
	<x-heading>Kapcsolat</x-heading>
	<!-- CONTACT -->
	<section id="contact" class="max-w-3xl mx-auto px-6 py-12">
		<x-forms.form method="POST" action="/contact" class="border rounded-lg p-6 shadow hover:shadow-lg transition">
			@auth
				<x-forms.input label="Név" name="name" placeholder="Név" value="{{ $user->name}}" readonly />
				<x-forms.input label="Telefonszám" name="phone" placeholder="+36301234567" value="{{ $user->phone}}" />
				<x-forms.input label="Email" name="email" placeholder="valaki@gmail.com" value="{{ $user->email}}" readonly />
			@endauth
			@guest
				<x-forms.input label="Név" name="name" placeholder="Név" />
				<x-forms.input label="Telefonszám" name="phone" placeholder="+36301234567" />
				<x-forms.input label="Email" name="email" placeholder="valaki@gmail.com" />
			@endguest
			<x-forms.input label="Üzenet" type="text" rows="4" name="message" placeholder="..." />
			
			<p class="text-gray-600 mt-2 text-sm">Írj nekünk, és visszahívunk a legközelebbi munkanapon.</p>
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
		
			<x-forms.button>Küldés</x-forms.button>
		</x-forms.form>
	</section>
</x-layout>