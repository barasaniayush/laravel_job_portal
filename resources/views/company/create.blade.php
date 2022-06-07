@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(!empty(Auth::user()->company->logo))
            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" class="mx-5" alt="" srcset="" height="150px" width="150px" style="border-radius:50%;">
            @else
            <img src="" alt="Upload company logo" srcset="" height="150px" width="150px" style="border-radius:50%">
            @endif
            @if($errors->has('logo'))
            <div class="error">{{$errors->first('logo')}}</div>
            @endif
            <div class="card my-4">
                <div class="card-header">
                        Update logo
                </div>
                <form action="{{route('logo')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <input type="file" name="logo" class="form-control my-3" id="">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                <div class="card-header">
                    Update Company Profile
                </div>
                <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group my-4">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id=""
                             value="{{Auth::user()->company->address}}">
                            @if($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id=""
                             value="{{Auth::user()->company->phone}}">
                            @if($errors->has('phone'))
                            <div class="error">{{$errors->first('phone')}}</div>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control" id=""
                             value="{{Auth::user()->company->website}}">
                            @if($errors->has('website'))
                            <div class="error">{{$errors->first('website')}}</div>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <label for="">Slogan</label>
                            <input type="text" name="slogan" class="form-control" id=""
                             value="{{Auth::user()->company->slogan}}">
                            @if($errors->has('slogan'))
                            <div class="error">{{$errors->first('slogan')}}</div>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{Auth::user()->company->description}}</textarea>
                            @if($errors->has('description'))
                            <div class="error">{{$errors->first('description')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success my-4">Update Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                    Update Company Cover Photo
            </div>
            <form action="{{route('company.coverphoto')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <input type="file" name="cover_photo" class="form-control" id="">
                    @if($errors->has('cover_photo'))
                    <div class="error">{{$errors->first('cover_photo')}}</div>
                    @endif
                    <button type="submit" class="btn btn-success my-3">Update</button>
                </div>
            </form>
        </div>
            <div class="card my-4">
                <div class="card-header">
                    Your Company Information
                </div>
                <div class="card-body">
                    <p>Name: {{Auth::user()->company->name}}</p>
                    <p>Address: {{Auth::user()->company->address}}</p>
                    <p>Phone: {{Auth::user()->company->phone}}</p>
                    <p>Slogan: {{Auth::user()->company->slogan}}</p>
                    <p>Website: {{Auth::user()->company->website}}</p>
                    <p>Company Page: <a href="{{Auth::user()->company->id}}/{{Auth::user()->company->name}}">Click Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
