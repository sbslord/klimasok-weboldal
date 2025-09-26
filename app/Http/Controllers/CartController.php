<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Klima;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $klimaId)
    {
        $klima = Klima::findOrFail($klimaId);

        $cart = auth()->user()->cart ?? Cart::create(['user_id' => auth()->id()]);

        $item = $cart->items()->where('klima_id', $klima->id)->first();
        if($item) {
            $item->quantity++;
            $item->save();
        } else {
            $cart->items()->create([
                'klima_id' => $klima->id,
                'quantity' => 1,
                'price' => $klima->price,
            ]);
        }

        return redirect()->back()->with('success', 'Termék hozzáadva a kosárhoz!');
    }

    public function update(Request $request, $itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->route('cart.index');
    }

    public function remove($itemId)
    {
        CartItem::findOrFail($itemId)->delete();
        return redirect()->route('cart.index');
    }
}