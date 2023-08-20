<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class MainController extends Controller
{
    public function packages(){

    }

    public function addPackage(){
        
    }

    public function savePackage(){
        
    }

    public function editPackage(){
        
    }

    public function updatePackage(){
        
    }

    public function deletePackage(){
        
    }

    public function courses(){

    }

    public function addCourse(){
        
    }

    public function saveCourse(){
        
    }

    public function editCourse(){
        
    }

    public function updateCourse(){
        
    }

    public function deleteCourse(){
        
    }

    public function courseItems(){

    }

    public function getCourseItem(){

    }

    public function addCourseItem(){
        
    }

    public function saveCourseItem(){
        
    }

    public function editCourseItem(){
        
    }

    public function updateCourseItem(){
        
    }

    public function deleteCourseItem(){
        
    }

    public function bookings(){

        $bookings = Booking::leftJoin('users','users.id','=','bookings.user_id')
        ->leftJoin('packages','packages.id','=','bookings.package_id')
        ->leftJoin('coaches','coaches.id','=','bookings.coach_id')
        ->select('bookings.id','bookings.start_time','bookings.notes','bookings.status','coaches.name as coach','coaches.bio as coach_bio','packages.name as package','packages.price','packages.type','users.name as client')
        ->get();

        return view('coach/bookings',[
            'bookings' => $bookings,
        ]);

    }

    public function manageBooking($booking_id){

        $booking = Booking::leftJoin('users','users.id','=','bookings.user_id')
        ->leftJoin('packages','packages.id','=','bookings.package_id')
        ->leftJoin('coaches','coaches.id','=','bookings.coach_id')
        ->select('bookings.id','bookings.start_time','bookings.notes','bookings.status','coaches.name as coach','coaches.bio as coach_bio','packages.name as package','packages.price','packages.type','users.name as client')
        ->where('bookings.id','=',$booking_id)
        ->first();

        return view('coach/booking',[
            'booking' => $booking,
        ]);

    }

    public function addBooking(){
        
    }

    public function saveBooking(){
        
    }

    public function editBooking(){
        
    }

    public function updateBooking(){
        
    }

    public function deleteBooking(){
        
    }

    public function getMemberRecord(){
        
    }

    public function addMemberRecord(){
        
    }

    public function updateMemberRecord(){
        
    }

    public function deleteMemberRecord(){
        
    }

    public function addCourseReview(){
        
    }

    public function editCourseReview(){
        
    }

    public function updateCourseReview(){
        
    }

    public function deleteCourseReview(){
        
    }

}
