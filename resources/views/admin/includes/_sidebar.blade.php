
<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('assets/website/images/logo.png') }}" style="width: 100% !important; height: 45px !important; object-fit: contain;" class="h-25px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الغرفة التجارية</span>
                    </div>
                </div>



                    <div class="menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <span class="menu-bullet">
                                    {{-- <span class="bullet bullet-dot"></span> --}}
                                    <i class="fa-solid fa-house-lock icon"></i>
                                </span>
                                <span class="menu-title">لوحة التحكم</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('support-us.index') ? 'active' : '' }}" href="{{ route('support-us.index') }}">
                                <span class="menu-bullet">
                                    <i class="fa-solid fa-circle-dollar-to-slot icon"></i>
                                </span>
                                <span class="menu-title">التبرعات</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('contact-us.*') ? 'active' : '' }}" href="{{ route('contact-us.index') }}">
                                <span class="menu-bullet">
                                    <i class="fas fa-question-circle icon"></i>
                                </span>
                                <span class="menu-title">الرسائل والشكاوي</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('website.home') }}">
                                <span class="menu-bullet">
                                    <i class="fa-solid fa-square-up-right icon"></i>
                                </span>
                                <span class="menu-title">الموقع الخارجي</span>
                            </a>
                        </div>
                    </div>
                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">المركز الاعلامي</span>
                    </div>
                </div>

                    <div class="menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">
                                <span class="menu-bullet">
                                    <i class="fas fa-newspaper icon"></i>
                                </span>
                                <span class="menu-title">الاخبار</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('activities.*') ? 'active' : '' }}" href="{{ route('activities.index') }}">
                                <span class="menu-bullet">
                                    <i class="fas fa-map-signs icon"></i>
                                </span>
                                <span class="menu-title">الأنشطة والفعاليات</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('images.*') ? 'active' : '' }}" href="{{ route('images.index') }}">
                                <span class="menu-bullet">
                                    <i class="fas fa-images icon"></i>
                                </span>
                                <span class="menu-title">ألبوم الصور</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('videos.*') ? 'active' : '' }}" href="{{ route('videos.index') }}">
                                <span class="menu-bullet">
                                    <i class="fas fa-video icon"></i>
                                </span>
                                <span class="menu-title">مكتبة الفيديو</span>
                            </a>
                        </div>
                    </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">اللجان</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('committees.*') ? 'active' : '' }}" href="{{ route('committees.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-users-cog icon"></i>
                            </span>
                            <span class="menu-title">قائمة اللجان</span>
                        </a>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الخدمات</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-cogs icon"></i>
                            </span>
                            <span class="menu-title">قائمة الخدمات</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الاتفاقيات والقوانين</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('conventionLaw.*') ? 'active' : '' }}" href="{{ route('conventionLaw.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-gavel icon"></i>
                            </span>
                            <span class="menu-title">الاتفاقيات والقوانين</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">إصدارات الغرفة</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('versions.*') ? 'active' : '' }}" href="{{ route('versions.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-door-open icon"></i>
                            </span>
                            <span class="menu-title">إصدارات الغرفة</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">أهدافنا وقيمنا</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('goals.*') ? 'active' : '' }}" href="{{ route('goals.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-star icon"></i>
                            </span>
                            <span class="menu-title">أهدافنا</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('values.*') ? 'active' : '' }}" href="{{ route('values.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-tree icon"></i>
                            </span>
                            <span class="menu-title">قيمنا</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الأعضاء</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('administrationMembers.*') ? 'active' : '' }}" href="{{ route('administrationMembers.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-users-cog icon"></i>
                            </span>
                            <span class="menu-title">أعضاء مجلس الإدارة</span>
                        </a>
                    </div>

                </div>
                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('members.*') ? 'active' : '' }}" href="{{ route('members') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-users icon"></i>
                            </span>
                            <span class="menu-title">أعضاء اللجان</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الشركاء</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('partners.*') ? 'active' : '' }}" href="{{ route('partners.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-handshake icon"></i>
                            </span>
                            <span class="menu-title">قائمة الشركاء</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الأنجازات</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('achievements.*') ? 'active' : '' }}" href="{{ route('achievements.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-trophy icon"></i>
                            </span>
                            <span class="menu-title">قائمة الانجازات</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الجهات الرسمية</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('officialAgencies.*') ? 'active' : '' }}" href="{{ route('officialAgencies.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-building icon"></i>
                            </span>
                            <span class="menu-title">قائمة الجهات الرسمية</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الوفود التجارية</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('tradeDelegations.*') ? 'active' : '' }}" href="{{ route('tradeDelegations.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-briefcase icon"></i>
                            </span>
                            <span class="menu-title">قائمة الوفود التجارية</span>
                        </a>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">البرامج</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="{{ route('programs.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-laptop icon"></i>
                            </span>
                            <span class="menu-title">قائمة برامجنا</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">التعميمات</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('generalizations.index') ? 'active' : '' }}" href="{{ route('generalizations.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-bullhorn icon"></i>
                            </span>
                            <span class="menu-title">قائمة التعميمات</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">اخبار المعابر</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('rafahCrossing.*') ? 'active' : '' }}" href="{{ route('rafahCrossing.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-road icon"></i>
                            </span>
                            <span class="menu-title">معبر رفح</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('erezCrossing.*') ? 'active' : '' }}" href="{{ route('erezCrossing.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-bridge icon"></i>
                            </span>
                            <span class="menu-title">معبر إيرز</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('keremShalomCrossing.*') ? 'active' : '' }}" href="{{ route('keremShalomCrossing.index') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-traffic-light icon"></i>
                            </span>
                            <span class="menu-title">معبر كرم ابو سالم</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الاعدادات</span>
                    </div>
                </div>

                <div class="menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('information-contacts') ? 'active' : '' }}" href="{{ route('information-contacts') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-envelope icon"></i>
                            </span>
                            <span class="menu-title">معلومات التواصل</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('information-public') ? 'active' : '' }}" href="{{ route('information-public') }}">
                            <span class="menu-bullet">
                                <i class="fas fa-info-circle icon"></i>
                            </span>
                            <span class="menu-title">معلومات عامة بالنظام</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('sms.index') ? 'active' : '' }}" href="{{ route('sms.index') }}">
                            <span class="menu-bullet">
                                <i class="fa-solid fa-comment-sms icon"></i>
                            </span>
                            <span class="menu-title">إعدادات SMS</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('information-payment') ? 'active' : '' }}" href="{{ route('information-payment') }}">
                            <span class="menu-bullet">
                                <i class="fa-solid fa-file-invoice-dollar icon"></i>
                            </span>
                            <span class="menu-title">إعدادات الدفع الإلكتروني</span>
                        </a>
                    </div>

                </div>
                {{-- ------------------------------------------------------------ --}}


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
<!--end::Aside-->
