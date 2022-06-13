<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\JobPostRequest;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer', ['except' => array('index', 'show', 'apply', 'allJobs', 'searchJobs')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all()->where('status', 1);
        $categories = Category::with('jobs')->get();
        $companies = Company::get();
        return view('welcome', compact('jobs', 'companies', 'categories'));
    }

    public function company()
    {
        return view('company.index');
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application sent!');
    }
    public function allJobs(Request $request)
    {
        $search = $request->get('search');
        $address = $request->get('address');
        if($search && $address) {
            $jobs = Job::with('company')->where('position','LIKE','%'.$search.'%')
                    ->orWhere('title','LIKE','%'.$search.'%')
                    ->orWhere('type','LIKE','%'.$search.'%')
                    ->orWhere('address','LIKE','%'.$search.'%')
                    ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if ($keyword || $type || $category || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orWhere('category_id', $category)
                ->orWhere('address', $address)
                ->paginate(10);
                return view('jobs.alljobs',compact('jobs'));
        } else {
            $jobs = Job::latest()->paginate(2);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

    public function searchJobs(Request $request) {
        $keyword = $request->get('keyword');
        $job = Job::where('title','like','%'.$keyword.'%')->get();
        return response()->json($job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
            'no_of_vacancy' => request('no_of_vacancy'),
            'experience_year' => request('experience_year'),
            'gender' => request('gender'),
            'salary' => request('salary')
        ]);
        return redirect()->back()->with('message', 'Job Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs = Job::find($id);
        return view('jobs.show', compact('jobs'));
    }

    public function myjob()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('jobs'));
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = Job::findOrFail($id);
        return view('jobs.edit', compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update(
            $request->all()
        );
        return redirect()->back()->with('message', 'Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
