
<header class="p-3 bg-dark text-white">
    <div class="container">

      <div class="d-flex flex-wrap align-items-center justify-content-center">


      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="/animal" class="nav-link px-2 text-white">Animals</a></li>
        <li><a href="/rescuer" class="nav-link px-2 text-white">Rescuer</a></li>
        <li><a href="/adopter" class="nav-link px-2 text-white">Adopter</a></li>
        <li><a href="/user" class="nav-link px-2 text-white">Personnel</a></li>
         <li><a href="#" class="nav-link px-2 text-white">About</a></li>
      </ul>
      <ul class="navbar-nav ml-auto d-flex">
                   <div class="nav-wrapper">
                        <!-- Authentication Links -->
                        @guest
                            <div class="text-end">
                            @if (Route::has('login'))


                                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @endif

                            @if (Route::has('register'))

                                    <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif
                          </div>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </div>
        </ul>




                    <!-- Right Side Of Navbar -->

          </div>
      </div>
</header>


