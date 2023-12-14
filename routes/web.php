<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    return view('welcome');
});

//Admin Routes
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        //Slug Route
        Route::get('/getSlug', function (Request $request) {
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }

            return response()->json([
                'status' => true,
                'slug' => $slug
            ]);
        })->name('getSlug');

        //Create Temp Images
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('tempImages.create');

        //Category Routes
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        //Subcategory Routes
        Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories.index');
        Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
        Route::post('/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');
        Route::get('/subcategories/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
        Route::put('/subcategories/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategories.update');
        Route::get('/subcategories/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');

        //Brand Routes
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::get('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });
});
