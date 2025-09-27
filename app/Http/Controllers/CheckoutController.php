<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        // Lekérjük az aktuális felhasználó kosarát
        $cart = Cart::with('items.klima')->where('user_id', auth()->user()->id)->first();

        return view('checkout.index', compact('cart'));
    }
	public function process(Request $request)
	{
		// Ellenőrizheted az adatokat
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email',
			'address' => 'required|string',
			'payment_method' => 'required|string'
		]);

		// Fizetés logika ide kerül (pl. Stripe API)
		// ...

		// Kosár lekérése
		$cart = auth()->user()->cart;

		if ($cart) {
			// Kosár elemek törlése
			//$cart->items()->delete();

			// Kosár státusz frissítése vagy teljes törlése
			//$cart->delete(); // vagy $cart->update(['status' => 'paid']);
			$cart->update(['status' => 'paid']);
			//új üres kosár
			$newCart = Cart::create([
				'user_id' => auth()->id(),
				'status' => 'open'
			]);
			// Reláció újratöltése
			auth()->user()->load('cart');
		}

		return redirect()->route('checkout.success');
	}
	public function success()
    {
        return view('checkout.success');
    }
}