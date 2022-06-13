@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{route('alljobs')}}" method="GET">
            <div class="form-inline">
                <div class="form-group">
                    <label for="">Keyword&nbsp;</label>
                    <input type="text" name="title" id="title" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="">Employement Type&nbsp;</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Choose any one</option>
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="freelance">Freelance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Category&nbsp;</label>
                    <select name="category" class="form-control">
                        <option value="">Choose any one</option>
                        @foreach(App\Models\Category::all() as $cat)
                        <option value="{{$cat->id}}" class="form-control">{{$cat->name}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="">Address&nbsp;</label>
                    <input type="text" name="address" id="address" class="form-control">&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <button type="submit" class="btn btn-outline-success">Search</button>
            </div>
        </form>
        <h1>Recent Jobs</h1>
        <table class="table my-5">
            <thead>
                <th>Logo</th>
                <th>Position</th>
                <th>Address</th>
                <th>Posted on</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" height="60px" width="60px" alt="" srcset=""></td>
                    <td>{{$job->position}}<br>
                        <i class="fa fa-clock" aria-hidden="true">&nbsp;{{$job->type}}</i>
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true">{{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', [$job->id,$job->slug])}}"><button class="btn btn-success">View</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>
</div>
@endsection