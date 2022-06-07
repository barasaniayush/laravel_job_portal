<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('employer', ['except'=>array('index')]);
    }

    public function index($id) {
        $company = Company::find($id);
        return view('company.index', compact('company'));
    }

    public function create() {
        return view('company.create');
    }

    public function store(Request $request) {
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);
        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function changeLogo(Request $request) {
        $this->validate($request, [
            'logo'=>'mimes:jpg,jpeg,png',
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/logo/', $filename);
            Company::where('user_id',$user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('message', 'Company logo updated successfully');
        }
    }

    public function changeCoverphoto(Request $request) {
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo')) {
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/coverphoto',$filename);
            Company::where('user_id',$user_id)->update([
                'cover_photo' => $filename
            ]);
            return redirect()->back()->with('mesage', 'Company cover photo updated successfully');
        }
    }
}
