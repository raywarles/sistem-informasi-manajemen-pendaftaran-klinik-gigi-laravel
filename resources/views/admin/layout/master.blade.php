<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{$title}}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon2.png')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')
        <!--**********************************
            Content body start
        ***********************************-->
        @yield('konten')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright ©  &amp; 2021</p>
                 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @yield('js')

</body>

</html>