<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    // Ensure that only sellers with the 'seller' role can access these routes
    public function __construct()
    {
        $this->middleware('role:seller');
    }

    // Display the Seller Dashboard
    public function dashboard()
    {
        return view('seller.dashboard');
    }

    // Show the form to create a new product
    public function createProductForm()
    {
        return view('seller.products.create');
    }

    // Store a new product created by the seller
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Store the new product and associate it with the authenticated seller
        Product::create(array_merge($validated, ['user_id' => auth()->id()]));

        // Redirect to the list of products for the seller
        return redirect()->route('seller.products.index')->with('success', 'Product created successfully.');
    }

    // Display all products created by the seller
    public function showProducts()
    {
        $products = Product::where('user_id', auth()->id())->get();
        return view('seller.products.index', compact('products'));
    }

    // Show the form to edit a product (if needed)
    public function editProductForm($id)
    {
        $product = Product::findOrFail($id);
        return view('seller.products.edit', compact('product'));
    }

    // Update a product (if needed)
    public function updateProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        // Redirect back to the product list
        return redirect()->route('seller.products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product (if needed)
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Product deleted successfully.');
    }
}
