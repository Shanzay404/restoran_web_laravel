<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    public function add(){
        $items=Item::latest()->get();
        $categories=Category::where('status','=','active')->latest()->get();
        return view('Admin.pages.food-items.add',compact('items','categories'));
    }
    public function store(Request $request){
        try {
         $request->validate([
            'name'=>'required',
            'price' =>'required|numeric|min:0',
            'icon' => 'required|mimes:png,jpg,jpeg',
            'category' => 'required',
            'description' => 'required',
         ]);
         $icon_name=time().'.'.$request->icon->extension();
         $request->icon->move(public_path('food_icons'), $icon_name);
         $item = Item::create([
            'name' => $request->name,
            'price' =>$request->price,
            'category_id' => $request->category,
            'description' => $request->description,
            'icon' => $icon_name,
         ]);
         toastr()->success("Food Item has been Added!", ['timeOut'=>5000]);
         return redirect()->route('item.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function view(){
        $items = Item::with('user','category')->latest()->get();
        return view('Admin.pages.food-items.view',compact('items'));
    }
    public function show($id){
        $item = Item::where('id', $id)->select('*')->with('category')->first();
        return view('Admin.pages.food-items.show',compact('item'));
    }

    public function edit($id){
        $categories=Category::get();
        $item = Item::find($id);
        return view('Admin.pages.food-items.edit', compact('categories','item'));
    }
    public function update(Request $request, $id){
        try {
            $request->validate([
                'name'=>'required',
                'price' =>'required|numeric|min:0',
                'icon' => 'nullable|mimes:png,jpg,jpeg',
                'category' => 'required',
                'description' => 'required',
             ]);
             $item=Item::find($id);
             if(isset($request->icon)){
                 $icon_name=time().'.'.$request->icon->extension();
                 $request->icon->move(public_path('food_icons'), $icon_name);
                 $item->update(['icon'=>$icon_name]);
                }
             $item->update([
                'name' => $request->name,
                'price' =>$request->price,
                'category_id' => $request->category,
                'description' => $request->description,
             ]);
             toastr()->success("Food Item has been Updated!", ['timeOut'=>5000]);
             return redirect()->route('item.view');
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
        $item=Item::find($id);
        $icon_path = public_path('food_icons/'.$item->icon);
        if(File::exists($icon_path)){
            File::delete($icon_path);
        }
        $item->delete();
        toastr()->success("Category has been Deleted!", ['timeOut'=>5000]);
        return redirect()->route('item.view');
    }
}
