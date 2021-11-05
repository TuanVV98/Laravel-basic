<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
    echo 'Home Page';
});

Route::get('/about', function (){
    echo 'About Page';
});

//->middleware('check')
Route::get('contact', [ContactController::class, 'index'])->name('con');

// Category Route
Route::get('/category/all',[CategoryController::class, 'AllCate'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCate'])->name('store.category');

Route::get('/category/edit/{id}',[CategoryController::class, 'EditCate']);
Route::post('/category/update/{id}',[CategoryController::class, 'UpdateCate']);
Route::get('/softdelete/category/{id}',[CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}',[CategoryController::class, 'Pdelete']);
// End Category Route

// For brand route
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}',[BrandController::class, 'EditBrand']);
Route::post('/brand/update/{id}',[BrandController::class, 'UpdateBrand']);
Route::get('/delete/brand/{id}',[BrandController::class, 'DeleteBrand']);

// End Brand Route

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//    $users = User::all();
    $users = \Illuminate\Support\Facades\DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');
