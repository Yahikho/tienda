<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class searchController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->name;

        $products = Product::where('name', 'like', "%" . $name . "%")
                ->where('status',2)
                ->paginate(8);

        return view('search', compact('products'));
    }
}
