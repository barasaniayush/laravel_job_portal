<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmployerRegisterController extends Controller
{
    public function employerRegister() {
        $user =  User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);

        Company::create([
            'user_id'=>$user->id,
            'name'=>request('name'),
            'phone'=>request('phone'),
            'address'=>request('address')
        ]);
        return redirect()->back();
    }
}
