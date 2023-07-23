<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/packages', [UserController::class,'packages']);

Route::get('/bookings/{user_id}', [UserController::class,'memberBookings']);
Route::post('/booking/create', [UserController::class,'createBooking']);
Route::post('/booking/update', [UserController::class,'editBooking']);

Route::get('/courses', [UserController::class,'courses']);
Route::get('/course-items/{course_id}', [UserController::class,'courseItems']);
Route::get('/course-item/{course_item_id}', [UserController::class,'getCourseItem']);

Route::get('/member-records/{user_id}', [UserController::class,'getMemberRecords']);
Route::get('/member-record/{record_id}', [UserController::class,'getMemberRecord']);
Route::post('/member-record/add', [UserController::class,'addMemberRecord']);
Route::post('/member-record/update/{record_id}', [UserController::class,'updateMemberRecord']);
Route::post('/member-record/delete/{record_id}', [UserController::class,'deleteMemberRecord']);

Route::post('/course-reviews', [UserController::class,'courseReviews']);
Route::post('/course-reviews/{user_id}', [UserController::class,'memberCourseReviews']);
Route::post('/course-review/add', [UserController::class,'addCourseReview']);
Route::post('/course-review/update/{review_id}', [UserController::class,'updateCourseReview']);
Route::post('/course-review/delete/{review_id}', [UserController::class,'deleteCourseReview']);