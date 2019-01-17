<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('fe/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('fe/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('fe/style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    @include('partial.header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    
    <!-- ##### Right Side Cart End ##### -->

    @yield('conten')
    <!-- ##### Brands Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('partial.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('fe/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('fe/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('fe/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('fe/js/plugins.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{asset('fe/js/classy-nav.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('fe/js/active.js')}}"></script>

</body>

</html>