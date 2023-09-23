@extends('layouts.website')

@section('title', 'المركز الإعلامي')

@section('sub_title', 'المركز الإعلامي')
@section('meta')

<meta name="title" property="og:title" content="ألبوم الصور">
<meta name="description" property="og:description" content="ألبوم الصور">
<meta name="keywords" property="og:keywords" content=",ألبوم الصور,, عن غزةتواصل معنا, الغرفة التجارية"/>
<meta name="image" property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta property="og:image" content="{{ asset('assets/website/images/logo.png') }}">
<meta name="news_keywords" property="og:news_keywords" content="ألبوم الصور" />
<meta property="og:title" content="ألبوم الصور" />

@endsection
@push('css')
@endpush

@push('js')
    <script>
        Fancybox.bind("[data-fancybox]", {
            Thumbs: {
                type: "classic",
            },
            Carousel: {
                direction: "rtl",
            },

            Toolbar: {
                display: {
                    rigtht: ["infobar"],
                    Thumbs: {
                        type: "classic",
                    },
                    middle: [],
                    right: ["slideshow", "download", "thumbs", "close"],
                },
            },
        });
    </script>
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
                        <li class="active">
                            <a href="{{ URL::current() }}">ألبوم الصور</a>
                        </li>
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

                    @foreach ($images as $key => $item)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ asset("storage/files/images/$item->basicFile") }}"
                                data-fancybox="gall{{ $key }}" {{-- data-caption="{{ $item->short_description }}" --}} class="cardM">
                                <img src="{{ asset("storage/files/images/$item->basicFile") }}" alt="" />
                                <div class="wacthVIcon">
                                    <i class="bx bx-images"></i>
                                </div>
                                <div class="textCardM">
                                    <p>{{ $item->title }}</p>
                                    <span>{{ $item->created_at->format('Y:m:d') }}</span>
                                </div>
                            </a>
                            <div style="display: none">

                                @foreach ($item->files as $file)
                                    <a data-fancybox="gall{{ $key }}"
                                        href="{{ asset("storage/files/images/$file->filename") }}">
                                        <img src="{{ asset("storage/files/images/$file->filename") }}" />
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    @endforeach


                    {{-- <div class="col-md-6 col-lg-4">
                        <a href="images/imgC13.png" data-fancybox="gall123123ery2" class="cardM">
                            <img src="images/imgC13.png" alt="" />
                            <div class="wacthVIcon">
                                <i class="bx bx-images"></i>
                            </div>
                            <div class="textCardM">
                                <p>
                                    الإفطار السنوى لمنتسبى لعضوية رجال الأعمال بغرفة تجارة
                                    وصناعة محافظة غزة
                                </p>
                                <span>10,مارس 2023</span>
                            </div>
                        </a>
                        <div style="display: none">
                            <a data-fancybox="gall123123ery2" href="https://lipsum.app/id/61/1600x1200">
                                <img src="https://lipsum.app/id/61/120x80" />
                            </a>
                        </div>
                    </div> --}}
                    {{--
                    <div class="col-md-6 col-lg-4">
                        <a href="images/imgC12.png" data-fancybox="gallery3" class="cardM">
                            <img src="images/imgC12.png" alt="" />
                            <div class="wacthVIcon">
                                <i class="bx bx-images"></i>
                            </div>
                            <div class="textCardM">
                                <p>
                                    غرفة تجارة وصناعة محافظة غزة تكرم أوائل الطلبة بالثانوية
                                    العامة
                                </p>
                                <span>10,مارس 2023</span>
                            </div>
                        </a>
                        <div style="display: none">
                            <a data-fancybox="gallery3" href="https://lipsum.app/id/61/1600x1200">
                                <img src="https://lipsum.app/id/61/120x80" />
                            </a>
                            <a data-fancybox="gallery3" href="https://lipsum.app/id/62/1600x1200">
                                <img src="https://lipsum.app/id/62/120x80" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="images/imgC13.png" data-fancybox="gallery4" class="cardM">
                            <img src="images/imgC13.png" alt="" />
                            <div class="wacthVIcon">
                                <i class="bx bx-images"></i>
                            </div>
                            <div class="textCardM">
                                <p>
                                    الإفطار السنوى لمنتسبى لعضوية رجال الأعمال بغرفة تجارة
                                    وصناعة محافظة غزة
                                </p>
                                <span>10,مارس 2023</span>
                            </div>
                        </a>
                        <div style="display: none">
                            <a data-fancybox="gallery4" href="https://lipsum.app/id/61/1600x1200">
                                <img src="https://lipsum.app/id/61/120x80" />
                            </a>
                            <a data-fancybox="gallery4" href="https://lipsum.app/id/62/1600x1200">
                                <img src="https://lipsum.app/id/62/120x80" />
                            </a>
                            <a data-fancybox="gallery4" href="https://lipsum.app/id/63/1600x1200">
                                <img src="https://lipsum.app/id/63/120x80" />
                            </a>
                        </div>
                    </div> --}}

                </div>
            </div>
            {{-- pagination --}}
            {{ $images->links('website.paginations.paginate') }}
        </div>
    </div>
@endsection
