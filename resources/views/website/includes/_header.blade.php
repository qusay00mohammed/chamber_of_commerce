<div class="allNavBarS allNavBarSPage">
    <nav class="navTop">
        <div class="allNavTop container">
            <ul class="rightNavTop">
                <li>
                    <img src="{{ asset('assets/website/images/calendar-alt.svg') }}" alt="" />
                    <span>16 يناير 2023</span>
                </li>
                <li class="dropNavTop" style="padding: 6px 14px">
                    <span>+14</span>
                    <img width="30px" height="30px" src="{{ asset('assets/website/images/partly-cloudy-day.svg') }}" alt="" />
                    <span>,غزة فلسطين</span>
                    <ul class="dropDNavTop">
                        <hr />
                        <li class="justify-content-around w-100">
                            <div class="text-center">
                                <h3>+14</h3>
                                <p style="font-size: 14px">اليوم</p>
                            </div>
                            <div class="text-center">
                                <img class="imgTS" src="{{ asset('assets/website/images/partly-cloudy-day.svg') }}" alt="" />
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
                            <img src="{{ asset('assets/website/images/partly-cloudy-day-drizzle.svg') }}" alt="" />
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
                        <li><a href="">طلب انتساب"</a></li>
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

    <div class="headerPage container">
        <h1>@yield('sub_title')</h1>
        <span>
            <a href="{{ route('website.home') }}">الرئيسية </a><i class="bx bx-chevron-left"></i> @yield('sub_title') </span>
    </div>
</div>
