<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('main.index');
});

Route::get('/products', function () {
    return view('main.products');
});

Route::get('/admindashboard', function () {
    return view('admin.dashboard');
});

Route::get('/adminfeaturedproducts', function () {
    return view('admin.featuredproducts');
});

Route::get('/adminproducts', function () {
    return view('admin.products');
});

Route::get('/adminpromos', function () {
    return view('admin.promos');
});


//ADMIN GET
Route::get('/adminproducts', [AdminController::class, 'adminproducts'])->name('adminproducts');
Route::get('/adminfeaturedproducts', [AdminController::class, 'adminfeaturedproducts'])->name('adminfeaturedproducts');

//ADMIN POST
Route::post('/addProduct', [AdminController::class, 'addProduct']);
Route::post('/deleteProduct', [AdminController::class, 'deleteProduct']);
