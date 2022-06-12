@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success my-3">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{$jobs->title}}</div>

                <div class="card-body">
                    <p>
                    <h3>Description</h3>{{$jobs->description}}</p>
                    <p>
                    <h3>Duties</h3>{{$jobs->roles}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="class-header my-4 mx-3">
                    <h3>Short Info</h3>
                </div>
                <div class="card-body">
                    <p>Company:<a href="{{route('company.index',[$jobs->company->id, $jobs->company->name])}}">{{$jobs->company->name}}</a></p>
                    <p>Address:{{$jobs->address}}</p>
                    <p>Employement Type:{{$jobs->type}}</p>
                    <p>Position:{{$jobs->position}}</p>
                    <p>Posted {{$jobs->created_at->diffForhumans()}}</p>
                    <p>Deadline:{{date('F d,Y',strtotime($jobs->last_date))}}</p>
                </div>
            </div>
            @if(Auth::check()&&Auth::user()->user_type=='seeker')
            @if(!$jobs->checkApplication())
            <home :jobid={{$jobs->id}}></home>
            @else
            <button class="btn btn-danger my-3" style="width: 100%;">Job Applied</button>
            @endif
            <favourite jobId={{$jobs->id}} :favourited={{$jobs->checkSaved()?'true':'false'}}></favourite>
            @else
            <a href="{{ route('login') }}"><button class="btn btn-danger my-3" style="width: 100%;">Please login to apply</button></a>
            @endif
        </div>
    </div>
</div>
@endsection