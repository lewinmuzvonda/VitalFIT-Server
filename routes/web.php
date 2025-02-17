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
    return redirect()->to('/login');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/dashboard', function () {
    return redirect()->to('/bookings');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/testimonials', [MainController::class, 'testimonials'])->name('testimonials');
    Route::get('/create-testimonial', [MainController::class, 'createTestimonial'])->name('testimonials.create');
    Route::post('/create-testimonial', [MainController::class, 'saveTestimonial'])->name('testimonials.save');
    Route::get('/delete-testimonial/{testimonial_id}', [MainController::class, 'deleteTestimonial'])->name('testimonials.delete');

    Route::get('/bookings', [MainController::class, 'bookings'])->name('bookings');
    Route::get('/manage-booking/{booking_id}', [MainController::class, 'manageBooking'])->name('booking');
    Route::post('/manage-booking', [MainController::class, 'manageBookingStatus'])->name('booking.status');
    Route::get('/create-slot/{booking_id}', [MainController::class, 'createSlot'])->name('slots.create');
    Route::post('/create-slot', [MainController::class, 'saveSlot'])->name('slots.save');
    Route::get('/update-slot/{slot_id}', [MainController::class, 'updateSlot'])->name('slots.update');
    Route::post('/update-slot', [MainController::class, 'changeSlot'])->name('slots.change');

    Route::get('/offers', [MainController::class, 'offers'])->name('offers');
    Route::get('/create-offer', [MainController::class, 'createOffer'])->name('offers.create');
    Route::post('/create-offer', [MainController::class, 'saveOffer'])->name('offers.save');
    Route::get('/manage-offer/{offer_id}', [MainController::class, 'manageOffer'])->name('offers.manage');
    Route::post('/manage-offer', [MainController::class, 'updateOffer'])->name('offers.update');
    Route::get('/delete-offer/{offer_id}', [MainController::class, 'deleteOffer'])->name('offers.delete');

    Route::get('/packages', [MainController::class, 'packages'])->name('packages');
    Route::get('/create-package', [MainController::class, 'createPackage'])->name('packages.create');
    Route::post('/create-package', [MainController::class, 'savePackage'])->name('packages.save');
    Route::get('/manage-package/{package_id}', [MainController::class, 'managePackage'])->name('packages.manage');
    Route::post('/manage-package', [MainController::class, 'updatePackage'])->name('packages.update');
    Route::get('/delete-package/{package_id}', [MainController::class, 'deletePackage'])->name('packages.delete');

    Route::get('/partners', [MainController::class, 'partners'])->name('partners');
    Route::get('/manage-partner/{partner_id}', [MainController::class, 'managePartner'])->name('partners.manage');

    Route::get('/users', [MainController::class, 'users'])->name('users');
    Route::get('/create-user', [MainController::class, 'createUser'])->name('users.create');
    Route::post('/create-user', [MainController::class, 'saveUser'])->name('users.save');
    Route::get('/manage-user/{user_id}', [MainController::class, 'manageUser'])->name('users.manage');
    Route::post('/manage-user', [MainController::class, 'updateUser'])->name('users.update');
    Route::get('/delete-user/{user_id}', [MainController::class, 'deleteUser'])->name('users.delete');
    
});

require __DIR__.'/auth.php';
