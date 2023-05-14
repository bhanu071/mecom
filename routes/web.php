<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;

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
    return view('frontend.index');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/logout', [UserController::class, 'UserDestroy'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});

//Vendor Dashboard
Route::middleware(['auth', 'role:vendor'])->group(function(){
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');


});

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Venfor Login
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');


Route::middleware(['auth', 'role:admin'])->group(function(){
 //Brand All Routes
Route::controller(BrandController::class)->group(function(){
   
    Route::get('/all/brand', [BrandController::class, 'AllBrand'])->name('all.brand');
    Route::get('/add/brand', [BrandController::class, 'AddBrand'])->name('add.brand');
    Route::post('/store/brand', [BrandController::class, 'StoreBrand'])->name('store.brand');
    Route::get('/edit/brand/{id}', [BrandController::class, 'EditBrand'])->name('edit.brand');
    Route::post('/store/brand', [BrandController::class, 'UpdateBrand'])->name('update.brand');
    Route::get('/delete/brand/{id}', [BrandController::class, 'DeleteBrand'])->name('delete.brand');


});

 //Category All Routes
Route::controller(CategoryController::class)->group(function(){
   
    Route::get('/all/category', [CategoryController::class, 'AllCategory'])->name('all.category');
    Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::post('/strore/category', [CategoryController::class, 'StoreCategory'])->name('strore.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update/category', [CategoryController::class, 'UpdateCategory'])->name('update.category');

});

}); //End Middleware