@if(Auth::check())
@extends('layouts.main')
@push('title')
<title>Contact Us</title>
@endpush
@section('main-section')
<div class="container p-0 mt-3 col col-md-6">
    <div class="d-none alert alert-success d-flex align-items-center container mt-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="success">

        </div>
    </div>
    <h3 class="text-center text-primary">Contact Us </h3>
<form action ="{{url('/')}}" method="POST" class="border p-2" id="contactform">

    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" id="name"  placeholder="Full Name">
        <span class="text-danger name"></span>
      </div>
      <div class="mb-3">
        <label for="usernumber" class="form-label">Phone Number</label>
        <input type="number" name="usernumber" class="form-control" id="usernumber"  placeholder=" Phone Number">
        <span class="text-danger usernumber"></span>
      </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email"  placeholder="Email">
      <span class="text-danger email"></span>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" name="message" rows="5" placeholder="Leave a message here" id="message"></textarea>
        <span class="text-danger message"></span>
      </div>
    <button type="button" id="contact-us" class="btn btn-primary mr-2">Submit</button>
    <div class="d-none spinner-border mx-auto position-absolute start-25" role="status">
        <span class="visually-hidden ">Loading...</span>
      </div>
</form>
</div>
@endsection
@endif
