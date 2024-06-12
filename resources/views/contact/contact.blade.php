

<div class="alert alert-success d-flex align-items-center container mt-2" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div class="mb-3">
        <p>{{$name}}</p>
        <p>{{$email}}</p>
        <p>{{$usernumber}}</p>
        <p>{!! nl2br(e($data['message'])) !!}</p>
        <p>Thanks & Regards</p>
        <p>{{$name}}</p>
    </div>
 </div>


