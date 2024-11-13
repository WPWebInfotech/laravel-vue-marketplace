<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    // Ensure the admin has the 'admin' role
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    // Super Admin Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Display all products
    public function index()
    {
        $products = Product::all(); // You can add pagination if needed
        return view('admin.products.index', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);


        // Store the new product and associate it with the authenticated seller
        Product::create(array_merge($validated, ['user_id' => auth()->id()]));


        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Show a single product (optional)
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Show the form to edit an existing product
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update the existing product
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
