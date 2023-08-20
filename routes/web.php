<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/bookings', [MainController::class, 'bookings'])->name('bookings');
    Route::get('/manage-booking/{booking_id}', [MainController::class, 'manageBooking'])->name('booking');
    Route::get('/offers', [MainController::class, 'offers'])->name('offers');
    Route::get('/manage-offer/{offer_id}', [MainController::class, 'manageOffer'])->name('offer');
    Route::get('/partners', [MainController::class, 'partners'])->name('partners');
    Route::get('/manage-partner/{partner_id}', [MainController::class, 'managePartner'])->name('partner');
});

require __DIR__.'/auth.php';
