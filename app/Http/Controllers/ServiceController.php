<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function add(){
        return view('Admin.pages.service.add');
    }
    public function store(Request $request){
        try {
         $request->validate([
            'title'=>'required|string',
            // 'icon' =>'required|mimes:png,jpg,jpeg',
            'icon' =>'required|string',
            'detail'=>'required'
         ]);
       
         $service = Service::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'icon' => $request->icon,
            'user_id' => 1,
         ]);
         toastr()->success("Service has been Added!", ['timeOut'=>5000]);
         return redirect()->route('service.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function view(){
        $services = Service::latest()->get();
        return view('Admin.pages.service.view', compact('services'));
    }
    public function show($id)
    {
        $service=Service::find($id);
        return view('Admin.pages.service.show', compact('service'));
    }

    public function edit($id){
        $service = Service::find($id);
        return view('Admin.pages.service.edit', compact('service'));
    }
    public function update(Request $request, $id){
        try {
            $request->validate([
               'title'=>'required|string',
               'icon' =>'required|string',
               'detail'=>'required'
            ]);

            $service = Service::find($id);
   
         $updatedService=$service->update([
               'title' => $request->title,
               'detail' => $request->detail,
               'icon' => $request->icon,
               'user_id' => 1,
            ]);
            if($updatedService){
                toastr()->success("Service has been Updated!", ['timeOut'=>5000]);
                return redirect()->route('service.view');
            }
           } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function destroy($id){
        $service=Service::find($id);

        $serviceDelete=$service->delete();
        if($serviceDelete){
            toastr()->success("Service has been Deleted!", ['timeOut'=>5000]);
        }
            return redirect()->route('service.view');
        }
}
