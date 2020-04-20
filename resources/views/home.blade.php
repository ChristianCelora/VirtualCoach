@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
<div class="container" style="min-height: 80vh;">
    <div class="row" style="min-height: 80vh;">
        <div class="col-md-12">
            <div class="card transparent-card h-100">
                {{--<div class="card-header"><h3 class="font-weight-bold">Dashboard</h3></div>--}}
                {{-- Test --}}
                @if(session()->has('active_workout'))
                   <div class="alert alert-primary" role="alert">
                     active workout:
                     {{ print_r(session('active_workout')) }}
                   </div>
               @endif
                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="col-12 h-100 px-auto d-flex flex-md-row flex-column align-items-center justify-content-center">

                          {{-- User --}}
                          <div class="col-md-4 w-100 px-0 py-2 row my-2 align-content-stretch justify-content-center home-card custom-link font-primary" data-location="{{ route('user.info') }}">
                               <div class="card transparent-card">
                                  <div class="card-body d-flex justify-content-center">
                                     <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">User</h3></div>
                                        <div class="m-auto"><i class="fas fa-user fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                           @if(Auth::user()->role == "client")
                           {{-- Manage Trainings --}}
                           <div class="col-md-4 w-100 px-0 py-2 row my-2 align-content-stretch justify-content-center home-card custom-link font-primary" data-location="{{ route('training.get') }}">
                                <div class="card transparent-card">
                                   <div class="card-body d-flex justify-content-center">
                                      <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">Manage Trainings</h3></div>
                                        <div class="m-auto"><i class="fas fa-clipboard-list fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>

                           {{-- Work out --}}
                          <div class="col-md-4 w-100 px-0 py-2 row my-2 align-content-stretch justify-content-center home-card custom-link font-primary" data-location="{{ route('training.workout') }}">
                               <div class="card transparent-card">
                                  <div class="card-body d-flex justify-content-center">
                                     <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">Workout!</h3></div>
                                        <div class="m-auto"><i class="fas fa-dumbbell fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                        @elseif(Auth::user()->role == "trainer")
                           {{-- Manage Exercises --}}
                           <div class="col-md-4 w-100 px-0 py-2 row my-2 align-content-stretch justify-content-center home-card custom-link font-primary" data-location="{{ route('exercise.get') }}">
                                <div class="card transparent-card">
                                   <div class="card-body d-flex justify-content-center">
                                      <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">Manage Exercises</h3></div>
                                        <div class="m-auto"><i class="fas fa-clipboard-list fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                           {{-- Manage Clients --}}
                           <div class="col-md-4 w-100 px-0 py-2 row my-2 align-content-stretch justify-content-center home-card custom-link font-primary" data-location="{{ route('user.clients') }}">
                                <div class="card transparent-card">
                                   <div class="card-body d-flex justify-content-center">
                                      <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">Manage Clients</h3></div>
                                        <div class="m-auto"><i class="fas fa-address-book fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                        @endif
                        </div>
                  </div>
               </div>
         </div>
      </div>
</div>
@endsection
