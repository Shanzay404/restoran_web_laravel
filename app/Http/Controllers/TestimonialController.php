<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function add(){
        return view('Admin.pages.testimonials.add');
    }
    public function view(){
        $testimonials=Testimonial::latest()->get();
        return view('Admin.pages.testimonials.view', compact('testimonials'));
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'message' => 'required',
            ]);
            // dd($request->all());
            // die;
            $testimonial=Testimonial::create([
                'message' => $request->message,
                'user_id' => 1,
            ]);
            toastr()->success("Thanks for the response", ['timeOut'=>5000]);
            return redirect()->route('testimonial.view');
        }   
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        } 
    }
    // public function show($id){
    //     $testimonial=Testimonial::find($id);
    //     return view('Admin.pages.testimonials.show', compact('testimonial'));
    // }
    public function destroy($id){
        $testi=Testimonial::find($id);
        $testi->delete();
        toastr()->success("Testimonial has been deleted", ['timeOut'=>5000]);
        return redirect()->route('testimonial.view');
    }
}
