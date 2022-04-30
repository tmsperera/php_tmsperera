<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesRepresentativeController;

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
    return redirect()->route('sales-representatives.index');
});

Route::get('/sales-representatives', [SalesRepresentativeController::class, 'index'])
    ->name('sales-representatives.index');

Route::get('/sales-representatives/create', [SalesRepresentativeController::class, 'create'])
    ->name('sales-representatives.create');

Route::post('/sales-representatives', [SalesRepresentativeController::class, 'store'])
    ->name('sales-representatives.store');

Route::put('/sales-representatives/{salesRepresentative}', [SalesRepresentativeController::class, 'update'])
    ->name('sales-representatives.update');

Route::delete('/sales-representatives/{salesRepresentative}', [SalesRepresentativeController::class, 'destroy'])
    ->name('sales-representatives.destroy');
