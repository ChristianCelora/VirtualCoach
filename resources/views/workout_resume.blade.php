@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
   <div class="container h-100">
      <div class="mt-4 d-flex justify-content-center align-items-stretch">
            <div class="card transparent-card user-card" id="card-start">

               <div class="card-body h-100 d-flex justify-content-center align-items-center">
                  <div class="row mt-5">
                     <div class="col-12 h4 font-white text-center">
                        Workout not finished. Do you mant to resume it?
                     </div>
                     @if( isset($data["workout"]) && isset($data["step"]))
                     <div class="col-12 font-white d-flex justify-content-center align-items-center">
                        <div class="btn custom-secondary-btn custom-collapse mr-2 my-5 px-4 pt-2 pb-1 custom-link" type="button" id="start-workout"
                              data-location="{{ route("training.cancelWorkout" , ["training_id" => $data["workout"]] )  }}">
                           <i class="fas fa-times" style="margin-right:15px"></i>
                           <label class="font-weight-bold center">Cancel</label>
                        </div>
                        <div class="btn custom-primary-btn custom-collapse ml-2 my-5 px-4 pt-2 pb-1 custom-link" type="button" id="start-workout"
                              data-location="{{ route("training.prepWorkout" , ["training_id" => $data["workout"], "step" => $data["step"]] )  }}">
                           <label class="font-weight-bold center">Resume</label>
                           <i class="fas fa-arrow-right" style="margin-left:15px"></i>
                        </div>
                     </div>
                     @endif
                  </div>

               </div>
            </div>

         </div>
      </div>
@endsection
