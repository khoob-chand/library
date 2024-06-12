
@extends('layouts.main')
@section('main-section')

@if($msg!="")
<div class="alert alert-success d-flex align-items-center container mt-2" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
     {{$msg}}
    </div>

 </div>
 @endif
@endsection
