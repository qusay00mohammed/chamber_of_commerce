@extends('layouts.website')

@section('title', )

@section('sub_title', 'تفاصيل الخبر')
@section('meta')

<meta name="title" property="og:title" content="{{ $news->title }}">
<meta name="description" property="og:description" content="{{ $news->short_description }}">
<meta name="keywords" property="og:keywords" content=",تفاصيل الخبر,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="تفاصيل الخبر" />
<meta property="og:title" content="{{ $news->title }}" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')

    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="sliderImageN container">
                <!-- Swiper -->
                <div class="swiper-button-next button-next-sliderImageN"></div>
                <div class="swiper-button-prev button-prev-sliderImageN"></div>
                <div class="swiper swiperImageN">
                    <div class="swiper-wrapper">


                        @if ($news->type == 'news')
                            @foreach ($news->files as $item)
                            <div class="swiper-slide">
                                <a href="{{ asset("storage/files/news/$item->filename") }}" data-fancybox="gallery" class="imgSlideN">
                                    <img src="{{ asset("storage/files/news/$item->filename") }}" alt="" />
                                </a>
                            </div>
                            @endforeach
                        @else
                            @foreach ($news->files as $item)
                            <div class="swiper-slide">
                                <a href="{{ asset("storage/$item->filename") }}" data-fancybox="gallery" class="imgSlideN">
                                    <img src="{{ asset("storage/$item->filename") }}" alt="" />
                                </a>
                            </div>
                            @endforeach
                        @endif



                    </div>
                </div>
            </div>

            <div class="bodyNewsDetails container">
                <div class="socialMedia">
                    <?php
                        $url = URL::current();
                    ?>
                    <ul>
                        {{-- <li>
                            <a href=""><i class="bx bx-link"></i></a>
                        </li> --}}
                        <li>
                            <a href="https://www.facebook.com/sharer.php?u={{ $url }}/"><i class="bx bxl-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?url={{ $url }}/"><i class="bx bxl-twitter"></i></a>
                        </li>
                        <li>
                            <a href="whatsapp://send?text={{ $url }}"><i class="bx bxl-whatsapp"></i></a>
                        </li>
                        <li>
                            <a href="https://t.me/share/url?url={{ $url }}"><i class="bx bxl-telegram"></i></a>
                        </li>
                        {{-- <li>
                            <a href=""><i class="bx bxl-messenger"></i></a>
                        </li> --}}
                    </ul>
                    {{-- <ul>
                        <li><i class="bx bx-printer"></i></li>
                        <li><i class="bx bx-plus" id="increaseButton"></i></li>
                        <li><i class="bx bx-minus" id="decreaseButton"></i></li>
                    </ul> --}}
                </div>

                <div class="textNewsDetails" id="textBody">
                    <h3 class="lineTitle">{{ $news->title }}</h3>
                    <p class="mt-4 dateNews">{{ $news->created_at->format('Y:m:d') }}</p>

                    <div class="bodyText mt-5">
                        {!! $news->description !!}
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
                    <h3 class="mb-4 fontBold lineTitle">اخبار ذات صلة</h3>
                </div>

                <div class="sliderNews">
                    <!-- Swiper -->
                    <div class="swiper-button-next button-next-swiperNews"></div>
                    <div class="swiper-button-prev button-prev-swiperNews"></div>
                    <div class="swiper swiperNews container">
                        <div class="swiper-wrapper">

                            @foreach (App/Models/MediaCenter/MediaCenter::orderBy('id', 'desc')->take(5)->get() as $item)
                            <div class="swiper-slide">
                                <div class="cardNews">
                                    <a href="newsDetails.html">
                                        <div class="imgCardNews">
                                            <img src="{{ asset('assets/website/images/imgC10.png') }}" alt="" />
                                        </div>
                                        <div class="textCardNews">
                                            <span>{{ $item->created_at->format('Y:m:d') }}</span>
                                            <h5>{{ $item->title }}</h5>
                                            <p>{{ $item->short_description }}</p>
                                        </div>
                                        <a href="{{ route('website.newsDetails', [$item->id]) }}" class="btnS btnSCard">تعرف على المزيد</a>
                                    </a>
                                </div>
                            </div>
                            @endforeach



                            {{-- <div class="swiper-slide">
                                <div class="cardNews">
                                    <a href="newsDetails.html">
                                        <div class="imgCardNews">
                                            <img src="{{ asset('assets/website/images/imgC7.png') }}" alt="" />
                                        </div>
                                        <div class="textCardNews">
                                            <span>15 يوليو 2023</span>
                                            <h5>
                                                إجتماع مدراء الغرف التجارية في المحافظات الجنوبية
                                            </h5>
                                            <p>
                                                وتشمل مدينه غزة حتى الضفة الشماليه لوادي غزة بما في
                                                ذلك مخيم الشاطئ
                                            </p>
                                        </div>
                                        <a href="newsDetails.html" class="btnS btnSCard">تعرف على المزيد</a>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardNews">
                                    <a href="newsDetails.html">
                                        <div class="imgCardNews">
                                            <img src="{{ asset('assets/website/images/imgC10.png') }}" alt="" />
                                        </div>
                                        <div class="textCardNews">
                                            <span>15 يوليو 2023</span>
                                            <h5>
                                                وفد من الغرفة التجارية بغزة يتفقد آليه عمل معبر كرم
                                                أبو سالم
                                            </h5>
                                            <p>
                                                تفقد وفد من غرفة تجارة وصناعة محافظة غزة اليوم، آليه
                                                عمل معبر كرم أبو سالم جنوب قطاع غزة، وذلك خلال جولة
                                            </p>
                                        </div>
                                        <a href="newsDetails.html" class="btnS btnSCard">تعرف على المزيد</a>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardNews">
                                    <a href="newsDetails.html">
                                        <div class="imgCardNews">
                                            <img src="{{ asset('assets/website/images/imgC7.png') }}" alt="" />
                                        </div>
                                        <div class="textCardNews">
                                            <span>15 يوليو 2023</span>
                                            <h5>
                                                إجتماع مدراء الغرف التجارية في المحافظات الجنوبية
                                            </h5>
                                            <p>
                                                وتشمل مدينه غزة حتى الضفة الشماليه لوادي غزة بما في
                                                ذلك مخيم الشاطئ
                                            </p>
                                        </div>
                                        <a href="newsDetails.html" class="btnS btnSCard">تعرف على المزيد</a>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cardNews">
                                    <a href="">
                                        <div class="imgCardNews">
                                            <img src="images/imgC10.png" alt="" />
                                        </div>
                                        <div class="textCardNews">
                                            <span>15 يوليو 2023</span>
                                            <h5>
                                                وفد من الغرفة التجارية بغزة يتفقد آليه عمل معبر كرم
                                                أبو سالم
                                            </h5>
                                            <p>
                                                تفقد وفد من غرفة تجارة وصناعة محافظة غزة اليوم، آليه
                                                عمل معبر كرم أبو سالم جنوب قطاع غزة، وذلك خلال جولة
                                            </p>
                                        </div>
                                        <a href="" class="btnS btnSCard">تعرف على المزيد</a>
                                    </a>
                                </div>
                            </div> --}}



                        </div>
                    </div>

                    <a href="{{ route('mediaCenterNews') }}" class="btnS btnSCard m-auto mt-4">تعرف على المزيد</a>
                </div>
            </div>
        </div>
    </div>

@endsection
