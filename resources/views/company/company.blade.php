@extends('layouts.main')
@section('content')
<div class="container">
    <h2>Companies</h2>
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
    {{$companies->links()}}
</div>
@endsection