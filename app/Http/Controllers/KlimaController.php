<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Klima;

class KlimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
	 /*
    public function index()
    {
		
        return view('klimak.index',[
			'brands' => Brand::all(),
			'klimak' => Klima::with('brand')->latest()->paginate(6)
		]);
    }
	*/
	public function index(Request $request)
    {
        $query = Klima::query();

		// Márka szűrés
		if ($request->filled('brand_id')) {
			$query->where('brand_id', $request->brand_id);
		}

		// Név keresés
		if ($request->filled('search')) {
			$query->where('name', 'like', '%' . $request->search . '%');
		}

		// Ár tartomány
		if ($request->filled('price_min')) {
			$query->where('price', '>=', $request->price_min);
		}
		if ($request->filled('price_max')) {
			$query->where('price', '<=', $request->price_max);
		}

		// Hűtőteljesítmény tartomány
		if ($request->filled('cooling_capacity_min')) {
			$query->where('cooling_capacity', '>=', $request->cooling_capacity_min);
		}
		if ($request->filled('cooling_capacity_max')) {
			$query->where('cooling_capacity', '<=', $request->cooling_capacity_max);
		}

		// Fűtőteljesítmény tartomány
		if ($request->filled('heating_capacity_min')) {
			$query->where('heating_capacity', '>=', $request->heating_capacity_min);
		}
		if ($request->filled('heating_capacity_max')) {
			$query->where('heating_capacity', '<=', $request->heating_capacity_max);
		}

		// SEER
		if ($request->filled('seer')) {
			$query->where('seer', $request->seer);
		}

		// SCOP
		if ($request->filled('scop')) {
			$query->where('scop', $request->scop);
		}

		// Zajszint
		if ($request->filled('noise_level')) {
			$query->where('noise_level', $request->noise_level);
		}

		// Garancia
		if ($request->filled('warranty_years')) {
			$query->where('warranty_years', $request->warranty_years);
		}

		// Wifi támogatás
		if ($request->filled('wifi_enabled')) {
			$query->where('wifi_enabled', true);
		}

		// Hűtőközeg típusa
		if ($request->filled('refrigerant_type')) {
			$query->where('refrigerant_type', 'like', '%' . $request->refrigerant_type . '%');
		}

		// Boolean mezők
		if ($request->filled('extra_filter')) {
			$query->where('extra_filter', true);
		}
		if ($request->filled('h_tarifa')) {
			$query->where('h_tarifa', true);
		}
		if ($request->filled('in_stock')) {
			$query->where('in_stock', true);
		}
		if ($request->filled('featured')) {
			$query->where('featured', true);
		}

		$klimak = $query->latest()->paginate(12)->withQueryString();

        return view('klimak.index', [
			'brands' => Brand::all(),
			'klimak' => $klimak
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klimak.create',[
			'brands' => Brand::all()
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
			'brand_id'           => ['required', 'exists:brands,id'],
			'name'               => ['required', 'string', 'max:255'],
			'image'              => 'required|image|mimes:jpg,jpeg,png,webp|max:2048', // max 2 MB, jpg/png stb.
			'price'              => ['required', 'numeric', 'min:0'],

			'description'        => ['nullable', 'string'],

			'cooling_capacity'   => ['nullable', 'numeric', 'min:0'],
			'heating_capacity'   => ['nullable', 'numeric', 'min:0'],

			'seer'               => ['nullable', 'numeric', 'min:0'],
			'scop'               => ['nullable', 'numeric', 'min:0'],

			'noise_level'        => ['nullable', 'integer', 'min:0'],
			'warranty_years'     => ['nullable', 'integer', 'min:0'],

			'cooling_min_temp'   => ['nullable', 'integer'],
			'cooling_max_temp'  => ['nullable', 'integer', 'gte:cooling_min_temp'], 
			
			'heating_min_temp'   => ['nullable', 'integer'],
			'heating_max_temp'  => ['nullable', 'integer', 'gte:heating_min_temp'],

			'wifi_enabled'       => ['boolean'],
			'refrigerant_type'   => ['nullable', 'string', 'max:255'],
			'extra_filter'       => ['boolean'],
			'h_tarifa'           => ['boolean'],
			'featured'           => ['boolean'],
			'in_stock'           => ['boolean'],
		]);
		 // 2. Kiegészíted a validált adatokat a bejelentkezett user ID-jával
		$attributes['user_id'] = auth()->id();
		
		// ha van feltöltött kép
		if ($request->hasFile('image')) {
			// storage/app/public/klimak mappába rakja
			$path = $request->file('image')->store('images/klimak', 'public');

			// elmentjük csak az útvonalat
			$attributes['image'] = $path;
		}

		// 3. Mentés
		Klima::create($attributes);

		return redirect('/')->with('success', 'Klíma sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
