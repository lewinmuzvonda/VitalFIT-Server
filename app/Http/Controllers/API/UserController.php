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

class UserController extends Controller
{
    public function startCourse(){
        
    }

    public function updateCourseProgress(){
        
    }

    public function packages(){

        $packages = Package::get();

        return $packages;

    }

    public function getPackage( $package_id ){

        $package = Package::find($package_id);

        return $package;

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

    public function memberBookings(){

    }

    public function createBooking(){
        
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
}
