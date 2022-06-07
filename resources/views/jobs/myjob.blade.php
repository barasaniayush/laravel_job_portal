@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Logo</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Created on</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <td>
                                    @if(!empty(Auth::user()->company->logo))
                                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" alt="" srcset="" height="150px" width="150px" style="border-radius:50%">
                                    @else
                                    <img src="" alt="Upload company logo" srcset="" width="100%">
                                    @endif
                                </td>
                                <td>{{$job->position}}<br>
                                    <i class="fa fa-clock" aria-hidden="true">&nbsp;{{$job->type}}</i>
                                </td>
                                <td><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                                <td><i class="fa fa-globe" aria-hidden="true">{{$job->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('jobs.show', [$job->id])}}"><button class="btn btn-success">Apply</button></a>
                                    <a href="{{route('jobs.edit',[$job->id])}}"><button class="btn btn-dark">Edit</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection