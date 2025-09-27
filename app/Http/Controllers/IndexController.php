<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klima;

class IndexController extends Controller
{
    public function index(){
		return view('index', [
			'klimak' => Klima::with('brand:id,name')
				->where('featured', true)
				->latest()
				->paginate(6)
		]);
	}
}
