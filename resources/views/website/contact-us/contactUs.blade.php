@extends('layouts.website')

@section('title', 'اتصل بنا')

@section('sub_title', 'تواصل معنا')
@section('meta')

    <meta name="title" property="og:title" content="اتصل بنا">
    <meta name="description" property="og:description" content="اتصل بنا">
    <meta name="keywords" property="og:keywords" content=",اتصل بنا,, عن غزةتواصل معنا, الغرفة التجارية" />
    <meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
    <meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
    <meta name="news_keywords" property="og:news_keywords" content="اتصل بنا" />
    <meta property="og:title" content="اتصل بنا" />

@endsection

@push('css')
<link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@endpush



@section('content')

@include('layouts.alert')

    <div class="pagesInnerBody mt-5">
        <div class="d-flex titleSec flex-column align-items-center text-center">
            <h2 class="titleFlexSec lineTitle fontBold">اتصل بنا</h2>
        </div>
        <div class="allConnectUsSec mt-5 container">
            <form method="POST" action="{{ route('website.contact.store') }}" class="formConnectUsSec">
                @csrf
                <div class="flexInput">
                    <div class="inputDF">
                        <label for="">الاسم الاول</label>
                        <input type="text" name="fullname" required placeholder="إدخال الاسم هنا" />
                    </div>
                    <div class="inputDF">
                        <label for="">البريد الإلكتروني</label>
                        <input type="email" name="email" required placeholder="البريد الإلكتروني" />
                    </div>
                </div>
                <div class="flexInput">
                    <div class="inputDF">
                        <label for="">عنوان المراسلة</label>
                        <input type="text" name="title" placeholder="إدخال عنوان المراسلة هنا" />
                    </div>
                    <div class="inputDF">
                        <label for="">سبب المراسلة</label>
                        <select class="form-select" name="reason" required id="">
                            <option value="" hidden="" selected="">سبب المراسلة</option>
                            <option value="problem">شكوى</option>
                            <option value="inquiry">استفسار</option>
                        </select>
                    </div>
                </div>
                <div class="flexInput">
                    <div class="inputDF">
                        <label for="">الرسالة</label>
                        <textarea name="message" required id="" cols="30" rows="10" placeholder="نص المراسلة"></textarea>
                    </div>
                </div>
                <div class="btnsContactUs">
                    <button class="btnS">إرسال</button>
                    <button class="btnS btnWS">مسح</button>
                </div>
            </form>
            <div class="mapConnectUsSec" data-sr-id="23"
                style="
            visibility: visible;
            opacity: 1;
            transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
            transition: opacity 0.7s ease-in-out 0.2s,
              transform 0.7s ease-in-out 0.2s;
          ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.43693000794!2d34.4559101236331!3d31.51215744754646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f0d569ea745%3A0x2898309bb3a687e1!2z2K3Yr9mK2YLZhyAuINmF2YbYqtiy2Ycg2KfZhNio2YTYr9mK2Ycg2LrYstmH!5e0!3m2!1sar!2s!4v1689240568979!5m2!1sar!2s"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="contactD mt-3 container">
            <div class="dfelxC ms-auto">
                <img src="{{ asset('assets/website/images/iconLocG.png') }}" alt="" />
                <span>{{ $settings->where('type', 'information-contacts')->where('key', 'location')->first()->description }}</span>
            </div>
            <div class="dfelxC">
                <img src="{{ asset('assets/website/images/phoneIconG.png') }}" alt="" />
                <span>{{ $settings->where('type', 'information-contacts')->where('key', 'phone')->first()->description }}</span>
            </div>
            <div class="dfelxC">
                <img src="{{ asset('assets/website/images/prIconG.png') }}" alt="" />
                <span>{{ $settings->where('type', 'information-contacts')->where('key', 'telephone')->first()->description }}</span>
            </div>
            <div class="dfelxC">
                <img src="{{ asset('assets/website/images/emailIconG.png') }}" alt="" />
                <span>{{ $settings->where('type', 'information-contacts')->where('key', 'email')->first()->description }}</span>
            </div>
            <div class="dfelxC mt-1">
                <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'facebook')->first()->description }}"><i class="bx bxl-facebook"></i> </a>
                <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'twitter')->first()->description }}"><i class="bx bxl-twitter"></i> </a>
                <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'youtube')->first()->description }}"><i class="bx bxl-youtube"></i> </a>
                <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'instagram')->first()->description }}"><i class="bx bxl-instagram"></i> </a>
                <a target="_blank" href="{{ route('news.rss') }}"><i class="bx bx-rss"></i> </a>
                <a href="{{ $settings->where('type', 'information-contacts')->where('key', 'telegram')->first()->description }}"><i class="bx bxl-telegram"></i> </a>
            </div>
        </div>
    </div>


@endsection
