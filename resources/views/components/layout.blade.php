@php
    $cart = auth()->check() ? auth()->user()->carts()->latest()->first() : null;
@endphp

<!doctype html>
<html lang="hu">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <title>Klimások.eu</title>
  <!-- Tailwind CDN (fejlesztéshez) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Egy gyors konfiguráció, ha szeretnél egyedi színeket -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#099DD1', // türkiz
            accent: '#0f172a',   // sötét
          }
        }
      }
    }
  </script>
</head>
<body class="antialiased text-gray-800 bg-gradient-to-b from-white to-slate-50 flex flex-col min-h-screen">

  <!-- NAV -->
  <header class="bg-white/80 backdrop-blur sticky top-0 z-30 shadow-sm border-b border-b-black/10">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
      <a href="/" class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-lg bg-primary/20 flex items-center justify-center text-primary font-bold">K</div>
        <span class="font-semibold">Klimások.eu</span>
      </a>

      <nav class="hidden md:flex gap-6 items-center text-sm">
        <a href="/szolgaltatasok" class="hover:text-primary">Szolgáltatások</a>
        <a href="/klima" class="hover:text-primary">Termékek</a>
        <a href="/rolunk" class="hover:text-primary">Rólunk</a>
        <a href="/kapcsolat" class="hover:text-primary">Kapcsolat</a>
		
		@guest
			<a href="/login" class="text-white bg-primary px-4 py-2 rounded-lg shadow hover:opacity-95">Belépés</a>
			<a href="/register" class="text-white bg-primary px-4 py-2 rounded-lg shadow hover:opacity-95">Regisztráció</a>
		@endguest
		@auth
			<a href="{{ route('cart.index') }}" class="relative flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2 6h14l-2-6M7 13h10m-6 8a2 2 0 100-4 2 2 0 000 4zm6 0a2 2 0 100-4 2 2 0 000 4z" />
				</svg>
				<span>Kosár</span>

				@if($cart && $cart->items->count() > 0)
					<span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full px-2 text-xs font-bold">
						{{ $cart->items->sum('quantity') }}
					</span>
				@endif
			</a>
			@admin
				<a href="/admin" class="text-white bg-red-500 px-4 py-2 rounded-lg shadow hover:opacity-95">Admin</a>
			@endadmin
			<form method="POST" action="/logout">
				@csrf
				<button type="submit" class="text-white bg-primary px-4 py-2 rounded-lg shadow hover:opacity-95">Kilépés</button>
			</form>
		@endauth
      </nav>

      <button class="md:hidden p-2 rounded-md border" aria-label="menu">☰</button>
    </div>
  </header>
  
  <main class="flex-1">
	{{ $slot }}
  </main>

  <!-- FOOTER -->
  <footer class="mt-12 border-t">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between text-sm text-gray-600">
      <div>© <strong>Klimások.eu</strong> 2025. Minden jog fenntartva.</div>
      <div class="flex gap-4 mt-4 md:mt-0">
        <a href="#">Adatvédelem</a>
        <a href="#">Impresszum</a>
      </div>
    </div>
  </footer>

  <!-- FINISH -->
  <!-- Megjegyzés: fejlesztéshez a Tailwind CDN jó gyors start, de éles projektben ajánlott a Tailwind telepítése és build-lépések beállítása (postcss, purge stb.). -->

</body>
</html>
