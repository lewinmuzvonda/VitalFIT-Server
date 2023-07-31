<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Course;
use App\Models\CourseItem;
use App\Models\CourseProgress;
use App\Models\Booking;
use App\Models\Member;
use App\Models\MemeberRecord;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Coach;

class UserController extends Controller
{
    public function startCourse(){
        
    }

    public function updateCourseProgress(){
        
    }

    public function packages($coach_id, $type){

        $packages = Package::where('coach_id','=',$coach_id)
        ->where('type','=',$type)
        ->get();

        return $packages;

    }

    public function getPackage( $package_id ){

        $package = Package::find($package_id);

        return $package;

    }

    public function getCoaches(){

        $coaches = Coach::get();

        return $coaches;

    }

    public function getCoach( $coach_id ){

        $coach = Coach::find($coach_id);

        return $coach;

    }

    public function courses(){

        $courses = Course::get();

        return $courses;

    }

    public function getCourse( $course_id ){

        $course = Course::find($course_id);

        return $course;

    }

    public function courseItems( $course_id ){

        $course_items = CourseItem::where('course_id','=',$course_id)->get();

        return $course_items;

    }

    public function getCourseItem( $item_id ){

        $course_item = CourseItem::where('id','=',$item_id)
        ->get();

        return $course_item;

    }

    public function getBooking( $booking_id, $member_id = 1 ){

        $booking = Booking::leftJoin('coaches','coaches.id','=','bookings.coach_id')
        ->leftJoin('packages','packages.id','=','bookings.package_id')
        ->where('bookings.user_id','=',$member_id)
        ->select('bookings.id','bookings.start_time','coaches.name as coach','coaches.image as coach_image','packages.name as package','packages.price','packages.type')
        ->where('bookings.id','=',$booking_id)
        ->first();

        return $booking;

    }

    public function memberBookings($member_id){

        $bookings = Booking::leftJoin('coaches','coaches.id','=','bookings.coach_id')
        ->leftJoin('packages','packages.id','=','bookings.package_id')
        ->where('bookings.user_id','=',$member_id)
        ->select('bookings.id','bookings.start_time','coaches.name as coach','packages.name as package','packages.price','packages.type')
        ->get();

        return $bookings;

    }

    public function createBooking( Request $request ){

        $booking = new Booking;
        $booking->user_id = 1;
        $booking->start_time = $request->date;
        $booking->package_id = $request->package_id;
        $booking->coach_id = $request->coach_id;
        // $booking->notes = $request->notes;
        $booking->status = 1;
        

        try {
            $saved = $booking->save();
            return 1; 
        } catch (\Exception $e) {
          
            return 0;
        }

        if($saved){
            return true;
        }else{
            return false;
        };
        
    }

    public function editBooking(){
        
    }

    public function getMemberRecord( $record_id ){

        $record = MemberRecord::find($record_id);

        return $record;
        
    }

    public function getMemberRecords( $user_id ){

        $records = MemberRecord::where('user_id','=',$user_id)->get();

        return $records;
        
    }

    public function addMemberRecord(){
        
    }

    public function updateMemberRecord(){
        
    }

    public function deleteMemberRecord(){
        
    }

    public function courseReviews( $course_id ){

        
    }

    public function memberCourseReviews($course_id, $user_id){


        
    }

    public function addCourseReview(){
        
    }

    public function updateCourseReview(){
        
    }

    public function deleteCourseReview(){
        
    }

    public function getCoachReviews( $coach_id ){

        $coachReviews = Review::where('coach_id','=',$coach_id)->get();

        return $coachReviews;

    }
}
