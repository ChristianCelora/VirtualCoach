@extends('layouts.account')

@section('user_content')
<div class="col-md-3 user-menu p-0">
   <ul class="py-2 px-1 mb-0">
      <li><a href="{{ route('user.info') }}"><h4>User info</h4></a></li>
      <li class="active"><a href="{{ route('user.physique') }}"><h4 >Physical info</h4></a></li>
      <li class="disabled"><a href="#"><h4 >---Coming soon---</h4></a></li>
   </ul>
</div>
<div class="col-md-9">
   <div class="w-100 h-100 row font-primary p-3">
      @if(isset($data["pysique_history"]) && !empty($data["pysique_history"]))
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Height</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data["pysique_history"] as $date => $phys_data)
                  <tr>
                     <th scope="row">{{$date}}</td>
                     <td>{{$phys_data["weight"]}}</td>
                     <td>{{$phys_data["height"]}}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      @else
         <div class="w-100 d-flex justify-content-center align-items-center">
            <div class="btn custom-primary-btn" id="show-form-new">
               <i class="fas fa-plus"></i>
            </div>
         </div>
         <div class="w-100 d-flex justify-content-center align-items-center" >
            <form class="form-inline justify-content-center" method="POST" action="{{route('user.addPhysique')}}" id="new-physique-data" style="display:none">
               @csrf
               <div>
                  <div class="col-12 d-flex justify-content-center row mt-1">
                     <input type="text" class="p-2 input-transparent font-primary" name="weight" placeholder="weight" required>
                     <label class="ml-1">Kg</label>
                  </div>
                  <div class="col-12 d-flex justify-content-center row mt-1">
                     <input type="text" class="p-2 input-transparent font-primary" name="height" placeholder="height" required>
                     <label class="ml-1">Cm</label>
                  </div>
                  <div class="col-12 d-flex justify-content-center mt-2">
                     <div id="submit-new-physique" class="btn custom-primary-btn">Save</div>
                  </div>
                  <div class="col-12 d-flex justify-content-start mt-1">
                     <h6>*It is more efficient to track the weight at the same time of the day.</h6>
                  </div>
               </div>
            </form>
         </div>
      @endif
   </div>
</div>
@endsection
