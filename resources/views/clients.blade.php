@extends('layouts.app')

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
                  <table class="col-10 offset-1 table font-white table-borderless">
                     <thead class="font-primary">
                         <tr>
                           <th scope="col">Name</th>
                           <th scope="col">Created date</th>
                         </tr>
                     </thead>
                     <tbody>
                     @isset($data["clients"])
                        @foreach ($data["clients"] as $c)
                           <tr>
                              <td>{{$c["name"]}}</td>
                              <td>{{$c["created"]}}</td>
                           </tr>
                        @endforeach
                     @endisset
                     </tbody>
                  </table>
               </div>
            </div>

         </div>
      </div>
   </div>
@endsection
