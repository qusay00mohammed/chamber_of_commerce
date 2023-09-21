@extends('layouts.website')

@section('title', 'كلمة رئيس المجلس')

@section('sub_title', 'كلمة رئيس المجلس')
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




    <div class="pagesInnerBody mt-5">
        <div class="flexSection container">
            <div class="allflexSection">
                <div class="rightFlexSection">
                    <h2 class="titleFlexSec lineTitle fontBold">كلمة رئيس المجلس</h2>
                    <div class="bodyText">
                        {!! $settings->where('key', 'speech_of_the_chairman_of_the_council')->first()->short_description ?? '' !!}
                    </div>
                </div>
                <div class="leftFlexSection">
                    <div class="imgFlexSec">
                        <?php $url = $settings->where('key', 'speech_of_the_chairman_of_the_council')->first()->image_url ?? ''; ?>
                        <img style="object-fit: contain !important;" src="{{ asset("storage/$url") }}" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flexSection flexSectionRev container">
            <div class="allflexSection">
                <div class="rightFlexSection w-100">
                    <div class="bodyText">
                        <div class="">
                            {!! $settings->where('key', 'speech_of_the_chairman_of_the_council')->first()->description ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
