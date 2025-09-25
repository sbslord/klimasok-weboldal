@props(['user'])
<x-layout>
	<x-heading>Kapcsolat</x-heading>
	<!-- CONTACT -->
	<section id="contact" class="max-w-3xl mx-auto px-6 py-12">
		<x-forms.form method="POST" action="/contact">
			@csrf
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
			<x-forms.button>Küldés</x-forms.button>
		</x-forms.form>
	</section>
</x-layout>