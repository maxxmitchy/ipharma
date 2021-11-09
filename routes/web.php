<?php

use App\Models\User;
use App\Services\Newsletter;
use App\Http\Livewire\Admin\Brand;
use App\Http\Livewire\Admin\Order;
use App\Http\Livewire\Admin\Banner;
use App\Http\Livewire\BrandDisplay;
use App\Http\Livewire\Display\Cart;
use App\Http\Livewire\Admin\Product;
use App\Http\Livewire\Admin\Section;
use App\Http\Livewire\Admin\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryDisplay;
use App\Http\Livewire\Display\Checkout;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Livewire\Display\Product as Productdisplay;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/shop', function () {
    return view('welcome');
})->name('shop');

Route::get('/pharmacy', function () {
    return view('welcome');
})->name('pharmacy');

Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->middleware(['auth'])->name('checkout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('category')->name('category.')->group(function() {
    Route::get('/', CategoryDisplay::class)->name('allcategory');
    Route::get('/{name}', CategoryDisplay::class)->name('category');
});

Route::prefix('brands')->name('brands.')->group(function() {
    Route::get('/{name}', BrandDisplay::class)->name('brand');
});

Route::middleware(['auth'])->prefix('adminarea')->name('adminarea.')->group(function() {
    Route::get('/products', Product::class)->name('products');
    Route::get('/categories', Category::class)->name('categories');
    Route::get('/sections', Section::class)->name('sections');
    Route::get('/orders', Order::class)->name('orders');
    Route::get('/brands', Brand::class)->name('brands');
    Route::get('/banners', Banner::class)->name('banners');
});

Route::prefix('products')->name('products.')->group(function() {
    Route::get('/{category}/{name}/{id}', Productdisplay::class)->name('product');
});

Route::post('/newsletter', NewsletterController::class);

Route::get('/auto-login', function () {
    // only available in local env
    abort_unless(app()->environment('local'), 403);

    // Login with admin user
    auth()->login(User::first());

    //Redirect to dashboard

    return redirect()->to('/dashboard');

})->name('dev-login');

require __DIR__.'/auth.php';
