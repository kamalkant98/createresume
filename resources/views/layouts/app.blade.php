<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel = "icon" href = "http://127.0.0.1:8000/assest/logo.png" type = "image/x-icon">
    <title>Super Admin 2.0</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/css/app.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/vendors/zwicon/zwicon.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/vendors/overlay-scrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/vendors/fullcalendar/core/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('resources/vendors/fullcalendar/daygrid/main.min.css') }}" rel="stylesheet">   

        <link rel="stylesheet" href="{{asset('resources/vendors/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('resources/vendors/dropzone/dropzone.css')}}">
        <link rel="stylesheet" href="{{asset('resources/vendors/flatpickr/flatpickr.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resources/vendors/nouislider/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{asset('resources/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">
        <link rel="stylesheet" href="{{asset('resources/vendors/trumbowyg/ui/trumbowyg.min.css')}}">
        <link rel="stylesheet" href="{{asset('resources/vendors/rateyo/jquery.rateyo.min.css')}}">
        <link rel="stylesheet" href="{{asset('demo/css/demo.css')}}">
       
        
        <link rel="stylesheet" href="{{asset('resources/vendors/sweetalert2/sweetalert2.min.css')}}">

    </head>
    </head>
    <body class="{{ $class ?? ''}}" data-sa-theme="3">
        
       @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        @if (auth()->check())
        
        <div class="fixed-plugin">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>
            <div class="themes">
                <div class="scrollbar">
                    <a href="#" class="themes__item active" data-sa-value="1"><img src="{{asset('resources/img/bg/1.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="2"><img src="{{asset('resources/img/bg/2.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="3"><img src="{{asset('resources/img/bg/3.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="4"><img src="{{asset('resources/img/bg/4.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="5"><img src="{{asset('resources/img/bg/5.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="6"><img src="{{asset('resources/img/bg/6.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="7"><img src="{{asset('resources/img/bg/7.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="8"><img src="{{asset('resources/img/bg/8.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="9"><img src="{{asset('resources/img/bg/9.jpg')}}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="10"><img src="{{asset('resources/img/bg/10.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
        @endif 
      
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('resources/js/app.min.js') }}" defer></script>
        <script src="{{ asset('resources/vendors/jquery/jquery.min.js') }}" defer></script>
        <script src="{{ asset('resources/vendors/popper.js/popper.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/bootstrap/js/bootstrap.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js')}}" defer></script>
        
        <script src="{{ asset('resources/vendors/flot/jquery.flot.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/flot/jquery.flot.resize.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/flot/flot.curvedlines/curvedLines.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/peity/jquery.peity.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/jqvmap/jquery.vmap.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/jqvmap/maps/jquery.vmap.world.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/fullcalendar/core/main.min.js')}}" defer></script>
        <script src="{{ asset('resources/vendors/fullcalendar/daygrid/main.min.js')}}" defer></script>



      
        <script src="{{asset('resources/vendors/jquery-mask-plugin/jquery.mask.min.js')}}" defer></script>
        <script src="{{asset('resources/vendors/select2/js/select2.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/dropzone/dropzone.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/flatpickr/flatpickr.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/nouislider/nouislider.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/trumbowyg/trumbowyg.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/rateyo/jquery.rateyo.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/jquery-text-counter/textcounter.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/autosize/autosize.min.js')}}"defer></script>
        <script src="{{asset('resources/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>

       
       <script>
         
            </script>

       

       
        @stack('js')
    </body>
</html>