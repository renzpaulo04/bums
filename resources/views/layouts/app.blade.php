<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/gasanLogo.png') }}">
   
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <link src="{{ asset('plugins/chart.js/Chart.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
     <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- for 127.0.0:800-->
  <link href="{{ mix('css/app.css')}}" rel="stylesheet">
<script src="{{ mix('js/popper.js')}}" defer></script>
<script src="{{ mix('/js/manifest.js')}}"></script>
<script src="{{ mix('/js/app.js')}}"></script>
<script src="{{asset('/livewire/livewire.js')}}"></script>
    @yield('third_party_stylesheets')

    @stack('page_css')
    <livewire:styles/>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
@if(Auth::user()->role == 'ADMIN')
<div class="preloader flex-column justify-content-center align-items-center bg-gradient-success">
@else
<div class="preloader flex-column justify-content-center align-items-center bg-gradient-purple">
@endif
<img class="animation__shake" src="{{ asset('/img/gasanLogo.png') }}" alt="AdminLTELogo" height="250" width="250">
</div>
<div class="wrapper">
    <!-- Main Header -->
    @if(Auth::user()->role == 'ADMIN')
    <nav class="main-header navbar navbar-expand navbar-success navbar-dark ">
    @else
    <nav class="main-header navbar navbar-expand navbar-purple navbar-dark ">
    @endif
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              
            </li>
            <b class="nav-link " style="font-size: auto">BUDGET UTILIZATION MONITORING SYSTEM</b>
        </ul>



        <ul class="navbar-nav ml-auto">
  
         <!-- navbar contains -->

         @include('layouts.nav')
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
           {{ $slot }}
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2022-2023 <as>BUMS</a>.</strong> All rights
        reserved.
    </footer>
</div>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    <!-- REQUIRED SCRIPTS -->
    <!-- Page specific script -->
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- for localhost --
    <script src="{{ asset('js/adminlte.js')}}"></script>-->


    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>


<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- for 127.0.0:800-->
<script src="{{ mix('js/app.js')}}" defer></script>
<script src="{{ mix('js/popper.js')}}" defer></script>
<script src="{{ asset('/livewire/livewire.js')}}"></script>
<!-- Room javascirpt-->
<script>
//show modal form fucntion//
    window.addEventListener('show-form', event =>{
        $('#form').modal('show');
    })
    //show modal view fucntion//
    window.addEventListener('showform', event =>{
        $('#modal-xl').modal('show');
    })
//success add form fucntion//
    $(document).ready(function(){
        toastr.options = {
            "postionClass": "toast-top-right",
            "progressBar": true,
        };
        window.addEventListener('hide-form', event=>{
        $('#form').modal('hide');
        toastr.success(event.detail.message, 'Success!');
    })

    });

//delete fucntion//
    window.addEventListener('deleted-confirmation', event =>{
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Livewire.emit('deleteConfirmed')
  }
})
    })
//delete function success//
    window.addEventListener('deleted', event=>{
        Swal.fire(
      'Deleted!',
      'Selected Room has been deleted!.',
      'success'
    )
    })
//Updated function success Activated//
    window.addEventListener('updated-active', event=>{
        Swal.fire(
      'Updated!',
      [event.detail.message],
      'success'
    )
    })
//Updated function success Deactivated//
    window.addEventListener('updated-deactive', event=>{
        Swal.fire(
      'Updated!',
      [event.detail.message],
      'success'
    )
    })
</script>
<!--end Room javascirpt-->
<script>
  let regularClass = document.getElementById("regularClass");
    let isShow = false;
    function showHideRegularCLass(){
        if(isSHow){
            regularClass.style.display = "none";
            isShow = false;
        }else{
            regularClass.style.display = "block";
            isShow = true;
        }


    }
</script>
<script>

      window.addEventListener('save-generate', event=>{
        Swal.fire(
      'Save!',
      [event.detail.message],
      'success'
    )
    })
    window.addEventListener('request-done', event=>{
        Swal.fire(
           'successfully sent a request',
      [event.detail.message],
      'success'
    )
    })

 window.addEventListener('timeOverDue-confirmation', event =>{
Swal.fire({
  icon: 'success',
  title: 'well done',
  text: [event.detail.message],

})
})





  
   

    window.addEventListener('chart', event =>{ $(function () { 
         //--------------
    //- AREA CHART -
    //--------------

    var dataOne = [event.detail.labor];
var dataTwo = [event.detail.material];
var dataThree = [0,(event.detail.alloted)];
var dataFour = [0,0,(event.detail.balance)];
    // Get context with jQuery - using jQuery's .get() method.

  var areaChartCanvas = $('#barCharts').get(0).getContext('2d')

var areaChartData = {
  labels  : ['budget consumed', 'budget Alloted', 'balance'],
  datasets: [
    {
      label               : 'materials',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                :  [event.detail.labor]
    },
    {
      label               : 'labor',
      backgroundColor     : 'yellow',
      borderColor         : 'yellow',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                :   [event.detail.labor]
    },
    {
      label               : 'budget Alloted',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0,(event.detail.alloted)]
    },
    {
      label               : 'balance',
      backgroundColor     : 'green',
      borderColor         : 'green',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0,0,(event.detail.balance)]
    },
  ]
}

var areaChartOptions = {
  maintainAspectRatio : true,
  responsive : true,
  legend: {
    display: true
  },
  scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]

      }
}

   

// This will get the first returned node in the jQuery collection.
new Chart(areaChartCanvas, {
  type: 'bar',
  data: areaChartData,
  options: areaChartOptions
})


  })
})
window.addEventListener('charts', event =>{ $(function () { 
         //--------------
    //- AREA CHART -

    // Get context with jQuery - using jQuery's .get() method.

      var areaChartCanvass = $('#barChart').get(0).getContext('2d')

var areaChartDatas = {
  labels  : ['budget consumed', 'budget Alloted', 'balance'],
  datasets: [
    {
      label               : 'materials',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                :  [0]
    },
    {
      label               : 'labor',
      backgroundColor     : 'yellow',
      borderColor         : 'yellow',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                :   [0]
    },
    {
      label               : 'budget Alloted',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0,0]
    },
    {
      label               : 'balance',
      backgroundColor     : 'green',
      borderColor         : 'green',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0,0,0]
    },
  ]
}

var areaChartOptions = {
  maintainAspectRatio : true,
  responsive : true,
  legend: {
    display: true
  },
  scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]

      }
}
  
    

    
   

// This will get the first returned node in the jQuery collection.
new Chart(areaChartCanvass, {
  type: 'bar',
  data: areaChartDatas,
  options: areaChartOptions
})

  })
})
        </script>
@yield('third_party_scripts')

@stack('page_scripts')
<livewire:scripts />
@env('local')
        <script src="http://localhost:35729/livereload.js"></script>
    @endenv

</body>
</html>
