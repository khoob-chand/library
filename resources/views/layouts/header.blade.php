<nav class="container navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Tech Zone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav gap-2">
            @if (request()->is('/'))
                    <li class="nav-item">
                        <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/')}}">Home</a>
                    </li>
                @endif

            @if (Auth::check())
                @if (request()->is('customer'))
                    <li class="nav-item">
                     <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/customer">Add Student</a>
                    </li>
                @else
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}/customer">Add Student</a>
                </li>
                @endif
                {{-- @if (request()->is('customer-detail'))
                    <li class="nav-item">
                        <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/customer-detail">All Student</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/')}}/customer-detail">All Student</a>
                    </li>
                @endif --}}

                @if (request()->is('services'))
                <li class="nav-item">
                    <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/login">Services</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}/services">Services</a>
                </li>
                 @endif

                @if (request()->is('contact-us'))
                <li class="nav-item">
                    <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/contact-us">Contact Us</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}/contact-us">Contact Us</a>
                </li>
            @endif
            @if (request()->is('vidoes'))
            <li class="nav-item">
                <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/videos">Videos</a>
            </li>
              @else
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('/')}}/videos">Videos</a>
            </li>
              @endif

            <div class="btn-group">
                <button class="nav-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  Settings
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item nav-link" href="{{url('/')}}/service-settings">Add Services</a></li>
                  <li><a class="dropdown-item nav-link" href="{{url('/')}}/customer-detail">All Students </a></li>
           
                </ul>
              </div>
                @if (request()->is('logout'))
                    <li class="nav-item">
                        <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/logout">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/')}}/logout">Logout</a>
                    </li>
                @endif
            @else
                @if (request()->is('services'))
                    <li class="nav-item">
                        <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/services">Services</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/')}}/services">Services</a>
                    </li>
                @endif

                @if (request()->is('vidoes'))
                <li class="nav-item">
                    <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/videos">Videos</a>
                </li>
                  @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}/videos">Videos</a>
                </li>
                  @endif

                @if (request()->is('login'))
                <li class="nav-item">
                    <a class="nav-link text-white bg-primary rounded" href="{{url('/')}}/login">Login</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/')}}/login">Login</a>
                </li>
                 @endif

            @endif

        </ul>

    </div>
  </div>
</nav>
