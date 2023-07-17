<?php

use App\Http\Livewire\Customer;
use App\Http\Livewire\Payment;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Customer::class);
Route::get('/payment/{customer_id}', Payment::class)->name('payment');
