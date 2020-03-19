@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @if($errors->any())
        <div class="row collapse">
            <ul class="alert-box warning radius">
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card transparent-card">
                <div class="card-header"><h3 class="font-primary font-weight-bold">{{ __('Register') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input-transparent" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="font-black">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-transparent" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback " role="alert">
                                        <strong class="font-black">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-transparent" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback " role="alert">
                                        <strong class="font-black">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input-transparent" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 d-flex flex-row-reverse">

                               <div class="col-md-10 d-inline-flex btn-group" data-toggle="buttons">
                                  <label for="role" class="align-middle btn active">

                                     <span class="font-weight-bold"> Are you a trainer? </span>
                                     <input id="role" type="checkbox" name="role" class="custom-check ml-5" value="trainer">
                                     <i class="far fa-square fa-2x"></i><i class="far fa-check-square fa-2x"></i>
                                  </label>
                               </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
