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
                  <div class="col-10 offset-1 mt-4">
                     <label class="font-white font-weight-bold h4">Name</label>
                     <ul class="list-group custom-list">
                        @isset($data["exercises"])
                           @php $index = 0; @endphp
                           @foreach ($data["exercises"] as $e)
                              <li class="list-group-item back-transparent font-white">
                                 <div class="float-left"><p class="h5">{{$e["name"]}}</p></div>
                              </li>
                           @endforeach
                        @endisset
                     </ul>
                  </div>

                  <div class="d-flex justify-content-center mb-3">
                     <div class="btn custom-primary-btn mx-auto custom-link" data-location="{{route('exercise.add')}}">
                        <i class="fas fa-plus"></i><p class="h5">Add exercise</p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
@endsection
