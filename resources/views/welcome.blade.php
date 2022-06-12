@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <search></search>
        </div>
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
    </div>
    <div>
        <a href="{{route('alljobs')}}"><button class="btn btn-secondary btn-lg" style="width: 100%;">Browse all jobs</button></a><br><br>
        <h3 style="display: flex; justify-content:center;">Featured Companies</h3>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($companies as $company)
        <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('uploads/logo')}}/{{$company->logo}}" class="card-img-top" style="height: 200px; width: 18rem;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$company->name}}</h5>
                    <p class="card-text">{{$company->address}}</p>
                    <p class="card-text">{{$company->website}}</p>
                    <a href="{{route('company.index',[$company->id,$company->name])}}" class="btn btn-primary">View Company</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection