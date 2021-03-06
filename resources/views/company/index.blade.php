@extends('layouts.main')
@section('content')
<div class="album text-muted">
    <div class="container">
        @if(Session::has('message'))

        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        @if(Session::has('err_message'))

        <div class="alert alert-danger">{{Session::get('err_message')}}</div>
        @endif
        @if(isset($errors)&&count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif

        <div class="row" id="app">
            <div class="title" style="margin-top: 20px;">
                <h2>{{$company->name}}</h2>

            </div>

            @if(empty($company->cover_photo))
            <img src="{{asset('cover/abc.jpg')}}" style="width: 100%;">

            @else
            <img src="{{asset('uploads/cover_photo')}}/{{$company->cover_photo}}" style="width: 100%;">
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
                <p>Address: {{$company->address}}</p>
                <p>Phone: {{$company->phone}}</p>
                <p>Website: {{$company->website}}</p>
            </div>
            <br>
            <br>
            <br>
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
                    <td><<img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="" srcset="" height="150px" width="150px" style="border-radius:50%"></td>
                    <td>{{$job->position}}<br>
                    <i class="fa fa-clock" aria-hidden="true">&nbsp;{{$job->type}}</i>
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true">{{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', [$job->id,$job->slug])}}"><button class="btn btn-success">View Detail</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection