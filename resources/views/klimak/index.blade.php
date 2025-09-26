<x-layout>	
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