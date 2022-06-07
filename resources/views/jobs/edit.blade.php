@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card-header">Update a Job</div>
                <div class="card-body">
                    <form action="{{route('jobs.update',[$jobs->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter job title" class="form-control form-control @error('title') is-invalid @enderror" value="{{$jobs->title}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="description">Desription</label>
                            <textarea name="description" id="desription" class="form-control form-control @error('description') is-invalid @enderror" value="{{$jobs->description}}" cols="30" rows="10">{{$jobs->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="role">Roles:</label>
                            <textarea name="roles" id="roles" class="form-control form-control @error('roles') is-invalid @enderror" value="{{$jobs->roles}}" cols="30" rows="10">{{$jobs->description}}</textarea>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                @foreach(App\Models\Category::all() as $cat)
                                <option value="{{$cat->id}}"{{$cat->id==$jobs->category_id?'selected':''}} class="form-control">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="position">Position: </label>
                            <input type="text" name="position" id="position" placeholder="Enter job position" class="form-control form-control @error('position') is-invalid @enderror" value="{{$jobs->position}}">
                            @error('position')')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="address">Address: </label>
                            <input type="text" name="address" id="address" placeholder="Enter address" class="form-control form-control @error('address') is-invalid @enderror" value="{{$jobs->address}}">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="type">Employee Type: </label>
                            <select name="type" class="form-control" id="">
                                <option value="fulltime"{{$jobs->type=='fulltime'?'selected':''}}>Full Time</option>
                                <option value="parttime"{{$jobs->type=='parttime'?'selected':''}}>Part Time</option>
                                <option value="freelance"{{$jobs->type=='freelance'?'selected':''}}>Freelance</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="vacancy">No of vacancy: </label>
                            <input type="text" name="no_of_vacancy" id="no_of_vacancy" placeholder="Enter number of vacancy" class="form-control form-control @error('no_of_vacancy') is-invalid @enderror" value="{{$jobs->no_of_vacancy}}">
                            @error('no_of_vacancy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="status">Status: </label>
                            <select name="status" class="form-control" id="status">
                                <option value="1"{{$jobs->status=='1'?'selected':''}}>Live</option>
                                <option value="0"{{$jobs->status=='0'?'selected':''}}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="lastdate">Last Date:</label>
                            <input type="text" value="{{$jobs->last_date}}" name="last_date" id="datepicker" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success my-3">Post Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
