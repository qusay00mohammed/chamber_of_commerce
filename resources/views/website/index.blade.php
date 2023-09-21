<!DOCTYPE html>
<html lang="en">

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
    <meta name="title" property="og:title" content="الغرفة التجارية">
    <meta name="description" property="og:description" content="الغرفة التجارية">
    <meta name="keywords" property="og:keywords" content=" الغرفة التجارية"/>
    <meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
    <meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
    <meta name="news_keywords" property="og:news_keywords" content="الغرفة التجارية" />
    <meta property="og:title" content="الغرفة التجارية" />


    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <title>غرفة تجارة وصناعة محافظة غزة</title>
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
    <script src="{{ asset('assets/website/js/jqueryLibrary.js') }}"></script>
</head>

<body>
@include('layouts.alert')
    <div class="pollPop" data-bs-toggle="modal" data-bs-target="#ModalPoll">
        <img src="{{ asset('assets/website/images/feather-smileIcon.png') }}" alt="" />
    </div>


    <div class="containerSe ">
        <div class="allNavBarS ">
            <nav class="navTop">
                <div class="allNavTop container">
                    <ul class="rightNavTop">
                        <li>
                            <img src="{{ asset('assets/website/images/calendar-alt.svg') }}" alt="" />
                            <span>16 يناير 2023</span>
                        </li>
                        <li class="dropNavTop" style="padding: 6px 14px">
                            <span>+14</span>
                            <img width="30px" height="30px"
                                src="{{ asset('assets/website/images/partly-cloudy-day.svg') }}" alt="" />
                            <span>,غزة فلسطين</span>
                            <ul class="dropDNavTop">
                                <hr />
                                <li class="justify-content-around w-100">
                                    <div class="text-center">
                                        <h3>+14</h3>
                                        <p style="font-size: 14px">اليوم</p>
                                    </div>
                                    <div class="text-center">
                                        <img class="imgTS"
                                            src="{{ asset('assets/website/images/partly-cloudy-day.svg') }}"
                                            alt="" />
                                        <p style="font-size: 14px">غائم قليلا</p>
                                    </div>
                                </li>
                                <hr />
                                <li>
                                    <span>+10</span>
                                    <img src="{{ asset('assets/website/images/cloudy.svg') }}" alt="" />
                                    <span>,الثلاثاء , غائم تماما</span>
                                </li>
                                <hr />
                                <li>
                                    <span>+14</span>
                                    <img src="{{ asset('assets/website/images/partly-cloudy-day-drizzle.svg') }}"
                                        alt="" />
                                    <span>,الأربعاء , ماطر قليلا</span>
                                </li>
                                <hr />
                                <li>
                                    <span>+14</span>
                                    <img src="{{ asset('assets/website/images/rain.svg') }}" alt="" />
                                    <span>,الخميس , ماطر</span>
                                </li>
                            </ul>
                        </li>
                        <li class="dropNavTop" style="padding: 10px 35px">
                            <img src="{{ asset('assets/website/images/metro-dollar2.svg') }}" alt="" />
                            <span>أسعار العملات</span>
                            <ul class="dropDNavTop">
                                <hr />
                                <table>
                                    <thead>
                                        <tr>
                                            <td>العملة</td>
                                            <td>شراء</td>
                                            <td>بيع</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>الدولار الأمريكي</td>
                                            <td>3.40</td>
                                            <td>3.46</td>
                                        </tr>
                                        <tr>
                                            <td>اليورو الأوروبي</td>
                                            <td>3.40</td>
                                            <td>3.46</td>
                                        </tr>
                                        <tr>
                                            <td>الدينار الأردني</td>
                                            <td>3.40</td>
                                            <td>3.46</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                        </li>
                    </ul>

                    <ul class="leftNavTop">
                        <li><a href="{{ route('website.contact.create') }}">اتصل بنا</a></li>
                        <li class="sotailNav">
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'facebook')->first()->description ?? '' }}"><i class="bx bxl-facebook"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'twitter')->first()->description ?? '' }}"><i class="bx bxl-twitter"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'youtube')->first()->description ?? '' }}"><i class="bx bxl-youtube"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'instagram')->first()->description ?? '' }}"><i class="bx bxl-instagram"></i> </a>
                            <a target="_blank" href="{{ route('news.rss') }}"><i class="bx bx-rss"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'telegram')->first()->description ?? '' }}"><i class="bx bxl-telegram"></i> </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="navbarLogo">
                <div class="allNavbarLogo container">
                    <div class="flexLogoN">
                        <a href="{{ route('website.home') }}" class="logo">
                            <img src="{{ asset('assets/website/images/logo.png') }}" alt="" />
                        </a>
                        <div class="menuIcon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight">
                            <i class="bx bx-menu"></i>
                        </div>
                    </div>
                    <a href="" class="imgAd">
                        <img src="{{ asset('assets/website/images/imgsAdTop.png') }}" alt="">
                    </a>

                    <div class="btnLogin">

                        <div class="popi">
                            <div class="popiE">
                                <i class="bx bxs-user"></i>
                            </div>
                        </div>
                        <span class="textBtnLSpan">تسجيل دخول الشركات</span>
                        <div class="textBtnL"></div>
                        <div class="menuBtnLogin">
                            <ul>
                                <li><a href="">تسجيل دخول عضو</a></li>
                                <li><a href="membershipRequest.html">طلب انتساب</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <nav class="navbar">
                <div class="allNavbar container">
                    <ul class="menuNavbar">
                        <li class="dropMNav">
                            <a href="{{ route('about-us') }}" class="
                            {{ request()->routeIs('about-us') ? 'active' : '' }}
                            {{ request()->routeIs('gazaCityPage') ? 'active' : '' }}
                            {{ request()->routeIs('chairmanSpeech') ? 'active' : '' }}
                            {{ request()->routeIs('boardOfDirectors') ? 'active' : '' }}
                            {{ request()->routeIs('chamberObjectives') ? 'active' : '' }}
                            {{ request()->routeIs('valuesRoom') ? 'active' : '' }}

                                ">عن الغرفة</a>

                            <div class="dropMenu">
                                <ul class="">
                                    <li class="active"><a href="{{ route('about-us') }}">عن الغرفة</a></li>
                                    <li><a href="{{ route('gazaCityPage') }}">عن غزة </a></li>
                                    <li><a href="{{ route('chairmanSpeech') }}">كلمة رئيس المجلس</a></li>
                                    <li><a href="{{ route('boardOfDirectors') }}">أعضاء مجلس الإدارة</a></li>
                                    <li><a href="">أعضاء مجلس الإدارة السابقة</a></li>
                                </ul>
                                <ul class="">
                                    <li><a href="{{ route('about-us') }}#OurVision">رؤيتنا</a></li>
                                    <li><a href="{{ route('about-us') }}#OurVision">رسالتنا</a></li>
                                    <li><a href="{{ route('chamberObjectives') }}">أهدافنا</a></li>
                                    <li><a href="{{ route('valuesRoom') }}">قيمنا</a></li>
                                    <li><a href="{{ route('about-us') }}#financeResource">الموارد المالية</a></li>
                                    <li><a href="membershipRequirements.html">متطلبات العضوية</a></li>
                                </ul>
                            </div>

                        </li>
                        <li><a href="{{ route('website.roomPrograms') }}" class="{{ request()->routeIs('website.roomPrograms') ? 'active' : '' }}">برامج الغرفة</a></li>
                        <li><a href="{{ route('chamberCommitteesPage') }}" class="{{ request()->routeIs('chamberCommitteesPage') ? 'active' : '' }}">لجان الغرفة</a></li>
                        <li class="dropMNav dropMNavW">
                            <a href="{{ route('servicesPage') }}" class="
                            {{ request()->routeIs('servicesPage') ? 'active' : '' }}
                            {{ request()->routeIs('serviceDetailsPage') ? 'active' : '' }}

                            ">الخدمات</a>
                            <div class="dropMenu dropMenuW">

                                <ul>

                                    @if ($servicesMenu[0] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[0]->id]) }}">{{ $servicesMenu[0]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[1] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[1]->id]) }}">{{ $servicesMenu[1]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[2] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[2]->id]) }}">{{ $servicesMenu[2]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[3] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[3]->id]) }}">{{ $servicesMenu[3]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[4] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[4]->id]) }}">{{ $servicesMenu[4]->title }}</a></li>
                                    @endif

                                </ul>

                                <ul>
                                    @if ($servicesMenu[5] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[5]->id]) }}">{{ $servicesMenu[5]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[6] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[6]->id]) }}">{{ $servicesMenu[6]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[7] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[7]->id]) }}">{{ $servicesMenu[7]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[8] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[8]->id]) }}">{{ $servicesMenu[8]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[9] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[9]->id]) }}">{{ $servicesMenu[9]->title }}</a></li>
                                    @endif
                                </ul>
                                <ul>
                                    @if ($servicesMenu[10] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[10]->id]) }}">{{ $servicesMenu[10]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[11] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[11]->id]) }}">{{ $servicesMenu[11]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[12] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[12]->id]) }}">{{ $servicesMenu[12]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[13] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[13]->id]) }}">{{ $servicesMenu[13]->title }}</a></li>
                                    @endif

                                    @if ($servicesMenu[14] ?? false)
                                        <li><a href="{{ route('serviceDetailsPage', ['id'=>$servicesMenu[14]->id]) }}">{{ $servicesMenu[14]->title }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        <li class="dropMNav">
                            <a href="memberDirectory.html" class="">دليل الأعضاء</a>
                            <div class="dropMenu">
                                <ul>
                                    <li><a href="memberDirectory.html">تجار</a></li>
                                    <li><a href="memberDirectory.html">شركات</a></li>
                                    <li><a href="memberDirectory.html">رجال أعمال</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropMNav">
                            <a href="{{ route('mediaCenterNews') }}" class="
                            {{ request()->routeIs('mediaCenterNews') ? 'active' : '' }}
                            {{ request()->routeIs('mediaCenterEvents') ? 'active' : '' }}
                            {{ request()->routeIs('mediaCenterImage') ? 'active' : '' }}
                            {{ request()->routeIs('mediaCenterVideo') ? 'active' : '' }}
                            {{ request()->routeIs('website.mediaCenterVersions') ? 'active' : '' }}
                            ">المركز الإعلامي</a>
                            <div class="dropMenu">
                                <ul>
                                    <li><a href="{{ route('mediaCenterNews') }}">أخبار</a></li>
                                    <li><a href="{{ route("mediaCenterEvents") }}">أنشطة وفعاليات</a></li>
                                    <li><a href="{{ route("mediaCenterImage") }}">ألبوم الصور</a></li>
                                    <li><a href="{{ route("mediaCenterVideo") }}">مكتبة الفيديو</a></li>
                                    <li><a href="{{ route("website.mediaCenterVersions") }}">إصدارات الغرفة</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropMNav">
                            <a href="{{ route('website.crossingsNews') }}" class="{{ request()->is('crossingNews/*') ? 'active' : '' }}">أخبار المعابر</a>
                            <div class="dropMenu">
                                <ul>
                                    <li><a href="{{ route('website.crossingNews', ['keremShalom']) }}">معبر كرم أبو سالم</a></li>
                                    <li><a href="{{ route('website.crossingNews', ['erez']) }}">معبر إيريز</a></li>
                                    <li><a href="{{ route('website.crossingNews', ['rafah']) }}">معبر رفح</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropMNav">
                            <a href="{{ route('agreementsAndLaws') }}" class="
                            {{ request()->routeIs('agreementsAndLaws') ? 'active' : '' }}
                            {{ request()->routeIs('agreementsAndLawsDetails') ? 'active' : '' }}

                            ">الاتفاقيات والقوانين</a>
                            <div class="dropMenu">
                                <ul>
                                    @foreach ($conventionLaw as $item)
                                    <li><a href="{{ route('agreementsAndLawsDetails', [$item->id]) }}">{{ $item->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('website.generalizations') }}" class="{{ request()->routeIs('website.generalizations') ? 'active' : '' }}">تعميمات</a></li>
                        {{-- <li class="dropMNav"><a class="dot" href="">• • •</a>
                            <div class="dropMenu dropMenuDot">
                                <ul>
                                    <li><a href="generalizations.html">تعميمات</a></li>
                                    <li><a href="generalizations.html">تعميمات</a></li>
                                    <li><a href="generalizations.html">تعميمات تعميمات</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        <li>
                            <a class="searchIcon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                aria-controls="offcanvasTop"><img
                                    src="{{ asset('assets/website/images/searchIcon.svg') }}" alt="" /></a>
                        </li>
                    </ul>
                </div>

                <div class="searchNavbar">
                    <div class="offcanvas container offcanvas-top" tabindex="-1" id="offcanvasTop"
                        aria-labelledby="offcanvasTopLabel">
                        <div class="">
                            <button type="button" class="btnClose" data-bs-dismiss="offcanvas" aria-label="Close">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <div class="bodySearchNavbar">
                            <form class="formSearch">
                                <button class="btnSearch">
                                    <img src="{{ asset('assets/website/images/iconSearchF.svg') }}" alt="" />
                                </button>
                                <input type="text" placeholder="عن ماذا تبحث؟" name="" id="" />
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="navMobile">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('website.home') }}" class="imgLogoM">
                            <img src="{{ asset('assets/website/images/logoMenuM.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="offcanvas-body">
                        <ul>
                            <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}">
                                <a href="{{ route('about-us') }}" class="dflexM"><span>عن الغرفة</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('website.roomPrograms') ? 'active' : '' }}">
                                <a href="{{ route('website.roomPrograms') }}" class="dflexM"><span>برامج الغرفة</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('chamberCommitteesPage') ? 'active' : '' }}">
                                <a href="{{ route('chamberCommitteesPage') }}" class="dflexM"><span>لجان الغرفة</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('servicesPage') ? 'active' : '' }}">
                                <a href="{{ route('servicesPage') }}" class="dflexM"><span>الخدمات</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="">
                                <a href="memberDirectory.html" class="dflexM"><span>دليل الأعضاء</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('mediaCenterNews') ? 'active' : '' }}">
                                <a href="{{ route('mediaCenterNews') }}" class="dflexM"><span>المركز الإعلامي</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('website.crossingsNews') ? 'active' : '' }}">
                                <a href="{{ route('website.crossingsNews') }}" class="dflexM"><span>أخبار المعابر</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('agreementsAndLaws') ? 'active' : '' }}">
                                <a href="{{ route('agreementsAndLaws') }}" class="dflexM"><span>الاتفاقيات والقوانين</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('website.generalizations') ? 'active' : '' }}">
                                <a href="{{ route('website.generalizations') }}" class="dflexM"><span>تعميمات</span>
                                    <div class="arrowMenuIcon">
                                        <i class="bx bx-chevron-left"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="" class="btnLogin btnLoginM">
                            <div class="popi">
                                <div class="popiE">
                                    <i class="bx bxs-user"></i>
                                </div>
                            </div>
                            <span class="textBtnLSpan">تسجيل دخول الشركات</span>
                            <div class="textBtnL"></div>
                        </a>
                        <a href="membershipRequest.html" class="btnLogin btnLoginM mt-3">
                            <div class="popi">
                                <div class="popiE">
                                    <i class="bx bxs-user"></i>
                                </div>
                            </div>
                            <span class="textBtnLSpan">طلب انتساب</span>
                            <div class="textBtnL"></div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="navDownM">
                <ul>
                    <li><a href="index.html" class="active">
                            <img class="navIcon" src="{{ asset('assets/website/images/home.svg') }}" alt="">
                            <img class="navIconActive" src="{{ asset('assets/website/images/home-active.svg') }}"
                                alt="">
                            <span>الرئيسية</span>
                            <div class="lineActive"></div>
                        </a>
                    </li>
                    <!-- <li><a href="">
              <img class="navIcon" src="images/category.svg" alt="">
              <img class="navIconActive" src="images/category-active.svg" alt="">
              <span>الخدمات</span></a>
            <div class="lineActive"></div></li> -->
                    <li><a href="mediaCenterNews.html">
                            <img class="navIcon" src="{{ asset('assets/website/images/flag.svg') }}" alt="">
                            <img class="navIconActive" src="{{ asset('assets/website/images/flag-active.svg') }}"
                                alt="">
                            <span>المركز الإعلامي</span>
                            <div class="lineActive"></div>
                        </a></li>
                    <li><a href="memberDirectory.html">
                            <img class="navIcon" src="{{ asset('assets/website/images/profile.svg') }}"
                                alt="">
                            <img class="navIconActive" src="{{ asset('assets/website/images/profile-active.svg') }}"
                                alt="">
                            <span>دليل الأعضاء</span>
                            <div class="lineActive"></div>
                        </a></li>
                    <li><a href="">
                            <img class="navIcon" src="{{ asset('assets/website/images/login.svg') }}"
                                alt="">
                            <img class="navIconActive" src="{{ asset('assets/website/images/login-active.svg') }}"
                                alt="">
                            <span>التسجيل</span>
                            <div class="lineActive"></div>
                        </a></li>

                </ul>
            </div>

        </div>
        <div class="headerHomeS sectionS">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="sliderHomeHeader">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($slider as $item)
                            @if ($item->showInSlider == 'yes')
                                <div class="swiper-slide">
                                    <div class="sliderHeader">
                                        <div class="shadowHeader"></div>

                                        <?php
                                            $url = asset("storage/files/news/$item->basicFile");
                                            $part2 = explode('.', $item->basicFile);
                                        ?>

                                        @if ($part2[1] == 'mp4')
                                            <video autoplay loop class="backVideo" muted plays-inline>
                                                <source src="{{ $url }}" class="" type="video/mp4" />
                                            </video>
                                        @else
                                            <img src="{{ $url }}" alt="" />
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <header class="header">
                <div class="allHeader container">
                    <div>
                        <div class="swiper mytextHeaderSlider top">
                            <div class="swiper-wrapper">

                                @foreach ($slider as $item)
                                <div class="swiper-slide">
                                    <div class="textHeaderHome ">
                                        <div class="titleHeaderHome">
                                            <h1>{{ $item->title }}</h1>
                                            <p>{!! $item->short_description !!}</p>

                                            <a class="btnHeaderSleder" href="{{ route('website.newsDetails', ['id'=>$item->id]) }}">
                                                <h4>تعرف على المزيد</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>


                    <div class="servicesHeader ">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-allService-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-allService" type="button" role="tab"
                                    aria-controls="pills-allService" aria-selected="true">
                                    الأكثر استخداما
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-serchServices-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-serchServices" type="button" role="tab"
                                    aria-controls="pills-serchServices" aria-selected="false">
                                    جميع الخدمات
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content w-100" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-allService" role="tabpanel"
                                aria-labelledby="pills-allService-tab" tabindex="0">
                                <div class="cardsServiceHeader">
                                    <!-- Swiper -->
                                    <div class="swiper sliderHeaderS">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide ">
                                                <a href="arbitrationCentre.html" class="cardServiceHeader">
                                                    <img src="{{ asset('assets/website/images/auction.png') }}"
                                                        alt="" />
                                                    <h2>مركز التحكيم وحل النزاعات التجارية</h2>
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="" class="cardServiceHeader">
                                                    <img src="{{ asset('assets/website/images/self-service.png') }}"
                                                        alt="" />
                                                    <h2>الخدمات الإلكترونية</h2>
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="" class="cardServiceHeader">
                                                    <img src="{{ asset('assets/website/images/g4005.png') }}"
                                                        alt="" />
                                                    <h2>دليل المؤسسات و الشركات</h2>
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="membershipRequest.html" class="cardServiceHeader">
                                                    <img src="{{ asset('assets/website/images/g4006.png') }}"
                                                        alt="" />
                                                    <h2>طلب انتساب للغرفة</h2>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade w-100" id="pills-serchServices" role="tabpanel"
                                aria-labelledby="pills-serchServices-tab" tabindex="0">
                                <form class="formHeader">
                                    <div class="inputHeader">
                                        <input type="text" placeholder="عن ماذا تبحث؟" name=""
                                            id="" />
                                        <span>أو</span>
                                        <select class="form-select" name="" id="">
                                            <option value="">اختر الخدمة بنفسك</option>
                                            <option value="">طلب خطاب تعريفي</option>
                                            <option value="">تقديم طلب شهادة منشأ</option>
                                            <option value="">تصديق شهادات ومستندات تجارية</option>
                                            <option value="">إصدار شهادة اشتراك الغرفة</option>
                                            <option value="">حجز قاعات لورش العمل</option>
                                            <option value="">طلب استشارات قانونية</option>
                                            <option value="">خدمات التدريب وتطوير الأعمال</option>
                                            <option value="">طلب تقديم شكاوي</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btnS mt-4">بحث</button>
                                </form>
                            </div>

                            <a href="{{ route('servicesPage') }}" class="btnS">عرض الكل</a>
                        </div>
                    </div>

                </div>
                <a href="{{ route('supportUs') }}" class="supportUsBtn">
                    <img src="{{ asset('assets/website/images/money-send.svg') }}" alt="">
                    <span>إدعـمـنـا</span>
                </a>
            </header>
        </div>



        <section class="mediaCenterSec sectionS mt-5">
            <div class="allMediaCenterSec">
                <div class="titleSec text-center container">
                    <h1>المركز الإعلامي</h1>
                </div>

                <div class="mediaCenterNavSec bottom">
                    <div class="mediaCenterNavMenuSec ">
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">
                                    الأخبار
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">
                                    أنشطة وفعاليات
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">
                                    ألبوم الصور
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-disabled" type="button" role="tab"
                                    aria-controls="pills-disabled" aria-selected="false">
                                    مكتبة الفيديو
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content mt-4 container" id="pills-tabContent">


                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row cardsmediaCenterNavMenuSec">
                                <div class="col-12 colCardM col-md-6 col-xl-3">
                                    <div class="row">

                                        <div class="col-sm-6 col-md-12">

                                            <a href="{{ route('website.newsDetails', [$news[0]->id]) }}" class="cardM">
                                                <?php $url1 = $news[0]->basicFile; ?>
                                                <img src="{{ asset("storage/files/news/$url1") }}" alt="" />

                                                <div class="textCardM">
                                                    <p>{{ $news[0]->title }}</p>
                                                    <span>{{ $news[0]->publication_at }}</span>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-md-12">
                                            <a href="{{ route('website.newsDetails', [$news[1]->id]) }}" class="cardM mt-1 mt-sm-0 mt-md-1">
                                                <?php $url2 = $news[1]->basicFile; ?>
                                                <img src="{{ asset("storage/files/news/$url2") }}" alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $news[1]->title }}</p>
                                                    <span>{{ $news[1]->publication_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 colCardM col-md-6">
                                    <a href="{{ route('website.newsDetails', [$news[2]->id]) }}" class="cardM cardMB">
                                        <?php $url3 = $news[2]->basicFile; ?>
                                        <img src="{{ asset("storage/files/news/$url3") }}" alt="" />
                                        <div class="textCardM">
                                            <h1>{{ $news[2]->title }}</h1>
                                            <span>{{ $news[2]->publication_at }}</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 colCardM col-md-12 col-xl-3">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xl-12">
                                            <a href="{{ route('website.newsDetails', [$news[3]->id]) }}" class="cardM">
                                                <?php $url4 = $news[3]->basicFile; ?>
                                                <img src="{{ asset("storage/files/news/$url4") }}" alt="" />

                                                <div class="textCardM">
                                                    <p>{{ $news[3]->title }}</p>
                                                    <span>{{ $news[3]->publication_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-xl-12">
                                            <a href="{{ route('website.newsDetails', [$news[4]->id]) }}" class="cardM mt-1 mt-sm-0 mt-xl-1">
                                                <?php $url5 = $news[4]->basicFile; ?>
                                                <img src="{{ asset("storage/files/news/$url5") }}" alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $news[4]->title }}</p>
                                                    <span>{{ $news[4]->publication_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('mediaCenterNews') }}" class="btnS">تعرف على المزيد</a>
                        </div>




                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row cardsmediaCenterNavMenuSec cardsmediaCenterImage">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                    <a href="" class="cardM cardMB cardMBI">
                                        <?php $url1 = $activities[0]->basicFile; ?>
                                        <img src="{{ asset("storage/files/activities/$url1") }}" alt="" />
                                        <div class="textCardM">
                                            <h1>{{ $activities[0]->title }}</h1>
                                            <span>{{ $activities[0]->created_at }}</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-1 col-sm-12 col-md-6">
                                            <a href="" class="cardM">
                                                <?php $url2 = $activities[1]->basicFile; ?>
                                                <img src="{{ asset("storage/files/activities/$url2") }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $activities[1]->title }}</p>
                                                    <span>{{ $activities[1]->created_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col mb-1 col-sm-12 col-md-6">
                                            <a href="" class="cardM">
                                                <?php $url3 = $activities[2]->basicFile; ?>
                                                <img src="{{ asset("storage/files/activities/$url3") }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $activities[2]->title }}</p>
                                                    <span>{{ $activities[2]->created_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-1 mb-md-0 col-sm-12 col-md-6">
                                            <a href="" class="cardM">
                                                <?php $url4 = $activities[3]->basicFile; ?>
                                                <img src="{{ asset("storage/files/activities/$url4") }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $activities[3]->title }}</p>
                                                    <span>{{ $activities[3]->created_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col  col-sm-12 col-md-6">
                                            <a href="" class="cardM">
                                                <?php $url5 = $activities[4]->basicFile; ?>
                                                <img src="{{ asset("storage/files/activities/$url5") }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $activities[4]->title }}</p>
                                                    <span>{{ $activities[4]->created_at }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a href="{{ route('mediaCenterEvents') }}" class="btnS">تعرف على المزيد</a>
                        </div>


                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="row cardsmediaCenterNavMenuSec cardsmediaCenterImage">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                    <?php $url4 = $images[3]->basicFile; ?>
                                    <a href="{{ asset("storage/files/images/$url4") }}" data-fancybox="gallery1"
                                        class="cardM cardMB cardMBI">
                                        <img src="{{ asset("storage/files/images/$url4") }}" alt="" />
                                        <img class="photoLibraryIcon"
                                            src="{{ asset('assets/website/images/photo-libraryIcon.png') }}"
                                            alt="" />
                                        <div class="textCardM">
                                            <h1>{{ $images[3]->title }}</h1>
                                            <span>{{ $images[3]->created_at }}</span>
                                        </div>
                                    </a>
                                    <div style="display:none">
                                        @foreach ($images[3]->files as $item3)
                                            <a data-fancybox="gallery1"
                                                href="{{ asset("storage/files/images/$item3->filename") }}">
                                                <img src="{{ asset("storage/files/images/$item3->filename") }}" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-1 col-sm-12 col-md-6">
                                            <?php $url1 = $images[0]->basicFile; ?>
                                            <a href="{{ asset("storage/files/images/$url1") }}"
                                                data-fancybox="gallery2" class="cardM">
                                                <img src="{{ asset("storage/files/images/$url1") }}"
                                                    alt="" />
                                                <img class="photoLibraryIcon"
                                                    src="{{ asset('assets/website/images/photo-libraryIcon.png') }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $images[0]->title }}</p>
                                                    <span>{{ $images[0]->created_at }}</span>
                                                </div>
                                            </a>
                                            <div style="display:none">
                                                @foreach ($images[0]->files as $item0)
                                                    <a data-fancybox="gallery2"
                                                        href="{{ asset("storage/files/images/$item0->filename") }}">
                                                        <img
                                                            src="{{ asset("storage/files/images/$item0->filename") }}" />
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col mb-1 col-sm-12 col-md-6">
                                            <?php $url2 = $images[1]->basicFile; ?>
                                            <a href="{{ asset("storage/files/images/$url2") }}"
                                                data-fancybox="gallery3" class="cardM">
                                                <img src="{{ asset("storage/files/images/$url2") }}"
                                                    alt="" />
                                                <img class="photoLibraryIcon"
                                                    src="{{ asset('assets/website/images/photo-libraryIcon.png') }}"
                                                    alt="" />
                                                <div class="textCardM">
                                                    <p>{{ $images[1]->title }}</p>
                                                    <span>{{ $images[1]->created_at }}</span>
                                                </div>
                                            </a>
                                            <div style="display:none">
                                                @foreach ($images[1]->files as $item1)
                                                    <a data-fancybox="gallery3"
                                                        href="{{ asset("storage/files/images/$item1->filename") }}">
                                                        <img
                                                            src="{{ asset("storage/files/images/$item1->filename") }}" />
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-12">
                                        <?php $url3 = $images[2]->basicFile; ?>
                                        <a href="{{ asset("storage/files/images/$url3") }}" data-fancybox="gallery4"
                                            class="cardM w-100">
                                            <img src="{{ asset("storage/files/images/$url3") }}" alt="" />
                                            <img class="photoLibraryIcon"
                                                src="{{ asset('assets/website/images/photo-libraryIcon.png') }}"
                                                alt="" />
                                            <div class="textCardM">
                                                <p>{{ $images[2]->title }}</p>
                                                <span>{{ $images[2]->created_at }}</span>
                                            </div>
                                        </a>
                                        <div style="display:none">
                                            @foreach ($images[3]->files as $item)
                                                <a data-fancybox="gallery4"
                                                    href="{{ asset("storage/files/images/$item->filename") }}">
                                                    <img src="{{ asset("storage/files/images/$item->filename") }}" />
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('mediaCenterImage') }}" class="btnS">تعرف على المزيد</a>
                        </div>


                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                            aria-labelledby="pills-disabled-tab" tabindex="0">
                            <div class="row cardsmediaCenterNavMenuSec cardsmediaCenterImage">


                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                                    <div class="col mb-1 col-md-12">
                                        <a href="{{ $videos[0]->basicFile }}" target="_blank"
                                            class="cardM cardMVideo w-100">
                                            <?php $parts = parse_url($videos[0]->basicFile); parse_str($parts['query'], $query); $videoID = $query['v']; ?>
                                            <img src="http://i3.ytimg.com/vi/{{ $videoID }}/hqdefault.jpg"
                                                alt="">
                                            <div class="iconVplay">
                                                <i class="bx bx-play"></i>
                                            </div>
                                            <div class="textCardM">
                                                <h2 id="v1"></h2>
                                                <span>{{ $videos[0]->created_at }}</span>
                                                <script>
                                                    $(document).ready(function() {
                                                        var id_video = "{{ $videoID }}";
                                                        $.getJSON('https://www.googleapis.com/youtube/v3/videos', {
                                                            id: id_video,
                                                            key: 'AIzaSyCtyZ5dt1kITGMxuJFieAdY5qY60Tqct_Q',
                                                            part: 'snippet'
                                                        }, function(data) {
                                                            var videoTitle = data.items[0].snippet.title;
                                                            console.log(videoTitle);
                                                            $('#v1').text(videoTitle);
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <a href="{{ $videos[1]->basicFile }}" target="_blank"
                                                class="cardM cardMVideoS">
                                                <?php $parts = parse_url($videos[1]->basicFile); parse_str($parts['query'], $query); $videoID = $query['v']; ?>
                                                <img src="http://i3.ytimg.com/vi/{{ $videoID }}/hqdefault.jpg" alt="">
                                                <div class="iconVplay">
                                                    <i class="bx bx-play"></i>
                                                </div>

                                                <div class="textCardM">
                                                    <p id="v2"></p>
                                                    <span>{{ $videos[1]->created_at }}</span>
                                                    <script>
                                                        $(document).ready(function() {
                                                            var id_video = "{{ $videoID }}";
                                                            $.getJSON('https://www.googleapis.com/youtube/v3/videos', {
                                                                id: id_video,
                                                                key: 'AIzaSyCtyZ5dt1kITGMxuJFieAdY5qY60Tqct_Q',
                                                                part: 'snippet'
                                                            }, function(data) {
                                                                var videoTitle = data.items[0].snippet.title;
                                                                console.log(videoTitle);
                                                                $('#v2').text(videoTitle);
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <a href="{{ $videos[2]->basicFile }}" target="_blank"
                                                class="cardM cardMVideoS">
                                                <?php $parts = parse_url($videos[2]->basicFile); parse_str($parts['query'], $query); $videoID = $query['v']; ?>
                                                <img src="http://i3.ytimg.com/vi/{{ $videoID }}/hqdefault.jpg" alt="">
                                                <div class="iconVplay">
                                                    <i class="bx bx-play"></i>
                                                </div>

                                                <div class="textCardM">
                                                    <p id="v3"></p>
                                                    <span>{{ $videos[2]->created_at }}</span>
                                                    <script>
                                                        $(document).ready(function() {
                                                            var id_video = "{{ $videoID }}";
                                                            $.getJSON('https://www.googleapis.com/youtube/v3/videos', {
                                                                id: id_video,
                                                                key: 'AIzaSyCtyZ5dt1kITGMxuJFieAdY5qY60Tqct_Q',
                                                                part: 'snippet'
                                                            }, function(data) {
                                                                var videoTitle = data.items[0].snippet.title;
                                                                console.log(videoTitle);
                                                                $('#v3').text(videoTitle);
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 cardV ">

                                    <div class="videoMenu ">

                                        @foreach ($videos as $key => $item)
                                        @if ($key < 3)
                                            @continue;
                                        @endif

                                        <a href="{{ $item->basicFile }}" target="_blank" class="rowVideoM">
                                            <div class="imgVideoMenu">
                                                <?php $parts = parse_url($item->basicFile); parse_str($parts['query'], $query); $videoID = $query['v']; ?>
                                                <img src="http://i3.ytimg.com/vi/{{ $videoID }}/hqdefault.jpg" alt="">
                                                <div class="iconVplay">
                                                    <i class="bx bx-play"></i>
                                                </div>
                                            </div>
                                            <div class="textVideoMenu">
                                                <p id="video{{ $item->id }}"></p>
                                                <span>{{ $item->created_at }}</span>
                                                <script>
                                                    $(document).ready(function() {
                                                        var id_video = "{{ $videoID }}";
                                                        $.getJSON('https://www.googleapis.com/youtube/v3/videos', {
                                                            id: id_video,
                                                            key: 'AIzaSyCtyZ5dt1kITGMxuJFieAdY5qY60Tqct_Q',
                                                            part: 'snippet'
                                                        }, function(data) {
                                                            var videoTitle = data.items[0].snippet.title;
                                                            console.log(videoTitle);
                                                            $('#video{{ $item->id }}').text(videoTitle);
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </a>
                                        @endforeach

                                    </div>


                                </div>

                            </div>
                            <a href="{{ route('mediaCenterVideo') }}" class="btnS">تعرف على المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="chamberCommitteesSec sectionS ">
            <div class="allChamberCommitteesSec container">
                <div class="titleSec text-center">
                    <h1>لجان الغرفة</h1>
                    <p class="mt-4 ">
                        تلعب اللجان المتخصصة دورًا حيويًا في تعزيز الفعالية والكفاءة في
                        العمل، حيث تسهم في تحسين التخطيط والتنظيم واتخاذ القرارات
                        الاستراتيجية. كما تعمل هذه اللجان على توسيع نطاق المعرفة والخبرات في
                        المجالات المختصة، وتحقيق التوازن بين الاهتمامات المختلفة داخل الشركة
                    </p>
                </div>

                <div class="cardsChamberCommitteesS mt-5">
                    <div class="row justify-content-center">

                        @foreach ($committees as $item)
                            <div class="col-6 col col-sm-6 col-lg-3 col-xxl-2">
                                <a href="{{ route('commissionsPage', ['id' => $item->id]) }}"
                                    class="cardChamberCommitteesS">
                                    <img src="{{ asset("storage/files/committes/$item->image_url") }}"
                                        alt="" />
                                    <h3 class="">{{ $item->title }}</h3>
                                    <div class="arrowC">
                                        <i class="bx bx-arrow-back"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('chamberCommitteesPage') }}" class="btnS bottom mt-5">تعرف على المزيد</a>
                </div>
            </div>
        </section>

        <section class="roomServicesSec sectionS mt-5">
            <div class="allRoomServicesSec container">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <h2 class="bottom">خدمات الغرفة</h2>
                        <p class="bottom">
                            تقدم الغرفة اليوم خدمات فعالة ومبتكرة ومتعددة في مختلف القطاعات .
                            وتعتبر هذه الخدمات ذات أهمية كبيرة للشركات والمؤسسات المنتسبة
                            كونها تلبي احتياجات العملاء وتعزز الثقة والولاء للغرفة وتحقق
                            التميز
                        </p>
                        <a href="{{ route('servicesPage') }}" class="btnS mt-5 bottom">عرض جميع الخدمات</a>
                    </div>

                    @foreach ($services as $item)
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('serviceDetailsPage', [$item->id]) }}" class="cardRoomServices">
                                <img class="imgCardRoomServices" src="{{ asset("storage/$item->background_image") }}"
                                    alt="" />
                                <div class="cardRText">
                                    <img src="{{ asset("storage/$item->icon_image") }}" alt="" />
                                    <p>{{ $item->title }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

                <div class="adSpaceR bottom">
                    <div class="adSpaceC">
                        <img src="{{ asset('assets/website/images/adSpace800X150.png') }}" alt="" />
                    </div>
                    <div class="adSpaceC">
                        <img src="{{ asset('assets/website/images/adSpace800X150.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>


        <section class="boardOfDirectorsSec sectionS mt-5">
            <div class="allBoardOfDirectorsSec container">
                <div class="titleSec text-center">
                    <h1>أعضاء مجلس الإدارة</h1>
                </div>
                <?php $url = $members->where('administration', '1')->first()->image_url; ?>


                <div class="bodyBoardOfDirectorsSec">

                    <div class="presidentCardSecHome">
                        <div class="imgPresidentCardSecHome ">
                            <img class="bottom" src='{{ asset("storage/$url") }}' alt="" />
                            {{-- <img class="bottom" src="" alt="" data-sr-id="10" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 0.7s ease-in-out 0.2s, transform 0.7s ease-in-out 0.2s;"> --}}

                        </div>
                        <div class="textPresidentCardSecHome bottom">
                            <h1>{{ $members->where('administration', '1')->first()->full_name }}</h1>
                            <h3>{{ $members->where('administration', '1')->first()->job_title }}</h3>

                            {!! $members->where('administration', '1')->first()->description !!}
                            <a href="{{ route('chairmanSpeech') }}" class="btnS btnW mt-3">تعرف أكثر</a>
                        </div>
                    </div>

                    <!-- Swiper -->
                    <div class="sliderBoardOfDirectors bottom sliderSec">
                        <div class="swiper-button-next next-BoardO"></div>
                        <div class="swiper-button-prev prev-BoardO"></div>

                        <div class="swiper sliderBoard mt-5">
                            <div class="swiper-wrapper">

                                @foreach ($members->where('administration', '!=', '1') as $item)
                                    <div class="swiper-slide">
                                        <div class="cardSliderBoard">
                                            <div class="imgCardSliderBoard">
                                                <img src="{{ asset("storage/$item->image_url") }}" alt="" />
                                            </div>
                                            <h5>{{ $item->full_name }}</h5>
                                            <h6>{{ $item->job_title }}</h6>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="officialAgenciesSec sectionS mt-5">
            <div class="allPartnersSec container">
                <div class="titleSec text-center">
                    <h1>الجهات الرسمية</h1>
                </div>
                <div class="sliderOfficialAgenciesSec bottom sliderSec">
                    <div class="swiper-button-next button-next-OfficialA"></div>
                    <div class="swiper-button-prev button-prev-OfficialA"></div>
                    <div class="swiper sliderOfficialAgencies mt-5">
                        <div class="swiper-wrapper">

                            @foreach ($officialAgency as $item)
                                <div class="swiper-slide">
                                    <div class="cardOfficialAgencies">
                                        <img src="{{ asset("storage/$item->image_url") }}" alt="" />
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="CardsOfficial mt-5">
                    <div class="CardOfficial bottom">
                        <div class="titleCardsOfficial">
                            <h3>إصدارات الغرفة</h3>
                        </div>

                        <div class="listsCardsOfficial">

                            @foreach ($versions as $item)
                                <a href="{{ asset("storage/$item->image_url") }}" data-fancybox class="listCardsOfficial">
                                    <span>{{ $item->title }}</span>
                                    <i class="bx bx-chevron-left"></i>
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="CardOfficial bottom tradeDelegationsCard">
                        <div class="titleCardsOfficial">
                            <h3>الوفود التجارية</h3>
                        </div>

                        <div class="listsCardsOfficial">
                            <div class="swiper tradeDelegationsSlider">
                                <div class="swiper-wrapper">
                                    @foreach ($tradeDelegation as $item)
                                        <div class="swiper-slide">
                                            <div class="cardtradeDelegations">
                                                <img src="{{ asset("storage/$item->image_url") }}" alt="" />
                                                <h4>{{ $item->title }}</h4>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                            <div class="dflexButton">
                                <div class="swiper-button-next tradeDelegations-button-next"></div>
                                <div class="swiper-button-prev tradeDelegations-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="CardOfficial bottom">
                        <div class="titleCardsOfficial">
                            <h3>لوائح وقوانين</h3>
                        </div>

                        <div class="listsCardsOfficial">
                            @foreach ($conventionFiles as $item)
                            <a href="{{ asset("storage/$item->file_name") }}" data-fancybox class="listCardsOfficial">
                                <span>{{ $item->title }}</span>
                                <i class="bx bx-chevron-left"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="eventsCalendarSec sectionS">
            <div class="titleSec  text-center">
                <h1 class="mb-4">أجندة الفعاليات</h1>
                <p>الأجندة الخاصة بالفعاليات تعد أداة وقوية لتنظيم وإدارة الأحداث والمؤتمرات والاجتماعات في الغرفة
                    وتساهم في تحديد الأهداف والأنشطة والمهام المطلوبة في الفعاليات، وتوفير محتوى مفصل للمشاركين</p>
            </div>
            <div class="allEventsCalendarSec  container">

                <div class="eventSide bottom">
                    <a href="" class="cardM cardMB h-100">
                        <img src="" id="image_calender" alt="" />
                        <div class="textCardM">
                            <h3 id="title_calender"></h3>
                            <span id="date_alender"></span>
                        </div>
                    </a>
                </div>

                <div class="calendarSide bottom">
                    <div id="color-calendar"></div>
                </div>
            </div>
            <a href="" class="btnS bottom mt-5">تعرف على المزيد</a>
        </section>

        <section class="officialAgenciesSec sectionS mt-5">
            <div class="allOfficialAgenciesSec container">
                <div class="titleSec text-center">
                    <h1>الشركاء</h1>
                </div>
                <div class="sliderOfficialAgenciesSec bottom sliderSec">
                    <div class="swiper-button-next button-next-OfficialT"></div>
                    <div class="swiper-button-prev button-prev-OfficialT"></div>
                    <div class="swiper sliderOfficialAgenciesT mt-5">
                        <div class="swiper-wrapper">

                            @foreach ($partners as $item)
                                <div class="swiper-slide">
                                    <div class="cardOfficialAgencies">
                                        <img src="{{ asset("storage/$item->image") }}" alt="" />
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="allOfficialAgenciesSec container">
                <div class="titleSec text-center">
                    <h1>إنجازات وأرقام</h1>
                </div>
                <div class="achievementsAndNumbersSec bottom sliderSec">
                    <div class="swiper-button-next button-next-Achievements"></div>
                    <div class="swiper-button-prev button-prev-Achievements"></div>
                    <div class="swiper achievementsAndNumbersSlider mt-5">
                        <div class="swiper-wrapper">

                            @foreach ($achievements as $item)
                                <div class="swiper-slide">
                                    <div class="cardAchievementsAndNumbers">
                                        <img src="{{ asset("storage/$item->image") }}" alt="" />
                                        <h2>+{{ $item->number }}</h2>
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="allMCF sectionS">
            <div class="mobileApplicationSec">
                <div class="allMobileApplicationSec container">
                    <div class="mobileApplicationS">
                        <div class="textMobileApplicationS right">
                            <h1>استعد!</h1>
                            <p class="mt-3">
                                استعد لتجربة تطبيقنا الرائع الذي سيسهل وصولك ويوفر لك الوقت
                                والجهد، حمّله الآن واستمتع بتجربة فريدة من نوعه
                            </p>
                            <div class="btnsMobileApplicationS">
                                <a href="" class="btnMobileApplicationS">
                                    <div class="btnTMobileApplicationS">
                                        <span>Available on the</span>
                                        <p>App Store</p>
                                    </div>
                                    <i class="bx bxl-apple"></i>
                                </a>
                                <a href="" class="btnMobileApplicationS">
                                    <div class="btnTMobileApplicationS">
                                        <span>Android App on</span>
                                        <p>Google Play</p>
                                    </div>
                                    <i class="bx bxl-play-store"></i>
                                </a>
                            </div>
                        </div>
                        <div class="imgMobileApplicationS left">
                            <div class="imgMobilePop"></div>
                            <div class="imgMobilePops"></div>
                            <img src="{{ asset("assets/website/images/modileAImg.png") }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="CFSec">
                <div class="connectUsSec">
                    <div class="titleSec text-center">
                        <h1>تواصل معنا</h1>
                    </div>

                    <div class="allConnectUsSec mt-5 container">
                        <form method="POST" action="{{ route('website.contact.store') }}" class="formConnectUsSec bottom">
                            @csrf
                            <div class="flexInput">
                                <input type="text" name="fullname" required placeholder="اسم المرسل كاملا" />
                                <input type="email" name="email" required placeholder="للبريد الإلكتروني" />
                            </div>
                            <div class="flexInput">
                                <input type="text" name="title" required placeholder="عنوان المراسلة" />
                                <select class="form-select" name="reason" required id="">
                                    <option value="" hidden selected>سبب المراسلة</option>
                                    <option value="problem">شكوى</option>
                                    <option value="inquiry">استفسار</option>
                                </select>
                            </div>
                            <div class="flexInput">
                                <textarea name="message" required id="" cols="30" rows="10" placeholder="نص المراسلة"></textarea>
                            </div>
                            <div class="btnsContactUs">
                                <button type="submit" class="btnS">إرسال</button>
                                <button class="btnW">مسح</button>
                            </div>
                        </form>
                        <div class="mapConnectUsSec bottom">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.43693000794!2d34.4559101236331!3d31.51215744754646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f0d569ea745%3A0x2898309bb3a687e1!2z2K3Yr9mK2YLZhyAuINmF2YbYqtiy2Ycg2KfZhNio2YTYr9mK2Ycg2LrYstmH!5e0!3m2!1sar!2s!4v1689240568979!5m2!1sar!2s"
                                width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="contactD mt-3 container ">
                        <div class="dfelxC ms-auto bottom">
                            <img src="{{ asset('assets/website/images/iconLoc.png') }}" alt="" />
                            <span>{{ $settings->where('type', 'information-contacts')->where('key', 'location')->first()->description }}</span>
                        </div>
                        <div class="dfelxC bottom">
                            <img src="{{ asset('assets/website/images/phoneIcon.png') }}" alt="" />
                            <span>{{ $settings->where('type', 'information-contacts')->where('key', 'phone')->first()->description }}</span>
                        </div>
                        <div class="dfelxC bottom">
                            <img src="{{ asset('assets/website/images/prIcon.png') }}" alt="" />
                            <span>{{ $settings->where('type', 'information-contacts')->where('key', 'telephone')->first()->description }}</span>
                        </div>
                        <div class="dfelxC bottom">
                            <img src="{{ asset('assets/website/images/emailIcon.png') }}" alt="" />
                            <span>{{ $settings->where('type', 'information-contacts')->where('key', 'email')->first()->description }}</span>
                        </div>
                        <div class="dfelxC bottom mt-1">

                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'facebook')->first()->description }}"><i class="bx bxl-facebook"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'twitter')->first()->description }}"><i class="bx bxl-twitter"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'youtube')->first()->description }}"><i class="bx bxl-youtube"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'instagram')->first()->description }}"><i class="bx bxl-instagram"></i> </a>
                            <a target="_blank" href="{{ route('news.rss') }}"><i class="bx bx-rss"></i> </a>
                            <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'telegram')->first()->description }}"><i class="bx bxl-telegram"></i> </a>

                        </div>
                    </div>
                    <hr class="container bottom" />
                </div>

                <footer class="footer mt-5">
                    <div class="allFooter container">
                        <div class="logoFooter bottom">
                            <img src="{{ asset('assets/website/images/logo.png') }}" alt="" />
                        </div>

                        <ul class="menuFooter bottom mt-5">
                            <li><a href="">عن الغرفة</a></li>
                            <li><a href="{{ route('website.roomPrograms') }}">برامج الغرفة</a></li>
                            <li><a href="{{ route('chamberCommitteesPage') }}">لجان الغرفة</a></li>
                            <li><a href="{{ route('servicesPage') }}">الخدمات</a></li>
                            <li><a href="">دليل الأعضاء</a></li>
                            <li><a href="{{ route('mediaCenterNews') }}">المركز الإعلامي</a></li>
                            <li><a href="{{ route('website.crossingsNews') }}">أخبار المعابر</a></li>
                            <li><a href="{{ route('agreementsAndLaws') }}">الاتفاقيات والقوانين</a></li>
                            <li><a href="{{ route('website.generalizations') }}">تعميمات</a></li>
                        </ul>

                        <div class="btnsMobileApplicationS  mt-5">
                            <a href="" class="btnMobileApplicationS ">
                                <div class="btnTMobileApplicationS ">
                                    <span>Available on the</span>
                                    <p>App Store</p>
                                </div>
                                <i class="bx bxl-apple"></i>
                            </a>
                            <a href="" class="btnMobileApplicationS ">
                                <div class="btnTMobileApplicationS">
                                    <span>Android App on</span>
                                    <p>Google Play</p>
                                </div>
                                <i class="bx bxl-play-store"></i>
                            </a>
                        </div>
                    </div>
                    <div class="footerB ">
                        <span>جميع الحقوق محفوظة، 2023، غرفة تجارة وصناعة محافظة غزة</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Modal poll-->
    <div class="modal fade ModalPoll" id="ModalPoll" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="bx bx-x btn-close" data-bs-dismiss="modal" aria-label="Close"></i>
                    <h5>استطلاع رأي</h5>
                </div>
                <hr class="hrModal" />
                <form class="textModalpoll">
                    <h5>ما رأيك بالتصميم الجديد لموقع غرفة تجارة وصناعة محافظة غزة؟</h5>
                    <div class="cModalpoll mt-4">
                        <div class="cModalpollRow">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" />
                            <label for="flexRadioDefault1">يمتاز بسهولة للوصول للمعلومة المطلوبة</label>
                        </div>
                        <div class="cModalpollRow">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault2" />
                            <label for="flexRadioDefault2">أواجه صعوبة في الوصول لما هو متوقع</label>
                        </div>
                        <div class="cModalpollRow">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault3" />
                            <label for="flexRadioDefault3">لا أستطيع التعامل معه وهناك مشاكل واضحة</label>
                        </div>
                    </div>

                    <hr class="hrModal mt-5 mb-3" />

                    <button type="submit" class="btnS">تصويت</button>
                </form>

                <div class="flexModalPollC">
                    <div class="flexModalPollCS">
                        <img src="images/group1.png" alt="" />
                        <span>المصوتون</span>
                    </div>
                    <div class="flexModalPollCS">
                        <img src="images/ballot.png" alt="" />
                        <span>نتائج تصويت سابقة</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"
        integrity="sha512-UyX8JsMsNRW1cYl8BoxpcamonpwU2y7mSTsN0Z52plp7oKo1u92Xqfpv6lOlTyH3yiMXK+gU1jw0DVCsPTfKew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            Thumbs: {
                type: "classic",
            },
            Carousel: {
                direction: "rtl",
            },
            closeSpeed: 100,
            closeEasing: 'fade',
            Toolbar: {
                display: {
                    rigtht: ["infobar"],
                    Thumbs: {
                        type: "classic",
                    },
                    middle: [],
                    right: ["slideshow", "download", "thumbs", "close"],
                },
            },
        });

        ///////////////////////////////////////////
        new Calendar({
            id: "#color-calendar",

            dateChanged: (currentDate, DateEvents) => {
                console.log(currentDate);



                $.ajax({
                    url: "{{ route('getNewsCalendat') }}",
                    method: "GET",
                    data: {
                        currentDate: currentDate,
                    },
                    dataType: "json",

                    success: function (response) {
                        console.log(response.data);

                        if (response.data == null) {
                            document.getElementById("date_alender").innerHTML = '00, 00, 0000';
                            document.getElementById("title_calender").innerHTML = "العنوان الافتراضي";
                            $('#image_calender').attr('src', 'assets/website/images/pexels-alphatradezone.png');
                        } else {
                            document.getElementById("date_alender").innerHTML = response.data.publication_at;
                            document.getElementById("title_calender").innerHTML = response.data.title;
                            $('#image_calender').attr('src', 'storage/' + response.data.basicFile);
                        }




                    },
                    error: function (xhr, status, error) {
                        console.error("خطأ في الطلب: " + error);
                    }
                });



            },
            monthChanged: (currentDate, DateEvents) => {
                console.log(currentDate);

                $.ajax({
                    url: "{{ route('getNewsCalendat') }}",
                    method: "GET",
                    data: {
                        currentDate: currentDate,
                    },
                    dataType: "json",

                    success: function (response) {
                        console.log(response.data);

                        if (response.data == null) {
                            document.getElementById("date_alender").innerHTML = '00, 00, 0000';
                            document.getElementById("title_calender").innerHTML = "العنوان الافتراضي";
                            $('#image_calender').attr('src', 'assets/website/images/pexels-alphatradezone.png');
                        } else {
                            document.getElementById("date_alender").innerHTML = response.data.publication_at;
                            document.getElementById("title_calender").innerHTML = response.data.title;
                            $('#image_calender').attr('src', 'storage/' + response.data.basicFile);
                        }




                    },
                    error: function (xhr, status, error) {
                        console.error("خطأ في الطلب: " + error);
                    }
                });


            },


            // custom colors
            primaryColor: '#fff',
            headerColor: '#ffffff2d',

        });
    </script>


</body>

</html>
