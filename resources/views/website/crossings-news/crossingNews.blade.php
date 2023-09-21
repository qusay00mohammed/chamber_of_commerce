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
                @if ($name == 'erez')
                    <h2 class="titleFlexSec lineTitle fontBold">أخبار معبر إيرز</h2>
                @elseif ($name == 'keremShalom')
                    <h2 class="titleFlexSec lineTitle fontBold">أخبار معبر كرم ابو سالم</h2>
                @elseif ($name == 'rafah')
                    <h2 class="titleFlexSec lineTitle fontBold">أخبار معبر رفح</h2>
                @endif
            </div>

            <div class="searchMedia container">
                <form class="searchSide">
                    <button type="submit">
                        <img src="images/searchIconB.svg" alt="" />
                    </button>
                    <input type="text" placeholder="عن ماذا تبحث؟" />
                    <button class="btnS">بحث</button>
                </form>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="row">

                    @foreach ($news as $item)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="cardNews">
                            <a href="{{ route('website.newsDetails', [$item->id]) }}">
                                <div class="imgCardNews">
                                    <img src="{{ asset("storage/$item->basicFile") }}" alt="" />
                                </div>
                                <div class="textCardNews">
                                    <span>{{ $item->created_at }}</span>
                                    <h5>{{ $item->title }}</h5>
                                    <p>{{ $item->short_description }}</p>
                                </div>
                                <a href="{{ route('website.newsDetails', [$item->id]) }}" class="btnS btnSCard">تعرف على المزيد</a>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            {{-- Pagination --}}
            {{ $news->links('website.paginations.paginate') }}
        </div>
    </div>
@endsection
