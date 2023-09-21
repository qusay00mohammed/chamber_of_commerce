@extends('layouts.website')

@section('title', 'عن غزة')

@section('sub_title', 'عن غزة')
@section('meta')

<meta name="title" property="og:title" content="عن غزة">
<meta name="description" property="og:description" content="عن غزة">
<meta name="keywords" property="og:keywords" content=", عن غزةتواصل معنا, الغرفة التجارية"/>
<?php $url = $settings->where('key', 'about_gaza')->first()->image_url ?? ''; ?>
<meta name="image" property="og:image" content="{{ asset("storage/$url") }}">
<meta property="og:image" content="{{ asset("storage/$url") }}">
<meta name="news_keywords" property="og:news_keywords" content="عن غزة" />
<meta property="og:title" content="عن غزة" />

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
                    <h2 class="titleFlexSec lineTitle fontBold">مدينــة غــــزة</h2>
                    <div class="bodyText">
                        {!! $settings->where('key', 'about_gaza')->first()->short_description ?? '' !!}
                    </div>
                </div>
                <div class="leftFlexSection">
                    <div class="imgFlexSec">
                        <?php $url = $settings->where('key', 'about_gaza')->first()->image_url ?? ''; ?>
                        <img style="object-fit: contain !important;" src="{{ asset("storage/$url") }}" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flexSection flexSectionRev container">
            <div class="allflexSection">
                <div class="rightFlexSection w-100">
                    {!! $settings->where('key', 'about_gaza')->first()->description ?? '' !!}
                </div>
            </div>
        </div>

        <div class="financeResource gazaGovernoratesC">
            <div class="titleSec text-center">
                <h2 class="fontBold">محافظات غزة</h2>
            </div>

            <div class="financeResourceCards gazaGovernoratesCards mt-5 container">
                <div class="financeResourceCard">
                    <div>
                        <h5 class="fontBold">محافظة غزة</h5>
                        <p>
                            وتشمل مدينه غزة حتى الضفة الشماليه لوادي غزة بما في ذلك مخيم
                            الشاطئ وتبلغ المساح الكلية للمحافظة 72.471 كم2
                        </p>
                    </div>
                    <h1>01</h1>
                </div>
                <div class="financeResourceCard">
                    <div>
                        <h5 class="fontBold">محافظة الشمال</h5>
                        <p>
                            تضم كل من قرية بيت لاهيا ،قرية بيت حانون ،جباليا وتبلغ المساحة
                            الكلية 60.680 كم2
                        </p>
                    </div>
                    <h1>02</h1>
                </div>
                <div class="financeResourceCard">
                    <div>
                        <h5 class="fontBold">محافظة الوسطى</h5>
                        <p>
                            وتشمل كل من مخيم النصيرات،مخيم البريج، مخيم المغازي وقرية
                            الزوايده ومدينة دير البلح وتبلغ المساحة الكلية للمحافظه 56.41
                            كم2
                        </p>
                    </div>
                    <h1>03</h1>
                </div>
                <div class="financeResourceCard">
                    <div>
                        <h5 class="fontBold">محافظة رفح</h5>
                        <p>
                            وتشمل كل من مدينة رفح ومخيم رفح وتبلغ المساحه الكليه 58.49 كم2
                        </p>
                    </div>
                    <h1>04</h1>
                </div>
                <div class="financeResourceCard">
                    <div>
                        <h5 class="fontBold">محافظة خانيونس</h5>
                        <p>
                            وتشمل كل من مدينة خانيونس ومخيم خانيونس وقــرى القرارة، وبنى
                            سهيلا، عبسان الصغيرة، عبسان الكبيرة خزاعة وتبلغ المساحه الكليه
                            للمحافظه 110.47 كم2
                        </p>
                    </div>
                    <h1>05</h1>
                </div>
            </div>
        </div>
    </div>

@endsection
