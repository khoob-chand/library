@extends('layouts.main')
@section('main-section')
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
								integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


				<form action="{{ url('/') }}/register" method="post">
						@csrf
					<div class="container col col-md-6 mx-auto border ">
						<h3 class="text-primary text-center">User Registration form </h3>
                        @if ($errors->has('error'))
                            <p class="text-danger text-center">
                                 <strong>{{ $errors->first('error') }}</strong>
                            </p>
                        @endif
						<x-input type="text" name="name" label="Enter Your Name" id="uname" />
						<x-input type="email" name="email" label="Enter Your email" id="uemail"/>
						<x-input type="password" name="password" label="Enter Your password" id="password"/>
						<x-input type="password" name="cpassword" label="Confirm Password" id="cpassword"/>
						<button class="btn btn-primary">Submit</button>
                        <div class="d-none spinner-border mx-auto position-absolute start-25" role="status">
                            <span class="visually-hidden ">Loading...</span>
                          </div>
					</div>
				</form>
@endsection
