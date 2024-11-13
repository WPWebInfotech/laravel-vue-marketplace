<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    //
    public function showProducts()
    {
        $products = Product::all();
        return view('buyer.products.index', compact('products'));
    }
}
