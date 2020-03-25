@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/account.js') }}" defer></script>
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
            @yield('user_content')
         </div>
      </div>
   </div>
</div>
@endsection
