<!--begin::Head-->

<head>
    <base href="">
    <title>@yield('title', 'Default Title')</title>
    <meta charset="utf-8" />

    {{-- DataTables CSS --}}
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" />
    <!--begin::Fonts-->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap'); */
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@500&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap');

        * {
            /* font-family: 'Almarai', sans-serif !important; */
            font-family: 'Cairo', sans-serif !important;
        }
    </style>

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">


    @stack('css')
    <style>
        /* body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
  } */

        /* style clock */

        /* #qusay {
            display: grid;
            height: 70%;
            place-items: center;
            background: #000;
            font-family: 'Poppins', sans-serif;
        } */


        .wrapper-qusay {
            height: 50px !important;
            width: 345px;
            cursor: default;
            /* background: linear-gradient(135deg, #14ffe9, #ffeb3b, #ff00e0); */
            border-radius: 10px;
            animation: animate 1.5s linear infinite;
            transform: translateY(8px);
        }

        .wrapper-qusay .display,
        .wrapper-qusay span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .wrapper-qusay .display {
            z-index: 999;
            background: #fff;
            height: 45px;
            width: 330px;
            border-radius: 6px;
            /* text-align: center; */
        }


        .wrapper-qusay .display #clock {
            line-height: 45px;
            color: #fff;
            font-size: 35px;
            font-weight: 600;
            letter-spacing: 1px;
            background-color: #eee;
            /* background: linear-gradient(135deg, #14ffe9, #ffeb3b, #ff00e0); */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: animate 1.5s linear infinite;
            display: inline-block;
        }

        .wrapper-qusay .display #ampm {
            line-height: 45px;
            color: #fff;
            font-size: 35px;
            font-weight: 600;
            letter-spacing: 1px;
            background-color: #eee;
            /* background: linear-gradient(135deg, #14ffe9, #ffeb3b, #ff00e0); */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: animate 1.5s linear infinite;
        }

        @keyframes animate {
            100% {
                filter: hue-rotate(360deg);
            }
        }


        .wrapper-qusay span {
            height: 100%;
            width: 100%;
            background: inherit;
            border-radius: 10px;
        }

        .wrapper-qusay span:first-child {
            filter: blur(10px);
        }

        .wrapper-qusay span:last-child {
            filter: blur(20px);
        }

        /* end clock style */

        .icon {
            font-size: 18px !important;
            margin-left: 3px !important;
            margin-right: -12px !important;
            color: #83b09d !important;
        }

        td,
        th {
            /* padding-top: 30px !important; */
            /* text-align: center !important; */
            /* vertical-align: center !important;
     */
            vertical-align: middle !important;
            /* height: 50px; */
        }

        td img {
            object-fit: contain !important;
        }

        td a svg {
            font-size: 18px !important;
            padding-left: 3px
        }

        @media (min-width: 992px) {
            [data-kt-aside-minimize=on] .aside {
                width: 55px;
                transition: width .3s ease
            }

            .aside-enabled.aside-fixed.header-fixed[data-kt-aside-minimize=on] .header {
                right: 55px;
                transition: right .3s ease
            }

            .aside-enabled.aside-fixed.toolbar-fixed[data-kt-aside-minimize=on] .toolbar {
                right: 55px;
                transition: right .3s ease
            }

            /* .btn.btn-icon:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush) {
                transform: translateX(0px) !important;
            } */

        }

        .aside.aside-dark .aside-toggle svg [fill]:not(.permanent):not(g) {
            transition: fill .3s ease;
            fill: #fff;
        }

        .btn.btn-icon:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush) {
            transform: translateX(0px);
            margin-right: 5px;
        }
    </style>

</head>
<!--end::Head-->
