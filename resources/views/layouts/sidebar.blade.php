
 @if(Auth::user()->role == 'ADMIN')
<aside class="main-sidebar sidebar-dark-success elevation-4 bg-dark">
    @else
<aside class="main-sidebar sidebar-dark-success elevation-4 bg-purple">
    @endif
    <a href="" class="brand-link">
        <img src="{{asset('/img/gasanLogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>

    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
