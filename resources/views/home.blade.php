@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-md-12">
            <div class="card transparent-card h-100">
                {{--<div class="card-header"><h3 class="font-weight-bold">Dashboard</h3></div>--}}

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <div class="col-12 h-100 d-flex flex-row align-items-center">

                          {{-- User --}}
                          <div class="col-4 p-0 row justify-content-center home-card font-primary">
                               <div class="card transparent-card">
                                  <div class="card-body d-flex justify-content-center">
                                     <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">User</h3></div>
                                        <div class="m-auto"><i class="fas fa-user fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>

                           {{-- Manage Trainings --}}
                           <div class="col-4 p-0 row justify-content-center home-card font-primary">
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
                          <div class="col-4 p-0 row justify-content-center home-card font-primary">
                               <div class="card transparent-card">
                                  <div class="card-body d-flex justify-content-center">
                                     <div class="d-flex flex-column">
                                        <div class="m-auto"><h3 class="font-weight-bold">Workout!</h3></div>
                                        <div class="m-auto"><i class="fas fa-dumbbell fa-2x"></i></div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                        </div>
                  </div>
               </div>
         </div>
      </div>
</div>
@endsection
