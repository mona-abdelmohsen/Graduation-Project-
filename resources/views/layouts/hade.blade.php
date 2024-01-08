


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">   
      
      <title>@yield('title')</title>


<!-- Library / Plugin Css Build -->
<link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />

<!-- Aos Animation Css -->
<link rel="stylesheet" href="{{asset('assets/vendor/aos/dist/aos.css')}}" />

<!-- Hope Ui Design System Css -->
<link rel="stylesheet" href="{{asset('assets/css/hope-ui.min.css?v=1.2.0')}}" />

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=1.2.0')}}" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >

<!-- Dark Css -->
<link rel="stylesheet" href="{{asset('assets/css/dark.min.css')}}"/>

<!-- Customizer Css -->
<link rel="stylesheet" href="{{asset('assets/css/customizer.min.css')}}" />
<link rel="icon" href="{{ asset('assets/images/logo sakany.png') }}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css.map')}}">
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<!-- Favicon -->
<!-- RTL Css -->
<link rel="stylesheet" href="{{asset('assets/css/rtl.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/empty.css')}}">

@yield('css')
     
       <style>
       .dots{
        position: absolute;
    left: 25px;
    top: 4px;
    border-radius: 100%;
    color: white;
    width: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 10px;
    font-weight: 900;
       }
       .card-header{
            background: white;
       }
       .rigth
       {
            text-align: right !important;
       }
      </style>
