<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\NumberPreferenceController;
use App\Models\Customer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

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
    return Redirect::route('login');

});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'customers' => Customer::all()
        ]);
    })->name('dashboard');

    Route::get('/customer/new', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/new', [CustomerController::class, 'store']);

    Route::get('/numbers/{customerId}', [NumberController::class, 'index'])->name('numbers.list');
    Route::get('/numbers/{customerId}/new', [NumberController::class, 'create'])->name('numbers.create');
    Route::post('/numbers/{customerId}/new', [NumberController::class, 'store'])->name('numbers.create');

    Route::get('/number/{numberId}/preferences', [NumberPreferenceController::class, 'index'])->name('preferences.list');
    Route::get('/number/{numberId}/preferences/new', [NumberPreferenceController::class, 'create'])->name('preferences.create');
    Route::post('/number/{numberId}/preferences/new', [NumberPreferenceController::class, 'store'])->name('preferences.create');

});


require __DIR__.'/auth.php';
