@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
<script src="{{ asset('js/exercise.js') }}" defer></script>
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
                  <form class="my-4" method="POST" id="new-exercise" action="{{ route('exercise.add') }}">
                      @csrf
                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold font-white">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control font-white @error('name') is-invalid @enderror input-transparent" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong class="font-black">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                   </form>

                  <div class="d-flex justify-content-center mt-5 mb-3 d-inline">
                     <div class="mx-auto">
                        <div class="btn custom-secondary-btn mr-2 custom-link" data-location="{{URL::previous()}}">
                           <i class="fas fa-arrow-left"></i><p class="h5">Back</p>
                        </div>
                        <div class="btn custom-primary-btn ml-2" id="form-new-exercise">
                           <i class="fas fa-plus"></i><p class="h5">Add Exercise</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
