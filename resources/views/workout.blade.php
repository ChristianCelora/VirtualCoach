@extends('layouts.app')

@section('scripts')
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
                        <div class="btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button" id="start-workout"
                              data-location="{{ route('training.prepWorkout' , ["training_id" => $data["workout"], "step" => $data["step"]+1] )  }}">
                           <label class="font-weight-bold center">Start</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @else
            @isset ($data["exercise"])
               @php $exercise = $data["exercise"] @endphp
               <div class="card transparent-card user-card" id="step-{{$data["step"]}}" >
                  {{-- Exercise card --}}
                  <div class="card-header d-flex align-items-start">
                     <h3 class="font-weight-bold">
                        #{{$data["step"]}} - {{$exercise["name"]}}
                     </h3>
                  </div>

                  <div class="card-body h-100 d-flex justify-content-center align-items-center">
                     <div class="row">
                        <div class="col-10 offset-1 font-white">
                           Reps: {{$exercise["reps"]}}
                        </div>

                        <div class="col-12">
                           <div class="btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 show-rest" type="button" data-step="{{$data["step"]}}">
                              <label class="font-weight-bold center">Next</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               {{-- Rest card --}}
               @isset($exercise["rest"])
                  <div class="card transparent-card user-card" id="rest-{{$data["step"]}}" style="display:none">
                     <div class="card-header d-flex align-items-start">
                        <h3 class="font-weight-bold">
                           Rest
                        </h3>
                     </div>

                     <div class="card-body h-100 d-flex justify-content-center align-items-center">
                        <div class="row">
                           <div class="col-10 offset-1 font-white">
                              <div class="timer" id="timer-{{$data["step"]}}" data-second="{{$exercise["rest"]}}">
                                 <span class="minutes">00</span> : <span class="seconds">00</span>
                             </div>
                           </div>
                           <div class="col-12">
                              <div class="btn custom-primary-btn custom-collapse my-5 px-4 pt-2 pb-1 custom-link" type="button"
                                    data-location="{{ route('training.prepWorkout', ["training_id" => $data["workout"], "step" => $data["step"]+1 ]) }}">
                                 <label class="font-weight-bold center">Next</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endisset
            @endisset
         @endif
      </div>
   </div>
@endsection
