@extends('layouts.website')

@section('title', 'الخدمات')

@section('sub_title', 'الخدمات')

@section('meta')

<meta name="title" property="og:title" content="الخدمات">
<meta name="description" property="og:description" content="الخدمات">
<meta name="keywords" property="og:keywords" content=",الخدمات,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="الخدمات,, عن غزةتواصل معنا, الغرفة التجارية">
<meta property="og:image" content="الخدمات,, عن غزةتواصل معنا, الغرفة التجارية">
<meta name="news_keywords" property="og:news_keywords" content="الخدمات" />
<meta property="og:title" content="الخدمات" />

@endsection

@push('css')
@endpush

@push('js')
@endpush

@section('content')

    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="bodyMedia container mt-5">
                <div class="row">

                    @foreach ($services as $item)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('serviceDetailsPage', [$item->id]) }}" class="cardRoomServices">
                            <img class="imgCardRoomServices" src="{{ asset("storage/$item->background_image") }}" alt="" />
                            <div class="cardRText">
                                <img src="{{ asset("storage/$item->icon_image") }}" alt="" />
                                <p>{{ $item->title }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
