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
<body class="antialiased text-gray-800 bg-gradient-to-b from-white to-slate-50">

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
        <a href="" class="hover:text-primary">Rólunk</a>
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

  <!-- HERO -->
  <section class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-10">
    <div class="flex-1">
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Megbízható klíma megoldások otthonodba</h1>
      <p class="mt-4 text-gray-600">Telepítés, karbantartás és energiahatékony rendszerek — személyre szabott ajánlatok és garancia. Kérj ingyenes helyszíni felmérést!</p>

      <div class="mt-6 flex gap-4">
        <a href="#contact" class="inline-block bg-primary text-white px-5 py-3 rounded-lg shadow">Felmérés kérése</a>
        <a href="#products" class="inline-block border px-5 py-3 rounded-lg">Termékek</a>
      </div>

      <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <div class="text-sm text-gray-500">Szakemberek</div>
          <div class="text-2xl font-bold">+10</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <div class="text-sm text-gray-500">Év tapasztalat</div>
          <div class="text-2xl font-bold">8</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <div class="text-sm text-gray-500">Garancia</div>
          <div class="text-2xl font-bold">2 év</div>
        </div>
      </div>
    </div>

    <div class="flex-1 flex justify-center items-center">
      <!-- kép helyőrző -->
      <div class="w-80 rounded-xl overflow-hidden shadow-lg">
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

      <!-- Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="font-semibold">Model A - Inverter</h3>
        <p class="mt-2 text-sm text-gray-600">Hatékony, csendes működés, Wi-Fi kapcsolat.</p>
        <div class="mt-4 flex items-center justify-between">
          <div class="text-lg font-bold">299.900 Ft</div>
          <a class="px-3 py-2 bg-primary text-white rounded" href="#contact">Ajánlat</a>
        </div>
      </div>

      <!-- Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="font-semibold">Model B - Energiatakarékos</h3>
        <p class="mt-2 text-sm text-gray-600">Alacsony fogyasztás, nagy teljesítmény.</p>
        <div class="mt-4 flex items-center justify-between">
          <div class="text-lg font-bold">249.900 Ft</div>
          <a class="px-3 py-2 bg-primary text-white rounded" href="#contact">Ajánlat</a>
        </div>
      </div>

      <!-- Card -->
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="font-semibold">Model C - Csendes</h3>
        <p class="mt-2 text-sm text-gray-600">Kifejezetten lakóterekhez tervezve.</p>
        <div class="mt-4 flex items-center justify-between">
          <div class="text-lg font-bold">219.900 Ft</div>
          <a class="px-3 py-2 bg-primary text-white rounded" href="#contact">Ajánlat</a>
        </div>
      </div>

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
        <a href="#contact" class="inline-block bg-accent text-white px-5 py-3 rounded-lg">Ingyenes árajánlat</a>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="max-w-3xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold">Kapcsolat</h2>
    <p class="text-gray-600 mt-2">Írj nekünk, és visszahívunk a legközelebbi munkanapon.</p>

    <form class="mt-6 grid grid-cols-1 gap-4">
      <input class="p-3 border rounded" placeholder="Név" />
      <input class="p-3 border rounded" placeholder="Telefonszám" />
      <input class="p-3 border rounded" placeholder="E-mail" />
      <textarea class="p-3 border rounded" rows="4" placeholder="Üzenet"></textarea>
      <div class="flex gap-3">
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Küldés</button>
        <button type="button" class="border px-4 py-2 rounded">Hívás kérése</button>
      </div>
    </form>
  </section>

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
