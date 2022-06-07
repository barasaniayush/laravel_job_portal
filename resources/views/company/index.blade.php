@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(!empty($company->cover_photo))
            <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width:100%;" alt="">
            @else
            <img src="" alt="Please upload cover photo" srcset="" style="width: 100%;">
            @endif
            <div class="company-desc">
                <div class="col-md-3 my-5">
                    @if(!empty($company->logo))
                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" srcset="" height="150px" width="150px" style="border-radius:50%">
                    @else
                    <img src="" alt="Upload company logo" srcset="" width="100%">
                    @endif
                </div>
                <h3>Company Name: {{$company->name}}</h3>
                <h4>Slogan: {{$company->slogan}}</h4>
                <p>Company Detail: {{$company->description}}</p>
                <p>Address:{{$company->address}}</p>
                <p>Phone: {{$company->phone}}</p>
                <p>Webiste: {{$company->website}}</p>
            </div>
        </div>
        <table class="table">
            <thead>
                <th>Logo</th>
                <th>Position</th>
                <th>Address</th>
                <th>Posted on</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
                    <td><img src="{{asset('avatar/man.jpg')}}" alt="" srcset=""></td>
                    <td>{{$job->position}}<br>
                    <i class="fa fa-clock" aria-hidden="true">&nbsp;{{$job->type}}</i>
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true">{{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', [$job->id,$job->slug])}}"><button class="btn btn-success">Apply Now</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
