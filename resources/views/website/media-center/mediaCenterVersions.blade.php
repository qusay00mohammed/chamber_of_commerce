@extends('layouts.website')

@section('title', 'المركز الإعلامي')

@section('sub_title', 'المركز الإعلامي')
@section('meta')

<meta name="title" property="og:title" content="إصدارات الغرفة">
<meta name="description" property="og:description" content="إصدارات الغرفة">
<meta name="keywords" property="og:keywords" content=",إصدارات الغرفة,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="إصدارات الغرفة" />
<meta property="og:title" content="إصدارات الغرفة" />

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
                        <li><a href="{{ route('mediaCenterEvents') }}">أنشطة وفعاليات</a></li>
                        <li><a href="{{ route('mediaCenterImage') }}">ألبوم الصور</a></li>
                        <li><a href="{{ route('mediaCenterVideo') }}">مكتبة الفيديو</a></li>
                        <li class="active">
                            <a href="{{ route('website.mediaCenterVersions') }}">إصدارات الغرفة</a>
                        </li>
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

                    @foreach ($versions as $item)
                    <div class="col-md-6">
                        <div class="cardVersion">
                            <div class="textCardVersion">
                                <h3 class="lineTitle fontBold mb-4">{{ $item->title }}</h3>
                                <span>{{ $item->created_at->format('Y:m:d') }}</span>
                            </div>
                            <a href="{{ asset("storage/$item->image_url") }}" data-fancybox class="pdfCardVersion">
                                <img src="{{ asset('assets/website/images/pdf-svgrepo-com.svg') }}" alt="" />
                                <span>كيلوبايت {{ round(filesize(public_path("storage/$item->image_url")) / 1024, 2) }} </span> {{-- ، 26 الصفحات  --}}
                                <img class="documentDownload" src="{{ asset('assets/website/images/document-download.svg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            {{-- <nav aria-label="Page navigation ">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link"><i class="bx bx-chevron-right"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </div>

@endsection
