<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function add(){
        $tags=Tag::latest()->get();
        return view('Admin.pages.category.add',compact('tags'));
    }
    public function store(Request $request){
        try {
         $request->validate([
            'name'=>'required',
            'icon' =>'required|string',
            'tag' => 'required',
         ]);
         $category = Category::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'user_id' => 1,
            'tag_id' => $request->tag,
         ]);
         toastr()->success("Category has been Added!", ['timeOut'=>5000]);
         return redirect()->route('category.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function view(){
        $categories = Category::with('tag','user')->latest()->get();
        return view('Admin.pages.category.view', compact('categories'));
    }

    public function edit($id){
        $tags=Tag::latest()->get();
        $category = Category::find($id);
        return view('Admin.pages.category.edit', compact('category','tags'));
    }
    public function update(Request $request, $id){
        try {
            $request->validate([
               'name'=>'required',
               'icon' =>'required|string',
               'tag' => 'required',
            ]);
            $category=Category::find($id);
           
            $category->update([
               'name' => $request->name,
               'user_id' => 1,
               'icon' => $request->icon,
               'tag_id' => $request->tag,
            ]);
            toastr()->success("Category has been Updated!", ['timeOut'=>5000]);
            return redirect()->route('category.view');
           } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            // throw $e;
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function destroy($id){
        $category=Category::find($id);
        $category->delete();
        toastr()->success("Category has been Deleted!", ['timeOut'=>5000]);
        return redirect()->route('category.view');
    }
    public function status($id){
       $category=Category::find($id);

       if($category->status === "active"){
        $category->update(['status'=>'in-active']);
       }else{
        $category->update(['status'=>'active']);
       }

       toastr()->success("Status has been Changed!", ['timeOut'=>5000]);
       return redirect()->route('category.view');
    }
}

