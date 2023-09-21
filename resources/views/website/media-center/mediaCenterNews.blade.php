@extends('layouts.website')

@section('title', 'المركز الإعلامي')

@section('sub_title', 'المركز الإعلامي')
@section('meta')

<meta name="title" property="og:title" content="الأخبار">
<meta name="description" property="og:description" content="الأخبار">
<meta name="keywords" property="og:keywords" content=",الأخبار,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="الأخبار" />
<meta property="og:title" content="الأخبار" />

@endsection
@push('css')
@endpush

@push('js')
@endpush



@section('content')



    <div class="pagesInnerBody mt-5">
        <div class="flexSection">
            <div class="d-flex titleSec flex-column align-items-center text-center">
                <h2 class="titleFlexSec lineTitle fontBold">المركز الإعلامي</h2>
            </div>

            <div class="menuMediaLink mt-4">
                <div class="container">
                    <ul>
                        <li class="active"><a href="{{ URL::current() }}">الأخبار</a></li>
                        <li><a href="{{ route('mediaCenterEvents') }}">أنشطة وفعاليات</a></li>
                        <li><a href="{{ route('mediaCenterImage') }}">ألبوم الصور</a></li>
                        <li><a href="{{ route('mediaCenterVideo') }}">مكتبة الفيديو</a></li>
                        <li><a href="{{ route('website.mediaCenterVersions') }}">إصدارات الغرفة</a></li>
                    </ul>
                </div>
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
                                    <img src="{{ asset("storage/files/news/$item->basicFile") }}" alt="" />
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
            {{-- pagination --}}
            {{ $news->links('website.paginations.paginate') }}
        </div>
    </div>

@endsection
