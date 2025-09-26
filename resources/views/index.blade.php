<x-layout>
	<!-- HERO -->
	<section class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-10">
		<div class="flex-1">
		<h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Megbízható klíma megoldások otthonodba</h1>
		<p class="mt-4 text-gray-600">Telepítés, karbantartás és energiahatékony rendszerek — személyre szabott ajánlatok és garancia. Kérj ingyenes helyszíni felmérést!</p>

		<div class="mt-6 flex gap-4">
		<a href="/kapcsolat" class="inline-block bg-primary text-white px-5 py-3 rounded-lg shadow">Felmérés kérése</a>
		<a href="/klima" class="inline-block border px-5 py-3 rounded-lg">Termékek</a>
		</div>

		<div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3">
		<div class="bg-white p-4 rounded-lg shadow text-center">
		<div class="text-sm text-gray-500">Szakemberek</div>
		<div class="text-2xl font-bold">1</div>
		</div>
		<div class="bg-white p-4 rounded-lg shadow text-center">
		<div class="text-sm text-gray-500">Év tapasztalat</div>
		<div class="text-2xl font-bold">8</div>
		</div>
		<div class="bg-white p-4 rounded-lg shadow text-center">
		<div class="text-sm text-gray-500">Garancia</div>
		<div class="text-2xl font-bold">5 év</div>
		</div>
		</div>
		</div>

		<div class="flex-1 flex justify-center items-center">
		<!-- kép helyőrző -->
		<div class="w-80 rounded-xl overflow-hidden shadow-lg border rounded-lg p-6 shadow hover:shadow-lg transition">
		<img src="{{ asset('images/szaki.png') }}" alt="klíma" class="w-80 object-contain rounded-xl shadow-lg">
		</div>
		</div>
	</section>

	<!-- FEATURES -->
	<section id="features" class="max-w-6xl mx-auto px-6 py-12">
		<h2 class="text-2xl font-bold">Mit kínálunk?</h2>
		<p class="text-gray-600 mt-2">Komplex szolgáltatás a kiválasztástól a szervizig.</p>

		<div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
		<div class="bg-white p-6 rounded-lg shadow">
		<h3 class="font-semibold">Ingyenes helyszíni felmérés</h3>
		<p class="mt-2 text-sm text-gray-600">Szakértőink felmérik az igényeidet és javaslatot tesznek.</p>
		</div>
		<div class="bg-white p-6 rounded-lg shadow">
		<h3 class="font-semibold">Energiahatékony rendszerek</h3>
		<p class="mt-2 text-sm text-gray-600">Modern inverteres készülékek, alacsony üzemeltetési költségek.</p>
		</div>
		<div class="bg-white p-6 rounded-lg shadow">
		<h3 class="font-semibold">Szerviz és garancia</h3>
		<p class="mt-2 text-sm text-gray-600">Gyors javítás, alkatrészellátás, 2 év garancia.</p>
		</div>
		</div>
	</section>
	
	<!-- PRODUCTS / CARDS -->
	<section id="products" class="max-w-6xl mx-auto px-6 py-12">
		<h2 class="text-2xl font-bold">Népszerű klíma modellek</h2>
		<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
			@foreach($klimak as $klima)
				<x-klima-card :klima="$klima" />
			@endforeach		
		</div>
	</section>

	<!-- ABOUT / CTA -->
	<section id="about" class="max-w-6xl mx-auto px-6 py-12 bg-gradient-to-r from-white to-slate-50 rounded-lg">
		<div class="md:flex md:items-center md:gap-8">
		<div class="flex-1">
		<h2 class="text-2xl font-bold">Miért minket válassz?</h2>
		<p class="mt-2 text-gray-600">Szakértelem, gyors kivitelezés és korrekt árak. Minden telepítésre garanciát vállalunk.</p>
		</div>
		<div class="mt-6 md:mt-0">
		<a href="/kapcsolat" class="inline-block bg-accent text-white px-5 py-3 rounded-lg">Ingyenes árajánlat</a>
		</div>
		</div>
	</section>
</x-layout>
