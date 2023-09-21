<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="site_name" property="og:site_name" content="Palestine Association for Education &amp; Environmental Protection  ، PAEEP">
    <meta name="author" content="َQusayAlkahlout, qmkahlout@gmail.com">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="ar">
    <meta name="url" property="og:url" content="{{ URL::current() }}">
    <meta property="og:url" content="{{ URL::current() }}" />

    {{-- <link rel="canonical" href="https://enviro.sparkerx.com/"> --}}
    @yield('meta')



    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

    @stack('css')



  </head>
