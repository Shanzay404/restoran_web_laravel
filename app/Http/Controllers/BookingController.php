<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{

    public function view(){
        $bookings=Booking::latest()->get();
        return view('Admin.pages.booking.view', compact('bookings'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'username' => 'required',
                'email' => 'required|email|unique:bookings,email',
                'date_and_time' => 'required',
                'no_of_people' => 'required|numeric',
                'special_request' => 'nullable',
            ]);
            $formattedDateTime = Carbon::createFromFormat('m/d/Y h:i A', $request->date_and_time)->format('Y-m-d H:i:s');
            $booking=Booking::create([
                'username' => $request->username,
                'email' => $request->email,
                'date_and_time' => $formattedDateTime,
                'no_of_people' => $request->no_of_people,
                'special_request' => isset($request->special_request) ? $request->special_request : null,
            ]);
            toastr()->success("Thanks for booking we'll contact you soon..", ['timeOut'=>5000]);
            return redirect()->back();
        }   
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        } 
    }
    public function show($id){
        $booking=Booking::find($id);
        return view('Admin.pages.booking.show', compact('booking'));
    }
    public function status(Request $request, $id){
        $booking=Booking::find($id);
        $request->validate([
            'status' => 'required|in:pending,progress,confirmed'
        ]);
        $booking->update(['status' => $request->status]);
        toastr()->success("Status has been Changed!", ['timeOut'=>5000]);
        return redirect()->back();
    }
}
