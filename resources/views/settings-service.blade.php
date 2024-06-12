@if (Auth::check())
@extends('layouts.main')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/cropper.min.css') }}" rel="stylesheet">

@push('title')
<title>Settings Service</title>
@endpush
@section('main-section')

<link href="{{ asset('css/dataTables.dataTables.min.css') }}" rel="stylesheet">
<div class="container p-0">

    <div class="d-none alert alert-success d-flex align-items-center container mt-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div class="success">

        </div>
    </div>
    <table id="settings-service" class="display border" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>

            </tr>
        </thead>

    </table>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button"  id="addSettingServiceBtnId" class="btn font-bold btn-primary border border-right-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
        <button type="button"id="editSettingServiceBtnId" class="btn btn-primary border border-left-white">Edit</button>
        <button type="button" id="deleteSettingServiceBtnId" class="btn btn-danger border border-left-white">Delete</button>
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Your Services</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="settingsServiceForm" enctype="multipart/form-data">
                <input type="hidden" id="service_id" name="id">

                <input type="hidden" id="image_file" name="image_file">

                <div class="mb-3">
                  <label for="title" class="form-label">Title<sup class="text-danger">*</sup></label>
                  <input type="text" name="title" class="form-control" id="title">
                  <span class="text-danger title"></span>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description<sup class="text-danger">*</sup></label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Leave a description here" id="description"></textarea>
                    <span class="text-danger description"></span>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload file <sup class="text-danger">*</sup></label>
                    <input type="file" name="file" class="form-control" id="file">
                    <span class="text-danger file"></span>
                    <span class="text-danger image_file"></span>
                </div>
                <div class="mb-3 full-image-crop">
                    <img id="image" style="max-width: 100%;">
                </div>

                <div class="mb-3 d-none cropimage">
                    <p>Preview Image:</p>
                    <img id="croppedImage"  src="" alt="Cropped Image">
                </div>
                <div class="d-flex justify-start gap-2">
                    <button type="button"  class="btn btn-danger close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveSettingServiceBtnId" class="btn btn-primary">Save</button>
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

