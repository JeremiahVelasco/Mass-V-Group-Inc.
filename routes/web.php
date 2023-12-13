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

Route::get('/products', function () {
    return view('main.products');
});

Route::get('/lubricants', function () {
    return view('main.lubricants');
});

Route::get('/contact', function () {
    return view('main.contact');
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

//USER ROUTES
Route::get('/', [AdminController::class, 'home'])->name('home');

//ADMIN REGISTER LOGIN AND LOGOUT
Route::get('/adminlogin', function () {
    return view('admin.login');
});

Route::get('/adminregister', function () {
    return view('admin.register');
});

Route::get('/logout',[AdminController::class,'logoutAdmin']);


//ADMIN GET
Route::get('/admindashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');
Route::get('/adminproducts', [AdminController::class, 'adminproducts'])->name('adminproducts');
//Route::get('/adminlubricants', [AdminController::class, 'adminlubricants'])->name('adminlubricants');
Route::get('/adminfeaturedproducts', [AdminController::class, 'adminfeaturedproducts'])->name('adminfeaturedproducts');
Route::get('/getBatteryDetails/{id}', [AdminController::class, 'getDetails'])->name('getDetails');
Route::get('/getSavedProducts', [AdminController::class, 'getSavedData']);
Route::get('/username-exists',[AdminController::class,'usernameExists']);


//ADMIN POST
Route::post('/addProduct', [AdminController::class, 'addProduct']);
Route::post('/deleteProduct', [AdminController::class, 'deleteProduct']);
Route::post('/saveBattery/{id}/{slot}', [AdminController::class, 'saveBattery']);
Route::post('/registeradmin',[AdminController::class,'registerAdmin']);
Route::post('/loginadmin',[AdminController::class,'loginAdmin']);
