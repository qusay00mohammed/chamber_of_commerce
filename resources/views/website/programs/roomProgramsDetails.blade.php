@extends('layouts.website')

@section('title', $program->title)

@section('sub_title', 'برامج الغرفة')
@section('meta')

<meta name="title" property="og:title" content="{{ $program->title }}">
<meta name="description" property="og:description" content="برامج الغرفة">
<meta name="keywords" property="og:keywords" content=",برامج الغرفة,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset("storage/$program->image_url") }}">
<meta property="og:image" content="{{ asset("storage/$program->image_url") }}">
<meta name="news_keywords" property="og:news_keywords" content="برامج الغرفة" />
<meta property="og:title" content="{{ $program->title }}" />

@endsection
@push('css')
@endpush

@push('js')
@endpush

@section('content')
    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="bodyMedia container mt-5">
                <div class="flexService">
                    <div class="textSideService">
                        <h3 class="titleFlexSec lineTitle fontBold">{{ $program->title }}</h3>
                        <div class="bodyTextS mt-5">
                            {!! $program->description !!}
                        </div>
                    </div>
                    <div class="imgSideService">
                        <img src="{{ asset("storage/$program->image_url") }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
