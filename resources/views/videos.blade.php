@extends('layouts.main')
@push('title')
<title>Videos</title>
@endpush
@section('main-section')
<div class="container  mt-3">
    <a href="https://m.youtube.com/watch?v=pH9ZCFy8ZUs" data-fancybox="gallery">
        <img src="{{ asset('motivation_images/1.jpg') }}"  width="200" height="150" alt="...">

      </a>

      <a href="https://m.youtube.com/watch?v=pH9ZCFy8ZUs" data-fancybox="gallery">
        <img src="{{ asset('motivation_images/2.jpg') }}" width="200" height="150"  alt="...">

      </a>

      <a href="https://m.youtube.com/watch?v=pH9ZCFy8ZUs" data-fancybox="gallery">
        <img src="{{ asset('motivation_images/4.jpg') }}" width="200" height="150"   alt="...">

      </a>

</div>
@endsection
