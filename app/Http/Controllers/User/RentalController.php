<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\Item;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'qty' => 'required|integer|min:1',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($item->stock < $request->qty) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        Rental::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'qty' => $request->qty,
            'total_price' => $item->price * $request->qty,
            'status' => 'pending',
        ]);

        $item->decrement('stock', $request->qty);

        return redirect('/user/rentals');
    }
}
