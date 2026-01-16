<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user','item'])
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.rentals.index', compact('rentals'));
    }

    public function approve($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->update(['status' => 'approved']);

        return back();
    }

    public function reject($id)
    {
        $rental = Rental::findOrFail($id);

        // balikin stok
        $rental->item->increment('stock', $rental->qty);

        $rental->update(['status' => 'rejected']);

        return back();
    }
}
