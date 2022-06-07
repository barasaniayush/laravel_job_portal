<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class UserProfileController extends Controller
{
    public function __construct() {
        $this->middleware('jobseeker');
    }

    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'address'=>'max:20',
            'bio'=>'min:20',
            'experience'=>'min:20',
            'phone'=>'numeric|min:10',
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function attachment(Request $request) {
        $this->validate($request, [
            'resume'=>'mimes:pdf,doc,docs|max:20000',
            'cover_letter'=>'mimes:pdf,doc,docs|max:20000'
        ]);
        $user_id = auth()->user()->id;
        $coverletter = $request->file('cover_letter')->store('public/files');
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter'=>$coverletter,
            'resume' => $resume,
        ]);
        return redirect()->back()->with('message', 'Attachment updated successfully');
    }

    public function changeAvatar(Request $request) {
        $this->validate($request, [
            'avatar'=>'mimes:jpg,jpeg,png',
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/avatar/', $filename);
            Profile::where('user_id',$user_id)->update([
                'avatar' => $filename
            ]);
            return redirect()->back()->with('message', 'Profile image updated successfully');
        }
    }
}
