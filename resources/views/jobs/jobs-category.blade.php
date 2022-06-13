@extends('layouts.main')
@section('content')<br><br><br><br><br><br>
<div class="container">
    <h2>{{$categoryName->name}}</h2>
    <div class="row">
        <table class="table my-5">
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" height="60px" width="60px" alt="" srcset=""></td>
                    <td>{{$job->position}}<br>
                        <i class="fa fa-clock" aria-hidden="true">&nbsp;{{$job->type}}</i>
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> {{$job->address}}</td>
                    <td><i class="fa fa-globe" aria-hidden="true">{{$job->created_at->diffForHumans()}}</td>
                    <td><button class="btn btn-success"><a href="{{route('jobs.show', [$job->id,$job->title])}}" style="color: white;">View</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection