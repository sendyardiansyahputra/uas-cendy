<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'categoryCount' => Category::count(),
            'itemCount' => Item::count(),
            'rentalCount' => Rental::count(),
            'pendingRental' => Rental::where('status','pending')->count(),
        ]);
    }
}
