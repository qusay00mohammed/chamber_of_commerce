@extends('layouts.website')

@section('title', 'اهدافنا')

@section('sub_title', 'اهدافنا')
@section('meta')

<meta name="title" property="og:title" content="اهدافنا">
<meta name="description" property="og:description" content="اهدافنا">
<meta name="keywords" property="og:keywords" content=",اهدافنا,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="اهدافنا" />
<meta property="og:title" content="اهدافنا" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')


    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">أهداف الغرفة</h2>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="row">
                    @foreach ($goals as $key => $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="cardVersion cardObjective">
                            <h1 class="numCard">0{{ ++$key }}</h1>
                            <h5>{{ $item->description }}</h5>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
