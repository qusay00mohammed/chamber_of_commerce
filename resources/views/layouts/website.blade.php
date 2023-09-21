<!DOCTYPE html>
<html lang="en">

<body>

    @include('website.includes._head')
    @include('website.includes._header')


    <body>
        @yield('content')


        @include('website.includes._footer')
        @include('website.includes._scripts')
    </body>

</html>
