@extends('layouts.main')
@push('title')
<title>Login</title>
@endpush
@section('main-section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <form action="{{ url('/') }}/login" method="post">

    @csrf
    <div class="container col col-md-6 mx-auto   border py-2 mt-3">
        <h3 class="text-primary text-center">User Login form </h3>
        @if ($errors->has('error'))
            <p class="text-danger text-center">
                <strong>{{ $errors->first('error') }}</strong>
            </p>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
            @error('email')<span class="text-danger">{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
            @error('password')<span class="text-danger">{{$message}}</span> @enderror
        </div>
    <div class="g-recaptcha mt-4 mb-3"  data-type="image" data-sitekey={{config('services.recaptcha.key')}}></div>

        <div class="mb-3">
           <button type="submit" id="submit-login" class="btn btn-primary w-100">Login</button>
           <div class="d-none spinner-border mx-auto position-absolute start-50" role="status">
            <span class="visually-hidden ">Loading...</span>
          </div>
        </div>
        <a href="{{url('/')}}/register" class="mt-2">Haven't  Register ? Register now </a>
    </div>
 </form>

@endsection

