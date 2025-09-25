<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact', [
			'user' => auth()->user()
		]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
			'phone' => 'nullable|string|max:20|regex:/^\+?[0-9\s\-\(\)]+$/',
			'message' => 'required|string|min:10|max:2000'
		]);
		// ha be van jelentkezve, akkor user_id kitöltése
		if (auth()->check()) {
			$attributes['user_id'] = auth()->id();
		}
		$contact = Contact::create($attributes);
		
		return redirect('/');
    }
}
