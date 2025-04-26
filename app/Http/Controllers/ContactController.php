<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{

    public function view(){
        $contacts=Contact::latest()->get();
        return view('Admin.pages.contact.view',compact('contacts'));
    }
    public function store(Request $request)
    {
        try{

            $request->validate([
                'name'=>'required|string',
                'email' => 'required',
                'subject'=>'required',
                'message' =>'required',
            ]);
            $contact=Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            toastr()->success("Thanks for Contacting us, we'll give you response soon..", ['timeOut'=>5000]);
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
        $contact=Contact::find($id);
        return view("Admin.pages.contact.show", compact('contact'));
    }
    public function destroy($id){
        $contact=Contact::find($id);
        $contact->delete();
        toastr()->success("Contact has been deleted!", ['timeOut'=>5000]);
        return redirect()->route('contact.view');
    }

}
