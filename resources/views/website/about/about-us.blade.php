@extends('layouts.website')

@section('title', 'عن الغرفة')

@section('sub_title', 'عن الغرفة')
@section('meta')

<meta name="title" property="og:title" content="الغرفة التجارية">
<meta property="og:title" content="الغرفة التجارية" />
<meta name="description" property="og:description" content="الغرفة التجارية">
<meta name="keywords" property="og:keywords" content="تواصل معنا, الغرفة التجارية"/>
<meta name="news_keywords" property="og:news_keywords" content="about us, من نحن" />
<?php $url = $settings->where('key', 'establishment_of_the_chamber')->first()->image_url ?? '' ?>
<meta name="image" property="og:image" content="{{ asset("storage/$url") }}">
<meta property="og:image" content="{{ asset("storage/$url") }}">

@endsection

@push('css')
@endpush

@push('js')
@endpush


@section('content')

    <div class="pagesInnerBody mt-5">
        <div class="flexSection container">
            <div class="allflexSection">
                <div class="rightFlexSection">
                    <h2 class="titleFlexSec lineTitle fontBold">تأسيس الغرفة</h2>
                    <div class="bodyText">
                        {!! $settings->where('key', 'establishment_of_the_chamber')->first()->description ?? '' !!}
                    </div>
                </div>
                <div class="leftFlexSection">
                    <div class="imgFlexSec">
                        <?php $url = $settings->where('key', 'establishment_of_the_chamber')->first()->image_url ?? '' ?>
                        <img src="{{ asset("storage/$url") }}" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flexSection flexSectionRev container">
            <div class="allflexSection">
                <div class="rightFlexSection">
                    <h2 class="titleFlexSec lineTitle fontBold">
                        مباشرة مجلس إدارة الغرفة
                    </h2>
                    <div class="bodyText">
                        {!! $settings->where('key', 'directly_to_the_chamber_board_of_directors')->first()->description ?? '' !!}
                    </div>
                </div>
                <div class="leftFlexSection leftFvideoSec">
                    <div class="imgFlexSec videoFlexSec">
                        <div class="textVideoSec">
                            <h3 class="fontBold">مجلس إدارة الغرفة</h3>
                            <a href="{{ $settings->where('key', 'directly_to_the_chamber_board_of_directors')->first()->image_url ?? '' }}" data-fancybox="video-gallery2"
                                class="fIconV">
                                <div class="videoIcon">
                                    <i class="bx bx-play"></i>
                                </div>
                                <span>شاهد الآن</span>
                            </a>
                        </div>
                        <img src="{{ asset('assets/website/images/ChamberboardofdirectorsVideo.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="messagechamber" id="OurVision">
            <div class="imgmessagechamber">
                <img src="{{ asset('assets/website/images/logo.png') }}" alt="" />
            </div>
            <div class="flexmessagechamber container">
                <div class="textMessageC">
                    <h2 class="fontBold">رسالة الغرفة</h2>
                    <p class="fontBold">{{ $settings->where('key', 'messageRoom')->first()->description ?? '' }}</p>
                </div>
                <div class="textMessageC">
                    <h2 class="fontBold">رؤية الغرفة</h2>
                    <p class="fontBold">{{ $settings->where('key', 'seeRoom')->first()->description ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="financeResource" id="financeResource">
            <div class="titleSec text-center">
                <h2 class="fontBold">الموارد المالية</h2>
                <p class="mt-3">
                    تعتمد غرفة تجارة وصناعة محافظة غزة على التمويل الذاتي في إدارة
                    أعمالها وتحقيق أهدافها ويتوفر هذا التمويل من خلال
                </p>
            </div>

            <div class="financeResourceCards mt-5 container">
                <div class="financeResourceCard">
                    <h6>رسوم الاشتراك والانتساب السنوي</h6>
                    <h1>01</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>رسوم وأجور الخدمات المقدمة من الغرفة</h6>
                    <h1>02</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>رسوم التحكيم التجاري</h6>
                    <h1>03</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>الرسوم المستوفاة من المرشحين لعضوية المجلس</h6>
                    <h1>04</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>رسوم الكفالات والشهادات والمستندات التي تصدرها وتصادق عليها</h6>
                    <h1>05</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>
                        لإيرادات المتأتية من استثمار أموالها وعوائد أملاكها وعقاراتها
                    </h6>
                    <h1>06</h1>
                </div>
                <div class="financeResourceCard">
                    <h6>
                        التبرعات والهبات والمساعدات غير المشروطة التي تقدم للغرفة بموافقة
                        المجلس
                    </h6>
                    <h1>07</h1>
                </div>
            </div>
        </div>

        <div class="ourAchievements">
            <img class="bgmap" src="{{ asset('assets/website/images/bgmap.png') }}" alt="" />
            <div class="titleSec text-center">
                <h1 class="fontBold">إنجزاتنا</h1>
            </div>

            <div class="cardsOurAchievements container">
                <div class="cardOurAchievements">
                    <img src="{{ asset('assets/website/images/buildings.png') }}" alt="" />
                    <h1>+451</h1>
                    <p>المشاريع المنجزة</p>
                </div>
                <div class="cardOurAchievements">
                    <img src="{{ asset('assets/website/images/setting.png') }}" alt="" />
                    <h1>+28</h1>
                    <p>معدات ثقيلة</p>
                </div>
                <div class="cardOurAchievements">
                    <img src="{{ asset('assets/website/images/ranking.png') }}" alt="" />
                    <h1>+451</h1>
                    <p>معاملة دولية</p>
                </div>
                <div class="cardOurAchievements">
                    <img src="{{ asset('assets/website/images/buildings-2.png') }}" alt="" />
                    <h1>+51</h1>
                    <p>الشركات التي نساعدها</p>
                </div>
            </div>
        </div>
    </div>



@endsection
