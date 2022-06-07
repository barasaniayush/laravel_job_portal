@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
            <img src="" alt="" srcset="" width="100%">
            @else
            <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" alt="" srcset="" width="100%">
            @endif
            @if($errors->has('avatar'))
            <div class="error">{{$errors->first('avatar')}}</div>
            @endif
            <div class="card my-4">
                <div class="card-header">
                        Update profile Picture
                </div>
                <form action="{{route('avatar')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <input type="file" name="avatar" class="form-control my-3" id="">
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
                    Update your profile
                </div>
                <form action="{{route('profile.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group my-4">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id=""
                             value="{{Auth::user()->profile->address}}">
                            @if($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                            @endif
                        </div>

                        <div class="form-group my-4">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id=""
                             value="{{Auth::user()->profile->phone}}">
                            @if($errors->has('phone'))
                            <div class="error">{{$errors->first('phone')}}</div>
                            @endif
                        </div>
                        <div class="form-group my-4">
                            <label for="">Experience</label>
                            <textarea name="experience" class="form-control" id="">{{Auth::user()->profile->experience}}</textarea>
                            @if($errors->has('experience'))
                            <div class="error">{{$errors->first('experience')}}</div>
                            @endif
                        </div>
                        <div class="form-group my-4">
                            <label for="">Bio</label>
                            <textarea name="bio" id="" class="form-control">{{Auth::user()->profile->bio}}</textarea>
                            @if($errors->has('bio'))
                            <div class="error">{{$errors->first('bio')}}</div>
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
                    Update Attachment
            </div>
            <form action="{{route('profile.attachment')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <input type="file" name="cover_letter" class="form-control" id="">
                    @if($errors->has('cover_letter'))
                    <div class="error">{{$errors->first('cover_letter')}}</div>
                    @endif
                    <input type="file" name="resume" class="form-control my-4" id="">
                    @if($errors->has('resume'))
                    <div class="error">{{$errors->first('resume')}}</div>
                    @endif
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
            <div class="card my-4">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    <p><strong>Full Name:</strong>  {{Auth::user()->name}}</p>
                    <p>Email:{{Auth::user()->email}}</p>
                    <p>Address:{{Auth::user()->profile->address}}</p>
                    <p>Phone: {{Auth::user()->profile->phone}}</p>
                    <p>Gender::{{Auth::user()->profile->gender}}</p>
                    <p>Experience::{{Auth::user()->profile->experience}}</p>
                    <p>Joined On: {{date('F d Y',strtotime(Auth::user()->created_at))}}</p>

                    @if(!empty(Auth::user()->profile->cover_letter))
                    <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a></p>
                    @else
                    <p>Please upload cover letter</p>
                    @endif

                    @if(!empty(Auth::user()->profile->resume))
                    <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">Resume</a></p>
                    @else
                    <p>Please upload resume</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
