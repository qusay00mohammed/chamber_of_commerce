@extends('layouts.website')

@section('title', 'أخبار المعابر')

@section('sub_title', 'أخبار المعابر')
@section('meta')

<meta name="title" property="og:title" content="أخبار المعابر">
<meta name="description" property="og:description" content="أخبار المعابر">
<meta name="keywords" property="og:keywords" content=",أخبار المعابر,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="أخبار المعابر" />
<meta property="og:title" content="أخبار المعابر" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">أخبار المعابر</h2>
            </div>

            <div class="bodyMedia bodyAgreement container mt-5">
                <div class="row container m-auto">
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('website.crossingNews', ['rafah']) }}" class="cardCrossing">
                            <div class="imgCardCrossing">
                                <img src="{{ asset('assets/website/images/imCrossing.png') }}" alt="" />
                                <h2 class="fontBold">معبر رفح</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('website.crossingNews', ['erez']) }}" class="cardCrossing">
                            <div class="imgCardCrossing">
                                <img src="{{ asset('assets/website/images/imCrossing2.png') }}" alt="" />
                                <h2 class="fontBold">معبر إيرز</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <a href="{{ route('website.crossingNews', ['keremShalom']) }}" class="cardCrossing">
                            <div class="imgCardCrossing">
                                <img src="{{ asset('assets/website/images/imCrossing3.png') }}" alt="" />
                                <h2 class="fontBold">معبر كرم أبو سالم</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
