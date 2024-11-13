<?php

use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Seller\SellerController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    // Fetch all products from the database
    $query = Product::query();

    // If there is a 'search' query parameter, filter by title
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Paginate the filtered results, showing 3 products per page
    $products = $query->paginate(1)->appends(['search' => $request->search]);

    // Return the 'welcome' view and pass the products
    return view('welcome', compact('products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', SuperAdminController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);
});

Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
    Route::get('products', [SellerController::class, 'showProducts'])->name('products.index');
    Route::get('products/create', [SellerController::class, 'createProductForm'])->name('products.create');
    Route::post('products', [SellerController::class, 'storeProduct'])->name('products.store');
    Route::get('products/{id}/edit', [SellerController::class, 'editProductForm'])->name('products.edit');
    Route::put('products/{id}', [SellerController::class, 'updateProduct'])->name('products.update');
    Route::delete('products/{id}', [SellerController::class, 'deleteProduct'])->name('products.delete');
});

Route::get('products', [BuyerController::class, 'showProducts'])->name('buyer.products.index');