@if (Auth::check())
@extends('layouts.main')
@push('title')
				<title>Customer</title>
@endpush
@section('main-section')
	<div class="container">
        @if (session('success') !="")
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
          </svg>
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center container mt-2" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div>
                {{session('success')}}
            </div>
        </div>
        @endif
        <h3 class="text-center text-primary">{{$title}}</h3>
        <form action ="{{$url}}" method="POST" class="border p-2">
         @csrf
            <div class="row">
                <div class="mb-3 col">
                    <label for="name" class="form-label ">Name<sup class="text-danger">*</sup></label>
                    <input type="text" name="name" value="{{ $customer->name ==""?old('name'):  $customer->name }}" class="form-control" id="name">
                    @error('name')<span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col">
                    <label for="email" class="form-label ">Email<sup class="text-danger">*</sup></label>
                    <input type="email" name="email" value="{{ $customer->email ==""?old('email'):  $customer->email }}" class="form-control" id="email">
                    @error('email')<span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <label for="timeslot" class="form-label  d-block">Select Time Slot<sup class="text-danger">*</sup></label>
                    <select name="timeslot" id="timeslot" class="w-100 p-1">
                        <option value="">Select slot</option>
                          <option {{ $customer->timeslot ==""?"": "selected" }}  value="Morning">Morning Slot (10:00 am -03:00 pm)</option>
                          <option  {{ $customer->timeslot ==""?"": "selected" }} value="Evening">Evening Slot (03:00 pm -07:00 pm)</option>
                          <option {{ $customer->timeslot ==""?"": "selected" }}  value="Fullday">Full Day</option>
                    </select>
                    @error('timeslot')<span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col">
                    <label for="state" class="form-label ">State<sup class="text-danger">*</sup></label>
                    <input type="text" name="state" class="form-control" id="state" value="{{ $customer->state ==""?old('state'):  $customer->state }}">
                    @error('state')<span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 col">
                            <label for="age" class="form-label ">Age<sup class="text-danger">*</sup></label>
                            <input type="number" name="age" class="form-control" id="age" value="{{ $customer->age ==""?old('age'):  $customer->age }}">
                            @error('age')<span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 ">
                            <label for="address" class="form-label ">Address<sup class="text-danger">*</sup></label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $customer->address ==""?old('address'):  $customer->address }}">
                            @error('address')<span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="gender" class="form-label ">Select gender<sup class="text-danger">*</sup></label>
                            <select name="gender" id="gender" class="w-100 p-1">
                               <option value="">Select gender</option>
                                 <option {{ $customer->gender ==""?"": "selected" }} value="male">Male</option>
                                 <option  {{ $customer->gender ==""?"": "selected" }} value="female">Female</option>
                                 <option  {{ $customer->gender ==""?"": "selected" }} value="other">Other</option>
                           </select>
                            @error('gender')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-3 ">
                            <label for="joindate" class="form-label ">Joining Date<sup class="text-danger">*</sup></label>
                            <input type="date" name="joindate" class="form-control" id="joindate" value="{{ $customer->joindate ==""?old('joindate'):  $customer->joindate }}">
                            @error('joindate')<span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>

            <div class="d-flex justify-center">
                <button type="submit" class="btn btn-primary mx-auto">Submit</button>
                <div class="d-none spinner-border mx-auto position-absolute start-50" role="status">
                    <span class="visually-hidden ">Loading...</span>
                  </div>
           </div>
        </form>
	</div>
@endsection
@endif
