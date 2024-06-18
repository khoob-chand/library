@extends('layouts.main')
@push('title')
<title>Services</title>
@endpush
@section('main-section')
<div class="container  border py-2 mt-3">
    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
              <h2 class="mb-4 display-6 text-center">The Only <span class="text-primary fw-bold">Smart Library</span><span class="p-2">FOR ASPIRANTS</span></h2>
              <p class="text-secondary mb-5 text-center fs-4 fw-bold"></p>
              <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="container-fluid">
                <div class="row gy-3 gy-md-4">
                @foreach ( $services as $services )
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <img src="{{asset($services->image_path)}}" alt="services_image"style="width:90px;">
                        <h4 class="mb-4">{{$services->title}}</h4>
                        <p class="mb-4 text-secondary"> {{$services->description}}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection
