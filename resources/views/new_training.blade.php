@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/training.js') }}" defer></script>
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
               <div class="container font-white">

                  <form class="my-4" method="POST" action="{{ route('register') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Name') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control font-white @error('name') is-invalid @enderror input-transparent font-black" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong class="font-black">{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row container">
                        <table class="table font-white">
                           <thead>
                              <tr>
                                 <th colspan=5>Exercises</th>
                              </tr>
                              <tr>
                                 <th scope="col">Order</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Sets</th>
                                 <th scope="col">Reps</th>
                                 <th scope="col">Rest</th>
                              </tr>
                           </thead>
                           <tbody id="exercises">
                              <tr id="clonable">
                                 <td class="order-col">1</td>
                                 <td>
                                    <select class="custom-select custom-select-transparent" name="exercise[]">
                                       <option value="">--</option>
                                       @foreach ($data["exercises"] as $id => $name)
                                          <option value="{{$id}}">{{$name}}</option>
                                       @endforeach
                                    </select>
                                 </td>
                                 <td><input type="text" class="input-transparent border-white form-control font-white" name="set[]"></td>
                                 <td><input type="text" class="input-transparent border-white form-control font-white" name="reps[]"></td>
                                 <td><input type="text" class="input-transparent border-white form-control font-white" name="rest[]"></td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="btn col-6 offset-3 custom-secondary-btn custom-link" id="add-exercise" >
                           <i class="fas fa-plus"></i><p class="h5">add exercise</p>
                        </div>
                      </div>
                  </form>

                  <div class="d-flex justify-content-center mt-5 mb-3 d-inline">
                     <div class="mx-auto">
                        <div class="btn custom-secondary-btn mr-2 custom-link" data-location="{{route('back')}}">
                           <i class="fas fa-arrow-left"></i><p class="h5">Back</p>
                        </div>
                        <div class="btn custom-primary-btn ml-2 custom-link" data-location="{{route('back')}}">
                           <i class="fas fa-plus"></i><p class="h5">Add training</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
