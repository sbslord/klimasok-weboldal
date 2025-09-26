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
    public function index()
    {
        return view('klimak.index',[
			'brands' => Brand::all(),
			'klimak' => Klima::with('brand')->latest()->paginate(6)
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
			'extra_filter'       => ['nullable', 'string', 'max:255'],
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
