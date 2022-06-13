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
                <div class="card-header">Create a Job</div>
                <div class="card-body">
                    <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter job title" class="form-control form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="description">Desription</label>
                            <textarea name="description" id="desription" class="form-control form-control @error('description') is-invalid @enderror" value="{{old('description')}}" cols="30" rows="10">{{old('description')}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="role">Roles:</label>
                            <textarea name="roles" id="roles" class="form-control form-control @error('roles') is-invalid @enderror" value="{{old('roles')}}" cols="30" rows="10">{{old('roles')}}</textarea>
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
                                <option value="{{$cat->id}}" class="form-control">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="position">Position: </label>
                            <input type="text" name="position" id="position" placeholder="Enter job position" class="form-control form-control @error('position') is-invalid @enderror" value="{{old('position')}}">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="address">Address: </label>
                            <input type="text" name="address" id="address" placeholder="Enter address" class="form-control form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="experience_year">Experience Year</label>
                            <input type="text" name="experience_year" id="experience_year" placeholder="Enter experience period" class="form-control form-control @error('experience_year') is-invalid @enderror" value="{{old('experience_year')}}">
                            @error('experience_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="gender">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="gender" id="male" value="male"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" id="female" value="female"> Female &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" id="other" value="both"> Both

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group my-3">
                            <label for="type">Employee Type: </label>
                            <select name="type" class="form-control" id="">
                                <option value="fulltime">Full Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="vacancy">No of vacancy: </label>
                            <input type="text" name="no_of_vacancy" id="no_of_vacancy" placeholder="Enter number of vacancy" class="form-control form-control @error('no_of_vacancy') is-invalid @enderror" value="{{old('no_of_vacancy')}}">
                            @error('no_of_vacancy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="vacancy">Salary: </label>
                            <input type="text" name="salary" id="salary" placeholder="Enter salary" class="form-control form-control @error('salary') is-invalid @enderror" value="{{old('salary')}}">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="status">Status: </label>
                            <select name="status" class="form-control" id="status">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="lastdate">Last Date:</label>
                            <input type="text" name="last_date" id="datepicker" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success my-3">Post Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
