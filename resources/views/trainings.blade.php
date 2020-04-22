@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
   <div class="container h-100">
      <div class="mt-4 d-flex justify-content-center align-items-stretch">
         <div class="card transparent-card user-card">

            <div class="card-header d-flex align-items-start">
               <h3 class="font-weight-bold">
               @isset($data["title"])
                  {{$data["title"]}}
               @endisset
               </h3>
            </div>

            <div class="card-body p-0 d-flex">
               <div class="container">
                  <ul class="col-12 list-group custom-list">
                     @isset($data["trainings"])
                        @php $index = 0; @endphp
                        @foreach ($data["trainings"] as $id => $t)
                           <li class="list-group-item back-transparent font-primary">
                              <div class="float-left"><p class="h4">{{$t["name"]}}</p></div>
                              <div class="float-right">
                                 <div class="btn custom-primary-btn custom-collapse" type="button" data-target="#collapse{{$index}}"
                                    data-index="{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}">
                                    <i id="plus-sign-{{$index}}" class="fas fa-caret-down"></i>
                                    <i id="minus-sign-{{$index}}" class="fas fa-caret-up hide"></i>
                                 </div>
                                 @if($data["workout"] == 1)
                                    {{-- if some workout is active  --}}
                                    @if(session()->has('active_workout'))
                                       <div class="btn custom-secondary-btn custom-link" type="button" data-location="{{ route('training.resume', ['active_workout' => session('active_workout')]) }}" >
                                          <i class="fas fa-arrow-right"></i>
                                       </div>
                                    @else
                                       <div class="btn custom-secondary-btn custom-link" type="button" data-location="{{ route('training.prepWorkout', ["training_id" => $id, "step" => 1]) }}" >
                                          <i class="fas fa-arrow-right"></i>
                                       </div>
                                    @endif
                                 @endif
                              </div>
                           </li>
                           <div id="collapse{{$index}}" class="collapse container font-white">
                              <div class="col-12"><p class="h5">Notes: {{$t["notes"]}}</p></div>
                              <div class="col-8 offset-2 d-flex justify-content-center">
                                 <table class="table font-white">
                                    <thead>
                                       <tr>
                                          <th scope="col">Name</th>
                                          <th scope="col">Sets x Reps</th>
                                          <th scope="col">Rest</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($t["exercises"] as $exercise)
                                          <tr>
                                             <td>{{$exercise["name"]}}</td>
                                             <td>{{$exercise["sets"]." x ".$exercise["reps"]}}</td>
                                             <td>{{$exercise["rest"]}}</td>
                                          </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <li class="separator"></li>
                         @php $index++; @endphp
                        @endforeach
                     @endisset
                  </ul>
                  @if($data["workout"] == 0)
                     <div class="d-flex justify-content-center mb-3">
                        <div class="btn custom-primary-btn mx-auto custom-link" data-location="{{route('training.addForm', ['user_id' => $data['user']]) }}">
                           <i class="fas fa-plus"></i><p class="h5">New training</p>
                        </div>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
