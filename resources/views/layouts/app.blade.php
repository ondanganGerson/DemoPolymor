<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- bootstrap -->
        <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">  <!--inserted from bootstrap-->

        <!--for roomtables bootstrap-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <!--bootstrap for dropdown button-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
     
            
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{asset('image/logo.png')}}" alt="AdminLTELogo" height="60" width="60">
            </div>

            <!--navbar-->
            @include('layouts.shared.navbar')

            <!--sidebar-->
            @include('layouts.shared.sidebar')

            <!--content-->
            <div class="content-wrapper">

                 <!--main content-->
                    <main>
                        {{ $slot }}
                    </main>

            </div>

            {{-- @include('layouts.shared.footer') --}}

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        
        @stack('modals')

        <!-- script --> 
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/main.js') }}"></script>
        
        <!-- bootstrap -room model/roomtables model i thinkd -->             
        <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>         <!--inserted from bootstrap-->
        <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table-locale-all.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <!--script for dropdown button-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


       



        @yield('scripts_here') 
    </body>
</html>
