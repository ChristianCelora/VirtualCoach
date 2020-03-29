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
                        @foreach ($data["trainings"] as $t)
                           <li class="list-group-item back-transparent font-primary">
                              <div class="float-left"><p class="h4">{{$t["name"]}}</p></div>
                              <div class="btn custom-primary-btn float-right custom-collapse" type="button" data-target="#collapse{{$index}}"
                                 data-index="{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}">
                                 <i id="plus-sign-{{$index}}" class="fas fa-plus"></i>
                                 <i id="minus-sign-{{$index}}" class="fas fa-minus hide"></i>
                              </div>
                           </li>
                           <div id="collapse{{$index}}" class="collapse container font-white">
                              {{$t["notes"]}}
                           </div>
                           <li class="separator"></li>
                         @php $index++; @endphp
                        @endforeach
                     @endisset
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
