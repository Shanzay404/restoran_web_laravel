<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function view(){
        $about=AboutUs::first();
        return view('Admin.pages.about-us.index', compact('about'));
    }
    public function store(Request $request){
        try {
            $request->validate([
                'experience' => 'required|numeric',
                'description' => 'required|string',
            ]);
    
            AboutUs::create([
                'experience' => $request->experience,
                'description' => $request->description,
            ]);
            toastr()->success("About has been Added", ['timeOut'=>5000]);
            return redirect()->route('about.index');
        }   
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        } 
    }

    public function update(Request $request, $id){
        try {
            $request->validate([
                'experience' => 'required|numeric',
                'description' => 'required|string',
            ]);
    
            $about = AboutUs::findOrFail($id);
            $about->update([
                'experience' => $request->experience,
                'description' => $request->description,
            ]);
            toastr()->success("About has been Uodated!", ['timeOut'=>5000]);
            return redirect()->route('about.index');
        }   
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        } 
    }

    
}
