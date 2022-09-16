

            <!-- Right navbar links -->
            <li class="nav-item dropdown user-menu">

                <a href="#profile" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img   src="{{ asset('/img/avatar4.png') }}"
                         class="user-image img-circle elevation-2" alt="User Image">

                    <span class="d-none d-md-inline">{{ Auth::user()->firstName }}</span>

                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="profile">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img  src="{{ asset('/img/avatar4.png') }}"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                        @if(Auth::user()->role == 'ADMIN')
                        {{ Auth::user()->firstName }}
                        @else
                        {{ Auth::user()->lastName }} , {{ Auth::user()->firstName }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>

                        </p>
                        @endif
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">


                        <a href="#" class="btn btn-default btn-flat float-right btn-xs"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
