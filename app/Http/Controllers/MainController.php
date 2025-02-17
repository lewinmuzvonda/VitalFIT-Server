<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Offer;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\User;
use App\Models\Coach;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\BookingSlot;
use App\Models\MemberRecord;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{

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
        ->select('bookings.id','bookings.start_time','bookings.notes','bookings.status','coaches.name as coach','coaches.bio as coach_bio','packages.name as package','packages.price','packages.type','users.name as client','packages.slots')
        ->where('bookings.id','=',$booking_id)
        ->first();

        $bookingSlots = BookingSlot::where('booking_id','=',$booking_id)->get();

        $slotsCount = $bookingSlots->count();

        return view('coach/booking',[
            'booking' => $booking,
            'slots' => $bookingSlots,
            'slotsCount' => $slotsCount,
        ]);

    }

    public function manageBookingStatus(Request $request){

        Booking::where('id', $request->booking_id)->update([
            'status' => $request->status,
        ]);

        return redirect()->to('/manage-booking'.'/'.$request->booking_id);

    }

    public function createSlot($booking_id){

        $booking = Booking::leftJoin('users','users.id','=','bookings.user_id')
        ->leftJoin('packages','packages.id','=','bookings.package_id')
        ->leftJoin('coaches','coaches.id','=','bookings.coach_id')
        ->select('bookings.id','bookings.start_time','bookings.notes','bookings.status','coaches.name as coach','coaches.bio as coach_bio','packages.name as package','packages.price','packages.type','users.name as client')
        ->where('bookings.id','=',$booking_id)
        ->first();

        return view('coach/slot/create',[
            'booking' => $booking,
        ]);

    }

    public function updateSlot($slot_id){

        $slot = BookingSlot::where('booking_slots.id','=',$slot_id)
        ->first();

        return view('coach/slot/edit',[
            'slot' => $slot,
        ]);

    }

    public function changeSlot(Request $request){

        BookingSlot::where('id', $request->slot_id)->update([
            'slot_time' => $request->time,
        ]);

        return redirect()->to('/manage-booking'.'/'.$request->booking_id);

    }

    public function saveSlot(Request $request){

        $booking_id = $request->booking_id;;
        $slot = new BookingSlot;
        $slot->slot_time = $request->time;
        $slot->booking_id = $booking_id;
        $slot->status = "confirmed";
        $slot->save();

        return redirect()->to('/manage-booking'.'/'.$booking_id);

    }

    public function testimonials(){

        $testimonials = Testimonial::orderBy('created_at', 'desc')
        ->get();

        return view('admin/testimonial/list',[
            'testimonials' => $testimonials,
        ]);

    }

    public function createTestimonial(){

        return view('admin/testimonial/create');

    }

    public function saveTestimonial(Request $request){

        // dd($_FILES['video']);

        $request->validate([
            'video' => 'required|mimes:mp4', // Adjust max file size as needed
        ]);
    
        $file = $request->file('video');
        Log::debug('Uploaded File:', [$file]);

        $videoPath = $request->file('video')->store('videos', 'public');
        // dd($videoPath);
        $testimonial = new Testimonial;
        $testimonial->title = $request->title;
        $testimonial->video_url = asset('storage/' . $videoPath);
        $testimonial->status = 1;
        $testimonial->save();

        return redirect()->to('/testimonials');

    }

    public function deleteTestimonial($testimonial_id){

        Testimonial::where('id', $testimonial_id)->delete();

        return redirect()->to('/testimonials');

    }

    public function offers(){

        $offers = Offer::get();

        return view('admin/offer/list',[
            'offers' => $offers,
        ]);

    }

    public function partners(){

        $partners = Partner::get();

        return view('admin/partner/list',[
            'partners' => $partners,
        ]);

    }

    public function createOffer(){

        return view('admin/offer/create');

    }

    public function saveOffer(Request $request){

        $offer = new Offer;
        $offer->title = $request->offer;
        $offer->status = 1;
        $offer->save();

        return redirect()->to('/offers');

    }

    public function manageOffer($offer_id){

        $offer = Offer::where('id','=',$offer_id)->first();

        return view('admin/offer/edit',[
            'offer' => $offer
        ]);

    }

    public function updateOffer(Request $request){

        Offer::where('id', $request->id)->update([
            'title' => $request->offer,
        ]);

        return redirect()->to('/offers');

    }

    public function deleteOffer($offer_id){

        Offer::where('id', $offer_id)->delete();

        return redirect()->to('/offers');

    }

    public function packages(){

        $packages = Package::leftJoin('coaches','coaches.id','=','packages.coach_id')
        ->select('packages.id','packages.name','packages.price','packages.type','packages.slots','coaches.name as coach')
        ->get();

        return view('admin/package/list',[
            'packages' => $packages,
        ]);

    }

    public function createPackage(){

        $coaches = Coach::get();

        return view('admin/package/create',[
            'coaches' => $coaches,
        ]);

    }

    public function savePackage(Request $request){

        $package = new Package;
        $package->coach_id = $request->coach_id;
        $package->name = $request->name;
        $package->type = $request->type;
        $package->price = $request->price;
        $package->slots = $request->slots;;
        $package->save();

        return redirect()->to('/packages');

    }

    public function managePackage($package_id){

        $package = Package::where('id','=',$package_id)->first();

        return view('admin/package/edit',[
            'package' => $package
        ]);

    }

    public function updatePackage(Request $request){

        Package::where('id', $request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'slots' => $request->slots,
        ]);

        return redirect()->to('/packages');

    }

    public function deletePackage($package_id){

        Package::where('id', $package_id)->delete();

        return redirect()->to('/packages');

    }

    public function users(){

        $users = User::get();

        return view('admin/user/list',[
            'users' => $users,
        ]);

    }

    public function createUser(){

        return view('admin/user/create');

    }

    public function saveUser(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->name;
        $user->phone_number = $request->phone;
        $user->gender = $request->gender;
        $user->user_type = $request->user_type;
        $user->dob = $request->dob;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->user_type == "member") {

            $record = MemberRecord::create([
                'user_id' => $user->id,
                'weight' => $request->weight,
                'height' => $request->height,
            ]);

            return redirect()->to('/users');

        }else if ($request->user_type == "coach") {

            $record = Coach::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'bio' => $request->bio,
                'image' => $request->image_data,
            ]);

            return redirect()->to('/users');
        }

        return redirect()->to('/users');

    }

    public function manageUser($user_id){

        $user = User::where('id','=',$user_id)->first();

        return view('admin/user/edit',[
            'user' => $user
        ]);

    }

    public function updateUser(Request $request){

        User::where('id', $request->id)->update([
            'title' => $request->offer,
        ]);

        return redirect()->to('/offers');

    }

    public function deleteUser($user_id){

        User::where('id', $user_id)->delete();

        

        return redirect()->to('/users');

    }

    public function createPartner(){

        return view('admin/partners/create');

    }

    public function managePartner($partner_id){

        $partner = Partner::where('id','=',$partner_id)->first();

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
