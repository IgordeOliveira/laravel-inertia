<?php

use App\Http\Controllers\CustomerController;
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

    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

    Route::post('/customer/create', [CustomerController::class, 'store']);

});


require __DIR__.'/auth.php';
