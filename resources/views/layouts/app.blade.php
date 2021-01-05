<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/flex-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('css/blog-template.css')}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <title>{{config('app.name', 'Neos Antras')}}</title>


</head>

<body>

    <div class="main-header">
        @include('inc.navbar')
    </div>

    <div class="container-app">
        @include('inc.messages')
        @yield('content')
    </div>
    @include('inc.footer')

    {{-- <script>
        CKEDITOR.replace( 'body' );
    </script> --}}




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/accordions.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/isotope.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/owl.js')}}"></script>




</body>

</html>
