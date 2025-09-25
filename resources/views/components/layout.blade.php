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
            primary: '#0ea5a4', // türkiz
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
        <a href="" class="hover:text-primary">Szolgáltatások</a>
        <a href="" class="hover:text-primary">Termékek</a>
        <a href="/about" class="hover:text-primary">Rólunk</a>
        <a href="" class="hover:text-primary">Kapcsolat</a>
		
		@guest
			<a href="/login" class="text-white bg-primary px-4 py-2 rounded-lg shadow hover:opacity-95">Belépés</a>
			<a href="/register" class="text-white bg-primary px-4 py-2 rounded-lg shadow hover:opacity-95">Regisztráció</a>
		@endguest
		@auth
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
      <div>© <strong>Klimás</strong> 2025. Minden jog fenntartva.</div>
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
