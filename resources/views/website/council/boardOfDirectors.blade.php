@extends('layouts.website')

@section('title', 'أعضاء مجلس الادارة')

@section('sub_title', 'أعضاء مجلس الادارة')
@section('meta')

<meta name="title" property="og:title" content="أعضاء مجلس الادارة">
<meta name="description" property="og:description" content="أعضاء مجلس الادارة">
<meta name="keywords" property="og:keywords" content=",أعضاء مجلس الادارة,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="أعضاء مجلس الادارة" />
<meta property="og:title" content="أعضاء مجلس الادارة" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody container mt-5">
        <div class="flexSection">
            <div class="d-flex justify-content-center">
                <h2 class="titleFlexSec lineTitle fontBold">أعضاء مجلس الإدارة</h2>
            </div>
        </div>

        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 mt-5">

            @foreach ($members as $item)
                <div class="col-12">
                    <div class="cardSliderBoard cardSliderBoardpage">
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


@endsection
