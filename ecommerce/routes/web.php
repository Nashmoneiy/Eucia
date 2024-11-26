<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;

//Route::get('/', function () {
 //   return view('welcome');
//});

//frontend
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/new-arrivals', 'arrival');
    Route::get('/', 'index');
    Route::get('/collection',  'categories');
    Route::get('/collection/{category_slug}', 'products');
    Route::get('/collection/{category_slug}/{product_slug}', 'productView');
    Route::get("/search", 'searchProduct');
});


//wishlist and cart Auth
Route::group(['middleware'=> ['auth']], function () {
    
    Route::get('/wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart']);
    Route::get('/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
   
    Route::post('/proceed-to-pay', [App\Http\Controllers\Frontend\CheckoutController::class, 'paystackcheck']);
    Route::get('/place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder']);
});

//wishlist and cart controller
Route::post('add-to-cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
Route::post('add-to-wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'store']);
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'destroy']);
Route::post('delete-wishlist-item', [App\Http\Controllers\Frontend\WishlistController::class, 'destroy']);
Route::post('update-cart', [App\Http\Controllers\Frontend\CartController::class, 'update']);
Route::get('/load-cart-data', [App\Http\Controllers\Frontend\CartController::class, 'cartCount']);
Route::get('/load-wishlist-data', [App\Http\Controllers\Frontend\WishlistController::class, 'wishlistCount']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware(isAdmin::class);

Route::prefix('admin')->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(isAdmin::class);
    //catgory   
    Route::controller(App\Http\Controllers\Admin\categoryController::class)->group(function () {
        Route::get('/category', 'index')->middleware(isAdmin::class);
        Route::post('/category', 'store')->middleware(isAdmin::class);
        Route::get('/view', 'index2')->middleware(isAdmin::class);
        Route::get('/category/{category}/edit', 'edit')->middleware(isAdmin::class);
        Route::put('/category/{category}', 'update')->middleware(isAdmin::class);
        Route::get('/delete-category/{category}', 'destroy')->middleware(isAdmin::class);
        
    });

    
    //brand
    Route::controller(App\Http\Controllers\Admin\brandController::class)->group(function () {
        Route::get('/brand', 'index')->middleware(isAdmin::class);
        Route::post('/brand', 'store')->middleware(isAdmin::class);
        Route::get('/brand/{brand}', 'edit')->middleware(isAdmin::class);
        Route::put('/brand', 'update')->middleware(isAdmin::class);
        Route::delete('/brand', 'destroy')->middleware(isAdmin::class);
        
    });

//product
    Route::controller(App\Http\Controllers\Admin\productController::class)->group(function () {
        Route::get('/product', 'index')->middleware(isAdmin::class);
        Route::get('/product/create', 'create')->middleware(isAdmin::class);
        Route::get('/product/index', 'index2')->middleware(isAdmin::class);
        Route::post('/product', 'store')->middleware(isAdmin::class);
        Route::get('/product/{product}/edit', 'edit')->middleware(isAdmin::class);
        Route::put('/product/{product}/', 'update')->middleware(isAdmin::class);
        Route::get('/product/{product_image_id}/delete', 'destroyImage')->middleware(isAdmin::class);
        Route::delete('/product', 'destroy')->middleware(isAdmin::class);
    });


//sliders
Route::controller(App\Http\Controllers\Admin\sliderController::class)->group(function () {
    Route::get('/sliders', 'index')->middleware(isAdmin::class);
    Route::get('/sliders/create', 'create')->middleware(isAdmin::class);
    Route::post('/sliders/create', 'store')->middleware(isAdmin::class);
    Route::get('/sliders/{slider}/edit', 'edit')->middleware(isAdmin::class);
    Route::put('/sliders/{slider}', 'update')->middleware(isAdmin::class);
    Route::delete('/sliders', 'destroy')->middleware(isAdmin::class);
  
   
});
    
    
});

 