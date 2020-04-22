@extends('layouts.account')

@section('user_content')
<div class="col-md-3 user-menu p-0">
   <ul class="py-2 px-1 mb-0">
      <li class="active"><a href="{{ route('user.info') }}"><h4>User info</h4></a></li>
      @if(Auth::user()->role == "client")
      <li><a href="{{ route('user.physique') }}"><h4 >Physical info</h4></a></li>
      <li><a href="{{ route('user.workoutLogs') }}"><h4 >Workouts complete</h4></a></li>
      @endif
   </ul>
</div>
<div class="col-md-9">
   <div class="row font-primary p-3">
      <div class="col-4"><h4>Name</h4></div>
      <div class="col-8"><h4>{{ Auth::user()->name }}</h4></div>
      <div class="col-4 pt-1"><h4>Email</h4></div>
      <div class="col-8"><h4>{{ Auth::user()->email }}</h4></div>
      <div class="col-4 pt-1"><h4>Password</h4></div>
      <div class="col-8"><h4>******</h4></div>
      <div class="col-4 pt-1"><h4>Created at</h4></div>
      <div class="col-8"><h4>{{ Auth::user()->created_at }}</h4></div>
   </div>
</div>

@endsection
