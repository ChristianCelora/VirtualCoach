@extends('layouts.account')

@section('user_content')
<div class="col-md-3 user-menu p-0">
   <ul class="py-2 px-1 mb-0">
      <li><a href="{{ route('user.info') }}"><h4>User info</h4></a></li>
      <li><a href="{{ route('user.physique') }}"><h4 >Physical info</h4></a></li>
      <li class="active"><a href="{{ route('user.workoutLogs') }}"><h4 >Workouts complete</h4></a></li>
      <li class="disabled"><a href="#"><h4 >---Coming soon---</h4></a></li>
   </ul>
</div>
<div class="col-md-9">
   <div class="w-100 h-100 row font-primary p-3">
      @if(isset($data["workout_history"]) && !empty($data["workout_history"]))
         <table class="table">
            <thead class="font-primary">
               <tr class="font-weight-bold">
                  <th scope="col">Name</th>
                  <th scope="col">Start</th>
                  <th scope="col">End</th>
               </tr>
            </thead>
            <tbody class="font-third">
               @foreach ($data["workout_history"] as $date => $phys_data)
                  <tr>
                     <td>{{$phys_data["name"]}}</td>
                     <td>{{$phys_data["start"]}}</td>
                     <td>{{$phys_data["end"]}}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      @else
         <div class="font-white">
            No workout records yet.
            <a class="font-primary" style="text-decoration:underline" href="{{ route('training.workout') }}">start one now!</a>
         </div>
      @endif
   </div>
</div>
@endsection
