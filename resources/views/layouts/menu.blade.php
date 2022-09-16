
<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <img src="{{URL::to('public/img/gasanbuilding.jpg')}}" style="width: 230px; height: 150px"  alt="description of image">
            
                 <li class="nav-item">
               @if( Auth::user()->role == 'USER')
                            <a href="{{route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard')) ? 'active': '' }}">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                @elseif( Auth::user()->role == 'ADMIN')
                            <a href="{{route('admin.dashboard')}}" class="nav-link {{ (request()->is('admin/admin-dashboard')) ? 'active': '' }}">
                                <i class="fas fa-desktop nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{route('admin.project')}}" class="nav-link {{ (request()->is('admin/admin-project')) ? 'active': '' }}">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Project</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="{{route('admin.budget')}}" class="nav-link {{ (request()->is('admin/budget')) ? 'active': '' }}">
                            <i class="fas fa-piggy-bank nav-icon"></i>
                                <p>Budget</p>
                            </a>
                </li>
                @endif
                </li>
                @if( Auth::user()->role == 'USER')
                <li class="nav-item">
                            <a href="{{route('user.project')}}" class="nav-link {{ (request()->is('user/project')) ? 'active': '' }}">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                                <p>Project</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="{{route('user.masterList')}}" class="nav-link {{ (request()->is('user/masterList')) ? 'active': '' }}">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Master List</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="{{route('user.programWork')}}" class="nav-link {{ (request()->is('user/program-work')) ? 'active': '' }}">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Program Work</p>
                            </a>
                </li>
                <li class="nav-item">
                            <a href="{{route('user.approvedproject')}}" class="nav-link {{ (request()->is('user/approved-project')) ? 'active': '' }}">
                            <i class="fas fa-id-card nav-icon"></i>
                                <p>Approved Project</p>
                            </a>
                </li>

                        @endif


