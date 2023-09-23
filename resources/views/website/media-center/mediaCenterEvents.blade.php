@extends('layouts.website')

@section('title', 'المركز الإعلامي')

@section('sub_title', 'المركز الإعلامي')
@section('meta')

<meta name="title" property="og:title" content="أنشطة وفعاليات">
<meta name="description" property="og:description" content="أنشطة وفعاليات">
<meta name="keywords" property="og:keywords" content=",أنشطة وفعاليات,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="أنشطة وفعاليات" />
<meta property="og:title" content="أنشطة وفعاليات" />

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
                        <li class=""><a href="{{ route('mediaCenterNews') }}">الأخبار</a></li>
                        <li class="active">
                            <a href="{{ URL::current() }}">أنشطة وفعاليات</a>
                        </li>
                        <li><a href="{{ route('mediaCenterImage') }}">ألبوم الصور</a></li>
                        <li><a href="{{ route('mediaCenterVideo') }}">مكتبة الفيديو</a></li>
                        <li><a href="{{ route('website.mediaCenterVersions') }}">إصدارات الغرفة</a></li>
                    </ul>
                </div>
            </div>

            <div class="searchMedia container">
                <form class="searchSide">
                    <button type="submit">
                        <img src="{{ asset('assets/website/images/searchIconB.svg') }}" alt="" />
                    </button>
                    <input type="text" placeholder="عن ماذا تبحث؟" />
                    <button class="btnS">بحث</button>
                </form>
            </div>

            <div class="bodyMedia container mt-5">
                <div class="row">

                    @foreach ($activities as $item)
                    <div class="col-md-6 col-lg-4">
                        <a href="" class="cardM">
                            <img src="{{ asset("storage/files/activities/$item->basicFile") }}" alt="" />

                            <div class="textCardM">
                                <p>{{ $item->title }}</p>
                                <span>{{ $item->created_at->format('Y:m:d') }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            {{-- pagination --}}
            {{ $activities->links('website.paginations.paginate') }}
        </div>
    </div>
@endsection
