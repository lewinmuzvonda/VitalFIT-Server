<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/packages/{coach_id}/{type}', [UserController::class,'packages']);
Route::get('/coach/{coach_id}', [UserController::class,'getCoach']);
Route::get('/coaches', [UserController::class,'getCoaches']);
Route::get('/user/delete/{user_id}', [UserController::class,'deleteUser']);

Route::get('/bookings/{user_id}', [UserController::class,'memberBookings']);
Route::post('/booking/create', [UserController::class,'createBooking']);
Route::post('/booking/update', [UserController::class,'editBooking']);
Route::get('/booking/{booking_id}', [UserController::class,'getBooking']);

Route::get('/testimonials', [UserController::class,'testimonials']);

Route::get('/offers', [UserController::class, 'offers'])->name('offersAPI');
Route::get('/partners', [UserController::class, 'partners'])->name('partnersAPI');

Route::get('/courses/{user_id}', [UserController::class,'courses']);
Route::get('/user-courses/{user_id}', [UserController::class,'userCourses']);
Route::get('/course/{course_id}', [UserController::class,'getCourse']);
Route::get('/course-items/{course_id}', [UserController::class,'courseItems']);
Route::get('/course-item/{item_id}', [UserController::class,'getCourseItem']);
Route::get('/register-course/{course_id}/{user_id}/{payment_id}', [UserController::class,'registerCourse']);

Route::get('/member-records/{user_id}', [UserController::class,'getMemberRecords']);
Route::get('/member-record/{record_id}', [UserController::class,'getMemberRecord']);
Route::get('/latest-record/{user_id}', [UserController::class,'getLatestMemberRecord']);
Route::post('/member-record/add', [UserController::class,'addMemberRecord']);
Route::post('/member-record/update/{record_id}', [UserController::class,'updateMemberRecord']);
Route::post('/member-record/delete/{record_id}', [UserController::class,'deleteMemberRecord']);

Route::get('/course-reviews', [UserController::class,'courseReviews']);
Route::get('/course-reviews/{course_id}/{user_id}', [UserController::class,'memberCourseReviews']);
Route::post('/course-review/add', [UserController::class,'addCourseReview']);
Route::post('/course-review/update/{review_id}', [UserController::class,'updateCourseReview']);
Route::post('/course-review/delete/{review_id}', [UserController::class,'deleteCourseReview']);

Route::get('/coach-reviews/{coach_id}', [UserController::class,'getCoachReviews']);

Route::get('/pay/{user_id}/{amount}', [UserController::class,'mamoPay']);
Route::get('/mamopay/success/{transaction_id}', [UserController::class,'mamoSuccess']);