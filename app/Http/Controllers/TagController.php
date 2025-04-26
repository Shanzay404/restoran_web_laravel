<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function add(){
        return view('Admin.pages.tags.add');
    }
    public function store(Request $request){
        try {
         $request->validate([
            'name'=>'required'
         ]);
         $tag = Tag::create([
            'name' => $request->name,
         ]);
         toastr()->success("Tag has been Added!", ['timeOut'=>5000]);
         return redirect()->route('tag.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
        }
    }
    public function view(){
        $tags = Tag::latest()->get();
        return view('Admin.pages.tags.view', compact('tags'));
    }

    public function edit($id){
        $tag = Tag::find($id);
        return view('Admin.pages.tags.edit', compact('tag'));
    }
    public function update(Request $request, $id){
        try {
         $request->validate([
            'name'=>'required'
         ]);
         Tag::where('id', $id)->update(['name' => $request->name]);
         toastr()->success("Tag has been Updated!", ['timeOut'=>5000]);
         return redirect()->route('tag.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
        }
    }
    public function destroy($id){
        $tag=Tag::find($id);
        $tag->delete();
        toastr()->success("Tag has been Deleted!", ['timeOut'=>5000]);
        return redirect()->route('tag.view');
    }
}
