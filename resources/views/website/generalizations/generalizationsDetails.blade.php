@extends('layouts.website')

@section('title', $generalizationsDetails->title)

@section('sub_title', 'التعميمات')
@section('meta')

<meta name="title" property="og:title" content="{{ $generalizationsDetails->title }}">
<meta name="description" property="og:description" content="التعميمات">
<meta name="keywords" property="og:keywords" content=",التعميمات,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="التعميمات" />
<meta property="og:title" content="{{ $generalizationsDetails->title }}" />

@endsection
@push('css')
@endpush

@push('js')
<script>
    const textBodyElement = document.getElementById("textBody");
    const increaseButton = document.getElementById("increaseButton");
    const decreaseButton = document.getElementById("decreaseButton");

    increaseButton.addEventListener("click", () => {
      let currentSize = parseFloat(
        window.getComputedStyle(textBodyElement).fontSize
      );
      let newSize = currentSize + 2; // زيادة 4 بكسل
      textBodyElement.style.setProperty(
        "font-size",
        Math.min(newSize, 30) + "px",
        "important"
      );
    });

    decreaseButton.addEventListener("click", () => {
      let currentSize = parseFloat(
        window.getComputedStyle(textBodyElement).fontSize
      );
      let newSize = currentSize - 2; // نقصان 4 بكسل
      textBodyElement.style.setProperty(
        "font-size",
        Math.max(newSize, 12) + "px",
        "important"
      );
    });
  </script>
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="bodyNewsDetails container">
                <div class="socialMedia">
                    <ul>
                        <li>
                            <a href=""><i class="bx bx-link"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="bx bxl-facebook"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="bx bxl-twitter"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="bx bxl-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="bx bxl-telegram"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="bx bxl-messenger"></i></a>
                        </li>
                    </ul>
                    {{-- <ul> --}}
                        {{-- <li><i class="bx bx-printer"></i></li> --}}
                        {{-- <li><i class="bx bx-plus" id="increaseButton"></i></li> --}}
                        {{-- <li><i class="bx bx-minus" id="decreaseButton"></i></li> --}}
                    {{-- </ul> --}}
                </div>

                <div class="textNewsDetails" id="textBody">
                    <h3 class="lineTitle">تعميم: الغرفة التجارية</h3>
                    <p class="mt-4 dateNews">{{ $generalizationsDetails->created_at }}</p>

                    <div class="bodyText mt-5" style="font-size: unset !important">
                      {!! $generalizationsDetails->description !!}
                      {{-- <p>
                        كلمة رئیس مجلس الإدارة
                        <br />
                        <br />
                        الأخوة والأخوات ... أعضاء الهيئة العامة المحترمين
                        <br />
                        <br />
                        لقد تأسست غرفة تجارة وصناعة محافظة غزة في العام 1954 كمؤسسة
                        وطنية إقتصادية تمثل القطاع الخاص الفلسطيني في المحافظة، وتدافع
                        عن مصالحهم وتعمل على تنشيط القطاعات الإقتصادية المختلفة من خلال
                        العديد من الخدمات التي تقدمها لأعضاء هيئتها العامة .
                        <br />
                        <br />
                        ومع تطور القطاع الخاص واحتياجاته،تطورت خدمات الغرفة وتوسعت لتشمل
                        ترويج التجارة، التدريب وتطوير الأعمال، الوساطة والتحكيم، خدمات
                        الاستشارات، التزويد بالمعلومات والدراسات، إقامة المعارض، وتعزيز
                        مكانة الاقتصاد الوطني من خلال أنشطة العلاقات الخارجية والعلاقات
                        العامة ، ورعاية المصالح النسوية والمشاريع متناهية الصغر والنهوض
                        بها
                      </p> --}}

                    </div>
                  </div>
            </div>

            <div class="sliderNews mt-5">
                <div class="container">
                    <h3 class="mb-4 fontBold lineTitle">تعميمات ذات صلة</h3>
                </div>

                <div class="sliderNews sliderGeneralization">
                    <!-- Swiper -->
                    <div class="swiper-button-next button-next-swiperGeneralization"></div>
                    <div class="swiper-button-prev button-prev-swiperGeneralization"></div>
                    <div class="swiper swiperGeneralization container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="generalizationsDetails.html" class="cardpdfD cardG">
                                    <div class="textCardfD">
                                        <h5 class="fontBold">
                                            الغرفة التجارية بغزة تناقش تسهيل الحركة التجارية عبر
                                            معابر قطاع غزة
                                        </h5>
                                        <span>10 مارس 2023 </span>
                                    </div>
                                    <span href="" class="btnS">تعرف على المزيد</span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="generalizationsDetails.html" class="cardpdfD cardG">
                                    <div class="textCardfD">
                                        <h5 class="fontBold">
                                            الغرفة التجارية بغزة تناقش تسهيل الحركة التجارية عبر
                                            معابر قطاع غزة
                                        </h5>
                                        <span>10 مارس 2023 </span>
                                    </div>
                                    <span href="" class="btnS">تعرف على المزيد</span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="generalizationsDetails.html" class="cardpdfD cardG">
                                    <div class="textCardfD">
                                        <h5 class="fontBold">
                                            الغرفة التجارية بغزة تناقش تسهيل الحركة التجارية عبر
                                            معابر قطاع غزة
                                        </h5>
                                        <span>10 مارس 2023 </span>
                                    </div>
                                    <span href="" class="btnS">تعرف على المزيد</span>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="generalizationsDetails.html" class="cardpdfD cardG">
                                    <div class="textCardfD">
                                        <h5 class="fontBold">
                                            الغرفة التجارية بغزة تناقش تسهيل الحركة التجارية عبر
                                            معابر قطاع غزة
                                        </h5>
                                        <span>10 مارس 2023 </span>
                                    </div>
                                    <span href="" class="btnS">تعرف على المزيد</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
