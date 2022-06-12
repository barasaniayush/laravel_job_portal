<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class FavouriteController extends Controller
{
    public function saveJob($id) {
        $jobId = Job::find($id);
        $jobId->favourites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsaveJob($id) {
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
