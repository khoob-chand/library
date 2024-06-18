@if (Auth::check())
@extends('layouts.main')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

@push('title')
<title>Customer details</title>
@endpush
@section('main-section')
<p>

</p>
<link href="{{ asset('css/dataTables.dataTables.min.css') }}" rel="stylesheet">
<div class="container p-0">
<div class="row">
    <div class="mb-3 col-md-3">
        <label for="studentSlot" class="form-label  d-block">Choose Student TimeSlot<sup class="text-danger">*</sup></label>
        <select name="studentSlot" id="studentSlot" class="w-100 p-1">
            <option value="all">Select slot</option>
              <option  value="Morning">Morning Slot (10:00 am -03:00 pm)</option>
              <option  value="Evening">Evening Slot (03:00 pm -07:00 pm)</option>
              <option   value="Fullday">Full Day</option>
        </select>
        @error('timeslot')<span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="mb-3 col-md-3">
        <label for="studentFess" class="form-label  d-block">Choose Seat no<sup class="text-danger">*</sup></label>
        <select name="studentFess" id="studentFess" class="w-100 p-1">
            <option value="0">Select Seat</option>
              <option  value="1">1</option>
              <option  value="2">2</option>
              <option   value="3">3</option>
        </select>
        @error('timeslot')<span class="text-danger">{{$message}}</span> @enderror
    </div>
</div>



    <table id="student" class="display border" style="width:100%">
        <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>state</th>
                <th>address</th>
                <th>Timeslot</th>
                <th>Seat No.</th>

            </tr>
        </thead>

    </table>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button"  id="addstudentbtnid" class="btn font-bold btn-primary border border-right-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
        <button type="button"id="editstudentbtnid" class="btn btn-primary border border-left-white">Edit</button>
        <button type="button" id="delete_student" class="btn btn-danger border border-left-white">Delete</button>
    </div>
</div>

{{-- ADD student details Modal
     --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary" id="studentModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action ="{{url('/')}}/customer" method="POST" class="border p-2" id="studentform">
                @csrf

                    <input type="hidden" name="id" class="form-control" id="student_id">
                   <div class="row">
                       <div class="mb-3 col">
                           <label for="name" class="form-label fw-bold">Name<sup class="text-danger">*</sup></label>
                           <input type="text" name="name" value="{{ $customer->name ==""?old('name'):  $customer->name }}" class="form-control" id="name">
                          <span class="text-danger name"></span>
                       </div>
                       <div class="mb-3 col">
                           <label for="email" class="form-label fw-bold">Email<sup class="text-danger">*</sup></label>
                           <input type="email" name="email" value="{{ $customer->email ==""?old('email'):  $customer->email }}" class="form-control" id="email">
                          <span class="text-danger email"></span>
                       </div>
                   </div>

                   <div class="row">
                       <div class="mb-3 col">
                           <label for="timeslot" class="form-label fw-bold d-block">Select Time Slot<sup class="text-danger">*</sup></label>
                           <select name="timeslot" id="timeslot" class="w-100 p-1">
                               <option value="1">Select slot</option>
                                 <option {{ $customer->timeslot ==""?"": "selected" }}  value="Morning">Morning Slot (10:00 am -03:00 pm)</option>
                                 <option  {{ $customer->timeslot ==""?"": "selected" }} value="Evening">Evening Slot (03:00 pm -07:00 pm)</option>
                                 <option {{ $customer->timeslot ==""?"": "selected" }}  value="Fullday">Full Day</option>
                           </select>
                         <span class="text-danger timeslot"></span>
                       </div>
                       <div class="mb-3 col">
                           <label for="state" class="form-label fw-bold">State<sup class="text-danger">*</sup></label>
                           <input type="text" name="state" class="form-control" id="state" value="{{ $customer->state ==""?old('state'):  $customer->state }}">
                       <span class="text-danger state"></span>
                       </div>
                   </div>
                       <div class="row">
                           <div class="col">
                               <div class="mb-3 col">
                                   <label for="age" class="form-label fw-bold">Age<sup class="text-danger">*</sup></label>
                                   <input type="number" name="age" class="form-control" id="age" value="{{ $customer->age ==""?old('age'):  $customer->age }}">
                                  <span class="text-danger age"></span>
                               </div>
                           </div>
                           <div class="col">
                               <div class="mb-3 ">
                                   <label for="address" class="form-label fw-bold">Address<sup class="text-danger">*</sup></label>
                                   <input type="text" name="address" class="form-control" id="address" value="{{ $customer->address ==""?old('address'):  $customer->address }}">
                             <span class="text-danger address"></span>
                               </div>
                           </div>

                       </div>
                       <div class="row">
                           <div class="col">
                               <div class="mb-3">
                                   <label for="gender" class="form-label fw-bold">Select gender<sup class="text-danger">*</sup></label>
                                   <select name="gender" id="gender" class="w-100 p-1">
                                      <option value="">Select gender</option>
                                        <option {{ $customer->gender ==""?"": "selected" }} value="male">Male</option>
                                        <option  {{ $customer->gender ==""?"": "selected" }} value="female">Female</option>
                                        <option  {{ $customer->gender ==""?"": "selected" }} value="other">Other</option>
                                  </select>
                                  <span class="text-danger gender"></span>
                               </div>

                           </div>
                           <div class="col">
                               <div class="mb-3 ">
                                   <label for="joindate" class="form-label fw-bold">Joining Date<sup class="text-danger">*</sup></label>
                                   <input type="date" name="joindate" class="form-control" id="joindate" value="{{ $customer->joindate ==""?old('joindate'):  $customer->joindate }}">
                                   <span class="text-danger joindate"></span>
                               </div>
                           </div>
                       </div>
                       <div class=" d-flex justify-start gap-2">
                        <button type="button" class="btn btn-primary" id="savestudent">Save Student</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <div class="d-none spinner-border mx-auto position-absolute start-50 " role="status">
                            <span class="visually-hidden ">Loading...</span>
                          </div>
                      </div>
               </form>
        </div>

      </div>
    </div>
  </div>
@endsection
@endif
