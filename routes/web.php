<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

// Fontend User routes 
Route::get('/', [PageController::class, 'index']);
Route::get('/about-us', [PageController::class, 'about']);
Route::get('/booking', [PageController::class, 'booking']);
Route::get('/cars', [PageController::class, 'cars']);
Route::get('/contact-us', [PageController::class, 'contact']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/login', [PageController::class, 'login']);


// Car searching for booking 
Route::get('/car/types', [FrontendCarController::class, 'carTypes']);
Route::get('/car/brands', [FrontendCarController::class, 'carBrands']);
Route::get('/car/find', [FrontendCarController::class, 'carPaginator']);
Route::get('/car/search', [FrontendCarController::class, 'searchPaginator']);


// Car details and booking 
Route::get('/car/details/{id}', [PageController::class, 'carDetails']);

// User authentication routes 
Route::post('/signup', [UserController::class, 'store']);
Route::post('/signin', [UserController::class, 'login']);



// Frontend admin routes 

Route::prefix('admin')->group(function(){
    Route::get('/register', [PageController::class, 'adminRegister']);
    Route::get('/login', [PageController::class, 'adminLoginView']);
    Route::get('/logout', [UserController::class, 'adminLogOut']);

    Route::middleware([AdminMiddleware::class])->group(function(){
        Route::get('dashboard', [PageController::class, 'adminDashboard']);
        Route::get('dashboard/car', [CarController::class, 'index']);
        Route::get('dashboard/rental', [AdminRentalController::class, 'index']);

        Route::get('dashboard/customer', [CustomerController::class, 'index']);
        Route::get('get-customer', [CustomerController::class, 'show']);

        Route::post('rents/cancel', [AdminRentalController::class, 'cancel']);
        Route::get('rent/by-car/{car}', [CarController::class, 'rentByCar']);
        Route::get('get-rents/{id?}', [AdminRentalController::class, 'show']);


        Route::post('create/user', [CustomerController::class, 'customer']);

        Route::prefix('car')->group(function(){
            Route::get('add', [CarController::class, 'create']);
            Route::post('add', [CarController::class, 'store']);
            Route::post('edit', [CarController::class, 'update']);
            Route::get('get/{id?}', [CarController::class, 'show']);
            Route::delete('delete/{id}', [CarController::class, 'destroy']);
            Route::get('analytics/{id}', [CarController::class, 'analytics']);
            Route::get('get-by/type/{type?}', [CarController::class, 'getByType']);
            Route::post('availability', [CarController::class, 'carAvailability']);
        });

    });
});


// User authentication routes 
Route::middleware([UserMiddleware::class])->group(function(){
    Route::post('/car/availability', [FrontendCarController::class, 'carAvailability']);
    
    Route::prefix('user')->group(function(){
        Route::get('dashboard', [UserController::class, 'dashboard']);
        Route::get('profile', [UserController::class, 'profileView']);
        Route::get('rents', [RentalController::class, 'rentsView']);
        Route::post('profile', [UserController::class, 'profile']);
        Route::get('get-rents', [RentalController::class, 'getRents']);
        Route::post('rents/cancel', [RentalController::class, 'cancel']);
        Route::get('/logout', [UserController::class, 'logOut']);
    });
});