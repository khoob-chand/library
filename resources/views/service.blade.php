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
                  {{-- <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-clipboard-check-fill text-primary mb-4" viewBox="0 0 400 500"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                        <h4 class="mb-4">Locker Facility</h4>
                        <p class="mb-4 text-secondary"  >Safe and Secure place to store personal belongings while utilizing library resources.</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-diamond-half text-primary mb-4" viewBox="0 0 640 512"><path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                        <h4 class="mb-4">Free Wifi</h4>
                        <p class="mb-4 text-secondary" >Access to high-speed free Wi-Fi connectivity in libraries.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="48" height="48" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 8.661 49.789 h 72.677 c 1.194 0 2.161 -0.968 2.161 -2.161 v -19.48 c 0 -1.194 -0.968 -2.161 -2.161 -2.161 H 8.661 c -1.194 0 -2.161 0.968 -2.161 2.161 v 19.48 C 6.5 48.821 7.468 49.789 8.661 49.789 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(248,218,127); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 84.542 19.486 H 5.458 C 2.448 19.486 0 21.934 0 24.944 v 25.887 c 0 3.01 2.448 5.458 5.458 5.458 h 6.362 h 66.361 h 6.361 c 3.01 0 5.458 -2.448 5.458 -5.458 V 24.944 C 90 21.934 87.552 19.486 84.542 19.486 z M 12.82 54.289 V 41.863 h 64.361 v 5.213 H 19.239 c -0.552 0 -1 0.447 -1 1 s 0.448 1 1 1 h 57.942 v 5.213 H 12.82 z M 88 50.831 c 0 1.907 -1.551 3.458 -3.458 3.458 h -5.361 V 40.863 c 0 -0.552 -0.447 -1 -1 -1 H 11.82 c -0.552 0 -1 0.448 -1 1 v 13.426 H 5.458 C 3.551 54.289 2 52.738 2 50.831 V 24.944 c 0 -1.907 1.551 -3.458 3.458 -3.458 h 79.084 c 1.907 0 3.458 1.551 3.458 3.458 V 50.831 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 43.236 26.853 H 11.82 c -0.552 0 -1 0.448 -1 1 s 0.448 1 1 1 h 31.417 c 0.552 0 1 -0.448 1 -1 S 43.789 26.853 43.236 26.853 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 78.181 26.853 h -5.271 c -0.553 0 -1 0.448 -1 1 s 0.447 1 1 1 h 5.271 c 0.553 0 1 -0.448 1 -1 S 78.733 26.853 78.181 26.853 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 61.618 c -0.552 0 -1 0.447 -1 1 v 6.896 c 0 0.553 0.448 1 1 1 s 1 -0.447 1 -1 v -6.896 C 46 62.065 45.552 61.618 45 61.618 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 56.225 61.618 c -0.553 0 -1 0.447 -1 1 v 6.896 c 0 0.553 0.447 1 1 1 s 1 -0.447 1 -1 v -6.896 C 57.225 62.065 56.777 61.618 56.225 61.618 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 73.69 68.515 c -2.89 0 -5.241 -2.352 -5.241 -5.242 v -0.654 c 0 -0.553 -0.447 -1 -1 -1 s -1 0.447 -1 1 v 0.654 c 0 3.993 3.248 7.242 7.241 7.242 c 0.553 0 1 -0.447 1 -1 S 74.243 68.515 73.69 68.515 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 33.775 61.618 c -0.552 0 -1 0.447 -1 1 v 6.896 c 0 0.553 0.448 1 1 1 s 1 -0.447 1 -1 v -6.896 C 34.775 62.065 34.328 61.618 33.775 61.618 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 22.551 61.618 c -0.552 0 -1 0.447 -1 1 v 0.654 c 0 2.891 -2.352 5.242 -5.242 5.242 c -0.552 0 -1 0.447 -1 1 s 0.448 1 1 1 c 3.993 0 7.242 -3.249 7.242 -7.242 v -0.654 C 23.551 62.065 23.104 61.618 22.551 61.618 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                            </svg>
                        <h4 class="mb-4">Air Conditioner</h4>
                        <p class="mb-4 text-secondary">Comfortable Environment and an  ideal place  for concentration and increase productivity in your study.</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="48" height="48" fill="currentColor" class="bi bi-front text-primary mb-4" viewBox="0 0 64 64" >
                        <g id="water-drop">
                            <path style="fill:#0A5CA4;" d="M32,55.335c-8.377,0-15.19-6.512-15.19-14.526c0-0.439-0.355-0.798-0.798-0.798
                                c-0.443,0-0.798,0.359-0.798,0.798c0,8.891,7.528,16.126,16.787,16.126c0.439,0,0.798-0.359,0.798-0.798
                                C32.798,55.694,32.439,55.335,32,55.335z M32,55.335c-8.377,0-15.19-6.512-15.19-14.526c0-0.439-0.355-0.798-0.798-0.798
                                c-0.443,0-0.798,0.359-0.798,0.798c0,8.891,7.528,16.126,16.787,16.126c0.439,0,0.798-0.359,0.798-0.798
                                C32.798,55.694,32.439,55.335,32,55.335z M33.087,0.426c-0.614-0.568-1.563-0.568-2.178,0C29.973,1.296,8.007,21.928,8.015,40.943
                                C8.015,53.659,18.774,64,32,64s23.985-10.341,23.985-23.057C55.989,21.928,34.023,1.296,33.087,0.426z M32,60.802
                                c-11.462,0-20.787-8.908-20.787-19.859C11.209,25.628,27.578,8.247,32,3.829c4.422,4.414,20.791,21.782,20.783,37.114
                                C52.783,51.895,43.462,60.802,32,60.802z M32,55.335c-8.377,0-15.19-6.512-15.19-14.526c0-0.439-0.355-0.798-0.798-0.798
                                c-0.443,0-0.798,0.359-0.798,0.798c0,8.891,7.528,16.126,16.787,16.126c0.439,0,0.798-0.359,0.798-0.798
                                C32.798,55.694,32.439,55.335,32,55.335z"/>
                            <path style="fill:#D0E7F2;" d="M32,3.829c-4.422,4.418-20.791,21.799-20.787,37.114c0,10.952,9.326,19.859,20.787,19.859
                                s20.783-8.908,20.783-19.859C52.791,25.611,36.422,8.243,32,3.829z M32,56.936c-9.259,0-16.787-7.236-16.787-16.126
                                c0-0.439,0.355-0.798,0.798-0.798c0.443,0,0.798,0.359,0.798,0.798c0,8.013,6.813,14.526,15.19,14.526
                                c0.439,0,0.798,0.359,0.798,0.803C32.798,56.576,32.439,56.936,32,56.936z"/>
                        </g>
                        <g id="Layer_1">
                        </g>
                        </svg>
                        <h4 class="mb-4">RO Water</h4>
                        <p class="mb-4 text-secondary"  >Enjoy clean, safe drinking water at our library</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-dark h-100">
                      <div class="card-body text-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-front text-primary mb-4" viewBox="0 0 640 512"><path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                        <h4 class="mb-4">Computer Installation</h4>
                        <p class="mb-4 text-secondary" >At your convience, Computer system can also be provided at best services.</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection
