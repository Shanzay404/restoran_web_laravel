<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class TeamMembersController extends Controller
{
    public function add(){
        return view('Admin.pages.team-members.add');
    }
    public function view(){
        $members=TeamMember::latest()->get();
        return view('Admin.pages.team-members.view',compact('members'));
    }
    public function store(Request $request){
        try {
         $request->validate([
            'name'=>'required|string',
            'designation'=>'required|string',
            'image' =>'required|mimes:png,jpg,jpeg',
         ]);
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('team_members'), $imageName);

         $member = TeamMember::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
         ]);
         toastr()->success("Team Member has been Added!", ['timeOut'=>5000]);
         return redirect()->route('member.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function edit($id){
        $member=TeamMember::find($id);
        return view('Admin.pages.team-members.edit',compact('member'));
    }
    public function update(Request $request, $id){
        try {
         $request->validate([
            'name'=>'required|string',
            'designation'=>'required|string',
            'image' =>'nullable|mimes:png,jpg,jpeg',
         ]);
         $member=TeamMember::find($id);
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('team_members'), $imageName);
            $member->update(['image'=>$imageName]);
        }

         $memberUpdate = $member->update([
            'name' => $request->name,
            'designation' => $request->designation,
         ]);
         toastr()->success("Team Member has been Updated!", ['timeOut'=>5000]);
         return redirect()->route('member.view');
        } 
         catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Throwable $e) {
            toastr()->error("An error occurred: " . $e->getMessage(), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function destroy($id){
        $member=TeamMember::find($id);

        $img_path = ('team_members/'.$member->image);
        if(File::exists($img_path)){
        File::delete($img_path);
        }
        $memberDelete=$member->delete();
        if($memberDelete){
            toastr()->success("Team Member has been Deleted!", ['timeOut'=>5000]);
        }
            return redirect()->route('member.view');
    }
}
