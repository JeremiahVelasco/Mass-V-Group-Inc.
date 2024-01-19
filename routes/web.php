<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;

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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/feature', function () {
    return view('admin.featuredproducts');
});

Route::get('/admin/products', function () {
    return view('admin.products');
});

Route::get('/admin/events', function () {
    return view('admin.events');
});

//USER ROUTES
Route::get('/', [AdminController::class, 'home'])->name('home');

//ADMIN REGISTER LOGIN AND LOGOUT
Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/admin/register', function () {
    return view('admin.register');
});

Route::get('/logout', [AdminController::class, 'logoutAdmin']);


//ADMIN GET
Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');
Route::get('/admin/products', [AdminController::class, 'adminproducts'])->name('adminproducts');
Route::get('/admin/lubricants', [AdminController::class, 'adminlubricants'])->name('adminlubricants');
Route::get('/admin/featured', [AdminController::class, 'adminfeaturedproducts'])->name('adminfeaturedproducts');
Route::get('/getBatteryDetails/{id}', [AdminController::class, 'getDetails'])->name('getDetails');
Route::get('/getSavedProducts', [AdminController::class, 'getSavedData']);
Route::get('/username-exists', [AdminController::class, 'usernameExists']);


//ADMIN POST
Route::post('/addProduct', [AdminController::class, 'addProduct']);
Route::post('/deleteProduct', [AdminController::class, 'deleteProduct']);
Route::post('/saveBattery/{id}/{slot}', [AdminController::class, 'saveBattery']);
Route::post('/registeradmin', [AdminController::class, 'registerAdmin']);
Route::post('/loginadmin', [AdminController::class, 'loginAdmin']);

//SUPERADMIN ROUTES
Route::get('/master/dashboard', [MasterController::class, 'masterdashboard']);
Route::get('/master/user', [MasterController::class, 'masteruser']);
Route::get('/master/logout', [MasterController::class, 'masterlogout']);
Route::get('/master/pending', [MasterController::class, 'masterpending']);

//SUPERADMIN POST
Route::post('/user-accept', [MasterController::class, 'acceptUser']);
Route::post('/user-reject', [MasterController::class, 'rejectUser']);
Route::post('/delete-user', [MasterController::class, 'rejectUser']);
