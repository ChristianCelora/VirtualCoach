@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
<script src="{{ asset('js/workout.js') }}" defer></script>
@endsection

@section('content')
   <div class="container h-100">
      <div class="mt-4 d-flex justify-content-center align-items-stretch">
         @if( $data["step"] == 0)
            <div class="card transparent-card user-card" id="card-start">

               <div class="card-header d-flex align-items-start">
                  <h3 class="font-weight-bold">
                  @isset($data["title"])
                     {{$data["title"]}}
                  @endisset
                  </h3>
               </div>

               <div class="card-body h-100 d-flex justify-content-center align-items-center">
                  <div class="row">
                     <div class="col-12">
                        @if( isset($data["workout"]) && isset($data["step"]))
                           <div class="btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button" id="start-workout"
                                 data-location="{{ route("training.prepWorkout" , ["training_id" => $data["workout"], "step" => $data["step"]+1] )  }}">
                              <label class="font-weight-bold center">Start</label>
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         @else
            @if (isset($data["exercise"]) && !isset($data["exercise"]["last"]))
               @php $exercise = $data["exercise"] @endphp
               <div class="card transparent-card user-card" id="step-{{$data["step"]}}" >
                  {{-- Exercise card --}}
                  <div class="card-header d-flex align-items-start">
                     <h3 class="font-weight-bold">
                        #{{$data["step"]}} - {{$exercise["name"]}}
                     </h3>
                  </div>

                  <div class="card-body h-100 d-flex justify-content-center align-items-center">
                     <div class="row w-100">
                        <div class="col-8 offset-2 font-white h4">
                           <ul class="list-group custom-list">
                              <li class="list-group-item back-transparent float-left">Reps: {{$exercise["reps"]}}</li>
                              <li class="list-group-item back-transparent float-left">Current set: {{$exercise["set_n"]}} of {{$exercise["total_set"]}}</li>
                              @isset($exercise["trainer_notes"])
                                 <li class="list-group-item back-transparent float-left">Trainer tips: {{$exercise["trainer_notes"]}}</li>
                              @endisset
                              @if(isset($exercise["client_notes"]))
                                 <li class="list-group-item back-transparent float-left">Your notes: {{$exercise["client_notes"]}}</li>
                              @else
                                 <li class="list-group-item back-transparent float-left">
                                    <form id="add-note" method="POST" action="{{route("training.addTrainingNote")}}">
                                       @csrf
                                       <input type="hidden" name="training" value="{{$data["workout"]}}">
                                       <input type="hidden" name="exercise" value="{{$exercise["id"]}}">
                                       Your notes: <br/>
                                       <input class="input-transparent font-white" type="textarea" name="notes">
                                       <div id="add-note-form" class="btn custom-secondary-btn">
                                          <i class="fas fa-edit"></i>
                                       </div>
                                    <form>
                                 </li>
                              @endif
                           </ul>
                        </div>
                        @if(isset($exercise["rest"]))
                           <div class="col-8 offset-2 btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 show-rest" type="button" data-step="{{$data["step"]}}">
                              <label class="font-weight-bold center">Done</label>
                           </div>
                        @else
                           <div class="col-8 offset-2 btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button" id="end-rest"
                                 data-location="{{ route("training.prepWorkout", ["training_id" => $data["workout"], "step" => $data["step"]+1 ]) }}">
                              <label class="font-weight-bold center">Next exercise</label>
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
               {{-- Rest card --}}
               @isset($exercise["rest"])
                  <div class="card transparent-card user-card" id="rest-{{$data["step"]}}" style="display:none">
                     <div class="card-header card-header-white d-flex align-items-start">
                        <h3 class="font-weight-bold">
                           Rest
                        </h3>
                     </div>

                     <div class="card-body h-100 d-flex justify-content-center align-items-center">
                        <div class="row w-100">
                           <div class="col-8 offset-2 font-white text-center">
                              <div class="timer font-jumbo" id="timer-{{$data["step"]}}" data-second="{{$exercise["rest"]}}">
                                 <div class="minutes d-inline">00</div> : <div class="seconds d-inline">00</div>
                             </div>
                           </div>

                           <div class="col-8 offset-2 btn custom-secondary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button" id="end-rest"
                                 data-location="{{ route("training.prepWorkout", ["training_id" => $data["workout"], "step" => $data["step"]+1 ]) }}">
                              <label class="font-weight-bold center">Next exercise</label>
                           </div>
                        </div>
                     </div>
                  </div>
               @endisset
            @else
               @isset($data["exercise"]["last"])
                  <div class="card transparent-card user-card" id="finish-card">
                     <div class="card-header card-header-white d-flex align-items-start">
                        <h3 class="font-weight-bold">
                           Well Done!
                        </h3>
                     </div>

                     <div class="card-body h-100 d-flex justify-content-center align-items-center">
                        <div class="row w-100">
                           <div class="col-8 offset-2 btn custom-secondary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button" id="end-rest"
                                 data-location="{{ route("training.endWorkout", ["training_id" => $data["workout"]]) }}">
                              <label class="font-weight-bold center">Finish</label>
                           </div>
                        </div>
                     </div>
                  </div>
               @endisset
            @endif
         @endif
      </div>
   </div>
@endsection
