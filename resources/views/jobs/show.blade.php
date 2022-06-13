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
                <h2>{{$jobs->title}}</h2> 

          </div>

      <img src="{{asset('hero-job-image.jpg')}}" style="width: 100%;">

          <div class="col-lg-8">
            
            
            <div class="p-4 mb-8 bg-white">
              <!-- icon-book mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i></a></h3>
              <p> {{$jobs->description}}.</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <!--icon-align-left mr-3-->
              <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
              <p>{{$jobs->roles}} .</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-users" style="color: blue;">&nbsp;</i>Number of vacancy</h3>
              <p>{{$jobs->no_of_vacancy }} .</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-clock-o" style="color: blue;">&nbsp;</i>Experience</h3>
              <p>{{$jobs->experience}}&nbsp;years</p>
              
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-venus-mars" style="color: blue;">&nbsp;</i>Gender</h3>
              <p>{{$jobs->gender}} </p>
            </div>
            <div class="p-4 mb-8 bg-white">
              <h3 class="h5 text-black mb-3"><i class="fa fa-dollar" style="color: blue;">&nbsp;</i>Salary</h3>
              <p>{{$jobs->salary}}</p>
            </div>

          </div>

          
            <div class="col-md-4 p-4 site-section bg-light">
              <h3 class="h5 text-black mb-3 text-center">Short Info</h3>
                  <p>Company name: {{$jobs->company->name}}</p>
                <p>Address: {{$jobs->address}}</p>
                    <p>Employment Type: {{$jobs->type}}</p>
                    <p>Position: {{$jobs->position}}</p>
                    <p>Posted: {{$jobs->created_at->diffForHumans()}}</p>
                    <p>Deadline: {{ date('F d, Y', strtotime($jobs->last_date)) }}</p>



              <p><a href="{{route('company.index',[$jobs->company->id,$jobs->company->name])}}" class="btn btn-warning" style="width: 100%;">Visit Company Page</a></p>
              <p>
           

        @if(Auth::check()&&Auth::user()->user_type=='seeker')
            @if(!$jobs->checkApplication())
            <home :jobid={{$jobs->id}}></home>
            @else
            <button class="btn btn-danger my-3" style="width: 100%;">Job Applied</button>
            @endif
            <favourite :jobid={{$jobs->id}} :favourited={{$jobs->checkSaved()?'true':'false'}}></favourite>
            @else
            <a href="{{ route('login') }}"><button class="btn btn-danger my-3" style="width: 100%;">Please login to apply</button></a>
            @endif

              </p>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      <form action="" method="POST">@csrf

      <div class="modal-body">
        <input type="hidden" name="job_id" value="{{$jobs->id}}">
        <input type="hidden" name="job_slug" value="{{$jobs->slug}}">

        <div class="form-goup">
          <label>Your name * </label>
          <input type="text" name="your_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Your email *</label>
          <input type="email" name="your_email" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person name *</label>
          <input type="text" name="friend_name" class="form-control" required="">
        </div>
        <div class="form-goup">
          <label>Person email *</label>
          <input type="email" name="friend_email" class="form-control" required="">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Mail this job</button>
      </div>
    </form>
    </div>
  </div>
</div>
               </div>
       

<br>
<br>
<br>

     </div>
   </div>
@endsection
